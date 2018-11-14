<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\ORM\TableRegistry;

/**
 * Laudo Model
 *
 * @method \App\Model\Entity\Laudo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Laudo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Laudo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Laudo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Laudo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Laudo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Laudo findOrCreate($search, callable $callback = null, $options = [])
 */
class LaudoTable extends Table
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

        $this->setTable('laudo');
        $this->setDisplayField('codigo');
        $this->setPrimaryKey('codigo');
        
        //@todo Laudo - Exame e Laudo - Médico
        
        $this->belongsTo('Exame',[
            'foreignKey' => 'codigo_exame'   
        ]);
        $this->belongsTo('Medico',[
            'foreignKey' => 'codigo_medico'        
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
            ->scalar('texto')
            ->requirePresence('texto', 'create')
            ->notEmpty('texto');

        $validator
            ->integer('codigo_medico')
            ->requirePresence('codigo_medico', 'create')
            ->notEmpty('codigo_medico');

        $validator
            ->integer('codigo_exame')
            ->requirePresence('codigo_exame', 'create')
            ->notEmpty('codigo_exame');

        return $validator;
    }
    
    public function pesquisarLaudosComExames(){
        $dadosRetorno = array();
        //@todo implementar consulta dos dados do Laudo com dados do Exame, Médico, Especialdiade do Médico e Nome do Paciente        
        $dadosRetorno = $this->find()->contain(['Exame.Paciente', 'Medico.Especialidade']);
        
        return $dadosRetorno;        
    }
}