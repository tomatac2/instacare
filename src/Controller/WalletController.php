<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Wallet Controller
 *
 * @property \App\Model\Table\WalletTable $Wallet
 */
class WalletController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Wallet->find()
            ->contain(['Users']);
        $wallet = $this->paginate($query);

        $this->set(compact('wallet'));
    }

    /**
     * View method
     *
     * @param string|null $id Wallet id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wallet = $this->Wallet->get($id, contain: ['Users']);
        $this->set(compact('wallet'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wallet = $this->Wallet->newEmptyEntity();
        if ($this->request->is('post')) {
            $wallet = $this->Wallet->patchEntity($wallet, $this->request->getData());
            if ($this->Wallet->save($wallet)) {
                $this->Flash->success(__('The wallet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wallet could not be saved. Please, try again.'));
        }
        $users = $this->Wallet->Users->find('list', limit: 200)->all();
        $this->set(compact('wallet', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Wallet id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wallet = $this->Wallet->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wallet = $this->Wallet->patchEntity($wallet, $this->request->getData());
            if ($this->Wallet->save($wallet)) {
                $this->Flash->success(__('The wallet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wallet could not be saved. Please, try again.'));
        }
        $users = $this->Wallet->Users->find('list', limit: 200)->all();
        $this->set(compact('wallet', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Wallet id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wallet = $this->Wallet->get($id);
        if ($this->Wallet->delete($wallet)) {
            $this->Flash->success(__('The wallet has been deleted.'));
        } else {
            $this->Flash->error(__('The wallet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
