<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sliders Model
 *
 * @method \App\Model\Entity\Slider newEmptyEntity()
 * @method \App\Model\Entity\Slider newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Slider> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Slider get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Slider findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Slider patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Slider> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Slider|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Slider saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Slider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Slider>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Slider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Slider> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Slider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Slider>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Slider>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Slider> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SlidersTable extends Table
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

        $this->setTable('sliders');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        // $this->hasMany('Main', [
        //     'foreignKey' => 'type',
        //     'className'=> 'Sliders',
        //     'conditions' => ['Main.type' => 'رئيسي'], // Custom conditions
        //     'orderBy' => ['Main.id' => 'DESC'], // Optional sorting
        //     'limit' => 2, // Limit to 5 associated records

        // ]);
        // $this->hasMany('Sub', [
        //     'foreignKey' => 'type',
        //     'className'=> 'Sliders',
        //     'conditions' => ['Sub.type' => 'فرعي'], // Custom conditions
        //     'orderBy' => ['Sub.id' => 'DESC'], // Optional sorting
        //     'limit' => 2, // Limit to 5 associated records

        // ]);
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
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 255)
            ->allowEmptyString('photo');

        $validator
            ->scalar('link')
            ->maxLength('link', 255)
            ->allowEmptyString('link');

        return $validator;
    }


    public function validationAddSlider(Validator $validator): Validator
    {
        $validator ->notEmptyString('name', 'ادخل اسم السيلدير')
                   ->notEmptyString('photo', 'ادخل اسم الصورة') 
                   ->notEmptyString('link', 'ادخل الرابط') 
                   ->notEmptyString('type', 'ادخل نوع السيلدير') 
                   ->add('image', [
                    'mimeType' => [
                        'rule' => ['mimeType', ['image/jpeg', 'image/png', 'image/gif']],
                        'message' => __('الملف المرفوع يجب ان يكون صورة من نوع jpg , jpeg , png ')
                    ],
                       'fileSize' => [
                           'rule' => ['fileSize', '<=', '1MB'],  // Max size 2MB
                           'message' => 'حجم الملف اكبر من 1ميجا',
                       ]
                   ]);
     

        return $validator;
    }

    //////////////

    function get5Main2Sub(){
        $main5sliders = $this->find()
            ->where(['type'=>"رئيسي"])               
            ->orderBy(['id'=>'DESC'])    
            ->limit(5)           
            ->toArray();


        $sub2sliders = $this->find()
            ->where(['type'=>"فرعي"])               
            ->orderBy(['id'=>'DESC'])    
            ->limit(2)           
            ->toArray();

        return ["main"=>$main5sliders , "sub"=>$sub2sliders];
    }
}
