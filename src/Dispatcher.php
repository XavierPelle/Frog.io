<?php 

namespace Formation\Cours;
use Formation\Cours\Controller\Famille;
use Formation\Cours\Controller\Collection;
use Formation\Cours\Controller\Especes;
use Formation\Cours\Controller\Collection;



class Dispatcher {
    private ?string $page=null;
    private ?string $id=null;
    private ?string $action=null;
    public function __construct()
    {
        if (isset($_GET['page'])) {
            $this->page = $_GET['page'];
        } 
        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];
        }
        if (isset($_GET['action'])) {
            $this->action = $_GET['action'];
        }
    }

    public function dispatch()
    {
        if (is_null($this->page) || $this->page === 'famille') {
            new Famille();
        }elseif ($this->page === 'collection') {
           new Collection();
        }elseif ($this->page === 'especes') {
            new Especes();
        }else if($this->page === 'collection'){
            new Collection();
        }
    }
}