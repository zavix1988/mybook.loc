<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 09.01.19
 * Time: 14:31
 */

namespace vendor\core;


/**
 * Class ErrorHandler
 * Обработчик ошибок
 * @package vendor\core
 */
class ErrorHandler
{
    /**
     * ErrorHandler constructor.
     */
    public function __construct()
    {
        if (DEBUG) error_reporting(-1);
        else error_reporting(0);
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    /**
     * Отлавливает ошибки кроме fatal error
     *
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     * @return bool
     */
    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        $this->logErrors($errstr, $errfile, $errline);
        if (DEBUG || in_array($errno, [E_USER_ERROR, E_RECOVERABLE_ERROR]))$this->displayError($errno, $errstr, $errfile, $errline);
        return true;
    }

    /**
     * Отлавливает fatal error
     */
    public function fatalErrorHandler()
    {
        $error = error_get_last();
        if (!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)){
            $this->logErrors($error['message'], $error['file'], $error['line']);
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }

    /**
     * Отлавливает исключения
     * @param $e
     */
    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    /**
     * Подключает страницу ошибки
     *
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     * @param int $response
     */
    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500)
    {
        http_response_code($response);
        if ($response == 404 && !DEBUG){
            require WWW. '/errors/404.html';
            die;
        }
        if(DEBUG){
            require WWW. '/errors/dev.php';
        }else{
            require WWW. '/errors/prod.php';
        }
    }

    /**
     * Логирование ошибок
     *
     * @param string $message
     * @param string $file
     * @param string $line
     */
    protected function logErrors($message = '', $file = '', $line = '')
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message}   |  Файл: {$file} | Строка: {$line}\n-------------\n", 3, ROOT . '/tmp/errors.log');
    }
}