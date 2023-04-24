<?php

namespace Formation\Cours\Entity;

use Formation\Cours\Model;

class Parents extends Model
{
    private ?int $idParent;
    private ?int $idEspece;

    public function get_object_vars()
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of idParent
     */
    public function getIdParent()
    {
        return $this->idParent;
    }

    /**
     * Set the value of idParent
     *
     * @return  self
     */
    public function setIdParent($idParent)
    {
        $this->idParent = $idParent;

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
