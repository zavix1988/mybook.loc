<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 28.12.2018
 * Time: 13:40
 */

namespace vendor\core\base;
use vendor\core\Db;

/**
 * Class Model
 * Базовый класс модели
 * @package vendor\core\base
 */
class Model
{
    /**
     * Здесь зранится объект PDO
     * @var \vendor\core\TSingleton
     */
    protected $pdo;


    /**
     * Текущая таблица
     * @var
     */
    protected $table;


    /**
     * Базовая колонка
     * @var string
     */
    protected $privateKey = 'id';


    /**
     * Создает объект PDO
     *
     * Model constructor.
     */
    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    /**
     *
     * @param $sql
     * @return mixed
     */
    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    /**
     * @param string $column
     * @param string $orderBy
     * @return mixed
     */
    public function findAll($column = 'name', $orderBy = 'ASC')
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$column} {$orderBy}";
        return $this->pdo->query($sql);
    }

    /**
     * @param $id
     * @param array $field
     * @return mixed
     */
    public function findOne($id, $field = [])
    {
        $field = $field ?: $this->privateKey;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }

    /**
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public function findBySql($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }

    /**
     * @param $str
     * @param $field
     * @param string $table
     * @return mixed
     */
    public function findLike($str, $field, $table = "")
    {
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM $table WHERE $field LIKE ?";
        return $this->pdo->query($sql, ['%'.$str.'%']);
    }
}