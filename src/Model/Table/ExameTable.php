<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exame Model
 *
 * @method \App\Model\Entity\Exame get($primaryKey, $options = [])
 * @method \App\Model\Entity\Exame newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Exame[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exame|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exame patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Exame[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exame findOrCreate($search, callable $callback = null, $options = [])
 */
class ExameTable extends Table
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

        $this->setTable('exame');
        $this->setDisplayField('codigo');
        $this->setPrimaryKey('codigo');
        
        
        //@todo implementar relação Exame - Paciente
        //@todo implementar relação Exame - Médico
        //@todo implementar relação Exame - Laudo
        $this->belongsTo('Paciente',[
            'foreignKey' => 'codigo_paciente',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Medico',[
            'foreignKey' => 'codigo_medico',
            'joinType' => 'LEFT'
        ]);

        $this->hasMany('Laudo',[
            'foreignKey' => 'codigo_exame'
        ]);
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
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmpty('data');

        $validator
            ->integer('codigo_paciente')
            ->requirePresence('codigo_paciente', 'create')
            ->notEmpty('codigo_paciente');

        $validator
            ->integer('codigo_medico')
            ->requirePresence('codigo_medico', 'create')
            ->notEmpty('codigo_medico');

        $validator
            ->scalar('tipo de exame')
            ->allowEmpty('tipo de exame');

        return $validator;
    }
    
    public function buscarTodosExames(){
        $retorno = array();
        // @todo implementar pesquisa de todos os exames com  dados dos pacientes, médicos do exame, especialidade do médico do exame, médico do laudo, especialidade do médico do laudo e dados do laudo, 

        $retorno = $this->find()->contain(['Paciente', 'Medico.Especialidade', 'Laudo.Medico.Especialidade']);

        return $retorno;
    }
}
