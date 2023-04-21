<?php 

namespace Formation\Cours\Entity;
use Formation\Cours\Model;

class Stocke extends Model {
    private ?int $idCollection;
    private ?string $idEspece;
    // private ?int quantity = 1;

    public function get_object_vars()
    {
        return get_object_vars($this);
    }


    /**
     * Get the value of idCollection
     */ 
    public function getIdCollection()
    {
        return $this->idCollection;
    }

    /**
     * Set the value of idCollection
     *
     * @return  self
     */ 
    public function setIdCollection($idCollection)
    {
        $this->idCollection = $idCollection;

        return $this;
    }

    /**
     * Get the value of idEspece
     */ 
    public function getIdEspece()
    {
        return $this->idEspece;
    }

    /**
     * Set the value of idEspece
     *
     * @return  self
     */ 
    public function setIdEspece($idEspece)
    {
        $this->idEspece = $idEspece;

        return $this;
    }
}