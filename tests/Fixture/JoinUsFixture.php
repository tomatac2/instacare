<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JoinUsFixture
 */
class JoinUsFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'join_us';
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
                'pharmacy_name' => 'Lorem ipsum dolor sit amet',
                'pharmacy_phone' => 'Lorem ipsum dolor ',
                'pharmacy_times' => 'Lorem ipsum dolor sit amet',
                'area' => 'Lorem ipsum dolor sit amet',
                'manger_phone' => 'Lorem ipsum dolor sit a',
                'manger_name' => 'Lorem ipsum dolor sit amet',
                'register_document' => 'Lorem ipsum dolor sit amet',
                'tax_document' => 'Lorem ipsum dolor sit amet',
                'license_document' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-11-01 08:10:55',
            ],
        ];
        parent::init();
    }
}
