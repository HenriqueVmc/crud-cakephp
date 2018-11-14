<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exame Entity
 *
 * @property int $codigo
 * @property \Cake\I18n\FrozenDate $data
 * @property int $codigo_paciente
 * @property int $codigo_medico
 * @property string $tipo de exame
 */
class Exame extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'data' => true,
        'codigo_paciente' => true,
        'codigo_medico' => true,
        'tipo de exame' => true
    ];
}
