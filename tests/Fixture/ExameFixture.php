<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExameFixture
 *
 */
class ExameFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'exame';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'codigo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'data' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'codigo_paciente' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'codigo_medico' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tipo de exame' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_consulta_1_idx' => ['type' => 'index', 'columns' => ['codigo_medico'], 'length' => []],
            'fk_consulta_2_idx' => ['type' => 'index', 'columns' => ['codigo_paciente'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['codigo'], 'length' => []],
            'fk_consulta_1' => ['type' => 'foreign', 'columns' => ['codigo_medico'], 'references' => ['medico', 'codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_consulta_2' => ['type' => 'foreign', 'columns' => ['codigo_paciente'], 'references' => ['paciente', 'codigo'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'codigo' => 1,
            'data' => '2017-10-18',
            'codigo_paciente' => 1,
            'codigo_medico' => 1,
            'tipo de exame' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
