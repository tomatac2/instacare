<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PrescriptionOrders Model
 *
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\PrescriptionOrder newEmptyEntity()
 * @method \App\Model\Entity\PrescriptionOrder newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\PrescriptionOrder> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PrescriptionOrder get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\PrescriptionOrder findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\PrescriptionOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\PrescriptionOrder> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PrescriptionOrder|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\PrescriptionOrder saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\PrescriptionOrder>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PrescriptionOrder>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PrescriptionOrder>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PrescriptionOrder> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PrescriptionOrder>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PrescriptionOrder>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PrescriptionOrder>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PrescriptionOrder> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrescriptionOrdersTable extends Table
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

        $this->setTable('prescription_orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id',
        ]);
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
            ->scalar('prescription')
            ->maxLength('prescription', 255)
            ->allowEmptyString('prescription');

        $validator
            ->integer('address_id')
            ->allowEmptyString('address_id');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

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
        $rules->add($rules->existsIn(['address_id'], 'Addresses'), ['errorField' => 'address_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
