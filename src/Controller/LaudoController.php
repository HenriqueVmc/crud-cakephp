<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Laudo Controller
 *
 * @property \App\Model\Table\LaudoTable $Laudo
 *
 * @method \App\Model\Entity\Laudo[] paginate($object = null, array $settings = [])
 */
class LaudoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //@todo implementar método pesquisar LaudosComExames
        $MedicoTable = TableRegistry::get("Medico");
        //$listaMedicos = $MedicoTable->buscarMedicos();

        $laudos = $this->Laudo->pesquisarLaudosComExames();

        $this->set(compact('laudos'));
        $this->set('_serialize', ['laudos']);
        //$this->set(compact('listaMedicos'));
        //$this->set('_serialize', ['listaMedicos']);
    }

}
