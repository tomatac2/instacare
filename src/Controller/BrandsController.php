<?php
declare(strict_types=1);

namespace App\Controller;
use App\Hellpers\UploadFile;

/**
 * Brands Controller
 *
 * @property \App\Model\Table\BrandsTable $Brands
 */
class BrandsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout("dashboard");
        $query = $this->Brands->find();
        $brands = $this->paginate($query);

        $this->set(compact('brands'));
    }

 

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout("dashboard");
        $brand = $this->Brands->newEmptyEntity();
        if ($this->request->is('post')) {
            $brand = $this->Brands->patchEntity($brand, $this->request->getData(),['validate'=>'addBrand']);

            //upload file
            !$brand->getErrors()   ? $uploadFile = UploadFile::uploadSinglePhoto(["photoName"=>"image" , "path"=>"library/brands" ]) : "";  
            $brand->photo = $uploadFile["name"]; 

            if ($this->Brands->save($brand)) {
                $this->Flash->success(__('تم الحفظ بنجاح'));

                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('brand'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout("dashboard");
        $brand = $this->Brands->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $brand = $this->Brands->patchEntity($brand, $this->request->getData());
            $oldImg = $brand["photo"] ; 
            //upload file
            !$brand->getErrors()  ? $uploadFile = UploadFile::uploadSinglePhoto(["photoName"=>"image" , "path"=>"library/brands" ]) : "";  
            $uploadFile["code"] == 200 ?   $brand->photo = $uploadFile["name"] 
                                        :  $brand->photo = $oldImg ; 
            if ($this->Brands->save($brand)) {
                $this->Flash->success(__('تم الحفظ بنجاح'));

                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('brand'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $brand = $this->Brands->get($id);
        if ($this->Brands->delete($brand)) {
            $this->Flash->success(__('The brand has been deleted.'));
        } else {
            $this->Flash->error(__('The brand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
