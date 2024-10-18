<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WalletFixture
 */
class WalletFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'wallet';
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
                'points' => 1,
                'created' => '2024-10-18 14:17:06',
                'modified' => '2024-10-18 14:17:06',
            ],
        ];
        parent::init();
    }
}
