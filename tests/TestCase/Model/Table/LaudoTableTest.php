<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LaudoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LaudoTable Test Case
 */
class LaudoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LaudoTable
     */
    public $Laudo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.laudo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Laudo') ? [] : ['className' => LaudoTable::class];
        $this->Laudo = TableRegistry::get('Laudo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Laudo);

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
