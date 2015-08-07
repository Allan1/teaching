<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 */
class StudentsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Studentclasses', 'Users', 'Schools']
        ];
        $this->set('students', $this->paginate($this->Students));
        $this->set('_serialize', ['students']);
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Studentclasses', 'Users', 'Schools']
        ]);
        $this->set('student', $student);
        $this->set('_serialize', ['student']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $student = $this->Students->newEntity();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->data,[
                'associated'=>['Users']
            ]);
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                // unlock first stage
                $this->loadModel('Sections');
                $section = $this->Sections->find('all');
                $section = $section->first();
                $stage = $this->Sections->Stages->find('all',['conditions'=>['section_id'=>$section['id']],'order'=>'number']);
                $stage = $stage->first();
                // debug($stage);
                $this->loadModel('StudentsHasStages');
                $StudentsHasStagesTable = TableRegistry::get('StudentsHasStages');
                $StudentsHasStages = $StudentsHasStagesTable->newEntity();
                $StudentsHasStages->stage_id = $stage['id'];
                $StudentsHasStages->student_id = $student->id;
                $StudentsHasStages->rating = '0';
                if ($StudentsHasStagesTable->save($StudentsHasStages)) {
                    // The $StudentsHasStages entity contain the id now
                    // $id = $StudentsHasStages->id;
                }
                else{
                    $this->Flash->success(__('The student has been saved, but the first stage was not unlocked!'));                    
                }


                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The student could not be saved. Please, try again.'));
            }
        }
        $studentclasses = $this->Students->Studentclasses->find('list', ['limit' => 200]);
        $schools = $this->Students->Schools->find('list', ['limit' => 200]);
        $this->set(compact('student', 'studentclasses', 'schools'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->data,[
                'associated'=>['Users']
            ]);
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The student could not be saved. Please, try again.'));
            }
        }
        $studentclasses = $this->Students->Studentclasses->find('list', ['limit' => 200]);
        $schools = $this->Students->Schools->find('list', ['limit' => 200]);
        $this->set(compact('student', 'studentclasses', 'schools'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('The student has been deleted.'));
        } else {
            $this->Flash->error(__('The student could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function dashboard()
    {
        $user = $this->Auth->user();
        $student_id = $this->Students->getId($user['id']);
        $this->loadModel('Sections');
        $sections = $this->Sections->find('all', ['contain'=>['Stages'],'limit' => 200]);
        $sections = $sections->toArray();
        // debug($sections);
        foreach ($sections as $key => $section) {
            foreach ($section['stages'] as $key2 => $stage) {
                $StudentsHasStages = $this->Students->StudentsHasStages->find('all',['conditions'=>['stage_id'=>$stage['id'],'student_id'=>$student_id]]);
                $sections[$key]['stages'][$key2]['studentsHasStages'] = $StudentsHasStages->first();
            // debug($sections[$key]['stages'][$key2]);
            }
        }
        $this->set(compact('sections'));
    }
}
