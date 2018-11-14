<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * PlanoSaude Controller
 *
 * @property \App\Model\Table\PlanoSaudeTable $PlanoSaude
 *
 * @method \App\Model\Entity\PlanoSaude[] paginate($object = null, array $settings = [])
 */
class PlanoSaudeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // implementar consulta
        $PacienteTable = TableRegistry::get("Paciente");
        $listaPacientes = $PacienteTable->buscarListaPacientesComPlanoSaude();
          
        $dadosFiltro = $this->request->getData();
        $planoSaude = $this->PlanoSaude->buscarTodosPlanosDeSaude($dadosFiltro);

        $this->set(compact('planoSaude'));
        $this->set('_serialize', ['planoSaude']);
        $this->set(compact('listaPacientes'));
        $this->set('_serialize', ['listaPacientes']);
    }
}
