<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GiftsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GiftsTable Test Case
 */
class GiftsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GiftsTable
     */
    protected $Gifts;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Gifts',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Gifts') ? [] : ['className' => GiftsTable::class];
        $this->Gifts = $this->getTableLocator()->get('Gifts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Gifts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GiftsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\GiftsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
