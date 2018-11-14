<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PacientePlanosaudeFixture
 *
 */
class PacientePlanosaudeFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'paciente_planosaude';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'codigo_paciente' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'codigo_planosaude' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'pk_paciente_plano_idx' => ['type' => 'index', 'columns' => ['codigo_planosaude'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['codigo_paciente', 'codigo_planosaude'], 'length' => []],
            'pk_paciente_plano' => ['type' => 'foreign', 'columns' => ['codigo_planosaude'], 'references' => ['plano_saude', 'codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'pk_plano_paciente' => ['type' => 'foreign', 'columns' => ['codigo_paciente'], 'references' => ['paciente', 'codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'codigo_paciente' => 1,
            'codigo_planosaude' => 1
        ],
    ];
}
