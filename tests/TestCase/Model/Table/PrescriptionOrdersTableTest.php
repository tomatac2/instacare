<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrescriptionOrdersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrescriptionOrdersTable Test Case
 */
class PrescriptionOrdersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrescriptionOrdersTable
     */
    protected $PrescriptionOrders;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.PrescriptionOrders',
        'app.Addresses',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PrescriptionOrders') ? [] : ['className' => PrescriptionOrdersTable::class];
        $this->PrescriptionOrders = $this->getTableLocator()->get('PrescriptionOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PrescriptionOrders);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PrescriptionOrdersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PrescriptionOrdersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
