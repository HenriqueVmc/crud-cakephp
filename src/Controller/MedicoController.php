<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Medico Controller
 *
 * @property \App\Model\Table\MedicoTable $Medico
 *
 * @method \App\Model\Entity\Medico[] paginate($object = null, array $settings = [])
 */
class MedicoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $EspecialidadeTable = TableRegistry::get("Especialidade");
        $listaEspecialidades = $EspecialidadeTable->buscarEspecialidadesQuePossuemMedico();
        
        $dadosFiltro = $this->request->getData();
        $medico = $this->Medico->buscarMedicos($dadosFiltro);

        
        $this->set(compact('medico'));
        $this->set('_serialize', ['medico']);
        $this->set(compact('listaEspecialidades'));
        $this->set('_serialize', ['listaEspecialidades']);
    }

}
