<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Administrators Controller
 *
 * @property \App\Model\Table\AdministratorsTable $Administrators
 */
class AdministratorsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('administrators', $this->paginate($this->Administrators));
        $this->set('_serialize', ['administrators']);
    }

    /**
     * View method
     *
     * @param string|null $id Administrator id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $administrator = $this->Administrators->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('administrator', $administrator);
        $this->set('_serialize', ['administrator']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $administrator = $this->Administrators->newEntity();
        if ($this->request->is('post')) {
            $administrator = $this->Administrators->patchEntity($administrator, $this->request->data,[
                'associated'=>['Users']
            ]);
            if ($this->Administrators->save($administrator)) {
                $this->Flash->success(__('The administrator has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The administrator could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('administrator'));
        $this->set('_serialize', ['administrator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Administrator id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $administrator = $this->Administrators->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $administrator = $this->Administrators->patchEntity($administrator, $this->request->data,[
                'associated'=>['Users']
            ]);
            if ($this->Administrators->save($administrator)) {
                $this->Flash->success(__('The administrator has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The administrator could not be saved. Please, try again.'));
            }
        }
        // debug($this->Administrators->recursive());
        $this->set(compact('administrator'));
        $this->set('_serialize', ['administrator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Administrator id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $administrator = $this->Administrators->get($id);
        if ($this->Administrators->delete($administrator)) {
            $this->Flash->success(__('The administrator has been deleted.'));
        } else {
            $this->Flash->error(__('The administrator could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
