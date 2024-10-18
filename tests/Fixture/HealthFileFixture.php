<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HealthFileFixture
 */
class HealthFileFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'health_file';
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
                'weight' => 1,
                'tall' => 1,
                'blood_type' => 'Lorem ipsum dolor sit amet',
                'diseases_array' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-10-18 14:17:03',
                'modified' => '2024-10-18 14:17:03',
            ],
        ];
        parent::init();
    }
}
