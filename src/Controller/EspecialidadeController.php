<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Especialidade Controller
 *
 * @property \App\Model\Table\EspecialidadeTable $Especialidade
 *
 * @method \App\Model\Entity\Especialidade[] paginate($object = null, array $settings = [])
 */
class EspecialidadeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		//@todo implementar método buscarEspecialidadesComMedicos
      $MedicoTable = TableRegistry::get("Medico");
      $listaMedicos = $MedicoTable->buscarMedicosQuePossuemEspecialidade();

      $dadosFiltro = $this->request->getData();
      $especialidades = $this->Especialidade->buscarEspecialidadesComMedicos($dadosFiltro);

      $this->set(compact('especialidades'));
      $this->set('_serialize', ['especialidades']);
      $this->set(compact('listaMedicos'));
      $this->set('_serialize', ['listaMedicos']);
    }
}
