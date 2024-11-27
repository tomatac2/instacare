<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
/**
 * Gifts Controller
 *
 * @property \App\Model\Table\GiftsTable $Gifts
 */
class GiftsController extends AppController
{

    
    public function addToGift()
    {
        $this->viewBuilder()->disableAutoLayout(false);
        $productId = $_GET["proID"];

        $session = $this->request->getSession();
        //$session->clear();exit;
        // Fetch existing cart data from the session
        $gift = $session->read('Gift') ?? [];

        $totalPoints = $session->read('totalPoints') ?? -1;

        // Find product (this assumes you have a Products model)
        $giftProduct = $this->Gifts->Products->find()
        ->where(["Products.id"=>$productId])
        ->matching('Gifts')
        ->first();
      //  echo json_encode($giftProduct["_matchingData"]["Gifts"]["points"]);
        // Update gift
        if($giftProduct && $totalPoints >= $giftProduct["_matchingData"]["Gifts"]["points"] && !isset($gift[$productId]) ){
         
            $gift[$productId] = [
                'product_id' => $productId,
                'name' => $giftProduct->name_ar,
                'photo' => $giftProduct->photo,
                'price' => 0,
                'quantity' => 1,
                'points'=>$giftProduct["_matchingData"]["Gifts"]["points"]
            ];
            $session->write('Gift', $gift);
           
            $totalPoints = $totalPoints - $giftProduct["_matchingData"]["Gifts"]["points"] ; 
            $session->write('totalPoints', $totalPoints);
          
            $res = ["success"=>true , "msg"=> "تم اضافة المنتج الى السلة","remaining_points"=> $totalPoints ] ;
        }else{
            $res = ["success"=>false , "msg"=> "لا يوجد رصيد نقاط كافي", "remaining_points"=> $totalPoints ] ;
        }
       
        $this->set(compact('res'));

   
    }
//get-gifts
    function getGifts(){
        $this->viewBuilder()->disableAutoLayout(false);

        
        
        $session = $this->request->getSession();
        //$session->clear();
        // Fetch existing cart data from the session
        $gift = $session->read('Gift') ?? [];

        //fetch points from the session
        $totalPoints = $session->read('totalPoints') ?? -1;
       

        $userID = $this->Authentication->getIdentity()->id ;

        if($userID){
            $getPoints = TableRegistry::getTableLocator()->get('Wallet')->getPoint($userID);
            $totalPoints == -1 ? $totalPoints = $getPoints : "";

            $totalPoints = $session->write('totalPoints',$totalPoints);

            $q = $this->Gifts->find()->orderBy(['Gifts.id'=>'DESC'])->toArray();   
            $q ? $gifts = ["success"=>true  ,"auth"=>true , "msg"=>"قائمة الهدايا" , "data"=>$q , "myPoints"=>$getPoints] 
               : $gifts = ["success"=>false ,"auth"=>true , "msg"=>"لا يوجد هدايا" , "data"=>[]]  ;
        }else{
            $gifts = ["success"=>false , "auth"=>false , "msg"=>"يرجي تسجيل الدخول أولاً" , "data"=>[]]  ;
        }

    
        $this->set(compact('gifts'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('dashboard');

        $query = $this->Gifts->find()
            ->contain(['Products']);
        $gifts = $this->paginate($query);

        $this->set(compact('gifts'));
    }

    /**
     * View method
     *
     * @param string|null $id Gift id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gift = $this->Gifts->get($id, contain: ['Products']);
        $this->set(compact('gift'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('dashboard');

        $gift = $this->Gifts->newEmptyEntity();
        if ($this->request->is('post')) {
            $gift = $this->Gifts->patchEntity($gift, $this->request->getData());
            if ($this->Gifts->save($gift)) {
                $this->Flash->success(__('تم الإضافة بنجاح'));

                return $this->redirect(['action' => 'index']);
            }
            dd($gift->getErrors());
        }
        $products = $this->Gifts->Products->find('list', limit: 200)
            ->notMatching('Gifts')
            ->all();
        $this->set(compact('gift', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gift id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('dashboard');

        $gift = $this->Gifts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gift = $this->Gifts->patchEntity($gift, $this->request->getData());
            if ($this->Gifts->save($gift)) {
                $this->Flash->success(__('تم التحديث بنجاح'));

                return $this->redirect(['action' => 'index']);
            }
        }
        $products = $this->Gifts->Products->find('list', limit: 200)->all();
        $this->set(compact('gift', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gift id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gift = $this->Gifts->get($id);
        if ($this->Gifts->delete($gift)) {
            $this->Flash->success(__('The gift has been deleted.'));
        } else {
            $this->Flash->error(__('The gift could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
