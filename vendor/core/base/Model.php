<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 28.12.2018
 * Time: 13:40
 */

namespace vendor\core\base;
use vendor\core\Db;

class Model
{
    protected $pdo;
    protected $table;
    protected $privateKey = 'id';


    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    public function findAll($column = 'name', $orderBy = 'ASC')
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$column} {$orderBy}";
        return $this->pdo->query($sql);
    }

    public function findOne($id, $field = [])
    {
        $field = $field ?: $this->privateKey;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }

    public function findBySql($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }

    public function findLike($str, $field, $table = "")
    {
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM $table WHERE $field LIKE ?";
        return $this->pdo->query($sql, ['%'.$str.'%']);
    }
}