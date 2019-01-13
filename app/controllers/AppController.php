<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 28.12.2018
 * Time: 7:18
 */

namespace app\controllers;
use vendor\core\base\Controller;


class AppController extends Controller
{
    public $menu;
    public $meta = [];



    public function __construct($route)
    {
        parent::__construct($route);
    }

    protected function setMeta($title = '', $desc = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }
}