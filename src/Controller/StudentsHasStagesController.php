<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StudentsHasStages Controller
 *
 * @property \App\Model\Table\StudentsHasStagesTable $StudentsHasStages
 */
class StudentsHasStagesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stages', 'Students']
        ];
        $this->set('studentsHasStages', $this->paginate($this->StudentsHasStages));
        $this->set('_serialize', ['studentsHasStages']);
    }

    /**
     * View method
     *
     * @param string|null $id Students Has Stage id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentsHasStage = $this->StudentsHasStages->get($id, [
            'contain' => ['Stages', 'Students']
        ]);
        $this->set('studentsHasStage', $studentsHasStage);
        $this->set('_serialize', ['studentsHasStage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studentsHasStage = $this->StudentsHasStages->newEntity();
        if ($this->request->is('post')) {
            $studentsHasStage = $this->StudentsHasStages->patchEntity($studentsHasStage, $this->request->data);
            if ($this->StudentsHasStages->save($studentsHasStage)) {
                $this->Flash->success(__('The students has stage has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The students has stage could not be saved. Please, try again.'));
            }
        }
        $stages = $this->StudentsHasStages->Stages->find('list', ['limit' => 200]);
        $students = $this->StudentsHasStages->Students->find('list', ['limit' => 200]);
        $this->set(compact('studentsHasStage', 'stages', 'students'));
        $this->set('_serialize', ['studentsHasStage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Students Has Stage id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentsHasStage = $this->StudentsHasStages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentsHasStage = $this->StudentsHasStages->patchEntity($studentsHasStage, $this->request->data);
            if ($this->StudentsHasStages->save($studentsHasStage)) {
                $this->Flash->success(__('The students has stage has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The students has stage could not be saved. Please, try again.'));
            }
        }
        $stages = $this->StudentsHasStages->Stages->find('list', ['limit' => 200]);
        $students = $this->StudentsHasStages->Students->find('list', ['limit' => 200]);
        $this->set(compact('studentsHasStage', 'stages', 'students'));
        $this->set('_serialize', ['studentsHasStage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Students Has Stage id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studentsHasStage = $this->StudentsHasStages->get($id);
        if ($this->StudentsHasStages->delete($studentsHasStage)) {
            $this->Flash->success(__('The students has stage has been deleted.'));
        } else {
            $this->Flash->error(__('The students has stage could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
