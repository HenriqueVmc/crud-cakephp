<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Medico Model
 *
 * @method \App\Model\Entity\Medico get($primaryKey, $options = [])
 * @method \App\Model\Entity\Medico newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Medico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Medico|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Medico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Medico[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Medico findOrCreate($search, callable $callback = null, $options = [])
 */
class MedicoTable extends Table
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

        $this->setTable('medico');
        $this->setDisplayField('codigo');
        $this->setPrimaryKey('codigo');
        
        //Associação 1:N entre as tabelas Especialidade e Medico
        // Belongs to é equivalente a hasOne ou hasMany
        $this->belongsTo('Especialidade', array(
        		'bindingKey'  => 'codigo',
        		'foreignKey'=> "cod_especialidade"
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

        $validator
            ->integer('cod_especialidade')
            ->requirePresence('cod_especialidade', 'create')
            ->notEmpty('cod_especialidade');

        $validator
            ->scalar('telefone')
            ->requirePresence('telefone', 'create')
            ->notEmpty('telefone');

        $validator
            ->email('email')
            ->allowEmpty('email');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
    
    public function buscarMedicos($filtro){
        $consulta= $this->find()->contain(['Especialidade']);
        if(isset($filtro['filtro_codigo'])){
            if(empty($filtro['filtro_codigo'])==false){
                $consulta->where(array('Medico.codigo = '.$filtro['filtro_codigo']));
            }
        }
        if(isset($filtro['filtro_nome'])){
            if(empty($filtro['filtro_nome'])==false){
                $consulta->where(array('Medico.nome LIKE ' => "%".$filtro['filtro_nome']."%"));
            }
        }
        if(isset($filtro['filtro_telefone'])){
            if(empty($filtro['filtro_telefone'])==false){
                $consulta->where(array('Medico.telefone LIKE ' =>"%".$filtro['filtro_telefone']."%"));
            }
        }  if(isset($filtro['filtro_email'])){
            if(empty($filtro['filtro_email'])==false){
                $consulta->where(array('Medico.email like ' => "%".$filtro['filtro_email']."%"));
            }
        }
        if(isset($filtro['filtro_especialidade'])){
            if(empty($filtro['filtro_especialidade'])==false){
                $consulta->where(array('Especialidade.codigo' => $filtro['filtro_especialidade']));
            }
        }        
        $consulta->orderAsc("Medico.nome");
        return $consulta->toArray();
    }

    public function buscarMedicosQuePossuemEspecialidade(){
        $consulta =  $this->find();
        $consulta ->select(['Medico.codigo', 'Medico.nome'])->distinct(['Medico.codigo', 'Medico.nome']);;
        $consulta ->innerJoinWith("Especialidade");
        return  $consulta ->toArray();
    }

    public function buscarMedicosQuePossuemLaudo(){
        $consulta =  $this->find();
        $consulta ->select(['Medico.codigo', 'Medico.nome'])->distinct(['Medico.codigo', 'Medico.nome']);;
        $consulta ->innerJoinWith("Laudo");
        return  $consulta ->toArray();
    }
}
