<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CartFixture
 */
class CartFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'cart';
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
                'user_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'order_temp_id' => 'Lorem ipsum dolor sit amet',
                'is_ordered' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-10-18 14:17:02',
                'modified' => '2024-10-18 14:17:02',
            ],
        ];
        parent::init();
    }
}
