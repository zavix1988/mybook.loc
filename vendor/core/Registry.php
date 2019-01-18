<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 07.01.2019
 * Time: 1:22
 */

namespace vendor\core;


/**
 * Class Registry
 * Регистрация пользовательских классов
 * @package vendor\core
 */
class Registry
{
    use TSingleton;

    /**
     * @var array
     */
    public static $objects = [];

/*    protected static $instance;*/

    /**
     * Registry constructor.
     */
    protected function __construct()
    {
        $config = require_once ROOT . '/config/config.php';

        foreach($config['components'] as $name =>$component )
        {
            self::$objects[$name] = new $component;
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (is_object(self::$objects[$name])){
            return self::$objects[$name];
        }
    }


    /**
     * @param $name
     * @param $object
     */
    public function __set($name, $object)
    {
        // TODO: Implement __set() method.
        if(!isset(self::$objects[$name])){
            self::$objects[$name] = new $object;
        }
    }

    /**
     * Возвращает зарегистрирование классы
     */
    public function getList()
    {
        echo '<pre>';
        var_dump(self::$objects);
        echo '</pre>';
    }
}
