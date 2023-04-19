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
            case 'details':
                $this->details();
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

    }
    public function details(){

    }

//     public function create(){
//         $view = new Views('personne/create');
//         $view->setVar('flashmessage','');
//         if ($this->action === 'update') {
//                 $personne = new Person($this->id);
//                 $view->setVar('personne',$personne);
//                 $view->setVar('id',$this->id);
//             }
//         if (isset($_POST['submit'])) {
//             $name = $_POST['name'];
//             $lastName = $_POST['lastName'];
//             $pwd = $_POST['pwd'];
//             if ($this->action === 'update') {
//                 $personne = new Person($this->id);
//             } else {
//                 $personne = new Person();
//             }
//         $personne->name = $name;
//         $personne->lastName = $lastName;
//         $personne->pwd = $pwd;
//         if ($this->action === 'create') {
//             $personne->save();
//             $view->setVar('flashmessage','Personne bien créée');
//         } else {
//             $personne->update();
//             $view->setVar('flashmessage','Personne bien mise à jour');
//         }
//     }
//         $view->setVar('action',$this->action);
//         $view->render();
// }

}