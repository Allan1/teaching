<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Professors Controller
 *
 * @property \App\Model\Table\ProfessorsTable $Professors
 */
class ProfessorsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Schools']
        ];
        $this->set('professors', $this->paginate($this->Professors));
        $this->set('_serialize', ['professors']);
    }

    /**
     * View method
     *
     * @param string|null $id Professor id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $professor = $this->Professors->get($id, [
            'contain' => ['Users', 'Schools', 'Studentclasses']
        ]);
        $this->set('professor', $professor);
        $this->set('_serialize', ['professor']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $professor = $this->Professors->newEntity();
        if ($this->request->is('post')) {
            $professor = $this->Professors->patchEntity($professor, $this->request->data,[
                'associated'=>['Users']
            ]);
            if ($this->Professors->save($professor)) {
                $this->Flash->success(__('The professor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The professor could not be saved. Please, try again.'));
            }
        }
        $schools = $this->Professors->Schools->find('list', ['limit' => 200]);
        $this->set(compact('professor', 'schools'));
        $this->set('_serialize', ['professor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Professor id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $professor = $this->Professors->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $professor = $this->Professors->patchEntity($professor, $this->request->data,[
                'associated'=>['Users']
            ]);
            if ($this->Professors->save($professor)) {
                $this->Flash->success(__('The professor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The professor could not be saved. Please, try again.'));
            }
        }
        $schools = $this->Professors->Schools->find('list', ['limit' => 200]);
        $this->set(compact('professor', 'schools'));
        $this->set('_serialize', ['professor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Professor id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $professor = $this->Professors->get($id);
        if ($this->Professors->delete($professor)) {
            $this->Flash->success(__('The professor has been deleted.'));
        } else {
            $this->Flash->error(__('The professor could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
