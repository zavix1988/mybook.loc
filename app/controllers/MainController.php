<?php

namespace app\controllers;
use app\models\Authors;
use app\models\Books;
use app\models\Genres;
use vendor\core\base\View;




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

    public function BookAction()
    {
        if(!empty($this->route['alias'])){
            $book = $this->books->findOne($this->route['alias'], 'slug');
            $bookGenres = $this->genres->findByBookId($book[0]['id']);
            $bookAuthors = $this->authors->findByBookId($book[0]['id']);

            $this->set(compact('book', 'bookGenres', 'bookAuthors'));
            View::setMeta($book[0]['name'], 'bookcat', 'books, книги');
        }

    }


}