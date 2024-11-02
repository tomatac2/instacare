<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JoinUs Model
 *
 * @method \App\Model\Entity\JoinU newEmptyEntity()
 * @method \App\Model\Entity\JoinU newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\JoinU> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JoinU get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\JoinU findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\JoinU patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\JoinU> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\JoinU|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\JoinU saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\JoinU>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JoinU>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JoinU>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JoinU> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JoinU>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JoinU>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JoinU>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JoinU> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JoinUsTable extends Table
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

        $this->setTable('join_us');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('pharmacy_name')
            ->maxLength('pharmacy_name', 255)
            ->allowEmptyString('pharmacy_name');

        $validator
            ->scalar('pharmacy_phone')
            ->maxLength('pharmacy_phone', 20)
            ->allowEmptyString('pharmacy_phone');

        $validator
            ->scalar('pharmacy_times')
            ->maxLength('pharmacy_times', 255)
            ->allowEmptyString('pharmacy_times');

        $validator
            ->scalar('area')
            ->maxLength('area', 55)
            ->allowEmptyString('area');

        $validator
            ->scalar('manger_phone')
            ->maxLength('manger_phone', 25)
            ->allowEmptyString('manger_phone');

        $validator
            ->scalar('manger_name')
            ->maxLength('manger_name', 100)
            ->allowEmptyString('manger_name');

        $validator
            ->scalar('register_document')
            ->maxLength('register_document', 255)
            ->allowEmptyString('register_document');

        $validator
            ->scalar('tax_document')
            ->maxLength('tax_document', 255)
            ->allowEmptyString('tax_document');

        $validator
            ->scalar('license_document')
            ->maxLength('license_document', 255)
            ->allowEmptyString('license_document');

        return $validator;
    }



    
    public function validationJoin(Validator $validator): Validator
            {
                $validator 
                ->notEmptyString('pharmacy_name', 'ادخل اسم الصيدلية')
                ->notEmptyString('pharmacy_phone', 'ادخل تليفون الصيدلية')
                ->notEmptyString('pharmacy_times', 'ادخل مواعيد الصيدلية')
                ->notEmptyString('area', 'ادخل منطقة التوصيل')
                ->notEmptyString('manger_phone', 'ادخل تليفون مدير الصيدلية')
                ->notEmptyString('manger_name', 'ادخل اسم مدير الصيدلية') 
                ->add('register_document2', [
                'mimeType' => [
                    'rule' => ['mimeType', ['image/jpeg', 'image/png', 'image/gif']],
                    'message' => __('الملف المرفوع يجب ان يكون صورة من نوع jpg , jpeg , png ')
                ],
                    'fileSize' => [
                        'rule' => ['fileSize', '<=', '2MB'],  // Max size 2MB
                        'message' => 'حجم الملف اكبر من 5ميجا',
                    ]
                ])
                ->add('tax_document2', [
                'mimeType' => [
                    'rule' => ['mimeType', ['image/jpeg', 'image/png', 'image/gif']],
                    'message' => __('الملف المرفوع يجب ان يكون صورة من نوع jpg , jpeg , png ')
                ],
                    'fileSize' => [
                        'rule' => ['fileSize', '<=', '2MB'],  // Max size 2MB
                        'message' => 'حجم الملف اكبر من 5ميجا',
                    ]
                ])
                ->add('license_document2', [
                'mimeType' => [
                    'rule' => ['mimeType', ['image/jpeg', 'image/png', 'image/gif']],
                    'message' => __('الملف المرفوع يجب ان يكون صورة من نوع jpg , jpeg , png ')
                ],
                    'fileSize' => [
                        'rule' => ['fileSize', '<=', '2MB'],  // Max size 2MB
                        'message' => 'حجم الملف اكبر من 5ميجا',
                    ]
                ])
                ;

                return $validator ; 
            }
}
