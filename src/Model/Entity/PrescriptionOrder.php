<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PrescriptionOrder Entity
 *
 * @property int $id
 * @property string|null $prescription
 * @property int|null $address_id
 * @property int|null $user_id
 * @property int|null $amount
 * @property int|null $delivery_cost
 * @property int|null $delivery_duration
 * @property int|null $total_amount
 * @property string|null $status
 * @property string|null $reject_reason
 * @property string|null $notes
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\User $user
 */
class PrescriptionOrder extends Entity
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
        'prescription' => true,
        'address_id' => true,
        'user_id' => true,
        'amount' => true,
        'delivery_cost' => true,
        'delivery_duration' => true,
        'total_amount' => true,
        'status' => true,
        'reject_reason' => true,
        'notes' => true,
        'created' => true,
        'modified' => true,
        'address' => true,
        'user' => true,
    ];
}
