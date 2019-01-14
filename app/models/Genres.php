<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 12.01.2019
 * Time: 13:08
 */

namespace app\models;

use vendor\core\base\Model;

class Genres extends Model
{
    public $table = 'genres';


     public function findByBookId($id)
    {
        $sql = "SELECT * FROM book_genre LEFT JOIN {$this->table} ON book_genre.genre_id={$this->table}.id WHERE book_id = ?";
        return $this->pdo->query($sql, $id);
    }

    public function add($genre)
    {
        $sql = "INSERT INTO {$this->table} (name) VALUES (?)";
        return $this->pdo->execute($sql,[$genre]);
    }

    public function remove($genreId){
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        if($this->pdo->execute($sql, [$genreId])){
            $sql = "DELETE FROM book_genre WHERE genre_id = ?";
            return $this->pdo->execute($sql, [$genreId]);
        }
        return false;
    }

    public function update($genreId, $genre)
    {
        $sql = "UPDATE {$this->table} SET name = ? WHERE id = ?";
        return $this->pdo->execute($sql, [$genre, $genreId]);
    }
}