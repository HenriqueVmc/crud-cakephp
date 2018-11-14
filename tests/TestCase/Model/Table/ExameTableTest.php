<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExameTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExameTable Test Case
 */
class ExameTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExameTable
     */
    public $Exame;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exame'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Exame') ? [] : ['className' => ExameTable::class];
        $this->Exame = TableRegistry::get('Exame', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Exame);

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
