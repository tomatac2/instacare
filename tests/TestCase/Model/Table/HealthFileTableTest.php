<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HealthFileTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HealthFileTable Test Case
 */
class HealthFileTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HealthFileTable
     */
    protected $HealthFile;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.HealthFile',
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
        $config = $this->getTableLocator()->exists('HealthFile') ? [] : ['className' => HealthFileTable::class];
        $this->HealthFile = $this->getTableLocator()->get('HealthFile', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->HealthFile);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HealthFileTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\HealthFileTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
