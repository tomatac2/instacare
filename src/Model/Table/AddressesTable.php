<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addresses Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\PrescriptionOrdersTable&\Cake\ORM\Association\HasMany $PrescriptionOrders
 *
 * @method \App\Model\Entity\Address newEmptyEntity()
 * @method \App\Model\Entity\Address newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Address> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Address get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Address findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Address patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Address> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Address|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Address saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Address>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Address>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Address>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Address> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Address>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Address>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Address>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Address> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AddressesTable extends Table
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

        $this->setTable('addresses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'address_id',
        ]);
        $this->hasMany('PrescriptionOrders', [
            'foreignKey' => 'address_id',
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
            ->scalar('is_primary')
            ->allowEmptyString('is_primary');

        $validator
            ->numeric('address_lat')
            ->allowEmptyString('address_lat');

        $validator
            ->numeric('address_long')
            ->allowEmptyString('address_long');

        $validator
            ->scalar('address_type')
            ->maxLength('address_type', 55)
            ->allowEmptyString('address_type');

        $validator
            ->scalar('street_name')
            ->maxLength('street_name', 255)
            ->allowEmptyString('street_name');

        $validator
            ->scalar('building_number')
            ->maxLength('building_number', 100)
            ->allowEmptyString('building_number');

        $validator
            ->scalar('floor_number')
            ->maxLength('floor_number', 100)
            ->allowEmptyString('floor_number');

        $validator
            ->scalar('apartment_number')
            ->maxLength('apartment_number', 100)
            ->allowEmptyString('apartment_number');

        $validator
            ->scalar('unique_mark')
            ->maxLength('unique_mark', 100)
            ->allowEmptyString('unique_mark');

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

    ////
    function newAddress($fields){
       
        //chk old address by full_address 
        $chkOldAdd = $this->find()->where(['user_id'=>$fields["user_id"],"full_address"=>$fields["full_address"]])->first();
       
        if(!$chkOldAdd):
            $new = $this->newEmptyEntity();
            $new = $this->patchEntity($new , $fields );
            $this->save($new);
            $address_id = $new->id ; 

            else :  $address_id = $chkOldAdd->id ; 
        endif; 
        return $address_id ; 
    }
    
}
