<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GiftsFixture
 */
class GiftsFixture extends TestFixture
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
                'product_id' => 1,
                'points' => 1,
                'descripton' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-11-26 12:39:56',
            ],
        ];
        parent::init();
    }
}
