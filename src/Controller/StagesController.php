<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Stages Controller
 *
 * @property \App\Model\Table\StagesTable $Stages
 */
class StagesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sections']
        ];
        $this->set('stages', $this->paginate($this->Stages));
        $this->set('_serialize', ['stages']);
    }

    /**
     * View method
     *
     * @param string|null $id Stage id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stage = $this->Stages->get($id, [
            'contain' => ['Sections', 'Questions', 'Stagespages']
        ]);
        $this->set('stage', $stage);
        $this->set('_serialize', ['stage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stage = $this->Stages->newEntity();
        if ($this->request->is('post')) {
            $stage = $this->Stages->patchEntity($stage, $this->request->data);
            if ($this->Stages->save($stage)) {
                $this->Flash->success(__('The stage has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stage could not be saved. Please, try again.'));
            }
        }
        $sections = $this->Stages->Sections->find('list', ['limit' => 200]);
        $this->set(compact('stage', 'sections'));
        $this->set('_serialize', ['stage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stage id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stage = $this->Stages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stage = $this->Stages->patchEntity($stage, $this->request->data);
            if ($this->Stages->save($stage)) {
                $this->Flash->success(__('The stage has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stage could not be saved. Please, try again.'));
            }
        }
        $sections = $this->Stages->Sections->find('list', ['limit' => 200]);
        $this->set(compact('stage', 'sections'));
        $this->set('_serialize', ['stage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stage id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stage = $this->Stages->get($id);
        if ($this->Stages->delete($stage)) {
            $this->Flash->success(__('The stage has been deleted.'));
        } else {
            $this->Flash->error(__('The stage could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function play($id, $page_n = 1)
    {
        $stage = $this->Stages->get($id, [
            'contain' => ['Sections', 'Stagespages'=>['sort'=>'Stagespages.number']]
        ]);
        // debug($stage);
        $page = null;
        $next = null;
        $previous = null;
        $quizz = null;
        if (!empty($stage['stagespages'][$page_n-1])) {
            $page = $stage['stagespages'][$page_n-1];
            if ($page_n>1) {
                $previous = $page_n-1;
            }
            if (!empty($stage['stagespages'][$page_n])) {
                $next = $page_n + 1;
            }
            else{
                $quizz = true;
            }

        }
        $this->set('previous',$previous);
        $this->set('next',$next);
        $this->set('quizz',$quizz);
        $this->set('page',$page);
        $this->set('stage', $stage);
        $this->set('_serialize', ['stage']);
    }

    public function quizz($id)
    {
        $stage = $this->Stages->get($id, [
            'contain' => ['Questions'=>['Answers']]
        ]);
        // debug($stage);

        $this->set('stage', $stage);
        $this->set('_serialize', ['stage']);
    }

    public function result($id)
    {
        $stage = $this->Stages->get($id, [
            'contain' => ['Questions'=>['CorrectAnswer','Answers']]
        ]);
        $result = null;
        $rating = 0;
        if ($this->request->is(['patch', 'post', 'put'])) {
            // debug($stage->questions);    
            foreach ($stage->questions as $question) {
                if ($question->answer_id == $this->request->data['question'][$question->id]) {
                    $result[] = ['correct'=>true, 'question'=> $question->name, 'answer'=>$question->correct_answer->name];
                    $rating++;
                }
                else{
                    $result[] = ['correct'=>false, 'question'=> $question->name, 'answer'=>$question->correct_answer->name];
                }
            }

            $studentsHasStagesTable = TableRegistry::get('StudentsHasStages');
            $studentsHasStages = $studentsHasStagesTable->newEntity();
            $studentsHasStages->rating = $rating;
            $student_id = $this->getStudentId();
            $studentsHasStages->student_id = $student_id;
            $studentsHasStages->stage_id = $id;

            if ($studentsHasStagesTable->save($studentsHasStages)) {
                // unlock next stage
                $next_stage = $this->Stages->find('all',['conditions'=>['section_id'=>$stage['section_id'],'number'=>($stage['section_id']+1)]]);
                $next_stage = $next_stage->first();
                if ($next_stage) {
                    // debug($next_stage);
                    $studentsHasStagesTable = TableRegistry::get('StudentsHasStages');
                    $studentsHasStages = $studentsHasStagesTable->newEntity();
                    $studentsHasStages->rating = 0;
                    $studentsHasStages->student_id = $student_id;
                    $studentsHasStages->stage_id = $next_stage['id'];
                    if (!$studentsHasStagesTable->save($studentsHasStages)) {
                        $this->Flash->error(__('Next stage could not be unlocked. Please, try again.'));
                    }
                }
            } else {
                $this->Flash->error(__('The result could not be saved. Please, try again.'));
            }
        }
        // debug($result);
        // $this->set('result', $result);
        $this->set(compact('result','rating','stage'));
    }
}
