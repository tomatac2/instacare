<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InnerCategories Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\InnerCategory newEmptyEntity()
 * @method \App\Model\Entity\InnerCategory newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\InnerCategory> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InnerCategory get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\InnerCategory findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\InnerCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\InnerCategory> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InnerCategory|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\InnerCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\InnerCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InnerCategory>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InnerCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InnerCategory> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InnerCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InnerCategory>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\InnerCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\InnerCategory> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InnerCategoriesTable extends Table
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

        $this->setTable('inner_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'inner_category_id',
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
            ->maxLength('name', 55)
            ->allowEmptyString('name');

        $validator
            ->integer('category_id')
            ->allowEmptyString('category_id');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 255)
            ->allowEmptyString('photo');

        return $validator;
    }

    public function validationAddSubCat(Validator $validator): Validator
    {
        $validator
                    ->notEmptyString('category_id', 'اختر التصنيف الرئيسي')
                    ->notEmptyString('name', 'ادخل اسم التصنيف الفرعي');
     

        return $validator;
    }
    public function validationUpdateSubCat(Validator $validator): Validator
    {
        $validator ->notEmptyString('name', 'ادخل اسم التصنيف')   ;
     

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }
}
