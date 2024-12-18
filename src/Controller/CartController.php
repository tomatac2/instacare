<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

/**
 * Cart Controller
 *
 * @property \App\Model\Table\CartTable $Cart
 */
class CartController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->addUnauthenticatedActions(['cart','addToCart','removeFromCart','plusMiuns','removeCart']);
    }

    function removeCart(){
        $this->viewBuilder()->disableAutoLayout(false);
        //delete cart session 
        $session = $this->request->getSession();
        $session->delete("Cart");  
        $session->delete("extraCart");  
        $session->delete("Gift");  
        $session->delete("totalPoints");  
        $this->set(compact('session'));
    }

    function plusMiuns(){
        $this->viewBuilder()->disableAutoLayout(false);

        $proID = $_GET["proID"];
        $qun = $_GET["qun"];
        //delete cart session 
        $session = $this->request->getSession();
        $session->write("Cart.$proID.quantity",$qun);  #custom product
        

      
        $this->set(compact('session'));
    }

    function removeFromCart(){
        $this->viewBuilder()->disableAutoLayout(false);
      

        $proID = $_GET["proID"];
        $type = $_GET["type"];
        //delete cart session 
        $session = $this->request->getSession();
        $session->delete("Cart.$proID");  #custom product
      
        if($type == "gift"):
            $gift = $session->read("Gift");

            //points
            $totalPoints = $session->read("totalPoints");
            $proPoints = $gift[$proID]["points"] ;
            $totalPointsAfterDelSession = $totalPoints + $proPoints ; 

            $session->delete("Gift.$proID");  #custom product

            $session->write("totalPoints" , $totalPointsAfterDelSession);
        endif;

        $this->set(compact('session'));
    }

    public function addToCart()
    {
        $this->viewBuilder()->disableAutoLayout(false);
        $productId = $_GET["proID"];
        $qun = $_GET["qun"];

        $session = $this->request->getSession();

        // Fetch existing cart data from the session
        $cart = $session->read('Cart') ?? [];

        // Find product (this assumes you have a Products model)
        $product = $this->Cart->Products->get($productId);

        // Update cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $qun ? $qun : 1;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'name' => $product->name_ar,
                'photo' => $product->photo,
                'price' => $product->price,
                'quantity' => $qun ? $qun : 1
            ];

        }

        // Save updated cart to session
        $session->write('Cart', $cart);
        

        $this->set(compact('cart'));
   
    }


    function cart(){
        $this->viewBuilder()->setLayout('website');
        //view cart session 
       
        $session = $this->request->getSession();

        $cart = $session->read('Cart');
        $gift = $session->read('Gift');

        // $session->clear();
        // exit ; 
        $extraCart = $session->read('extraCart');

   
        $userID = $this->Authentication->getIdentity()->id ;
        
        $userID ?  $addresses = TableRegistry::getTableLocator()->get('Addresses')->getMyAddresses($userID)["data"] :"";
       
        if($this->request->is("post")){
            $req = $this->request->getData();
            $fields = $this->Cart->Orders->orderFields(["req"=>$req , "items"=>$cart , "user_id"=>$userID , "session"=>$session]);
           
            if(!$userID) return $this->redirect(URL.'users/login?cart=1');  

            //create new address
            $fields["full_address"] && !$fields["address_id"]? $fields["address_id"] = $this->Cart->Orders->Addresses->newAddress(["full_address"=>$fields["full_address"] , "user_id"=>$fields["user_id"] ]) : ""; 
          
            //create new order 
            $newOrder = $this->Cart->Orders->newOrder(["fields"=>$fields , "session"=>$session]);
            $err = $newOrder["data"]->getErrors() ; 
            if($err){
                foreach($err as $errs){
                foreach($errs as $msg){
                    $this->Flash->error(__($msg));
                }
                }
                return $this->redirect(['controller' => 'Cart', 'action' => 'cart']); exit();
            }
        }
        $this->set(compact('cart','extraCart','addresses','newOrder','gift'));
    }


 
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Cart->find()
            ->contain(['Users', 'Products']);
        $cart = $this->paginate($query);

        $this->set(compact('cart'));
    }

    /**
     * View method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cart = $this->Cart->get($id, contain: ['Users', 'Products', 'Orders']);
        $this->set(compact('cart'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cart = $this->Cart->newEmptyEntity();
        if ($this->request->is('post')) {
            $cart = $this->Cart->patchEntity($cart, $this->request->getData());
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $users = $this->Cart->Users->find('list', limit: 200)->all();
        $products = $this->Cart->Products->find('list', limit: 200)->all();
        $this->set(compact('cart', 'users', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cart = $this->Cart->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cart = $this->Cart->patchEntity($cart, $this->request->getData());
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $users = $this->Cart->Users->find('list', limit: 200)->all();
        $products = $this->Cart->Products->find('list', limit: 200)->all();
        $this->set(compact('cart', 'users', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Cart->get($id);
        if ($this->Cart->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
