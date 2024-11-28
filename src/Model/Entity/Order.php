<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int|null $cart_id
 * @property int|null $user_id
 * @property int|null $address_id
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
 * @property \App\Model\Entity\Cart $cart
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Address $address
 */
class Order extends Entity
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
        'cart_id' => true,
        'user_id' => true,
        'address_id' => true,
        'discount' => true,
        'promo' => true,
        'delivery_cost' => true,
        'delivery_duration' => true,
        'items_amount' => true,
        'total_amount' => true,
        'status' => true,
        'reject_reason' => true,
        'notes' => true,
        'created' => true,
        'modified' => true,
        'cart' => true,
        'user' => true,
        'address' => true,
        'order_type' => true,
        'order_temp_id' => true,
        'prescription' => true,
        'gift_points' => true,
    ];

    protected array $_virtual = ['status_ar'];
    
    function _getStatusAr($status)
    {
        $status = $this->status ; 
        $status?$status:$status="pending" ; 
        $statusArObj = [
            "pending"=>"<span style='color:blue'>غير مؤكد</span>",
            "approved"=>"<span>نشط</span>",
            "rejected"=>"<span style='color:red'>مرفوض</span>",
            "refuned"=>"<span style='color:orange'>مسترد</span>",
            "on_delivery"=>"<span style='color:brown'>في الطريق</span>",
            "completed"=>"<span style='color:green'> مكتمل</span>",
        ] ;
       return  $statusArObj[$status] ;
    }


}
