<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property int|null $category_id
 * @property int|null $inner_category_id
 * @property int|null $brand_id
 * @property string|null $photo
 * @property int|null $quantity
 * @property int|null $price
 * @property int|null $offer_price
 * @property string|null $description
 * @property string|null $most_selling
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\InnerCategory $inner_category
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\Cart[] $cart
 * @property \App\Model\Entity\Favorite[] $favorites
 * @property \App\Model\Entity\ProductImage[] $product_images
 * @property \App\Model\Entity\Store[] $store
 */
class Product extends Entity
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
        'name_ar' => true,
        'name_en' => true,
        'category_id' => true,
        'inner_category_id' => true,
        'brand_id' => true,
        'photo' => true,
        'quantity' => true,
        'price' => true,
        'offer_price' => true,
        'description' => true,
        'most_selling' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
        'inner_category' => true,
        'brand' => true,
        'cart' => true,
        'favorites' => true,
        'product_images' => true,
        'store' => true,
        'show_on_home' => true,
    ];
}
