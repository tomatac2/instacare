<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JoinUsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JoinUsTable Test Case
 */
class JoinUsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JoinUsTable
     */
    protected $JoinUs;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.JoinUs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('JoinUs') ? [] : ['className' => JoinUsTable::class];
        $this->JoinUs = $this->getTableLocator()->get('JoinUs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->JoinUs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\JoinUsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
