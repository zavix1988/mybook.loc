<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 12.01.2019
 * Time: 13:08
 */

namespace app\models;

use vendor\core\base\Model;

/**
 * Class Genres
 * Модель жанров
 * @package app\models
 */
class Genres extends Model
{
    /**
     * Базовая таблица
     * @var string
     */
    public $table = 'genres';


    /**
     * Возвращает массив жанров по заданному book_id
     *
     * @param $id
     * @return mixed
     */
    public function findByBookId($id)
    {
        $sql = "SELECT * FROM book_genre LEFT JOIN {$this->table} ON book_genre.genre_id={$this->table}.id WHERE book_id = ?";
        return $this->pdo->query($sql, [$id]);
    }

    /**
     * Создает жанр
     *
     * @param $genre
     * @return mixed
     */
    public function create($genre)
    {
        $slug = translit($genre);
        $sql = "INSERT INTO {$this->table} (name, slug) VALUES (?, ?)";
        return $this->pdo->execute($sql,[$genre, $slug]);
    }

    /**
     * Редактирует жанр по заданному book_id
     *
     * @param $genreId
     * @param $genre
     * @return mixed
     */
    public function update($genreId, $genre)
    {
        $slug = translit($genre);

        $sql = "UPDATE {$this->table} SET name = ?, slug = ? WHERE id = ?";
        return $this->pdo->execute($sql, [$genre, $slug, $genreId]);
    }

    /**
     * Удаляет жанр по заданному book_id
     *
     * @param $genreId
     * @return bool
     */
    public function delete($genreId){
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        if($this->pdo->execute($sql, [$genreId])){
            $sql = "DELETE FROM book_genre WHERE genre_id = ?";
            return $this->pdo->execute($sql, [$genreId]);
        }
        return false;
    }
}