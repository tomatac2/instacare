<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Addresses Controller
 *
 * @property \App\Model\Table\AddressesTable $Addresses
 */
class AddressesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Addresses->find()
            ->contain(['Users']);
        $addresses = $this->paginate($query);

        $this->set(compact('addresses'));
    }

    /**
     * View method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $address = $this->Addresses->get($id, contain: ['Users', 'Orders', 'PrescriptionOrders']);
        $this->set(compact('address'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('website');
        $userID = $this->Authentication->getIdentity()->id ;
        $address = $this->Addresses->newEmptyEntity();
        if ($this->request->is('post')) {
            $address = $this->Addresses->patchEntity($address, $this->request->getData() );
            $address->user_id = $userID ; 
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('تم إضافة العنوان بنجاح'));

                return $this->redirect(URL.'users/profile?tab=2');
            }
        
        }
        $users = $this->Addresses->Users->find('list', limit: 200)->all();
        $this->set(compact('address', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $address = $this->Addresses->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            if ($this->Addresses->save($address)) {
                $this->Flash->success(__('The address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The address could not be saved. Please, try again.'));
        }
        $users = $this->Addresses->Users->find('list', limit: 200)->all();
        $this->set(compact('address', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Address id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $address = $this->Addresses->get($id , 
        ['conditions'=> ["user_id"=> $this->Authentication->getIdentity()->id ] ]
    );
        $address->soft_delete = "yes";
        if ($this->Addresses->save($address)) {
            $this->Flash->success(__('تم الحذف بنجاح'));
        } else {
            $this->Flash->error(__('لم يتم الحذف'));
        }

        return $this->redirect(URL.'users/profile?tab=2');
    }
}
