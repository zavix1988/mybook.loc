<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 12.01.2019
 * Time: 12:24
 */

namespace app\controllers\admin;


use vendor\core\base\View;

class UserController extends AppController
{
    /**
     * Отправка мета-тегов в вид
     */
    public function indexAction(){
        View::setMeta('Админка', 'админка', 'admin');
    }
}