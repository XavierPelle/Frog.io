<?php

namespace Formation\Cours\Controller;

// Permet d'importer les autres classes que nous utiliserons dans cette classe.
use Formation\Cours\Entity\Espece;
use Formation\Cours\Entity\Famille;
use Formation\Cours\Entity\Parents;
use Formation\Cours\Entity\Statutuicn;
use Formation\Cours\Entity\Nom_vernaculaire;
use Formation\Cours\Entity\Stocke;
use Formation\Cours\Views;

class Especes
{
    // Propriétés de la classe Especes.
    private string $page = 'especes';
    private ?string $id = null;
    private ?string $action = null;

    public function __construct()
    {
        // Permet de récupérer les valeurs 'id' et 'action' de la requête GET.
        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];
        }
        if (isset($_GET['action'])) {
            $this->action = $_GET['action'];
        }

        // Permet d'exécuter une action en fonction de la valeur de 'action'.
        switch ($this->action) {
            case 'create':
                $this->create();
                break;
            case 'createH':
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

    // Fonction pour afficher les cards des espèces.
    public function list()
    {
        // Initialise la vue.
        $view = new Views('especes/list');
        $view->setVar('page', $this->page);

        // Récupère toutes les espèces.
        $espece = new Espece();
        $espece = $espece->getAll();

        $familles = [];
        $statuts = [];
        $nom = [];

        // Parcourt toutes les espèces et récupère les informations associées.
        foreach ($espece as $esp) {
            $famille = new Famille();
            $familles[$esp->id] = $famille->getById($esp->idFamille)->nomFamille;

            // Permet de récuperer la propriété nomFamille grace a la méthode getByID qui fait référence à la classe famille sur l'objet $famille
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

        // Passe les variables à la vue.
        $view->setVar('nom', $nom);
        $view->setVar('statuts', $statuts);
        $view->setVar('familles', $familles);
        $view->setVar('especes', $espece);

        $view->render();
    }

    // Fonction pour créer ou update une espèce.
    public function create()
    {
        // Initialise la vue.
        $view = new Views('especes/create');
        $view->setVar('flashmessage', '');

        // Récupère toutes les familles, les statuts , les noms vernaculaires.
        $esp = new Famille();
        $esp = $esp->getAll();
        $view->setVar('especes', $esp);

        $esps = new Statutuicn();
        $esps = $esps->getAll();
        $view->setVar('especess', $esps);

        $nom = new Nom_vernaculaire();
        $noms = $nom->getByAttribute('idEspece', $this->id);
        $view->setVar('noms', $noms);

        // Si on est en mode 'update', je récupère l'espèce à modifier.
        if ($this->action === 'update') {
            $modifEsp = new Espece($this->id);
            $view->setVar('modifesp', $modifEsp);
            $view->setVar('id', $this->id);
        }
        if ($this->action === 'createH') {
            $espece = new Espece();
            $especeAll = $espece->getAll();
            $view->setVar('especeALL', $especeAll);
        }

        if (isset($_POST['submit'])) {

            // Récupère les données du formulaire.
            $nomScientifique = $_POST['nomScientifique'];
            $nomVernaculaire = $_POST['nomVernaculaire'];
            $altitude = $_POST['altitude'];
            $taille = $_POST['taille'];
            $idStatut = $_POST['idStatut'];
            $idFamille = $_POST['idFamille'];
            $image = isset($_POST['image']) ? $_POST['image'] : null;

            // Si on est en mode 'update', utilise l'espèce existante, sinon on crée une nouvelle espèce.
            if ($this->action === 'update') {
                $espece = new Espece($this->id);
            } else {
                $espece = new Espece();
            }

            // Met à jour les attributs de l'espèce.
            $espece->nomScientifique = $nomScientifique;
            $espece->altitude = $altitude;
            $espece->taille = $taille;
            $espece->idStatut = $idStatut;
            $espece->idFamille = $idFamille;

            // Si une image a été envoyée.
            if (isset($_FILES['image'])) {

                // Gère le téléchargement de l'image.
                $uploadDir = 'uploads/';
                $targetFile = $uploadDir . basename($_FILES['image']['name']);
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Vérifie la taille de l'image.
                if ($_FILES['image']['size'] > 500000) {
                    echo "Image trop volumineuse.";
                } else {
                    // Vérifie le format de l'image.
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        echo "Seuls les formats JPG, JPEG et PNG sont autorisés.";
                    } else {
                        // Télécharge l'image.
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                            echo "Le fichier a été téléchargé avec succès.";
                            $espece->image = $targetFile;
                        } else {
                            echo "Erreur lors de l'envoi de l'image.";
                        }
                    }
                }
            }

            // Enregistre ou met à jour l'espèce.
            if ($this->action === 'create') {
                foreach ($nomVernaculaire as $nom) {
                    $no = new Nom_vernaculaire();
                    $no->idEspece = $this->id;
                    $no->nom = $nom->nom;
                    $no->save();
                }
                $espece->save();
                $view->setVar('flashmessage', "L'espèce a bien été créée");
                header('Location: index.php?page=especes');
            } elseif ($this->action === 'createH') {
                // foreach ($nomVernaculaire as $nom) {
                //     $no = new Nom_vernaculaire();
                //     $no->idEspece = $this->id;
                //     $no->nom = $nom->nom;
                //     $no->save();
                // }
                $espece->save();
                // need get id de $espece
                $espece = $espece->getByAttribute('nomScientifique', $nomScientifique)[0];
                var_dump($espece);
                // add dans parent TODO
                $parent1 = $_POST['parent1'];
                $parent2 = $_POST['parent2'];
                $parent1BDD = new Parents();
                $parent1BDD->idEspece = $espece->id;
                $parent1BDD->idParent = $parent1;
                $parent1BDD->save();
                $parent2BDD = new Parents();
                $parent2BDD->idEspece = $espece->id;
                $parent2BDD->idParent = $parent2;
                $parent2BDD->save();
                $view->setVar('flashmessage', "L'espèce a bien été créée");
                header('Location: index.php?page=especes');
            } else {
                $espece->update();
                $view->setVar('flashmessage', "L'espèce a bien été mise à jour");
                header('Location: index.php?page=especes');
            }
        }

        // Affiche la vue.
        $view->setVar('action', $this->action);
        $view->render();
    }

    // Fonction pour mettre à jour une espèce.
    public function update()
    {
        $this->create();
    }

    // Fonction pour supprimer une espèce.
    public function delete()
    {
        if (isset($_POST['delete'])) {
            $id = intval($_POST['id']);

            // Supprime les noms vernaculaires associés à l'espèce.
            $nom_vernaculaire = new Nom_vernaculaire();
            $noms_vernaculaires = $nom_vernaculaire->getByAttribute('idEspece', $id);
            foreach ($noms_vernaculaires as $nom_vern) {
                $nom_vern->delete();
            }

            // Supprime les stocke associés à l'espèce.
            $stocke = new Stocke();
            $query = "delete from stocke where idEspece = $id ;";
            $stocke->execute($query);

            // Supprime l'espèce.
            $delesp = new Espece();
            $delesp->setId($id);
            if ($this->action === 'delete') {
                $delesp->delete();
            }
        }
        // Redirige vers la liste des espèces.
        header("Location: index.php?page=especes");
        exit();
    }
}
