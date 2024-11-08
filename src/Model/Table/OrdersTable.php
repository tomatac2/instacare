<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

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
     
        if($this->save($new)){
            //save items 
            foreach($obj["fields"]["items"] as $k=>$v){
                $items = $this->Cart->newEmptyEntity();
                $items->user_id = $obj["fields"]["user_id"];
                $items->product_id = $v["product_id"];
                $items->quantity = $v["quantity"];
                $items->order_id = $new->id ; 
                $this->Cart->save($items);
            }
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
}
