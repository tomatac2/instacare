<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PrescriptionOrders Controller
 *
 * @property \App\Model\Table\PrescriptionOrdersTable $PrescriptionOrders
 */
class PrescriptionOrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->PrescriptionOrders->find()
            ->contain(['Addresses', 'Users']);
        $prescriptionOrders = $this->paginate($query);

        $this->set(compact('prescriptionOrders'));
    }

    /**
     * View method
     *
     * @param string|null $id Prescription Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prescriptionOrder = $this->PrescriptionOrders->get($id, contain: ['Addresses', 'Users']);
        $this->set(compact('prescriptionOrder'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prescriptionOrder = $this->PrescriptionOrders->newEmptyEntity();
        if ($this->request->is('post')) {
            $prescriptionOrder = $this->PrescriptionOrders->patchEntity($prescriptionOrder, $this->request->getData());
            if ($this->PrescriptionOrders->save($prescriptionOrder)) {
                $this->Flash->success(__('The prescription order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prescription order could not be saved. Please, try again.'));
        }
        $addresses = $this->PrescriptionOrders->Addresses->find('list', limit: 200)->all();
        $users = $this->PrescriptionOrders->Users->find('list', limit: 200)->all();
        $this->set(compact('prescriptionOrder', 'addresses', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prescription Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prescriptionOrder = $this->PrescriptionOrders->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prescriptionOrder = $this->PrescriptionOrders->patchEntity($prescriptionOrder, $this->request->getData());
            if ($this->PrescriptionOrders->save($prescriptionOrder)) {
                $this->Flash->success(__('The prescription order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prescription order could not be saved. Please, try again.'));
        }
        $addresses = $this->PrescriptionOrders->Addresses->find('list', limit: 200)->all();
        $users = $this->PrescriptionOrders->Users->find('list', limit: 200)->all();
        $this->set(compact('prescriptionOrder', 'addresses', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Prescription Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prescriptionOrder = $this->PrescriptionOrders->get($id);
        if ($this->PrescriptionOrders->delete($prescriptionOrder)) {
            $this->Flash->success(__('The prescription order has been deleted.'));
        } else {
            $this->Flash->error(__('The prescription order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
