<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Especialidade Model
 *
 * @method \App\Model\Entity\Especialidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Especialidade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Especialidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Especialidade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Especialidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Especialidade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Especialidade findOrCreate($search, callable $callback = null, $options = [])
 */
class EspecialidadeTable extends Table
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

        $this->setTable('especialidade');
        $this->setDisplayField('codigo');
        $this->setPrimaryKey('codigo');
        
        //Associação 1:N entre as tabelas Especialidade e Medico
        $this->hasMany('Medico', array(
        		'bindingKey' => 'codigo',
        		'foreignKey' => "cod_especialidade"
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
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        return $validator;
    }
    
    public function buscarEspecialidadesQuePossuemMedico(){
        $consulta =  $this->find();
        $consulta ->select(['Especialidade.codigo', 'Especialidade.descricao'])->distinct(['Especialidade.codigo', 'Especialidade.descricao']);;
        $consulta ->innerJoinWith("Medico");
        return  $consulta ->toArray();
    }
    
    public function buscarEspecialidadesComMedicos($filtro){

        $consulta = $this->find()->contain(['Medico']);   
        
        if(isset($filtro['filtro_codigo'])){
            if(empty($filtro['filtro_codigo'])==false){
                $consulta->where(array('Especialidade.codigo = '.$filtro['filtro_codigo']));
            }
        }
        if(isset($filtro['filtro_descricao'])){
            if(empty($filtro['filtro_descricao'])==false){
                $consulta->where(array('Especialidade.descricao LIKE ' => "%".$filtro['filtro_descricao']."%"));
            }
        }
        if(isset($filtro['filtro_medico'])){
            if(empty($filtro['filtro_medico'])==false){                
                $consulta->where(array('Medico.codigo' => $filtro['filtro_medico']));
            }
        }
        return  $consulta->toArray();
    }
    
}
