<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InnerCategoriesFixture
 */
class InnerCategoriesFixture extends TestFixture
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
                'category_id' => 1,
                'photo' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-10-18 14:17:04',
                'modified' => '2024-10-18 14:17:04',
            ],
        ];
        parent::init();
    }
}
