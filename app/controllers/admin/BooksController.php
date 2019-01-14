<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 12.01.2019
 * Time: 12:37
 */

namespace app\controllers\admin;

use vendor\core\base\View;
use app\models\Books;

class BooksController extends AppController
{
    public $model;
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new Books();
        View::setMeta('Книги', 'книги', 'books');
    }

    public function indexAction()
    {
        $books = $this->model->findAll();
        $this->set(compact(['books']));
        unset($books);
    }

    public function addAction()
    {

    }

    public function editAction()
    {

    }

    public function deleteAction()
    {

        if (!empty($_GET['id']))
        {
            $bookId = form_check($_GET['id']);
            $this->model->remove($bookId);
        }
        redirect('/admin/books');
    }
}