<?php

namespace Formation\Cours\Controller;

use Formation\Cours\Views;
use Formation\Cours\Entity\Users as User;
use Formation\Cours\Controller\Collection as CollectionController;
use Formation\Cours\Entity\Collection;

class Users
{
    private string $page = 'users';
    private ?string $id = null;

    private ?string $statut = null;
    private ?string $action = null;

    public function __construct()
    {
        if (isset($_GET['action'])) {
            $this->action = $_GET['action'];
        }
        switch ($this->action) {
            case 'login':
                $this->login();
                break;
            case 'logout':
                $this->logout();
                break;
            case 'logged':
                $this->manage();
                break;
            case 'add':
                $this->add();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'modifiate':
                $this->modifiate();
                break;
            default:
                $this->login();
                break;
        }
    }
    //Déclaration fonction login qui récupère les infos du form via $_Post, 
    //test le pseudo et mot de passe et passe le l'id, le pseudo , le mdp dnas $_SESSION
    public function login()
    {
        if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {

            $user = new User();
            $users = $user->getAll();
            // var_dump($users);
            if (count($_POST) !== 0) {
                if (isset($_POST['pseudo'])) {

                    $pseudo = $_POST['pseudo'];
                }
                if (isset($_POST['pwd'])) {

                    $pwd = $_POST['pwd'];
                }

                foreach ($users as $user) {
                    $error = true;

                    if ($pseudo === $user->pseudo && password_verify($pwd, $user->pwd)) {
                        $_SESSION['logged'] = true;
                        $_SESSION['pseudo'] = $pseudo;
                        $_SESSION['id'] = $user->id;
                        $_SESSION['pwd'] = $user->pwd;
                        $error = false;
                        // var_dump($_SESSION);
                        $this->manage();
                        exit;
                    }
                }
                if ($error === true) {
                    echo "Mauvais mot de passe ou pseudo";
                    // var_dump($_SESSION);
                    // var_dump($_POST);
                }
            }
            $view = new Views('users/login');
            $view->setVar('page', $this->page);
            $view->render();
        } else header("Location: index.php?page=users&action=logged");
    }
    //Affiche la page manage.php
    public function manage()
    {
        if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
            header("Location: index.php?page=users&action=login");
        }
        // var_dump($_SESSION);
        $view = new Views('users/manage');
        $view->setVar('page', $this->page);
        $view->render();
    }
    //Affiche la page delete.php et permet de supprimer l'utilisateur connecté et "nettoie" le $_SESSION
    //Supprime les collections créées par l'utilisateur supprimé
    public function delete()
    {
        if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
            header("Location: index.php?page=users&action=login");
        }
        $view = new Views('users/delete');
        $view->setVar('page', $this->page);
        $user = new User();
        $collection = new Collection();
        $deleteCollections = $collection->getByAttribute('idusers', $_SESSION['id']);
        foreach ($deleteCollections as $collection) {
            $collection->delete();
        }
        // var_dump($_SESSION);
        $users = $user->getByID($_SESSION['id']);
        $users->delete();
        $view->render();
        $_SESSION = [];
    }
    //affiche modifiate.php et permet de modifier le mail, ou le pseudo ou le mdp de l'utilisateur connecté
    // et test si le nouveau pseudo ou mail est déja utilisé
    public function modifiate()
    {
        if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
            header("Location: index.php?page=users&action=login");
        }
        $user = new User();
        $users = $user->getAll();
        $id = $_SESSION['id'];
        $modifiateUser = $user->getById($id);
        $error1 = false;
        $error2 = false;


        if (count($_POST) !== 0) {

            $champ = $_POST['champ'];
            $change = $_POST['change'];
            foreach ($users as $user) {
                if ($champ === 'mail' && $change === $user->mail) {
                    $error1 = true;
                }
                if ($champ === 'pseudo' && $change === $user->pseudo) {
                    $error2 = true;
                }
            }
            if ($error1) echo "Mail déjà utilisé";
            if ($error2) echo "Pseudo déjà utilisé";
            if (!$error1 && !$error2) {
                $_SESSION[$champ] = $change;
                $modifiateUser->$champ = $change;
                $modifiateUser->update();
                $this->manage();
                exit;
            }
        }
        $view = new Views('users/modifiate');
        $view->setVar('page', $this->page);
        $view->render();
    }
    //affiche la page add.php et permet de creer un nouvel utilisateur et le connecte
    //et test si le mail et pseudo ne sont pas deja utiliser
    //Attention un pseudo avec ou sans majuscule seras considéré comme identique
    public function add()
    {
        if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
            $user = new User();
            $users = $user->getAll();
            if (count($_POST) !== 0) {
                $pseudo = $_POST['pseudo'];
                $pwd = $_POST['pwd'];
                $mail = $_POST['mail'];
                $error = false;
                foreach ($users as $user) {
                    if (strtolower($pseudo) === strtolower($user->pseudo) || $mail === $user->mail) {
                        $error = true;
                    }
                }
                if ($error) {
                    echo "Pseudo ou mail déjà utilisé";
                } else {
                    $newUser = new User();
                    $user = new User();
                    $newUser->mail = $mail;
                    $newUser->pwd = $pwd;
                    $newUser->pseudo = $pseudo;
                    $newUser->save();
                    $newUser = $user->getByAttribute('pseudo', $pseudo)[0];

                    $_SESSION['logged'] = true;
                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['id'] = $newUser->id;
                    $_SESSION['pwd'] = $newUser->pwd;
                    // var_dump($_SESSION);
                    $this->manage();
                    exit;
                }
            }
        } else header("Location: index.php?page=users&action=logged");

        $view = new Views('users/add');
        $view->setVar('page', $this->page);
        $view->render();
    }
    //Affiche la page logout.php et déconnecte l'utilisateur connécté
    public function logout()
    {
        if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
            header("Location: index.php?page=users&action=login");
        }
        $view = new Views('users/logout');
        $view->setVar('page', $this->page);
        $_SESSION = [];
        $view->render();
    }
}
