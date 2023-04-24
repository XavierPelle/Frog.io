<?php

namespace Formation\Cours\Entity;

use Formation\Cours\Model;

class Famille extends Model
{
    private ?int $id;
    private ?string $nomFamille;

    public function get_object_vars()
    {
        return get_object_vars($this);
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
        $this->nomFamille = htmlspecialchars(addslashes($nomFamille));

        return $this;
    }
}
