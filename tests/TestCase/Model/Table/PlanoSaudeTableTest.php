<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlanoSaudeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlanoSaudeTable Test Case
 */
class PlanoSaudeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlanoSaudeTable
     */
    public $PlanoSaude;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.plano_saude'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PlanoSaude') ? [] : ['className' => PlanoSaudeTable::class];
        $this->PlanoSaude = TableRegistry::get('PlanoSaude', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PlanoSaude);

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
