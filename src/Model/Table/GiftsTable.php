<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gifts Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\Gift newEmptyEntity()
 * @method \App\Model\Entity\Gift newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Gift> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gift get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Gift findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Gift patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Gift> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gift|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Gift saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Gift>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Gift>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Gift>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Gift> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Gift>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Gift>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Gift>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Gift> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GiftsTable extends Table
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

        $this->setTable('gifts');
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
            ->notEmptyString('product_id','ادخل اسم المنتج');

        $validator
            ->integer('points')
            ->notEmptyString('points','ادخل نقاط المنتج');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->notEmptyString('description','ادخل الوصف');

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
        $rules->add($rules->isUnique(['product_id'], 'المنتج مسجل من قبل'), ['errorField' => 'product_id']);

        return $rules;
    }
}
