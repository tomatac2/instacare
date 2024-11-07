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

        $this->belongsTo('Cart', [
            'foreignKey' => 'cart_id',
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
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('cart_id')
            ->allowEmptyString('cart_id');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('address_id')
            ->allowEmptyString('address_id');

        $validator
            ->integer('amount')
            ->allowEmptyString('amount');

        $validator
            ->integer('delivery_cost')
            ->allowEmptyString('delivery_cost');

        $validator
            ->integer('delivery_duration')
            ->allowEmptyString('delivery_duration');

        $validator
            ->integer('total_amount')
            ->allowEmptyString('total_amount');

        $validator
            ->scalar('status')
            ->allowEmptyString('status');

        $validator
            ->scalar('reject_reason')
            ->maxLength('reject_reason', 255)
            ->allowEmptyString('reject_reason');

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
        $rules->add($rules->existsIn(['cart_id'], 'Cart'), ['errorField' => 'cart_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['address_id'], 'Addresses'), ['errorField' => 'address_id']);

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
            "user_id"=>$obj["userID"],
        ] ; 

        $fields["address_id"] ? $obj["session"]->write("extraCart.address_id",$fields["address_id"]): "";
        $fields["full_address"] ? $obj["session"]->write("extraCart.full_address",$fields["full_address"]): "";
        $fields["notes"] ? $obj["session"]->write("extraCart.notes",$fields["notes"]): "";
        $fields["promo"] ? $obj["session"]->write("extraCart.promo",$fields["promo"]): "";

        return $fields ; 
    }
}
