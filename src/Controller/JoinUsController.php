<?php
declare(strict_types=1);

namespace App\Controller;
use App\Hellpers\UploadFile;
/**
 * JoinUs Controller
 *
 * @property \App\Model\Table\JoinUsTable $JoinUs
 */
class JoinUsController extends AppController
{
    function joinUs(){
        $this->viewBuilder()->setLayout("website");

        $joinUs = $this->JoinUs->newEmptyEntity();
        if ($this->request->is('post')) {
            $joinUs = $this->JoinUs->patchEntity($joinUs, $this->request->getData(), ['validate'=>'join']);
          
            //upload file1
            !$joinUs->getErrors()   ? $registerDoc = UploadFile::uploadSinglePhoto(["photoName"=>"register_document2" , "path"=>"library/join-us" ]) : "";  
            $joinUs->register_document = $registerDoc["name"]; 
           
            //upload file2
            !$joinUs->getErrors()   ? $taxDoc = UploadFile::uploadSinglePhoto(["photoName"=>"tax_document2" , "path"=>"library/join-us" ]) : "";  
            $joinUs->tax_document = $taxDoc["name"]; 
           
            //upload file3
            !$joinUs->getErrors()   ? $licenseDoc = UploadFile::uploadSinglePhoto(["photoName"=>"license_document2" , "path"=>"library/join-us" ]) : "";  
            $joinUs->license_document = $licenseDoc["name"]; 

            if ($this->JoinUs->save($joinUs)) {
                $this->Flash->success(__('تم الحفظ بنجاح'));

                return $this->redirect('/الرئيسية');
            }
        }
         $this->set(compact('joinUs'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout("dashboard");
        $query = $this->JoinUs->find();
        $joinUs = $this->paginate($query);

        $this->set(compact('joinUs'));
    }

    /**
     * View method
     *
     * @param string|null $id Join U id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $joinU = $this->JoinUs->get($id, contain: []);
        $this->set(compact('joinU'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $joinU = $this->JoinUs->newEmptyEntity();
        if ($this->request->is('post')) {
            $joinU = $this->JoinUs->patchEntity($joinU, $this->request->getData());
            if ($this->JoinUs->save($joinU)) {
                $this->Flash->success(__('The join u has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The join u could not be saved. Please, try again.'));
        }
        $this->set(compact('joinU'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Join U id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $joinU = $this->JoinUs->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $joinU = $this->JoinUs->patchEntity($joinU, $this->request->getData());
            if ($this->JoinUs->save($joinU)) {
                $this->Flash->success(__('The join u has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The join u could not be saved. Please, try again.'));
        }
        $this->set(compact('joinU'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Join U id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $joinU = $this->JoinUs->get($id);
        if ($this->JoinUs->delete($joinU)) {
            $this->Flash->success(__('The join u has been deleted.'));
        } else {
            $this->Flash->error(__('The join u could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
