<?php

namespace Formation\Cours\Entity;

use Formation\Cours\Model;

class Users extends Model
{

    private ?int $id;
    private ?string $mail;
    private ?string $pseudo;
    private ?string $pwd;

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

    public function getMail()
    {
        return $this->mail;
    }


    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }


    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getPwd()
    {
        return $this->pwd;
    }


    public function setPwd($pwd)
    {
        $this->pwd = password_hash($pwd, PASSWORD_DEFAULT);

        return $this;
    }
}
