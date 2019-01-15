<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 12.01.2019
 * Time: 13:08
 */

namespace app\models;

use vendor\core\base\Model;



class Books extends Model
{
    public $table = 'books';


    public function add($name, $price, $pubyear, $lang, $description, $authors, $genres)
    {
        $slug = translit($name);

        $sql = "INSERT INTO {$this->table} (name, slug, price, pubyear, lang, description) VALUES (?, ?, ?, ?, ?, ?)";
        $res = $this->pdo->execute($sql, [$name, $slug, $price, $pubyear, $lang, $description]);

        $lastId = $this->pdo->lastInsertId();

        $sql = "INSERT INTO book_author (book_id, author_id) VALUES (?, ?)";
        foreach ($authors as $author){
            $res = $this->pdo->execute($sql, [$lastId, $author]);
        }

        $sql = "INSERT INTO book_genre (book_id, genre_id) VALUES (?, ?)";
        foreach ($genres as $genre) {
            $res =  $this->pdo->execute($sql, [$lastId, $genre]);
        }

        return $res;
    }

    public function edit($bookId, $name, $price, $pubyear, $lang, $description, $authors, $genres)
    {
        $slug = translit($name);

        $sql = "DELETE FROM book_author WHERE book_id = ? ";
        $res = $this->pdo->execute($sql, [$bookId]);

        $sql = "DELETE FROM book_genre WHERE book_id = ? ";
        $res = $this->pdo->execute($sql, [$bookId]);

        $sql = "UPDATE {$this->table} SET name = ?, slug = ?, price = ?, pubyear = ?, lang = ?, description  = ? WHERE id = ? ";
        $res = $this->pdo->execute($sql, [$name, $slug, $price, $pubyear, $lang, $description, $bookId]);


        $sql = "INSERT INTO book_author (book_id, author_id) VALUES (?, ?)";
        foreach ($authors as $author){
            $res = $this->pdo->execute($sql, [$bookId, $author]);
        }

        $sql = "INSERT INTO book_genre (book_id, genre_id) VALUES (?, ?)";
        foreach ($genres as $genre) {
            $res =  $this->pdo->execute($sql, [$bookId, $genre]);
        }

        return $res;
    }

    public function addAuthorsById($id, $authors)
    {
        foreach ($authors as $key => $author) {
            $sql = "INSERT INTO book_author (book_id, author_id) VALUES  (?, ?)";
            $res =  $this->pdo->execute($sql, [$id, $key]);
        }
        return $res;
    }

    public function removeAuthor($bookId, $authorId)
    {
        $sql = "DELETE FROM book_author WHERE book_id = ? AND author_id = ? LIMIT 1";
        return $this->pdo->execute($sql, [$bookId, $authorId]);
    }

    public function addGenresById($id, $genres)
    {
        $sql = "INSERT INTO book_genre (book_id, genre_id) VALUES (?, ?)";
        foreach ($genres as $key => $genre) {
            $res = $this->pdo->execute($sql, [$id, $key]);
        }
        return $res;
    }

    public function removeGenre($bookId, $genreId)
    {
        $sql = "DELETE FROM book_genre WHERE book_id = ? AND genre_id = ? LIMIT 1";
        return $this->pdo->execute($sql, [$bookId, $genreId]);
    }

    public function update($bookId, $name, $price, $pubyear, $lang, $description)
    {
        $sql = "UPDATE {$this->table} SET name = ?, price = ?, pubyear = ?, lang = ?, description  = ? WHERE id = ? ";
        return $this->pdo->execute($sql, [$name, $price, $pubyear, $lang, $description, $bookId]);
    }

    public function remove($bookId)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        if($this->pdo->execute($sql, [$bookId])){
            $sql = "DELETE FROM book_author WHERE book_id = ?";
            if($this->pdo->execute($sql, [$bookId])){
                $sql = "DELETE FROM book_genre WHERE book_id = ?";
                    return $this->pdo->execute($sql,[$bookId]);
            }else
                return false;
        }
        return false;
    }
}