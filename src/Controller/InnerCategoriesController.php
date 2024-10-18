<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * InnerCategories Controller
 *
 * @property \App\Model\Table\InnerCategoriesTable $InnerCategories
 */
class InnerCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->InnerCategories->find()
            ->contain(['Categories']);
        $innerCategories = $this->paginate($query);

        $this->set(compact('innerCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Inner Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $innerCategory = $this->InnerCategories->get($id, contain: ['Categories', 'Products']);
        $this->set(compact('innerCategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $innerCategory = $this->InnerCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $innerCategory = $this->InnerCategories->patchEntity($innerCategory, $this->request->getData());
            if ($this->InnerCategories->save($innerCategory)) {
                $this->Flash->success(__('The inner category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inner category could not be saved. Please, try again.'));
        }
        $categories = $this->InnerCategories->Categories->find('list', limit: 200)->all();
        $this->set(compact('innerCategory', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Inner Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $innerCategory = $this->InnerCategories->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $innerCategory = $this->InnerCategories->patchEntity($innerCategory, $this->request->getData());
            if ($this->InnerCategories->save($innerCategory)) {
                $this->Flash->success(__('The inner category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inner category could not be saved. Please, try again.'));
        }
        $categories = $this->InnerCategories->Categories->find('list', limit: 200)->all();
        $this->set(compact('innerCategory', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Inner Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $innerCategory = $this->InnerCategories->get($id);
        if ($this->InnerCategories->delete($innerCategory)) {
            $this->Flash->success(__('The inner category has been deleted.'));
        } else {
            $this->Flash->error(__('The inner category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
