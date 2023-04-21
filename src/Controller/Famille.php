<?php

namespace Formation\Cours\Controller;

use Formation\Cours\Entity\Espece;
use Formation\Cours\Views;
use Formation\Cours\Entity\Famille as Familles;


class Famille
{
    private string $page = 'famille';
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
            case 'delete':
                $this->delete();
                break;
            case 'details':
                $this->details();
                break;
            default:
                $this->list();
                break;
        }
    }

    public function list($msg = null)
    {
        $view = new Views('famille/list');
        $view->setVar('page', $this->page);
        $famille = new Familles();
        $familles = $famille->getAll();
        $view->setVar('familles', $familles);
        $view->setVar('flashmessage', $msg);
        $view->render();
    }
    public function create()
    {
        $view = new Views('famille/create');
        if ($this->action === 'update') {
            $famille = new Familles($this->id);
            $view->setVar('famille', $famille);
            $view->setVar('id', $this->id);
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
                $this->list('Famille bien créée');
                exit;
            } else {
                $famille->update();
                $this->list('Famille bien mise a jour');
                exit;
            }
        }
        $view->setVar('action', $this->action);
        $view->render();
    }

    public function delete()
    {
        $idF = $_GET['id'];
        $famille = new Familles($idF);
        $query = "delete from espece where idFamille = $idF;";
        $famille->execute($query);
        $famille->delete();
        $this->list("Famille supprimée");
    }

    public function details()
    {
        $view = new Views('famille/details');
        $view->setVar('page', $this->page);
        $idF = $_GET['id'];
        $esp = new Espece();
        $especes = $esp->getByAttribute('idFamille', $idF);
        $view->setVar('especes', $especes);
        $view->render();
    }
}
