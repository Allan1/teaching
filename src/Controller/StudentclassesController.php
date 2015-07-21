<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Studentclasses Controller
 *
 * @property \App\Model\Table\StudentclassesTable $Studentclasses
 */
class StudentclassesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Schools', 'Professors']
        ];
        $this->set('studentclasses', $this->paginate($this->Studentclasses));
        $this->set('_serialize', ['studentclasses']);
    }

    /**
     * View method
     *
     * @param string|null $id Studentclass id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentclass = $this->Studentclasses->get($id, [
            'contain' => ['Schools', 'Professors']
        ]);
        $this->set('studentclass', $studentclass);
        $this->set('_serialize', ['studentclass']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studentclass = $this->Studentclasses->newEntity();
        if ($this->request->is('post')) {
            $studentclass = $this->Studentclasses->patchEntity($studentclass, $this->request->data);
            if ($this->Studentclasses->save($studentclass)) {
                $this->Flash->success(__('The studentclass has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The studentclass could not be saved. Please, try again.'));
            }
        }
        $schools = $this->Studentclasses->Schools->find('list', ['limit' => 200]);
        $professors = $this->Studentclasses->Professors->find('list', ['limit' => 200]);
        $this->set(compact('studentclass', 'schools', 'professors'));
        $this->set('_serialize', ['studentclass']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Studentclass id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentclass = $this->Studentclasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentclass = $this->Studentclasses->patchEntity($studentclass, $this->request->data);
            if ($this->Studentclasses->save($studentclass)) {
                $this->Flash->success(__('The studentclass has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The studentclass could not be saved. Please, try again.'));
            }
        }
        $schools = $this->Studentclasses->Schools->find('list', ['limit' => 200]);
        $professors = $this->Studentclasses->Professors->find('list', ['limit' => 200]);
        $this->set(compact('studentclass', 'schools', 'professors'));
        $this->set('_serialize', ['studentclass']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Studentclass id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studentclass = $this->Studentclasses->get($id);
        if ($this->Studentclasses->delete($studentclass)) {
            $this->Flash->success(__('The studentclass has been deleted.'));
        } else {
            $this->Flash->error(__('The studentclass could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
