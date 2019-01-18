<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 28.12.2018
 * Time: 6:52
 */

namespace vendor\core\base;


/**
 * Class View
 * Базовый вид
 * @package vendor\core\base
 */
class View
{
    /**
     * Текущий маршрут и параметры
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
     * массив скриптов
     * @var array
     */
    public $scripts = [];

    /**
     * массив метаданных
     * @var array
     */
    public static $meta = [
        'title' => '',
        'desc' => '',
        'keywords' => ''
    ];

    /**
     * View constructor.
     * @param $route
     * @param string $layout
     * @param string $view
     */
    public function __construct($route, $layout = '', $view='')
    {
        $this->route = $route;
        if ($layout === false){
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }


    /**
     * Рендер вида
     *
     * @param $data
     * @throws \Exception
     */
    public function render($data)
    {
        if(is_array($data))extract($data);
        $this->route['prefix'] = str_replace('\\', '/', $this->route['prefix']);
        $fileView = APP . "/views/{$this->route['prefix']}{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($fileView)){
            require $fileView;
        } else {
            //echo "<p>Не найден вид <b>$fileView</b></p>";
            throw new \Exception("<p>Не найден вид <b>{$fileView}</b></p>", 404);
        }
        $content = ob_get_clean();

        if (false !== $this->layout){
            $fileLayout = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($fileLayout)){
                $content = $this->getScript($content);
                if (!empty($this->scripts)){
                    $scripts = $this->scripts[0];
                }
                require $fileLayout;
            } else {
                echo "<p>Не найден шаблон <b>$fileLayout</b></p>";
            }
        }

    }

    /**
     * Переносит пользователькие скрипты в конец вида
     * @param $content
     * @return string|string[]|null
     */
    protected function getScript($content)
    {
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern, $content, $this->scripts);
        if(!empty($this->scripts)){
            $content = preg_replace($pattern, '', $content);
        }
        return $content;
    }

    /**
     * Вывод метаданных
     */
    public static function getMeta()
    {
        echo '<title>' . self::$meta['title']. '</title>
        <meta name="description" content="'. self::$meta['desc']. '">
        <meta name="keywords" content="' . self::$meta['keywords'] . '">';
    }

    /**
     * Заполнение массива метаданных
     *
     * @param string $title
     * @param string $desc
     * @param string $keywords
     */
    public static function setMeta($title = '', $desc = '', $keywords = '')
    {
        self::$meta['title'] = $title;
        self::$meta['desc'] = $desc;
        self::$meta['keywords'] = $keywords;
    }
}