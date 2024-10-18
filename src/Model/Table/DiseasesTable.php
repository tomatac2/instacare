<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diseases Model
 *
 * @method \App\Model\Entity\Disease newEmptyEntity()
 * @method \App\Model\Entity\Disease newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Disease> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Disease get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Disease findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Disease patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Disease> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Disease|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Disease saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Disease>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Disease>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Disease>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Disease> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Disease>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Disease>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Disease>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Disease> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DiseasesTable extends Table
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

        $this->setTable('diseases');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['name']), ['errorField' => 'name']);

        return $rules;
    }
}
