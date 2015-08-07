<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stagespages Controller
 *
 * @property \App\Model\Table\StagespagesTable $Stagespages
 */
class StagespagesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stages']
        ];
        $this->set('stagespages', $this->paginate($this->Stagespages));
        $this->set('_serialize', ['stagespages']);
    }

    /**
     * View method
     *
     * @param string|null $id Stagespage id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stagespage = $this->Stagespages->get($id, [
            'contain' => ['Stages']
        ]);
        $this->set('stagespage', $stagespage);
        $this->set('_serialize', ['stagespage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stagespage = $this->Stagespages->newEntity();
        if ($this->request->is('post')) {
            $stagespage = $this->Stagespages->patchEntity($stagespage, $this->request->data);
            if ($this->Stagespages->save($stagespage)) {
                $this->Flash->success(__('The stagespage has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stagespage could not be saved. Please, try again.'));
            }
        }
        $stages = $this->Stagespages->Stages->find('list', ['limit' => 200]);
        $this->set(compact('stagespage', 'stages'));
        $this->set('_serialize', ['stagespage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stagespage id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stagespage = $this->Stagespages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stagespage = $this->Stagespages->patchEntity($stagespage, $this->request->data);
            if ($this->Stagespages->save($stagespage)) {
                $this->Flash->success(__('The stagespage has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stagespage could not be saved. Please, try again.'));
            }
        }
        $stages = $this->Stagespages->Stages->find('list', ['limit' => 200]);
        $this->set(compact('stagespage', 'stages'));
        $this->set('_serialize', ['stagespage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stagespage id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stagespage = $this->Stagespages->get($id);
        if ($this->Stagespages->delete($stagespage)) {
            $this->Flash->success(__('The stagespage has been deleted.'));
        } else {
            $this->Flash->error(__('The stagespage could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
