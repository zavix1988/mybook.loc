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
    protected $dbDriver;

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
     *     'dsn' => 'mysql:host=localhost;dbname=books.loc;charset=utf8',

     * Db constructor.
     */
    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';
        if(DB_DRIVER == 'pdo'){
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ];
            $this->dbDriver = new \PDO("{$db['db_type']}:host={$db['host']};dbname={$db['dbname']};charset={$db['charset']}", $db['user'], $db['pass'], $options);
        } else {
            $this->dbDriver = new \mysqli($db['host'], $db['user'], $db['pass'], $db['dbname']);
        }
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
        if (DB_DRIVER == 'pdo') {
            $stmt = $this->dbDriver->prepare($sql);
            return $stmt->execute($params);
        } else {
            foreach ($params as $param){
                $param = $this->dbDriver->real_escape_string($param);
                $sql = substr_replace($sql, "'".$param."'", strpos($sql, '?'), 1);
            }
            return $this->dbDriver->query($sql);
        }
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
        if(DB_DRIVER == 'pdo'){
            $stmt = $this->dbDriver->prepare($sql);
            $res =  $stmt->execute($params);
            if ($res !== false){
                return $stmt->fetchAll();
            }
        } else {
            $result = [];
            foreach ($params as $param){
                $param = $this->dbDriver->real_escape_string($param);
                $sql = substr_replace($sql, "'".$param."'", strpos($sql, '?'), 1);
            }
            $res = $this->dbDriver->query($sql);
            if ($res !== false){
                while($row = $res->fetch_assoc()){
                    $result[] = $row;
                }
            }
            return $result;
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
        if(DB_DRIVER == 'pdo'){
            return $this->dbDriver->lastInsertId();
        } else {
            return $this->dbDriver->insert_id;
        }
    }
}