<?php

namespace app\controllers;
use app\models\Authors;
use app\models\Books;
use app\models\Genres;
use vendor\core\base\View;
use vendor\libs\Mailer;


class MainController extends AppController
{
    public $books;
    public $authors;
    public $genres;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->books = new Books();
        $this->genres = new Genres();
        $this->authors = new Authors();
        $this->mailer = new Mailer();
    }

    public function indexAction()
    {
        View::setMeta('Главная', 'bookcat', 'books, книги');

        $books = $this->books->findAll();
        foreach ($books as $book){
            $book['bookGenres'] = $this->genres->findByBookId($book['id']);
            $book['bookAuthors'] = $this->authors->findByBookId($book['id']);
            $newBooks[] = $book;
        }
        $this->set(compact('newBooks', 'genres', 'bookGenres', 'authors', 'bookAuthors'));
    }

    public function sortAction()
    {

    }

    public function bookAction()
    {
        if(!empty($this->route['alias'])){
            $book = $this->books->findOne($this->route['alias'], 'slug');
            $bookGenres = $this->genres->findByBookId($book[0]['id']);
            $bookAuthors = $this->authors->findByBookId($book[0]['id']);

            $this->set(compact('book', 'bookGenres', 'bookAuthors'));
            View::setMeta($book[0]['name'], 'bookcat', 'books, книги');
        }
    }

    public function sendMailAction()
    {
        if (!empty($_POST)){
            var_dump($_POST);
        }die;
        //$this->mailer->sendMail('zavix@mksat.net', 'hz', ['name' => 'Alex', 'address' => 'zavi@mksat.net', 'bookName' => 'book', 'bookCount' => 13]);
    }




}