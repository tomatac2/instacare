<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wallet Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Wallet newEmptyEntity()
 * @method \App\Model\Entity\Wallet newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Wallet> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Wallet get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Wallet findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Wallet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Wallet> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Wallet|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Wallet saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Wallet>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Wallet>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Wallet>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Wallet> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Wallet>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Wallet>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Wallet>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Wallet> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WalletTable extends Table
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

        $this->setTable('wallet');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('points')
            ->allowEmptyString('points');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
    //////////
 
    function addToWallet($obj){ //["user_id"=> $updateStatus["user_id"] , "points"=> $updateStatus["items_amount"] ]
        $q = $this->find()->where(['user_id'=>$obj["user_id"]])->first();
        
        if($q){
           $q->points = $q["points"] + $obj["points"]; 
        }else{
           $q = $this->newEmptyEntity();
           $q = $this->patchEntity($q , $obj);
        }
        $this->save($q) ? $res = ["success"=>true , 'msg'=>'تم إضافة النقاط بنجاح'] 
                        : $res = ["success"=>false , 'msg'=>'لم يتم إضافة النقاط'] ;

        return $res ; 
    } 


    ///////////////

    function getPoint($userID){
        $q = $this->findByUserId($userID?$userID:0)->first();
        $q ? $points = $q["points"] : $points = 0 ;
        return $points ; 
    }
}
