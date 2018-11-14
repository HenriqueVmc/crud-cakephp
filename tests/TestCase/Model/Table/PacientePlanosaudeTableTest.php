<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PacientePlanosaudeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PacientePlanosaudeTable Test Case
 */
class PacientePlanosaudeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PacientePlanosaudeTable
     */
    public $PacientePlanosaude;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.paciente_planosaude'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PacientePlanosaude') ? [] : ['className' => PacientePlanosaudeTable::class];
        $this->PacientePlanosaude = TableRegistry::get('PacientePlanosaude', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PacientePlanosaude);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
