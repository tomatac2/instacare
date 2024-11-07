<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $is_primary
 * @property float|null $address_lat
 * @property float|null $address_long
 * @property string|null $address_type
 * @property string|null $street_name
 * @property string|null $building_number
 * @property string|null $floor_number
 * @property string|null $apartment_number
 * @property string|null $unique_mark
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\PrescriptionOrder[] $prescription_orders
 */
class Address extends Entity
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
        'is_primary' => true,
        'address_lat' => true,
        'address_long' => true,
        'address_type' => true,
        'street_name' => true,
        'building_number' => true,
        'floor_number' => true,
        'apartment_number' => true,
        'unique_mark' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'orders' => true,
        'prescription_orders' => true,
        'full_address' => true,
    ];
}
