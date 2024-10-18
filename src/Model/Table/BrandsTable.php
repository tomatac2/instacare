<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Brands Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\Brand newEmptyEntity()
 * @method \App\Model\Entity\Brand newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Brand> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Brand get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Brand findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Brand patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Brand> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Brand|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Brand saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Brand>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Brand>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Brand>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Brand> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Brand>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Brand>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Brand>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Brand> deleteManyOrFail(iterable $entities, array $options = [])
 */
class BrandsTable extends Table
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

        $this->setTable('brands');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Products', [
            'foreignKey' => 'brand_id',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('photo')
            ->maxLength('photo', 255)
            ->allowEmptyString('photo');

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
