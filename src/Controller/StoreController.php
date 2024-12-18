<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Store Controller
 *
 * @property \App\Model\Table\StoreTable $Store
 */
class StoreController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout("dashboard");

        $query = $this->Store->find()
            ->contain(['Products']);
        $store = $this->paginate($query);

        $this->set(compact('store'));
    }

    /**
     * View method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $store = $this->Store->get($id, contain: ['Products']);
        $this->set(compact('store'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout("dashboard");

        $store = $this->Store->newEmptyEntity();
        if ($this->request->is('post')) {
            $store = $this->Store->patchEntity($store, $this->request->getData());
            $store->type = "bill";
            if ($this->Store->save($store)) {
                $newQun = $store["quantity"];
                //change product balance 
                $this->Store->Products->updateQuantity(["product_id"=>$store["product_id"], "newQun"=>$newQun]);

                $this->Flash->success(__('تم الاضافة بنجاح'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $products = $this->Store->Products->find('list', limit: 200)->all();
        $this->set(compact('store', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout("dashboard");

        $store = $this->Store->get($id, contain: []);
        $b4UpdateQun = $store["quantity"];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $store = $this->Store->patchEntity($store, $this->request->getData());
            if ($this->Store->save($store)) {
                $updateQun = $store["quantity"];
                //change product balance 
                $this->Store->Products->updateQuantity(["product_id"=>$store["product_id"], "newQun"=>$updateQun - $b4UpdateQun ]);
                
                
                $this->Flash->success(__('تم التحديث بنجاح'));

                return $this->redirect(['action' => 'index']);
            }
        }
        $products = $this->Store->Products->find('list', limit: 200)->all();
        $this->set(compact('store', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $store = $this->Store->get($id);
        if ($this->Store->delete($store)) {
            $this->Flash->success(__('The store has been deleted.'));
        } else {
            $this->Flash->error(__('The store could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
