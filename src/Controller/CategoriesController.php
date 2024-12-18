<?php
declare(strict_types=1);

namespace App\Controller;
use App\Hellpers\UploadFile;
/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{

    function finger(){
        
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout("dashboard");
        $query = $this->Categories->find();
        $categories = $this->paginate($query,['limit'=>6]);

        $this->set(compact('categories'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, contain: ['InnerCategories', 'Products']);
        $this->set(compact('category'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout("dashboard");
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData() , ['validate'=>'addCat']);
                    
            //upload file
            !$category->getErrors()   ? $uploadFile = UploadFile::uploadSinglePhoto(["photoName"=>"image" , "path"=>"library/categories" ]) : "";  
            $category->photo = $uploadFile["name"]; 
          
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('تم الحفظ بنجاح'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout("dashboard");
        $category = $this->Categories->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData() , ['validate'=>'updateCat']);

            $oldImg = $category["photo"] ; 
            //upload file
            !$category->getErrors()  ? $uploadFile = UploadFile::uploadSinglePhoto(["photoName"=>"image" , "path"=>"library/categories" ]) : "";  
            $uploadFile["code"] == 200 ?   $category->photo = $uploadFile["name"] 
                                        :  $category->photo = $oldImg ; 

            if ($this->Categories->save($category)) {
                $this->Flash->success(__('تم الحفظ بنجاح'));

                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
