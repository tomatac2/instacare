<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AddressesFixture
 */
class AddressesFixture extends TestFixture
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
                'user_id' => 1,
                'is_primary' => 'Lorem ipsum dolor sit amet',
                'address_lat' => 1,
                'address_long' => 1,
                'address_type' => 'Lorem ipsum dolor sit amet',
                'street_name' => 'Lorem ipsum dolor sit amet',
                'building_number' => 'Lorem ipsum dolor sit amet',
                'floor_number' => 'Lorem ipsum dolor sit amet',
                'apartment_number' => 'Lorem ipsum dolor sit amet',
                'unique_mark' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-10-18 14:17:01',
                'modified' => '2024-10-18 14:17:01',
            ],
        ];
        parent::init();
    }
}
