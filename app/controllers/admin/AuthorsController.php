<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 12.01.2019
 * Time: 12:38
 */

namespace app\controllers\admin;

use vendor\core\base\View;
use app\models\Authors;

class AuthorsController extends AppController
{
    public $model;


    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Authors();
        View::setMeta('Авторы', 'авторы', 'авторы, authors');
    }

    public function indexAction()
    {
        $authors = $this->model->findAll();
        $this->set(compact(['authors']));
    }

    public function addAction()
    {
        if (!empty($_POST)){
            $this->model->add(form_check($_POST['name']));
            redirect('/admin/authors/');
        }
    }

    public function editAction()
    {
        if(!empty($_GET['id'])){
            $author = $this->model->findOne(form_check($_GET['id']));
            $this->set(compact('author'));
        }
        if (!empty($_POST)){
            $this->model->update(form_check($_POST['id']), form_check($_POST['name']));
            redirect('/admin/authors');
        }
    }

    public function deleteAction()
    {
        if (!empty($_GET['id'])){
            $authorId = form_check($_GET['id']);
            $this->model->remove($authorId);
        }
        redirect('/admin/authors');
    }
}