<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 12.01.2019
 * Time: 12:37
 */

namespace app\controllers\admin;

use app\models\Authors;
use app\models\Genres;
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
        $authors = new Authors();
        $authors = $authors->findAll();
        $genres = new Genres();
        $genres = $genres->findAll();
        $this->set(compact(['authors', 'genres']));
        if(!empty($_POST)){
            $this->model->create(
                form_check($_POST['name']),
                form_check($_POST['price']),
                form_check($_POST['pubyear']),
                form_check($_POST['lang']),
                form_check($_POST['description']),
                $_POST['authors'],
                $_POST['genres']);
            redirect('/admin/books');
        }
        unset($authors, $genres);
    }

    public function editAction()
    {
        $authors = new Authors();
        $genres = new Genres();
        if(!empty($_GET['id'])){
            $book = $this->model->findOne(($_GET['id']*1));
            $bookGenres = $genres->findByBookId(($_GET['id']*1));
            $genres = $genres->findAll();
            $bookAuthors = $authors->findByBookId(($_GET['id']*1));
            $authors = $authors->findAll();

            $this->set(compact('book', 'genres', 'bookGenres', 'authors', 'bookAuthors'));
        }
        if (!empty($_POST)){
            $this->model->update(
                ($_POST['id']*1),
                form_check($_POST['name']),
                ($_POST['price']*1),
                ($_POST['pubyear']*1),
                form_check($_POST['lang']),
                form_check($_POST['description']),
                $_POST['authors'],
                $_POST['genres']);
            redirect('/admin/books');
        }
    }

    public function deleteAction()
    {

        if (!empty($_GET['id']))
        {
            $bookId = form_check($_GET['id']);
            $this->model->delete($bookId);
        }
        redirect('/admin/books');
    }
}