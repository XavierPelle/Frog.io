<?php 

namespace Formation\Cours\Controller;
use Formation\Cours\Views;
use Formation\Cours\Entity\Famille as Familles;


class Famille {
    private string $page='famille';
    private ?string $id=null;
    private ?string $action=null;
    public function __construct()
    {
        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];
        }
        if (isset($_GET['action'])) {
            $this->action = $_GET['action'];
        }
        switch ($this->action) {
            case 'create':
                $this->create();
                break;
            case 'update':
                $this->create();
                break;
            default:
                $this->list();
                break;
        }
    }

    public function list() 
    {
        $view = new Views('famille/list');
        $view->setVar('page',$this->page);
        $famille = new Familles();
        $familles = $famille->getAll();
        $view->setVar('familles',$familles);        
        $view->render();
    }
    public function create(){
        $view = new Views('famille/create');
        $view->setVar('flashmessage','');
        if ($this->action === 'update') {
                $famille = new Familles($this->id);
                $view->setVar('famille',$famille);
                $view->setVar('id',$this->id);
            }
        if (isset($_POST['submit'])) {
            $nomFamille = $_POST['nomFamille'];
            $id = $_POST['id'];
            if ($this->action === 'update') {
                $famille = new Familles($this->id);
            } else {
                $famille = new Familles();
            }
        $famille->nomFamille = $nomFamille;
        $famille->id = $id;
        if ($this->action === 'create') {
            $famille->save();
            $view->setVar('flashmessage','Famille bien créée');
        } else {
            $famille->update();
            $view->setVar('flashmessage','Famille bien mise à jour');
        }
    }
        $view->setVar('action',$this->action);
        $view->render();

    }
}