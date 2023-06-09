<?php

namespace Formation\Cours\Controller;

use Formation\Cours\Views;
use Formation\Cours\Entity\Collection as Collections;
use Formation\Cours\Entity\Stocke;
use Formation\Cours\Entity\Espece;
use Formation\Cours\Entity\Users;
use Formation\Cours\Entity\Statutuicn;
use Formation\Cours\Entity\Nom_vernaculaire;
use Formation\Cours\Entity\Famille;


class Collection
{
    private string $page = 'collection';
    private ?string $id = null;
    private ?string $action = null;
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
            case 'details':
                $this->details();
                break;
            case 'add':
                $this->add();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'deleteRow':
                $this->deleteRow();
                break;
            case 'valor':
                $this->valor();
                break;
            default:
                $this->list();
                break;
        }
    }

    public function list($msg = null)
    {
        $view = new Views('collection/list');
        $view->setVar('page', $this->page);
        $collection = new Collections();
        $collections = $collection->getAll();
        // chgmnt idUsers to nom users TODO
        $user = new Users();
        $users = $user->getAll();
        $view->setVar('users', $users);
        $view->setVar('collections', $collections);
        $view->setVar('flashmessage', $msg);
        $view->render();
    }
    public function create()
    {
        $view = new Views('collection/create');
        $view->setVar('flashmessage', '');
        if ($this->action === 'update') {
            $collection = new Collections($this->id);
            $view->setVar('collection', $collection);
            $view->setVar('id', $this->id);
        }
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $nomCollection = $_POST['nomCollection'];
            $idUsers = $_POST['idUsers'];
            // $especeEnValeur= $_POST['especeEnValeur'];
            $especeEnValeur = '1'; //en attendant ca marche :shrug: a modif
            if ($this->action === 'update') {
                $collection = new Collections($this->id);
            } else {
                $collection = new Collections();
            }
            $collection->id = $id;
            $collection->especeEnValeur = $especeEnValeur;
            $collection->nomCollection = $nomCollection;
            $collection->idUsers = $idUsers;
            if ($this->action === 'create') {
                $collection->save();
                $this->list('Collection créée');
                exit;
            } else {
                $collection->update();
                $this->list('Collection bien mise a jour');
                exit;
            }
        }
        $view->setVar('action', $this->action);
        $view->render();
    }


    public function details($msg = null)
    {
        $view = new Views('collection/details');
        $view->setVar('page', $this->page);
        $id = $_GET['id'];
        // On recup les lignes de stocke qui correspondent a la collection
        $stocke = new Stocke();
        $stockes = $stocke->getByAttribute('idCollection', $this->id);
        $especes = [];
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

        }
        
        $view->setVar('statuts', $statuts);
        $view->setVar('familles', $familles);
        // on recup l'espece correspondante a la ligne de stocke et on l'assigne au tableau $especes
        foreach ($stockes as $stock) {
            $espece = new Espece;
            $especes[] = $espece->getById($stock->idEspece);
        }
        $coll = new Collections();
        $col = $coll->getById($id);
        $view->setVar('col', $col);
        $view->setVar('flashmessage', $msg);
        $view->setVar('especes', $especes);
        $view->render();
    }

    public function add()
    {
        $view = new Views('collection/add');
        $view->setVar('page', $this->page);
        $id = $_GET['id'];
        if (isset($_GET['idGre'])) {
            $idEspece = $_GET['idGre'];
            $stocke = new Stocke();
            $stocke->idCollection = $id;
            $stocke->idEspece = $idEspece;
            $stocke->save();
            $view->setVar('flashmessage', 'Grenouille ajoutée');
        }
        $stocke = new Stocke();
        $stockes = $stocke->getByAttribute('idCollection', $this->id);
        $especes = [];
        foreach ($stockes as $stock) {
            $espece = new Espece;
            $especes[] = $espece->getById($stock->idEspece);
        }
        $view->setVar('especes', $especes);
        $espece = new Espece();
        $especes = $espece->getAll();
        $view->setVar('grenouilles', $especes);
        $view->render();
    }
    public function delete()
    {
        $idC = $_GET['id'];
        $collection = new Collections($idC);
        $query = "delete from stocke where idCollection = $idC;";
        $collection->execute($query);
        $collection->delete();
        $this->list("Collection supprimée");
    }

    public function deleteRow()
    {
        $stocke = new Stocke();
        $idE = $_GET['idE'];
        $idC = $_GET['idC'];
        $action = 'add';
        $collection = new Collections();
        $coll = $collection->getById($idC);
        $query = "delete from stocke where idEspece =$idE AND idCollection = $idC;";
        $stocke->execute($query);
        header("Location: index.php?page=collection&action=$action&id=$idC&name=$coll->nomCollection");
        exit();
    }

    public function valor()
    {
        $idE = $_GET['idE'];
        $idC = $_GET['idC'];
        $collection = new Collections($idC);
        $collection->id = $idC;
        $collection->especeEnValeur = $idE;
        $collection->update();
        header("Location: index.php?page=collection&action=details&idUsers=$collection->idUsers&id=$idC&name=$collection->nomCollection");
        exit();
    }
}
