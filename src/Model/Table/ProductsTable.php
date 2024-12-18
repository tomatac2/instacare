<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\InnerCategoriesTable&\Cake\ORM\Association\BelongsTo $InnerCategories
 * @property \App\Model\Table\BrandsTable&\Cake\ORM\Association\BelongsTo $Brands
 * @property \App\Model\Table\CartTable&\Cake\ORM\Association\HasMany $Cart
 * @property \App\Model\Table\FavoritesTable&\Cake\ORM\Association\HasMany $Favorites
 * @property \App\Model\Table\ProductImagesTable&\Cake\ORM\Association\HasMany $ProductImages
 * @property \App\Model\Table\StoreTable&\Cake\ORM\Association\HasMany $Store
 *
 * @method \App\Model\Entity\Product newEmptyEntity()
 * @method \App\Model\Entity\Product newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Product> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Product findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Product> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Product>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Product>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Product>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Product> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Product>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Product>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Product>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Product> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('name_ar');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
        ]);
        $this->belongsTo('InnerCategories', [
            'foreignKey' => 'inner_category_id',
        ]);
        $this->belongsTo('Brands', [
            'foreignKey' => 'brand_id',
        ]);
        $this->hasMany('Cart', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('Favorites', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductImages', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('Store', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('Gifts', [
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
            ->scalar('name_ar')
            ->maxLength('name_ar', 255)
            ->requirePresence('name_ar', 'create')
            ->notEmptyString('name_ar')
            ->add('name_ar', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('name_en')
            ->maxLength('name_en', 255)
            ->requirePresence('name_en', 'create')
            ->notEmptyString('name_en')
            ->add('name_en', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('category_id')
            ->allowEmptyString('category_id');

        $validator
            ->integer('inner_category_id')
            ->allowEmptyString('inner_category_id');

        $validator
            ->integer('brand_id')
            ->allowEmptyString('brand_id');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 255)
            ->allowEmptyString('photo');

        $validator
            ->integer('quantity')
            ->allowEmptyString('quantity');

        $validator
            ->integer('price')
            ->allowEmptyString('price');

        $validator
            ->integer('offer_price')
            ->allowEmptyString('offer_price');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('most_selling')
            ->allowEmptyString('most_selling');

        return $validator;
    }


    public function validationAddProduct(Validator $validator): Validator
            {
                $validator 
                ->notEmptyString('name_ar', 'ادخل اسم المنتج بالعربي')
                ->notEmptyString('name_en', 'ادخل اسم المنتج بالانجليزي')
                ->notEmptyString('category_id', 'اختر التصنيف الرئيسي')
                ->notEmptyString('sub_cat_id', 'اختر التصنيف الفرعي')
                ->notEmptyString('brand_id', 'اختر العلامة التجارية')
                ->notEmptyString('image', 'ادخل اسم الصورة') 
                ->notEmptyString('quantity', 'ادخل كمية المنتج') 
                ->notEmptyString('price', 'ادخل سعر المنتج') 
                ->notEmptyString('offer_price', 'ادخل سعر المنتج المخفض') 
                ->notEmptyString('description', 'ادخل وصف المنتج تفصيلاً') 
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

                return $validator ; 
            }
    public function validationUpdateProduct(Validator $validator): Validator
            {
                $validator 
                ->notEmptyString('name_ar', 'ادخل اسم المنتج بالعربي')
                ->notEmptyString('name_en', 'ادخل اسم المنتج بالانجليزي')
                ->notEmptyString('category_id', 'اختر التصنيف الرئيسي')
                ->notEmptyString('sub_cat_id', 'اختر التصنيف الفرعي')
                ->notEmptyString('brand_id', 'اختر العلامة التجارية')
                ->notEmptyString('quantity', 'ادخل كمية المنتج') 
                ->notEmptyString('price', 'ادخل سعر المنتج') 
                ->notEmptyString('offer_price', 'ادخل سعر المنتج المخفض') 
                ->notEmptyString('description', 'ادخل وصف المنتج تفصيلاً') ;

                return $validator ; 
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
        $rules->add($rules->isUnique(['name_ar'],"الدواء مسجل بالفعل "), ['errorField' => 'name_ar']);
        $rules->add($rules->isUnique(['name_en'],"الدواء مسجل بالفعل"), ['errorField' => 'name_en']);
        $rules->add($rules->existsIn(['category_id'], 'Categories'), ['errorField' => 'category_id']);
        $rules->add($rules->existsIn(['inner_category_id'], 'InnerCategories'), ['errorField' => 'inner_category_id']);
        $rules->add($rules->existsIn(['brand_id'], 'Brands'), ['errorField' => 'brand_id']);

        return $rules;
    }

    /////////////////

    function showProductOnHome($obj){
        $getPro  = $this->findById($obj["productID"]?$obj["productID"]:0)->first();
        
        if($getPro){
            $getPro->show_on_home = $obj["selectionID"];
            $this->save($getPro) ? $res = ["success"=>true , "msg"=>"تم الحفظ"] : $res = ["success"=>false , "msg"=>"selection id is missing"] ; 
        }else{
            $res = ["success"=>false , "msg"=>"prodcut id is missing"] ; 
        }
        return $res ; 
    }

////////
    function getProductsBySectionId($sectionID){
        $q  = $this->find()
                ->where([
                    "OR"=>[
                        ["show_on_home"=>$sectionID?$sectionID:1 , 'most_selling'=>'on' ], 
                        ["show_on_home"=>$sectionID?$sectionID:1 ]
                    ]
                  ])
                ->limit(10)
                ->toArray();
        
        return $q ; 
    }
    //////////////////////

    function searchByCatSubCatsName($obj){  //["name"=>$name , "cat"=>$cat , "subCat"=>$subCat]

        $con = [
            !empty($obj["name"]) => [
                "OR"=>[
                    ["Products.name_ar LIKE"=> "%".$obj["name"]."%"],
                    ["Products.name_en LIKE"=> "%".$obj["name"]."%"],
                ]
            ],
            is_numeric($obj["cat"]) && !is_numeric($obj["subCat"]) => ["Products.category_id"=>$obj["cat"]],
            is_numeric($obj["subCat"]) => ["Products.inner_category_id"=>$obj["subCat"]],
            is_numeric($obj["showHome"]) => ["Products.show_on_home"=>$obj["showHome"]]
        ] ;
        //   echo json_encode($con);
        //   exit;
            $query = $this->find() 
                        ->where($con[true]) 
                        ->contain(['Categories', 'InnerCategories', 'Brands']);

        return $query ;

    }
    //////////////////////

    function updateQuantity ($obj){
        //$this->Store->Products->updateQuantity(["product_id"=>$newQun["product_id"], "newQun"=>$newQun]);
        $getProduct = $this->find()
                        ->where(['Products.id'=>$obj["product_id"]])
                        ->first();
        $oldQun =$getProduct["quantity"];
        if($getProduct){
          $obj["type"]=="minus" ?  $getProduct->quantity =   $oldQun - $obj["newQun"]  
                                :  $getProduct->quantity =   $oldQun + $obj["newQun"]  ; 
                              
           $this->save($getProduct);
           
           $res = ["success"=>true , "msg"=>"تم الحفظ بنجاح"];                     
        }else{
            $res = ["success"=>false , "msg"=>"لم يتم الحفظ"];        
        }

        return $res ; 
    }
}
