<?php

namespace Formation\Cours\Controller;

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
        // delete de la famille dont id = $_GET['id']
        $famille = new Familles($_GET['id']);
        $famille->delete();

        // redirect sur list
        $this->list('Famille supprimée');
    }
}
