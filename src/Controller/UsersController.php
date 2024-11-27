<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Mailer\Mailer;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{


    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['login','register','recovery','changePassword']);
}


    function getFlashMsg($res){
        if($res["success"] == true){
            $this->Flash->success(__($res["msg"]));
        }else{
            $err = $res["data"]->getErrors() ; 
            if($err){
                foreach($err as $errs){
                    foreach($errs as $msg){
                        $this->Flash->error(__($msg));
                    }
                }

            }
    }
    }
    function profile(){
        $this->viewBuilder()->setLayout("website");
        $userID = $this->Authentication->getIdentity()->id ;
     
        if($this->request->is("post")){
            $fromType = $this->request->getData("formType");
            //$fromType = $this->request->getData();
            $req = $this->request->getData(); 
            if($req["password"]  || $req["cpassword"]  ){
              
                $fields = [
                    "password"=> $req["password"] , 
                    "cpassword"=> $req["cpassword"] 
                ] ;
                $changePass = $this->Users->changePasswordLogin(["fields"=>$fields , "user_id"=> $userID ]);
                $returnFlash = $this->getFlashMsg($changePass) ;
            } 
            else if($fromType =="updateProfile"){
                $fields = [
                    "name"=> $req["name"] , 
                    "email"=> $req["email"] , 
                    "mobile"=> $req["mobile"] , 
                    "gender"=> $req["gender"] , 
                ] ;
                $updateProfile = $this->Users->updateUser(["fields"=>$fields , "user_id"=> $userID ]);
                $returnFlash = $this->getFlashMsg($updateProfile) ;
            } 
          
        }
        
        $bouns = $this->Users->Wallet->find()->where(['user_id'=>$userID])->first();
        $getProfile = $this->Users->getUser($userID);
        $my_orders = $this->Users->Orders->getMyOrders($userID);
        $my_addressess = $this->Users->Addresses->getMyAddresses($userID);
       // dd($my_orders);

 
        $this->set(compact('bouns','getProfile','my_orders','my_addressess'));
    }

function changePassword(){
    $this->viewBuilder()->setLayout("website");

    $newPass = $this->request->getData("password");
    $token = $_GET["token"];
    
    if ($this->request->is('post')) {
        //chk mail 
        $chkEmailExist = $this->Users->find()->where(['recovery_hash_code'=>$token])->first();  //view
     
        if ( $chkEmailExist ) {
           //change password 
           $chkEmailExist->password = $newPass;
           $updateCode = $this->Users->save($chkEmailExist);
           $this->Flash->success(__('تم تغيير كلمة المرور بنجاح'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']); exit();
        }else{
            $this->Flash->error(__('الرابط غير صحيح'));
        }
    }
 
    $this->set(compact('user'));

}

function recovery(){
    $this->viewBuilder()->setLayout("website");

    $email = $this->request->getData("email");
    
    if ($this->request->is('post')) {
        //chk mail 
        $chkEmailExist = $this->Users->find()->where(['email'=>$email])->first();  //view
     
        if ( $chkEmailExist ) {
           //code update
           $token =  md5($email).time();
           $chkEmailExist->recovery_hash_code = $token;
           $updateCode = $this->Users->save($chkEmailExist);
           //send mail 
           $url = '<a href="'.URL.'change-password?token='.$token.'">لاستعادة كلمة المرور اضغط على الرابط</a>';
           $mailer = new Mailer('default');
           $mailer->setTo('hatem.algawady@gmail.com')
               ->setSubject('استعادة كلمة المرور فى انستاكير')
               ->setEmailFormat('html')
               ->deliver($url);
        $this->Flash->success(__('لاستعادة كلمة المرور افحص بريدك الالكتروني'));
        return $this->redirect(['controller' => 'Users', 'action' => 'login']); exit();

        }else{
            $this->Flash->error(__('البريد الإلكتروني غير صحيح'));
        }
    }
 
    $this->set(compact('user'));

}

 


function register(){
    $this->viewBuilder()->setLayout("website");
    
    $user = $this->Users->newEmptyEntity();
    if ($this->request->is('post')) {
        $user = $this->Users->patchEntity($user, $this->request->getData(),['validate'=>'addUser']);
     
        
        // !$this->request->getData('gender') ? $user->gender = "ذكر" : "" ;
     //   dd($user);
        if ($this->Users->save($user)) {
            $this->Flash->success(__('تم تسجيل العضوية بنجاح'));

            return $this->redirect(['action' => 'login']);
        }
    }
 
    $this->set(compact('user'));

}

// in src/Controller/UsersController.php
public function logout()
{
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result && $result->isValid()) {
        $this->Authentication->logout();

        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}

public function login()
{
    $this->viewBuilder()->setLayout("website");
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result && $result->isValid()) {
        // redirect to /articles after login success
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Products',
            'action' => 'home',
        ]);

        $_GET["cart"]==1 ? $redirect = URL.'السلة' : "";

        $_GET["prescription"]==1 ? $redirect = URL.'إرسال-روشتة' : "";

        $_GET["profile"] ? $redirect = URL.'products/details/'.$_GET["profile"] : "";
        
        return $this->redirect($redirect);
    }
    // display error if user submitted and authentication failed
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('بيانات الدخول غير صحيحة'));
    }
    $this->set(compact('result'));
}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find()
            ->contain(['Roles']);
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: ['Roles', 'Addresses', 'Cart', 'Favorites', 'HealthFile', 'Orders', 'PrescriptionOrders', 'Wallet']);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', limit: 200)->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', limit: 200)->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
