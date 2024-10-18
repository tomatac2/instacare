<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * HealthFile Controller
 *
 * @property \App\Model\Table\HealthFileTable $HealthFile
 */
class HealthFileController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->HealthFile->find()
            ->contain(['Users']);
        $healthFile = $this->paginate($query);

        $this->set(compact('healthFile'));
    }

    /**
     * View method
     *
     * @param string|null $id Health File id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $healthFile = $this->HealthFile->get($id, contain: ['Users']);
        $this->set(compact('healthFile'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $healthFile = $this->HealthFile->newEmptyEntity();
        if ($this->request->is('post')) {
            $healthFile = $this->HealthFile->patchEntity($healthFile, $this->request->getData());
            if ($this->HealthFile->save($healthFile)) {
                $this->Flash->success(__('The health file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The health file could not be saved. Please, try again.'));
        }
        $users = $this->HealthFile->Users->find('list', limit: 200)->all();
        $this->set(compact('healthFile', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Health File id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $healthFile = $this->HealthFile->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $healthFile = $this->HealthFile->patchEntity($healthFile, $this->request->getData());
            if ($this->HealthFile->save($healthFile)) {
                $this->Flash->success(__('The health file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The health file could not be saved. Please, try again.'));
        }
        $users = $this->HealthFile->Users->find('list', limit: 200)->all();
        $this->set(compact('healthFile', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Health File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $healthFile = $this->HealthFile->get($id);
        if ($this->HealthFile->delete($healthFile)) {
            $this->Flash->success(__('The health file has been deleted.'));
        } else {
            $this->Flash->error(__('The health file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
