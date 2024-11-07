<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Favorites Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Favorite newEmptyEntity()
 * @method \App\Model\Entity\Favorite newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Favorite> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Favorite get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Favorite findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Favorite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Favorite> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Favorite|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Favorite saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Favorite>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Favorite>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Favorite>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Favorite> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Favorite>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Favorite>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Favorite>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Favorite> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FavoritesTable extends Table
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

        $this->setTable('favorites');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
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
            ->integer('product_id')
            ->allowEmptyString('product_id');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }

    //////////////

    function addToFav($obj){
        //check add before 
        $chkB4 = $this->chkFavB4($obj);

        $chkB4["success"]== true ? $newFav = $chkB4["data"] :  $newFav = $this->newEmptyEntity();
       
        $newFav = $this->patchEntity($newFav , $obj);
        if($this->save($newFav)){
            $res = ["success"=>true , "msg"=> "تم الاضافة الى المفضلة بنجاح" , "data"=>$newFav] ;
        }else{
            $res = ["success"=>false , "msg"=> "لم يتم الاضافة" , "data"=>json_decode("{}")] ;
        }

        return $res ; 
    }

    function chkFavB4($obj){
        //check add before 
        $chkB4 = $this->find()->where(['product_id'=>$obj["product_id"] , "user_id"=>$obj["user_id"]])->first();

        if($chkB4){
            $res = ["success"=>true, "data"=>$chkB4] ;
        }else{
            $res = ["success"=>false , "data"=>json_decode("{}")] ;
        }

        return $res ; 
    }
}
