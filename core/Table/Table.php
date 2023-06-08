<?php

namespace Core\Table;

use Core\Database\MysqlDatabase;

abstract class Table
{
    protected string $table;
    protected ?MysqlDatabase $db = null;

    public function __construct(MysqlDatabase $db)
    {
        $this->db = $db;
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->table);
    }

    public function query(string $statement, array $attributes = null, bool $one = false)
    {
        if ($attributes) {
            return $this->db->prepare(
                $statement,
                $attributes,
                \str_replace('Table', 'Entity', \get_class($this)),
                $one);
        } else {
            return $this->db->query(
                $statement,
                \str_replace('Table', 'Entity', \get_class($this)),
                $one);
        }
    }

}