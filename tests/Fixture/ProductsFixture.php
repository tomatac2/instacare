<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name_ar' => 'Lorem ipsum dolor sit amet',
                'name_en' => 'Lorem ipsum dolor sit amet',
                'category_id' => 1,
                'inner_category_id' => 1,
                'brand_id' => 1,
                'photo' => 'Lorem ipsum dolor sit amet',
                'quantity' => 1,
                'price' => 1,
                'offer_price' => 1,
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'most_selling' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-10-18 14:17:05',
                'modified' => '2024-10-18 14:17:05',
            ],
        ];
        parent::init();
    }
}
