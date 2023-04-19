<?php 

namespace Formation\Cours\Entity;
use Formation\Cours\Model;

class Famille extends Model {
    private ?int $idFamille;
    private ?string $nomFamille;

    public function get_object_vars()
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of idFamille
     */ 
    public function getIdFamille()
    {
        return $this->idFamille;
    }

    /**
     * Set the value of idFamille
     *
     * @return  self
     */ 
    public function setIdFamille($idFamille)
    {
        $this->idFamille = $idFamille;

        return $this;
    }

    /**
     * Get the value of nomFamille
     */ 
    public function getNomFamille()
    {
        return $this->nomFamille;
    }

    /**
     * Set the value of nomFamille
     *
     * @return  self
     */ 
    public function setNomFamille($nomFamille)
    {
        $this->nomFamille = $nomFamille;

        return $this;
    }
}