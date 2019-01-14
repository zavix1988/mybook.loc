<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 12.01.2019
 * Time: 12:37
 */

namespace app\controllers\admin;

use vendor\core\base\View;
use app\models\Genres;

class GenresController extends AppController
{
    public $model;


    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Genres();
        View::setMeta('Жанры', 'жанры', 'жанры, genres');
    }

    public function indexAction()
    {
        $genres = $this->model->findAll();
        $this->set(compact(['genres']));
    }

    public function addAction()
    {
        if (!empty($_POST)){
            $this->model->add(form_check($_POST['name']));
            redirect('/admin/genres/');
        }
    }

    public function editAction()
    {
        if(!empty($_GET['id'])){
            $genre = $this->model->findOne(form_check($_GET['id']));
            $this->set(compact('genre'));
        }
        if (!empty($_POST)){
            $this->model->update(form_check($_POST['id']), form_check($_POST['name']));
            redirect('/admin/genres');
        }
    }

    public function deleteAction()
    {
        if (!empty($_GET['id'])){
            $genreId = form_check($_GET['id']);
            $this->model->remove($genreId);
        }
        redirect('/admin/genres');
    }
}