<?php 

namespace Formation\Cours\Controller;
use Formation\Cours\Views;
use Formation\Cours\Entity\Collection as Collections;


class Collection {
    private string $page='collection';
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
        $view = new Views('collection/list');
        $view->setVar('page',$this->page);
        $collection = new Collections();
        $collections = $collection->getAll();
        $view->setVar('collections',$collections);        
        $view->render();
    }
    public function create(){
        $view = new Views('collection/create');
        $view->setVar('flashmessage','');
        if ($this->action === 'update') {
                $collection = new Collections($this->id);
                $view->setVar('collection',$collection);
                $view->setVar('id',$this->id);
            }
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $nomCollection = $_POST['nomCollection'];
            $especeEnValeur = $_POST['especeEnValeur'];
            if ($this->action === 'update') {
                $collection = new Collections($this->id);
            } else {
                $collection = new Collections();
            }
            $collection->id = $id;
            $collection->nomCollection = $nomCollection;
            $collection->especeEnValeur = $especeEnValeur;
            if ($this->action === 'create') {
                $collection->save();
                $view->setVar('flashmessage','Collection bien créée');
            } else {
                $collection->update();
                $view->setVar('flashmessage','Collection bien mise à jour');
            }
        }
        $view->setVar('action',$this->action);
        $view->render();

    }
}