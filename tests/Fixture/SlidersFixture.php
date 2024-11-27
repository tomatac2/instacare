<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SlidersFixture
 */
class SlidersFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'photo' => 'Lorem ipsum dolor sit amet',
                'link' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-11-18 07:42:00',
                'modified' => '2024-11-18 07:42:00',
            ],
        ];
        parent::init();
    }
}
