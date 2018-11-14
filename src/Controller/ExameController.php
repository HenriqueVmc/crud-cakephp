<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Exame Controller
 *
 * @property \App\Model\Table\ExameTable $Exame
 *
 * @method \App\Model\Entity\Exame[] paginate($object = null, array $settings = [])
 */
class ExameController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //@todo Implementar método buscarTodosExames
    	$exame = $this->Exame->buscarTodosExames();
    	
        $this->set(compact('exame'));
        $this->set('_serialize', ['exame']);
    }
}
