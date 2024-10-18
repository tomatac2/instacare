<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Area Entity
 *
 * @property int $id
 * @property int|null $city_id
 * @property string|null $name
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Block[] $blocks
 */
class Area extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'city_id' => true,
        'name' => true,
        'created' => true,
        'modified' => true,
        'city' => true,
        'blocks' => true,
    ];
}
