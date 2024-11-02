<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JoinU Entity
 *
 * @property int $id
 * @property string|null $pharmacy_name
 * @property string|null $pharmacy_phone
 * @property string|null $pharmacy_times
 * @property string|null $area
 * @property string|null $manger_phone
 * @property string|null $manger_name
 * @property string|null $register_document
 * @property string|null $tax_document
 * @property string|null $license_document
 * @property \Cake\I18n\DateTime|null $created
 */
class JoinU extends Entity
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
        'pharmacy_name' => true,
        'pharmacy_phone' => true,
        'pharmacy_times' => true,
        'area' => true,
        'manger_phone' => true,
        'manger_name' => true,
        'register_document' => true,
        'tax_document' => true,
        'license_document' => true,
        'created' => true,
    ];
}
