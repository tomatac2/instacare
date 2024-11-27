<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gift Entity
 *
 * @property int $id
 * @property int|null $product_id
 * @property int $points
 * @property string|null $description
 * @property \Cake\I18n\DateTime|null $created
 *
 * @property \App\Model\Entity\Product $product
 */
class Gift extends Entity
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
        'product_id' => true,
        'points' => true,
        'description' => true,
        'created' => true,
        'product' => true,
    ];
}
