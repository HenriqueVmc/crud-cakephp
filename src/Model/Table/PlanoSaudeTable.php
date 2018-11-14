<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlanoSaude Model
 *
 * @method \App\Model\Entity\PlanoSaude get($primaryKey, $options = [])
 * @method \App\Model\Entity\PlanoSaude newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PlanoSaude[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PlanoSaude|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlanoSaude patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PlanoSaude[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PlanoSaude findOrCreate($search, callable $callback = null, $options = [])
 */
class PlanoSaudeTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('plano_saude');
        $this->setDisplayField('codigo');
        $this->setPrimaryKey('codigo');

        //Fazer associacao belongsToMany (Plano de saude pertence a um ou mais pacientes)

        $this->belongsToMany('Paciente',array(
            'joinTable' => 'paciente_planosaude',
            'foreignKey' => 'codigo_paciente',
            'targetForeignKey'=>'codigo_paciente'
        ));
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('codigo')
            ->allowEmpty('codigo', 'create');

        $validator
            ->scalar('nome')
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        return $validator;
    }
    
    public function buscarTodosPlanosDeSaude($filtro){
        $dadosRetorno = array();
        //fazer consulta
        //@todo Fazer busca por todos os planos de sa�de
        $dadosRetorno = $this->find()->contain(['Paciente']);

        if(isset($filtro['filtro_codigo'])){
            if(empty($filtro['filtro_codigo'])==false){
                $dadosRetorno->where(array('PlanoSaude.codigo = '.$filtro['filtro_codigo']));
            }
        }
        if(isset($filtro['filtro_nome'])){
            if(empty($filtro['filtro_nome'])==false){
                $dadosRetorno->where(array('PlanoSaude.nome LIKE ' => "%".$filtro['filtro_nome']."%"));
            }
        }
        if(isset($filtro['filtro_paciente'])){
            if(empty($filtro['filtro_paciente'])==false){                
                $dadosRetorno->where(array('Paciente.codigo' => $filtro['filtro_paciente']));
            }
        }

        return $dadosRetorno;
    }
}
