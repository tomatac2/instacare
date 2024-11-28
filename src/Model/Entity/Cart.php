<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cart Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $product_id
 * @property int|null $quantity
 * @property string $order_temp_id
 * @property string|null $is_ordered
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Order[] $orders
 */
class Cart extends Entity
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
        'user_id' => true,
        'product_id' => true,
        'quantity' => true,
        'order_id' => true,
        'is_ordered' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'product' => true,
        'orders' => true,
        'type' => true,
    ];
}
