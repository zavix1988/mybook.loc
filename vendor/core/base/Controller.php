<?php

namespace vendor\core\base;


/**
 * Class Controller
 * Базовый класс контроллера
 * @package vendor\core\base
 */
abstract class Controller
{


    /**
     * Маршрут
     * @var array
     */
    public $route = [];

    /**
     * текущий вид
     * @var string
     */
    public $view;

    /**
     * текущий шаблон
     * @var string
     */
    public $layout;

    /**
     * данные передаваемые в вид
     * @var array
     */
    public $data = [];


    /**
     * Controller constructor.
     * @param $route
     */
    public function __construct($route)
	{
		$this->route = $route;
		$this->view = $route['action'];
	}

    /**
     *
     * @throws \Exception
     */
    public function getView()
    {
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->data);
    }

    /**
     * Отправка данных в вид
     * @param $data
     */
    public function set($data)
    {
        $this->data = $data;
    }

    /**
     * Проверка присутствия AJAX запроса
     * @return bool
     */
    public function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    /**
     * Метод подключения вида
     * @param $view
     * @param array $vars
     */
    public function loadView($view, $vars = [])
    {
        extract($vars);
        require APP . "/views/{$this->route['controller']}/{$view}.php";
    }
}