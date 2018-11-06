<?php

namespace SON;

class Model
{
    private $pdo;
    protected $table;

    public function __construct(\PDO $pdo = null)
    {
        $this->pdo = $pdo;
    }

    public function all()
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $result = $this->getPdo()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get()
    {
        return [
            'nome' => 'Erik Figueiredo'
        ];
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function setTableName(string $table)
    {
        $this->table = $table;
    }

    public function getTableName()
    {
        return $this->table;
    }
}
