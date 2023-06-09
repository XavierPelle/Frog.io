<?php

namespace Formation\Cours\Entity;

use Formation\Cours\Model;
use Formation\Cours\Db;

class Espece extends Model
{

    private ?int $id;
    private ?string $nomScientifique;
    private ?string $image;
    private ?string $taille;
    private ?int $altitude;
    private ?int $idFamille;
    private ?int $idStatut;

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

    public function getNomScientifique()
    {
        return $this->nomScientifique;
    }

    public function setNomScientifique($nomScientifique)
    {
        $this->nomScientifique = htmlspecialchars(addslashes($nomScientifique));

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = htmlspecialchars(addslashes($image));

        return $this;
    }

    public function getTaille()
    {
        return $this->taille;
    }

    public function setTaille($taille)
    {
        $this->taille = htmlspecialchars(addslashes($taille));

        return $this;
    }

    public function getAltitude()
    {
        return $this->altitude;
    }

    public function setAltitude($altitude)
    {
        $this->altitude = htmlspecialchars(addslashes($altitude));

        return $this;
    }

    public function getIdFamille()
    {
        return $this->idFamille;
    }

    public function setIdFamille($idFamille)
    {
        $this->idFamille = htmlspecialchars(addslashes($idFamille));

        return $this;
    }

    public function getIdStatut()
    {
        return $this->idStatut;
    }

    public function setIdStatut($idStatut)
    {
        $this->idStatut = htmlspecialchars(addslashes($idStatut));

        return $this;
    }
}
