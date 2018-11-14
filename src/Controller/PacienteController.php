<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Paciente Controller
 *
 * @property \App\Model\Table\PacienteTable $Paciente
 *
 * @method \App\Model\Entity\Paciente[] paginate($object = null, array $settings = [])
 */
class PacienteController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
    	$listaPacientes = $this->Paciente->buscarListaPacientesComPlanoSaude();
        $this->set(compact('listaPacientes'));
        $this->set('_serialize', ['listaPacientes']);
    }
}
