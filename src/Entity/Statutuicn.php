<?php 

namespace Formation\Cours\Entity;
use Formation\Cours\Model;
use Formation\Cours\Db;

class Statutuicn extends Model {

    private ?int $id;
    private ?string $statut;
    private ?string $iconeStatut;
    private ?string $codeStatut;
    private ?string $descriptionStatut;

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

    public function getStatut()
    {
        return $this->statut;
    }


    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    public function getIconeStatut()
    {
        return $this->iconeStatut;
    }


    public function setIconeStatut($iconeStatut)
    {
        $this->iconeStatut = $iconeStatut;

        return $this;
    }

 
    public function getCodeStatut()
    {
        return $this->codeStatut;
    }


    public function setCodeStatut($codeStatut)
    {
        $this->codeStatut = $codeStatut;

        return $this;
    }

    public function getDescriptionStatut()
    {
        return $this->descriptionStatut;
    }

    public function setDescriptionStatut($descriptionStatut)
    {
        $this->descriptionStatut = $descriptionStatut;

        return $this;
    }
}