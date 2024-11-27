<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController
{

    //ajax
    function liveOrders(){
        $this->viewBuilder()->disableAutoLayout(false);
          
        $ids = $this->request->getData('ids') ;
        $ids ? $ids = explode(',',$ids) : $ids = [0];
     
       
        $query = $this->Orders->find()
            ->where(['Orders.status'=>"pending" , "Orders.id not IN"=> $ids])
            ->orderBy(['Orders.id'=>'ASC'])
            ->contain(['Cart'=>['Products'], 'Users', 'Addresses'])
            ->limit(50);
        $orders = $this->paginate($query);


    
     //   $lastOrderID == $currentLastID || $lastOrderID > $currentLastID ? $orders = [] :"";  

        // echo $lastOrderID;
        // echo $currentLastID;
        $this->set(compact('orders'));
    }

    ///////////

    function changeOrderStatus(){
        $this->viewBuilder()->disableAutoLayout(false);
        $orderID = $_GET["orderID"];
        $status = $_GET["status"];
        $reject_reason = $_GET["reject_reason"];
        $changeStatus = $this->Orders->changeStatus(["orderID"=>$orderID , "status"=>$status ,"reject_reason"=>$reject_reason]);
        $this->set(compact('changeStatus'));

    }


    function currentOrders(){
        $this->viewBuilder()->setLayout("dashboard");

        $query = $this->Orders->find()
            ->where(['status'=>"pending"])
            ->orderBy(['Orders.id'=>'ASC'])
            ->contain(['Cart'=>['Products'], 'Users', 'Addresses'])
            ->limit(50);

          
        $orders = $this->paginate($query);
       // dd($query->toArray());
        $this->set(compact('orders'));
    }
 
    function prescription(){
     
        $this->viewBuilder()->setLayout("website");

        $userID = $this->Authentication->getIdentity()->id ;
        
        $userID ?  $addresses = TableRegistry::getTableLocator()->get('Addresses')->getMyAddresses($userID)["data"] :"";

        if($this->request->is("post")){
            
           // dd($this->request->getData());
        $req = $this->request->getData();
        $fields = [
            "user_id"=>$userID,
            "address_id"=>$req["address_id"],
            "full_address"=>$req["full_address"],
            "order_type"=> "prescription",
            "notes"=> $req["notes"],
            "prescription_file2"=>  $req["prescription_file2"],
            "promo"=>  $req["promo"],
        ];
       
        if(!$userID) return $this->redirect(URL.'users/login?prescription=1'); 

        //create new address
        $fields["full_address"] && !$fields["address_id"]? $fields["address_id"] = TableRegistry::getTableLocator()->get('Addresses')->newAddress(["full_address"=>$fields["full_address"] , "user_id"=>$fields["user_id"] ]) : ""; 
       
    
        //create new order 
        $prescription = TableRegistry::getTableLocator()->get('Orders')->newPrescriptionOrder(["fields"=>$fields]);
       // dd($this->request->getData());
        $err = $prescription["data"]->getErrors() ; 
       
        if($err){
            foreach($err as $errs){
            foreach($errs as $msg){
                $this->Flash->error(__($msg));
            }
            }
           //return $this->redirect(['controller' => 'Orders', 'action' => 'prescription']); //exit();
        }else{
            $this->Flash->success(__('تم اضافة طلبك بنجاح سيتم مراجعة طلبك وتأكيده'));
            return $this->redirect(URL); //exit();
        }

    }

        $this->set(compact('addresses','prescription'));

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout("dashboard");

        $query = $this->Orders->find()
            ->where(['status !='=>"pending"])
            ->orderBy(['Orders.id'=>'DESC'])
            ->contain(['Cart', 'Users', 'Addresses']);
        $orders = $this->paginate($query);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, contain: ['Cart', 'Users', 'Addresses']);
        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $cart = $this->Orders->Cart->find('list', limit: 200)->all();
        $users = $this->Orders->Users->find('list', limit: 200)->all();
        $addresses = $this->Orders->Addresses->find('list', limit: 200)->all();
        $this->set(compact('order', 'cart', 'users', 'addresses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $cart = $this->Orders->Cart->find('list', limit: 200)->all();
        $users = $this->Orders->Users->find('list', limit: 200)->all();
        $addresses = $this->Orders->Addresses->find('list', limit: 200)->all();
        $this->set(compact('order', 'cart', 'users', 'addresses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
