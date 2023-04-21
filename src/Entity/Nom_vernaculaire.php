<?php 

namespace Formation\Cours\Entity;
use Formation\Cours\Model;
use Formation\Cours\Db;

class Nom_vernaculaire extends Model{

    private ?int $id;
    private ?string $nom;
    private ?int $idEspece;

    public function get_object_vars()
    {
        return get_object_vars($this);
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIdEspece()
    {
        return $this->idEspece;
    }

    public function setIdEspece($idEspece)
    {
        $this->idEspece = $idEspece;

        return $this;
    }
}