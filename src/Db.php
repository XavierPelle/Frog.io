<?php

namespace Formation\Cours;

use PDOException;
use PDO;

class Db extends PDO
{

    private static $instance = null;
    private static string $dsn = "mysql:dbname=frogio;host=localhost";
    private static string $user = "root";
    private static string $pwd = "root";

    private function __construct()
    {
        try {
            return parent::__construct(self::$dsn, self::$user, self::$pwd);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Db();
        }
        return self::$instance;
    }

    public function getAll($objet)
    {
        $space = get_class($objet);
        $table = $this->getTableName($space);
        $query = "select * from " . $table;
        $results = $this->query($query);
        return $results->fetchAll(PDO::FETCH_CLASS, $space);
        //return $results->fetchAll();
    }

    public function getById($id, $objet)
    {
        $space = get_class($objet);
        $table = $this->getTableName($space);
        $query = "select * from " . $table . " where id=$id";
        $results = $this->query($query);
        $return = $results->fetchAll(PDO::FETCH_CLASS, $space);
        if (count($return) === 0) {
            return NULL;
        }
        return $return[0];
    }

    public function getByAttribute($name, $value, $objet)
    {
        $space = get_class($objet);
        $table = $this->getTableName($space);
        $query = "select * from " . $table . " where $name='$value'";
        $results = $this->query($query);
        return $results->fetchAll(PDO::FETCH_CLASS, $space);
    }

    public function execute($query)
    {
        $results = $this->query($query);
        return $results->fetchAll(PDO::FETCH_CLASS);
    }

    public function update($objet)
    {
        $space = get_class($objet);
        $table = $this->getTableName($space);
        $attributes = $objet->get_object_vars();
        $sql = "update " . $table . " set ";
        $count = count($attributes) - 1;
        $i = 0;
        foreach ($attributes as $attribute => $value) {
            if ($attribute === 'id') {
                $i++;
                continue;
            }
            $sql .= $attribute . '="' . $value . '"';
            if ($i < $count) {
                $sql .= ',';
            }
            $i++;
        }
        $sql .= ' where id=' . $attributes['id'];
        // echo $sql;
        $query = $this->query($sql);
        $query->execute();
    }

    public function deleteById($objet)
    {
        $space = get_class($objet);
        $table = $this->getTableName($space);
        $sql = 'delete from ' . $table . ' where id=' . $objet->id;
        $query = $this->query($sql);
        $query->execute();
    }


    public function save($objet)
    {
        $space = get_class($objet);
        $table = $this->getTableName($space);
        $sql = 'insert into ' . $table;
        $attributes = $objet->get_object_vars();
        $col = '(';
        $val = '(';
        $count = count($attributes) - 1;
        $i = 0;
        foreach ($attributes as $attribute => $value) {
            if ($attribute === 'id') {
                $i++;
                continue;
            }
            $col .= $attribute;
            $val .= "'" . $value . "'";
            if ($i < $count) {
                $col .= ',';
                $val .= ',';
            }
            $i++;
        }
        $sql .= " " . $col . ') values ' . $val . ')';
        if ($this->query($sql)) {
            return 'bien enregistré';
        } else {
            return 'un problème est survenu';
        }
    }

    private function getTableName($espace)
    {
        $tab = explode('\\', $espace);
        $count = count($tab) - 1;
        return $tab[$count];
    }
}
