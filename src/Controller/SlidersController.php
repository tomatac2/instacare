<?php
declare(strict_types=1);

namespace App\Controller;
use App\Hellpers\UploadFile;

/**
 * Sliders Controller
 *
 * @property \App\Model\Table\SlidersTable $Sliders
 */
class SlidersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('dashboard');
        $query = $this->Sliders->find();
        $sliders = $this->paginate($query);

        $this->set(compact('sliders'));
    }

    /**
     * View method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $slider = $this->Sliders->get($id, contain: []);
        $this->set(compact('slider'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('dashboard');
        $slider = $this->Sliders->newEmptyEntity();
        if ($this->request->is('post')) {
            $slider = $this->Sliders->patchEntity($slider, $this->request->getData(),['validate'=>'addSlider']);

            //upload file
            !$slider->getErrors()   ? $uploadFile = UploadFile::uploadSinglePhoto(["photoName"=>"image" , "path"=>"library/sliders" ]) : "";  
            $slider->photo = $uploadFile["name"]; 

            if ($this->Sliders->save($slider)) {
                $this->Flash->success(__('تم الحفظ بنجاح'));

                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('slider'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        $this->viewBuilder()->setLayout('dashboard');
        $slider = $this->Sliders->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $req = $this->request->getData();
            $slider = $this->Sliders->patchEntity($slider, ["name"=>$req["name"], "type"=>$req["type"], "link"=>$req["link"] ], ['validate'=>'addSlider']);

            dd($req);
            
            $oldImg = $slider["photo"] ; 
            //upload file
            !$slider->getErrors()  ? $uploadFile = UploadFile::uploadSinglePhoto(["photoName"=>"image" , "path"=>"library/sliders" ]) : "";  
            $uploadFile["code"] == 200 ?   $slider->photo = $uploadFile["name"] 
                                        :  $slider->photo = $oldImg ; 

            if ($this->Sliders->save($slider)) {
                $this->Flash->success(__('تم الحفظ بنجاح'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The slider could not be saved. Please, try again.'));
        }
        $this->set(compact('slider'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $slider = $this->Sliders->get($id);
        if ($this->Sliders->delete($slider)) {
            $this->Flash->success(__('The slider has been deleted.'));
        } else {
            $this->Flash->error(__('The slider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
