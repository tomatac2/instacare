<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\HasMany $Addresses
 * @property \App\Model\Table\CartTable&\Cake\ORM\Association\HasMany $Cart
 * @property \App\Model\Table\FavoritesTable&\Cake\ORM\Association\HasMany $Favorites
 * @property \App\Model\Table\HealthFileTable&\Cake\ORM\Association\HasMany $HealthFile
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\PrescriptionOrdersTable&\Cake\ORM\Association\HasMany $PrescriptionOrders
 * @property \App\Model\Table\WalletTable&\Cake\ORM\Association\HasMany $Wallet
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
        ]);
        $this->hasMany('Addresses', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Cart', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Favorites', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('HealthFile', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('PrescriptionOrders', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Wallet', [
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
            ->scalar('name')
            ->maxLength('name', 55)
            ->allowEmptyString('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 255)
            ->requirePresence('mobile', 'create')
            ->notEmptyString('mobile')
            ->add('mobile', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('role_id')
            ->allowEmptyString('role_id');

        $validator
            ->scalar('is_active')
            ->allowEmptyString('is_active');

        $validator
            ->scalar('gender')
            ->allowEmptyString('gender');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmptyString('password');

        $validator
            ->scalar('recovery_hash_code')
            ->maxLength('recovery_hash_code', 255)
            ->allowEmptyString('recovery_hash_code');

        return $validator;
    }
    //////////////////
    public function validationAddUser(Validator $validator): Validator
    {
        $validator
                 ->notEmptyString('name', 'ادخل الأسم')
                 ->notEmptyString('email', 'ادخل البريد الإلكتروني')
                 ->notEmptyString('mobile', 'ادخل رقم الموبيل')
                 ->notEmptyString('role_id', 'اختر التصنيف')
                 ->notEmptyString('password', 'ادخل كلمة المرور')  
                 ->notEmptyString('confirm_password', 'ادخل تأكيد كلمة المرور')  
                 ->add('confirm_password', [
                    'mustMatch'=>[
                        'rule'=>'checkForSamePassword',
                        'provider'=>'table',
                        'message'=>__('كلمة المرور غير متطابقة')
                    ]
                ])  ;
    

        return $validator;
    }
    public function validationEditUser(Validator $validator): Validator
    {
        $validator
                 ->notEmptyString('name', 'ادخل الأسم')
                 ->notEmptyString('email', 'ادخل البريد الإلكتروني')
                 ->notEmptyString('mobile', 'ادخل رقم الموبيل')     ;
    

        return $validator;
    }
    public function validationChangePass(Validator $validator): Validator
    {
        $validator
                 ->notEmptyString('password', 'ادخل كلمة المرور')
                 ->notEmptyString('cpassword', 'ادخل تأكيد كلمة المرور')
                 ->add('cpassword', [
                    'mustMatch'=>[
                        'rule'=>'checkForSamePassword',
                        'provider'=>'table',
                        'message'=>__('كلمة المرور غير متطابقة')
                    ]
                ])  ;    

        return $validator;
    }

    public function checkForSamePassword($value, $context) {
        if(!empty($value) && $value != $context['data']['password'] ) {
            return false;
        }
        return true;
    }



    function updateUser($obj){   //fields , user_id
        $update = $this->get($obj["user_id"]);

        $update = $this->patchEntity($update , $obj["fields"] , ["validate"=>'editUser']) ; 
        $this->save($update) ? $res = ["success"=>true , "msg"=>"تم تحديث الملف الشخصي بنجاح" , "data"=>$update] 
                            : $res = ["success"=>false , "msg"=>"لم يتم تحديث الملف الشخصي" , "data"=>$update]  ; 

        return $res ; 
    }
    ///////////
    function changePasswordLogin($obj){   //fields , user_id
        $changePass = $this->get($obj["user_id"]);

        $changePass = $this->patchEntity($changePass , $obj["fields"] , ["validate"=>'changePass']) ; 
        $this->save($changePass) ? $res = ["success"=>true , "msg"=>"تم تغيير كلمة المرور بنجاح" , "data"=>$changePass] 
                            : $res = ["success"=>false , "msg"=>"لم يتم تغيير كلمة المرور" , "data"=>$changePass]  ; 

        return $res ; 
    }

    /////////////////////////


    function getUser($userID){   //fields , user_id
        $getUserData = $this->find()->where(["id"=>$userID])->first();

        $getUserData ? $res = ["success"=>true , "msg"=>"بيانات المستخدم" , "data"=>$getUserData] 
                     : $res = ["success"=>false , "msg"=>"برجاء تسجيل الدخول" , "data"=>json_decode("{}")]  ; 

        return $res ; 
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
        $rules->add($rules->isUnique(['email'],'البريد الإلكتروني مسجل'), ['errorField' => 'email']);
        $rules->add($rules->isUnique(['mobile'],'رقم الهاتف مسجل'), ['errorField' => 'mobile']);
        $rules->add($rules->existsIn(['role_id','نوع العضوية غير معروف'], 'Roles'), ['errorField' => 'role_id']);

        return $rules;
    }
}
