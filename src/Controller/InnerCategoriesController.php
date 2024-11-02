<?php
declare(strict_types=1);

namespace App\Controller;
use App\Hellpers\UploadFile;
/**
 * InnerCategories Controller
 *
 * @property \App\Model\Table\InnerCategoriesTable $InnerCategories
 */
class InnerCategoriesController extends AppController
{

    function getSubcatsByCatId($id){
        $this->viewBuilder()->disableAutoLayout();
        $getSubCatsByCatId = $this->InnerCategories->find("list")->where(['category_id'=>$id ? $id : 0])->all();
        $this->set(compact('getSubCatsByCatId'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout("dashboard");
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
    // public function view($id = null)
    // {
    //     $innerCategory = $this->InnerCategories->get($id, contain: ['Categories', 'Products']);
    //     $this->set(compact('innerCategory'));
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout("dashboard");
        $innerCategory = $this->InnerCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $innerCategory = $this->InnerCategories->patchEntity($innerCategory, $this->request->getData(), ['validate'=>'addSubCat']);
            //upload file
            !$innerCategory->getErrors()   ? $uploadFile = UploadFile::uploadSinglePhoto(["photoName"=>"image" , "path"=>"library/categories" ]) : "";  
            $innerCategory->photo = $uploadFile["name"]; 
            if ($this->InnerCategories->save($innerCategory)) {
                $this->Flash->success(__('تم الحفظ بنجاح'));

                return $this->redirect(['action' => 'index']);
            }
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
        $this->viewBuilder()->setLayout("dashboard");
        $innerCategory = $this->InnerCategories->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $innerCategory = $this->InnerCategories->patchEntity($innerCategory, $this->request->getData());

            
            $oldImg = $innerCategory["photo"] ; 
            //upload file
            !$innerCategory->getErrors()  ? $uploadFile = UploadFile::uploadSinglePhoto(["photoName"=>"image" , "path"=>"library/inner-categories" ]) : "";  
            $uploadFile["code"] == 200 ?   $innerCategory->photo = $uploadFile["name"] 
                                        :  $innerCategory->photo = $oldImg ; 

            if ($this->InnerCategories->save($innerCategory)) {
                $this->Flash->success(__('تم الحفظ بنجاح'));

                return $this->redirect(['action' => 'index']);
            }
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
