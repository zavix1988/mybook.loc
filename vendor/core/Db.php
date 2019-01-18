<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 28.12.2018
 * Time: 13:40
 */

namespace vendor\core;

/**
 * Class Db
 * @package vendor\core
 */
class Db
{
    use TSingleton;

    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * счетчик запросов
     *
     * @var int
     */
    public static $countSql = 0;

    /**
     * массив заприсов
     * @var array
     */
    public static $queries = [];

    /**
     * Db constructor.
     */
    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';
                $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
    }

    /**
     * Отправляет запрос к базе
     *
     * @param $sql
     * @param array $params
     * @return bool
     */
    public function execute($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }


    /**
     * Возвращает массив данных по заданному запросу
     *
     * @param $sql
     * @param array $params
     * @return array
     */
    public function query($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        $res =  $stmt->execute($params);
        if ($res !== false){
            return $stmt->fetchAll();
        }
        return [];
    }

    /**
     * Обертка над lastInsertId()
     *
     * @return string
     */
    public function lastInsertId()
    {
     return $this->pdo->lastInsertId();
    }
}