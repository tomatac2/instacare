<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blocks Model
 *
 * @property \App\Model\Table\AreasTable&\Cake\ORM\Association\BelongsTo $Areas
 *
 * @method \App\Model\Entity\Block newEmptyEntity()
 * @method \App\Model\Entity\Block newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Block> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Block get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Block findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Block patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Block> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Block|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Block saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Block>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Block>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Block>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Block> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Block>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Block>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Block>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Block> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BlocksTable extends Table
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

        $this->setTable('blocks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Areas', [
            'foreignKey' => 'area_id',
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
            ->integer('area_id')
            ->allowEmptyString('area_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 55)
            ->allowEmptyString('name');

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
        $rules->add($rules->existsIn(['area_id'], 'Areas'), ['errorField' => 'area_id']);

        return $rules;
    }
}
