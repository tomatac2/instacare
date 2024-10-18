<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string $email
 * @property string $mobile
 * @property int|null $role_id
 * @property string|null $is_active
 * @property string|null $gender
 * @property string|null $password
 * @property string|null $recovery_hash_code
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\Cart[] $cart
 * @property \App\Model\Entity\Favorite[] $favorites
 * @property \App\Model\Entity\HealthFile[] $health_file
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\PrescriptionOrder[] $prescription_orders
 * @property \App\Model\Entity\Wallet[] $wallet
 */
class User extends Entity
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
        'name' => true,
        'email' => true,
        'mobile' => true,
        'role_id' => true,
        'is_active' => true,
        'gender' => true,
        'password' => true,
        'recovery_hash_code' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'addresses' => true,
        'cart' => true,
        'favorites' => true,
        'health_file' => true,
        'orders' => true,
        'prescription_orders' => true,
        'wallet' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
    ];
}
