<?php 

namespace Formation\Cours\Controller;
use Formation\Cours\Entity\Espece;
use Formation\Cours\Entity\Famille;
use Formation\Cours\Entity\Statutuicn;
use Formation\Cours\Views;

class Especes {

    private string $page='especes';
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
                $this->update();
                break;
            case 'delete':
                $this->delete();
                break;
            default:
                $this->list();
                break;
        }
    }
 
    public function list() 
    {
        $view = new Views('especes/list');
        $view->setVar('page',$this->page);
        $espece = new Espece();
        $espece = $espece->getAll();
        $view->setVar('especes',$espece);        
        $view->render();
    }
    
    public function create(){
        
        $view = new Views('especes/create');

        $esp = new Famille();
        $esp = $esp->getAll();
        $view->setVar('especes',$esp);     

        $esps = new Statutuicn();
        $esps = $esps->getAll();
        $view->setVar('especess',$esps);    

        if (isset($_POST['submit'])) {

            $nomScientifique = $_POST['nomScientifique'];
            $altitude = $_POST['altitude'];
            $taille = $_POST['taille'];
            $idStatut = $_POST['idStatut'];
            $idFamille = $_POST['idFamille'];
            $image = $_POST['image'];
            if ($this->action === 'update') {
                $espece = new Espece($this->id);
            } else {
                $espece = new Espece();
            }

            $espece->nomScientifique=$nomScientifique;
            $espece->altitude = $altitude;
            $espece->taille = $taille;
            $espece->idStatut = $idStatut;
            $espece->idFamille = $idFamille;
            $espece->image = $image;
            if ($this->action === 'create') {
                $espece->save();
                $view->setVar('flashmessage','Client bien créé');
            } else {
                $espece->update();
                $view->setVar('flashmessage','Client bien mis à jour');
            }

        }
        $view->setVar('action',$this->action);
        $view->render();
    }

    public function update()
    {
        $this->create();
    }

    public function delete()
    {
        $this->list();
    }
    

}
