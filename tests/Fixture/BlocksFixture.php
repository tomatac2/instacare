<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BlocksFixture
 */
class BlocksFixture extends TestFixture
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
                'area_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-10-18 14:17:01',
                'modified' => '2024-10-18 14:17:01',
            ],
        ];
        parent::init();
    }
}
