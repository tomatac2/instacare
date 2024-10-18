<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrescriptionOrdersFixture
 */
class PrescriptionOrdersFixture extends TestFixture
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
                'prescription' => 'Lorem ipsum dolor sit amet',
                'address_id' => 1,
                'user_id' => 1,
                'amount' => 1,
                'delivery_cost' => 1,
                'delivery_duration' => 1,
                'total_amount' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'reject_reason' => 'Lorem ipsum dolor sit amet',
                'notes' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-10-18 14:17:04',
                'modified' => '2024-10-18 14:17:04',
            ],
        ];
        parent::init();
    }
}
