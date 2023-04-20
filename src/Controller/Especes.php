<?php 

namespace Formation\Cours\Controller;
use Formation\Cours\Entity\Espece;
use Formation\Cours\Entity\Famille;
use Formation\Cours\Entity\Statutuicn;
use Formation\Cours\Entity\Nom_vernaculaire;
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
        $familles = [];
        $statuts = [];
        $nom = [];
        foreach ($espece as $esp) {
            $famille = new Famille();
            $familles[$esp->id] = $famille->getById($esp->idFamille)->nomFamille;

            $statutuicn = new Statutuicn();
            $statuts[$esp->id] = $statutuicn->getById($esp->idStatut)->statut;

                    $nom_vernaculaire = new Nom_vernaculaire();
        $noms_vernaculaires = $nom_vernaculaire->getByAttribute('idEspece', $esp->id);
        $nom_array = [];
        foreach ($noms_vernaculaires as $nom_vern) {
            $nom_array[] = $nom_vern->nom;
        }
        $nom[$esp->id] = implode(', ', $nom_array);
        }
        $view->setVar('nom', $nom);
        $view->setVar('statuts', $statuts);
        $view->setVar('familles', $familles);
        $view->setVar('especes',$espece);
        $view->render();
    }
    
    public function create(){
        
        $view = new Views('especes/create');
        $view->setvar('flashmessage','');

        $esp = new Famille();
        $esp = $esp->getAll();
        $view->setVar('especes',$esp);     

        $esps = new Statutuicn();
        $esps = $esps->getAll();
        $view->setVar('especess',$esps);
        
        if ($this->action === 'update') {
            $modifEsp = new Espece($this->id);
            $view->setVar('modifesp',$modifEsp);
            $view->setVar('id',$this->id);
        }

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
                $view->setVar('flashmessage','L\'espece bien créé');
            } else {
                $espece->update();
                $view->setVar('flashmessage','L\'espece bien mis à jour');
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
        if (isset($_POST['delete'])) {
            $id = intval($_POST['id']);
    
            $nom_vernaculaire = new Nom_vernaculaire();
            $noms_vernaculaires = $nom_vernaculaire->getByAttribute('idEspece', $id);
            foreach ($noms_vernaculaires as $nom_vern) {
                $nom_vern->delete();
            }
            
            $delesp = new Espece();
            $delesp->setId($id);
            if ($this->action === 'delete') {
                $delesp->delete();
            }
        }
        header("Location: index.php?page=especes");
        exit();
    }
    
    
    
    

    

}
