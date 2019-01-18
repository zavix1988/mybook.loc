<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 07.01.2019
 * Time: 1:29
 */

namespace vendor\core;

use vendor\core\Registry;
use vendor\core\ErrorHandler;


class App
{
    public static $app;

    public function __construct()
    {
        session_start();
        self::$app = Registry::instance();
        new ErrorHandler();
    }
}