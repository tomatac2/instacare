<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Hellpers\UploadFile;
use Cake\ORM\TableRegistry;

/**
 * Orders Model
 *
 * @property \App\Model\Table\CartTable&\Cake\ORM\Association\BelongsTo $Cart
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 *
 * @method \App\Model\Entity\Order newEmptyEntity()
 * @method \App\Model\Entity\Order newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Order> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Order findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Order> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Order saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Order>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Order>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Order>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Order> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Order>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Order>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Order>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Order> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrdersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Cart', [
            'foreignKey' => 'order_id',
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationNewOrder(Validator $validator): Validator
    {

        $validator
            ->integer('address_id')
            ->notEmptyString('address_id','العنوان مطلوب تفصيلاً');


            $validator
            ->add('items_amount', 'custom', [
                'rule' => function ($value, $context) { 
                    if($value >= 400){
                        return true ; 
                    }else{
                        return "قيمة الطلب يجب ان تكون اكبر من 400جنيه";
                    }
                },
            ]);

        return $validator;
    }
    public function validationNewPrescription(Validator $validator): Validator
    {

        $validator
            ->integer('address_id')
            ->notEmptyString('address_id','العنوان مطلوب تفصيلاً');


            $validator
            ->add('prescription_file2', 'custom', [
                'rule' => function ($value, $context) { 
                    if($value && $_FILES["prescription_file2"]["name"]){
                     
                        $uploadFile = $this->chkFile(["photoName"=>"prescription_file2" , "path"=>"library/prescriptions" ]) ;
                     
                        if($uploadFile["success"]== false){
                            return $uploadFile["msg"];
                        }else{
                            $context["data"]["prescription_file_entity"]  = $uploadFile["name"];
                           // dd($context);
                        }
                        return true ; 
                    }else{
                       
                        if(!empty($context["data"]["notes"])){
                            return true ;
                        }
                          
                        return "برجاء رفع صورة او كتابة وصف الطلب بالتفصيل";
                    }
                },
            ]);

        return $validator;
    }

    //////////////////

    function chkFile($photoParamD){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES[$photoParamD['photoName']]['name'] != null):
            $fileName    = $_FILES[$photoParamD['photoName']]['name'] ;
            $fileSize    = $_FILES[$photoParamD['photoName']]['size'] ;
            $fileTmpName = $_FILES[$photoParamD['photoName']]['tmp_name'] ;
            $fileType    = $_FILES[$photoParamD['photoName']]['type'] ;
            // Allowed Extention
            $code = 404 ;
            $allowedExtenation = array('jpg','png' ,'PNG','jpeg');
            $imgExtension      = end(explode('.' , $fileName));
            if(in_array($imgExtension , $allowedExtenation)):  //chk extentaion
                if($fileSize < 2000000): //chk size
                    $imgProb   = "تم رفع الصور بنجاح " ;
                    $success   = true ; $code = 200 ;
                else: $imgProb = "مساحة الصورة اكبر من 2ميجابايت";$success = false ;
                endif;
            else: $imgProb = "امتداد الصور المسموح بها jpg - jpeg - png " ;$success = false ;
            endif;
        else: $imgProb = "برجاء ادخال الصور";  $success = false ;
        endif;
    return ["msg"=> $imgProb , "success"=>$success ,'code'=>$code ];
    }
    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('cart_id', 'Cart',"تم حذف منتجات السلة"), ['errorField' => 'cart_id']);
        $rules->add($rules->existsIn('user_id' ,'Users' , "لابد من تسجيل الدخول اولاً"), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('address_id','Addresses',"العنوان غير صحيح"), ['errorField' => 'address_id']);

        return $rules;
    }

    ////////////

    function orderFields($obj){  //["req"=>$req , "items"=>$cart , "user_id"=>$userID , "session"]
        $fields = [
            "promo"=> $obj["req"]["promo"],
            "full_address"=> $obj["req"]["full_address"],
            "address_id"=>$obj["req"]["address_id"],
            "items"=> $obj["items"] , 
            "notes"=>$obj["req"]["notes"],
            "user_id"=>$obj["user_id"],
        ] ; 

        $fields["address_id"] ? $obj["session"]->write("extraCart.address_id",$fields["address_id"]): "";
        $fields["full_address"] ? $obj["session"]->write("extraCart.full_address",$fields["full_address"]): "";
        $fields["notes"] ? $obj["session"]->write("extraCart.notes",$fields["notes"]): "";
        $fields["promo"] ? $obj["session"]->write("extraCart.promo",$fields["promo"]): "";

        return $fields ; 
    }
    //////////
    function extraOrderInfo ($items){
        foreach($items as $k=>$v){
            $amount[] = $v["quantity"] * $v["price"] ;
        }

        $delivery_cost = 15 ;
        $discount = 0 ;
        $amount? $amountItems= array_sum($amount) : $amountItems=0  ;
      
        $totalAmount = $amountItems + $delivery_cost - $discount ; 
        return [
            "items_amount"=> $amountItems, 
            "discount"=> $discount, 
            "delivery_cost"=> $delivery_cost, 
            "total_amount"=> $totalAmount , 
            "delivery_duration"=> "من ساعة الى ساعتين", 
        ] ;
    }
    ///
    function newOrder($obj){  //promo , full_address , address_id , items , notes , user_id
        $new = $this->newEmptyEntity();
        //get extra-orders 
        $getExtraInfo = $this->extraOrderInfo($obj["fields"]["items"]);
        $obj["fields"]["items_amount"]  = $getExtraInfo["items_amount"];
        
        
        $new = $this->patchEntity($new , $obj["fields"] , ['validate'=>'newOrder'] );
     

        $new->discount = $getExtraInfo["discount"];
        $new->delivery_cost = $getExtraInfo["delivery_cost"];
        $new->delivery_duration = $getExtraInfo["delivery_duration"];
        $new->total_amount = $getExtraInfo["total_amount"];
        $new->items_amount >= 400 ? $new->items_amount = $getExtraInfo["items_amount"] : "";
        $new->order_temp_id = substr("".time()."", -7).rand(999,99999) ; 
        if($this->save($new)){
            //save items 
            foreach($obj["fields"]["items"] as $k=>$v){
                $items = $this->Cart->newEmptyEntity();
                $items->user_id = $obj["fields"]["user_id"];
                $items->product_id = $v["product_id"];
                $items->quantity = $v["quantity"];
                $items->order_id = $new->id ; 
                $this->Cart->save($items);

                $proQuns[] = $v["quantity"];
                $proIDS[] = $v["product_id"];
            }

            
            //update qun
            $this->minusQunOnStore(["proIDS"=>$proIDS , "proQuns"=>$proQuns , "type"=>"minus"]) ;
            // //update qun
            // $getProByIds = $this->Cart->Products->find()->where(['Products.id IN'=>$proIDS])->toArray();
            // if($getProByIds):
            //     foreach($getProByIds as $k=>$v){
            //             $this->Cart->Products->updateQuantity(["product_id"=>$v["id"], "newQun"=>$proQuns[$k] , "type"=>"minus"   ]);
            //     }
            // endif;
            
         
            
          
           $res = ["success"=>true ,"data"=>$new,  "msg"=>"تم اضافة الطلب بنجاح"]; 

           //delete session 
            $obj["session"]->delete('Cart');
            $obj["session"]->delete('extraCart');
       
        }else{
            $res = ["success"=>false ,"data"=>$new, "msg"=>"لم يتم اضافة الطلب"]; 
        }

     return $res ; 
    }
    /////////
    function newPrescriptionOrder($obj){  //promo , full_address , address_id , photo , notes , user_id
        $new = $this->newEmptyEntity();
        
        $new = $this->patchEntity($new , $obj["fields"] , ['validate'=>'newPrescription'] );

        $new->discount = 0 ;
        $new->delivery_cost = 15 ;
        $new->delivery_duration =      "من ساعة الى ساعتين" ;
        $new->order_temp_id = substr("".time()."", -7).rand(999,99999) ; 

        // //upload file
        !$new->getErrors() ? $uploadFile = UploadFile::uploadSinglePhoto(["photoName"=>"prescription_file2" , "path"=>"library/prescriptions" ]) : "";  
        $new->prescription_file = $uploadFile["name"]; 
       
       
        if($this->save($new)){
           $res = ["success"=>true ,"data"=>$new,  "msg"=>"تم اضافة الطلب بنجاح"]; 
        }else{
            $res = ["success"=>false ,"data"=>$new, "msg"=>"لم يتم اضافة الطلب"]; 
        }
     
     return $res ; 
    }
    /////////
    function getMyOrders($userID){
        $orders = $this->find()
                ->where(['Orders.user_id'=>$userID])
                ->limit(10)
                ->orderBy(['Orders.id'=>'DESC'])
                ->contain([
                    'Cart'=>['Products'],
                    'Addresses'=>function($q){return $q->where(['soft_delete'=>'no']) ; }
                    ])
              //  ->contain(['Cart'=>['Products'],'Addresses'])
                ->toArray();

           $orders ? $res = ["success"=>true , "data"=>$orders , "msg"=>"طلاباتي"]  
                   : $res = ["success"=>false , "data"=>[] , "msg"=>"لايوجد طلبات"] ;      

        return $res ; 
    }
///////////////////////////////


    function changeStatus($obj){ // "orderID"=>$orderID , "status"=>$status
       
        $updateStatus = $this->find()
                ->where(['id'=>$obj["orderID"]])
                ->orderBy(['id'=>'DESC'])
                ->contain(['Cart'])
                ->first();
          // echo json_encode($updateStatus);exit;
            if($updateStatus){
                $proQuns = array_column($updateStatus["cart"],"quantity") ;
                $proIDS = array_column($updateStatus["cart"],"product_id") ;
            
                $updateStatus->status = $obj["status"];
                $updateStatus->reject_reason = $obj["reject_reason"];
                $obj["status"] == "approved" ? $msg = "تم تأكيد الطلب بنجاح" : $msg ="تم رفض الطلب ";
                //send mail to user
                $this->save($updateStatus) ? $res = ["success"=>true , "data"=>$updateStatus , "msg"=>$msg]  
                        : $res = ["success"=>false , "data"=>$updateStatus , "msg"=>""]  ;
                //
            //update qun
            $res["success"] == true && $obj["status"] == "rejected" ? $this->minusQunOnStore(["proIDS"=>$proIDS , "proQuns"=>$proQuns ,"type"=>"plus"]) : "";

            //add to wallet
            $res["success"] == true && $obj["status"] == "approved" ?   TableRegistry::getTableLocator()->get('Wallet')->addToWallet(["user_id"=> $updateStatus["user_id"] , "points"=> $updateStatus["items_amount"] ]) : ""; 

            }else{
                $res = ["success"=>false , "data"=>[] , "msg"=>"الطلب غير موجود"] ;    
            }

         

        return $res ; 
    }
    /////////
    function minusQunOnStore($obj){  //["proIDS"=>$proIDS , "proQuns"=>$proQuns]
        $getProByIds = $this->Cart->Products->find()->where(['Products.id IN'=>$obj["proIDS"]])->toArray();
        if($getProByIds):
            foreach($getProByIds as $k=>$v){
                    $this->Cart->Products->updateQuantity(["product_id"=>$v["id"], "newQun"=>$obj["proQuns"][$k] , "type"=> $obj["type"]   ]);
            }
        endif;  
    }
    /////////
}
