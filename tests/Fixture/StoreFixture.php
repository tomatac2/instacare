<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StoreFixture
 */
class StoreFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'store';
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
                'product_id' => 1,
                'quantity' => 1,
                'purchase_date' => '2024-10-18',
                'notes' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-10-18 14:17:06',
                'modified' => '2024-10-18 14:17:06',
            ],
        ];
        parent::init();
    }
}
