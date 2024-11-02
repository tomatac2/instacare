<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Psr\Http\Message\UploadedFileInterface;
/**
 * Categories Model
 *
 * @property \App\Model\Table\InnerCategoriesTable&\Cake\ORM\Association\HasMany $InnerCategories
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\Category newEmptyEntity()
 * @method \App\Model\Entity\Category newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Category> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Category get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Category findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Category> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Category|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Category saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Category>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Category>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Category>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Category> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Category>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Category>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Category>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Category> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CategoriesTable extends Table
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

        $this->setTable('categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('InnerCategories', [
            'foreignKey' => 'category_id',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'category_id',
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
            ->scalar('photo')
            ->maxLength('photo', 255)
            ->allowEmptyString('photo');

        return $validator;
    }


    public function validationAddCat(Validator $validator): Validator
    {
        $validator ->notEmptyString('name', 'ادخل اسم التصنيف')
                   ->notEmptyString('photo', 'ادخل اسم الصورة') 
                   ->add('image', [
                    'mimeType' => [
                        'rule' => ['mimeType', ['image/jpeg', 'image/png', 'image/gif']],
                        'message' => __('الملف المرفوع يجب ان يكون صورة من نوع jpg , jpeg , png ')
                    ],
                       'fileSize' => [
                           'rule' => ['fileSize', '<=', '5MB'],  // Max size 2MB
                           'message' => 'حجم الملف اكبر من 5ميجا',
                       ]
                   ]);
     

        return $validator;
    }
    public function validationUpdateCat(Validator $validator): Validator
    {
        $validator ->notEmptyString('name', 'ادخل اسم التصنيف')
                   ->notEmptyString('photo', 'ادخل اسم الصورة')     ;
     

        return $validator;
    }



    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['name'],"التصنيف مسجل من قبل"), ['errorField' => 'name']);
        return $rules;
    }

    ////

    function getCatsAndSubCats4Header(){
        $q = $this->find()
                ->limit(10)
                ->contain(['InnerCategories'])
                ->distinct(['Categories.id'])
                ->matching('InnerCategories')
                ->toArray();


        return $q ; 
    }
}
