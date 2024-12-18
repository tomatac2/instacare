<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Store Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\Store newEmptyEntity()
 * @method \App\Model\Entity\Store newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Store> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Store get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Store findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Store patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Store> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Store|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Store saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Store>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Store>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Store>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Store> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Store>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Store>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Store>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Store> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StoreTable extends Table
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

        $this->setTable('store');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('product_id')
            ->notEmptyString('product_id','اختر المنتج');

        $validator
            ->integer('quantity')
            ->notEmptyString('quantity',"ادخل الكمية");

        $validator
            ->date('purchase_date')
            ->notEmptyString('purchase_date',"ادخل تاريخ الشراء");

        $validator
            ->scalar('notes')
            ->maxLength('notes', 255)
            ->allowEmptyString('notes');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'), ['errorField' => 'product_id']);

        return $rules;
    }

    //////////

    function addToStore($fields){  //["product_id"=>$product->id , "quantity"=>$req["quantity"] , "purchase_date"=> date("Y-m-d")]
        $add = $this->newEmptyEntity();
        $add = $this->patchEntity($add , $fields ) ; 
        $this->save($add) ? $res = ["success"=>true , "msg"=>"تم إضافة الكمية بنجاح" , "data"=>$add] 
                          : $res = ["success"=>false , "msg"=>"لم يتم الاضافة " , "data"=>$add]  ; 

        return $res ; 
    }
    ////  
    function updateQuantityProduct($q){  //["product_id"=>$product->id , "quantity", "type"]  
       // dd($q);
        $chk = $this->find()
                    ->where(['product_id'=>$q["product_id"],'type'=>"product"])
                    ->first()  ;
        if($chk):
            $update = $this->patchEntity($chk , ["quantity"=>$q["quantity"]]) ;
            $this->save($update) ? $res = ["success"=>true , "msg"=>"تم تحديث الكمية بنجاح" , "data"=>$update] 
                                 : $res = ["success"=>false , "msg"=>"لم يتم التحديث " , "data"=>$update]  ; 

        else  : $res = ["success"=>false , "msg"=>"لم يتم التحديث " , "data"=>$q]  ; 
        endif;

        return $res ; 
    }  
    ///////
}
