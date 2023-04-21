<?php 

namespace Formation\Cours\Entity;
use Formation\Cours\Model;

class Collection extends Model {
    private ?int $id;
    private ?string $nomCollection;
    private ?int $especeEnValeur;
    private ?int $idUsers;

    public function get_object_vars()
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of nomCollection
     */ 
    public function getNomCollection()
    {
        return $this->nomCollection;
    }

    /**
     * Set the value of nomCollection
     *
     * @return  self
     */ 
    public function setNomCollection($nomCollection)
    {
        $this->nomCollection = $nomCollection;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getid()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setid($id)
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * Get the value of especeEnValeur
     */ 
    public function getespeceEnValeur()
    {
        return $this->especeEnValeur;
    }

    /**
     * Set the value of especeEnValeur
     *
     * @return  self
     */ 
    public function setespeceEnValeur($especeEnValeur)
    {
        $this->especeEnValeur = $especeEnValeur;

        return $this;
    }

    /**
     * Get the value of idUsers
     */ 
    public function getIdUsers()
    {
        return $this->idUsers;
    }

    /**
     * Set the value of idUsers
     *
     * @return  self
     */ 
    public function setIdUsers($idUsers)
    {
        $this->idUsers = (int)$idUsers;

        return $this;
    }
}