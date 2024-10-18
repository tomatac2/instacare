<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HealthFile Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\HealthFile newEmptyEntity()
 * @method \App\Model\Entity\HealthFile newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\HealthFile> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HealthFile get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\HealthFile findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\HealthFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\HealthFile> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\HealthFile|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\HealthFile saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\HealthFile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\HealthFile>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\HealthFile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\HealthFile> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\HealthFile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\HealthFile>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\HealthFile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\HealthFile> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HealthFileTable extends Table
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

        $this->setTable('health_file');
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
            ->integer('weight')
            ->allowEmptyString('weight');

        $validator
            ->integer('tall')
            ->allowEmptyString('tall');

        $validator
            ->scalar('blood_type')
            ->allowEmptyString('blood_type');

        $validator
            ->scalar('diseases_array')
            ->maxLength('diseases_array', 255)
            ->allowEmptyString('diseases_array');

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
}
