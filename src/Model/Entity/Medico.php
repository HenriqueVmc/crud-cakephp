<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Medico Entity
 *
 * @property int $codigo
 * @property string $nome
 * @property int $cod_especialidade
 * @property string $telefone
 * @property string $email
 */
class Medico extends Entity
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
        'nome' => true,
        'cod_especialidade' => true,
        'telefone' => true,
        'email' => true
    ];
}
