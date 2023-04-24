<?php

namespace Formation\Cours\Controller;

use Formation\Cours\Entity\Statutuicn as Statut;
use Formation\Cours\Views;

class StatutUICN
{
    private string $page = 'statut';
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
            default:
                $this->list();
                break;
        }
    }

    public function list($msg = null)
    {
        $view = new Views('statut/list');
        $view->setVar('page', $this->page);
        $statut = new Statut();
        $statuts = $statut->getAll();
        $view->setVar('statuts', $statuts);
        $view->setVar('flashmessage', $msg);
        $view->render();
    }
}
