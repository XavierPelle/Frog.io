<?php

namespace Formation\Cours;

class Model
{

    public function __construct($id = NULL)
    {
        if (!is_null($id)) {
            $objet = $this->getById($id);
            if (!is_null($objet)) {
                $vars = $objet->get_object_vars();
                foreach ($vars as $attribute => $value) {
                    $this->$attribute = $value;
                }
            }
        }
    }

    public function __get($attribute)
    {
        return call_user_func(array($this, 'get' . ucfirst($attribute)));
    }

    public function __set($attribute, $value)
    {
        return call_user_func(array($this, 'set' . ucfirst($attribute)), $value);
    }
    public function getAll()
    {
        return Db::getInstance()->getAll($this);
    }

    public function getById($id)
    {
        return Db::getInstance()->getById($id, $this);
    }

    public function getByAttribute($name, $value)
    {
        return Db::getInstance()->getByAttribute($name, $value, $this);
    }

    public static function execute($sql)
    {
        return Db::getInstance()->execute($sql);
    }

    public function update()
    {
        Db::getInstance()->update($this);
    }

    public function save()
    {
        Db::getInstance()->save($this);
    }

    public function delete()
    {
        Db::getInstance()->deleteById($this);
    }
}
