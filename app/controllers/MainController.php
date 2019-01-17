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

    public function indexAction($title = 'Главная')
    {
        View::setMeta($title, 'bookcat', 'books, книги');

        $books = $this->books->findAll();
        $genres = $this->genres->findAll();
        $authors = $this->authors->findAll();
        foreach ($books as $book){
            $book['bookGenres'] = $this->genres->findByBookId($book['id']);
            $book['bookAuthors'] = $this->authors->findByBookId($book['id']);
            $newBooks[] = $book;
        }
        $this->set(compact('newBooks', 'genres', 'authors'));
    }

    public function filterAction()
    {
        $this->view = 'index';

        $genres = $this->genres->findAll();
        $authors = $this->authors->findAll();

        $formAuthor = (int)$_GET['author']*1;
        $formGenre = (int)$_GET['genre']*1;
        if ($formAuthor <= 0 && $formGenre <= 0){
            $this->indexAction('Фильтр');
        }else{
            $booksByAuthor = $this->books->findByAuthorId($formAuthor);
            $booksByGenre = $this->books->findByGenreId($formGenre);
            foreach ($booksByAuthor as $book){
                $book['bookGenres'] = $this->genres->findByBookId($book['book_id']);
                $book['bookAuthors'] = $this->authors->findByBookId($book['book_id']);
                $newBooks[] = $book;
            }
            foreach ($booksByGenre as $book){
                $book['bookGenres'] = $this->genres->findByBookId($book['book_id']);
                $book['bookAuthors'] = $this->authors->findByBookId($book['book_id']);
                $newBooks[] = $book;
            }
            $this->set(compact('newBooks', 'genres', 'authors'));
        }

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
        if($this->isAjax()){
            if (!empty($_POST)){
                $name = form_check($_POST['name']);
                $address = form_check($_POST['address']);
                $bookName = form_check($_POST['book']);
                $bookCount = form_check($_POST['count']);
                $this->mailer->sendMail('zavix@mksat.net', 'Новый заказ', compact('name', 'address', 'bookName', 'bookCount'));
            }
        }die;
    }
}