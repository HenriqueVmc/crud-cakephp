<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Laudo Entity
 *
 * @property int $codigo
 * @property \Cake\I18n\FrozenDate $data
 * @property string $texto
 * @property int $codigo_medico
 * @property int $condigo_exame
 */
class Laudo extends Entity
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
        'texto' => true,
        'codigo_medico' => true,
        'condigo_exame' => true
    ];
}
