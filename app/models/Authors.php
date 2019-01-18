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
 * Class Authors
 * Модель Авторов
 * @package app\models
 */
class Authors extends Model
{
    /**
     * Базовая таблица
     * @var string
     */
    public $table = 'authors';


    /**
     * Возвращает массив авторов по заданному book_id
     *
     * @param $id
     * @return mixed
     */
    public function findByBookId($id)
    {
        $sql = "SELECT * FROM book_author LEFT JOIN {$this->table} ON book_author.author_id={$this->table}.id WHERE book_id = ?";
        return $this->pdo->query($sql,[$id]);
    }

    /**
     * Добавляет автора в таблицу
     *
     * @param $author
     * @return mixed
     */
    public function create($author)
    {
        $slug = translit($author);

        $sql = "INSERT INTO {$this->table} (name, slug) VALUES (?, ?)";
        return $this->pdo->execute($sql,[$author, $slug]);
    }

    /**
     * Редактирует автора по заданному book_id
     *
     * @param $authorId
     * @param $author
     * @return mixed
     */
    public function update($authorId, $author)
    {
        $slug = translit($author);

        $sql = "UPDATE {$this->table} SET name = ?, slug = ?  WHERE id = ?";
        return $this->pdo->execute($sql, [$author, $slug, $authorId]);
    }

    /**
     * Удаляет автора по заданному book_id
     *
     * @param $authorId
     * @return bool
     */
    public function delete($authorId){
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        if($this->pdo->execute($sql, [$authorId])){
            $sql = "DELETE FROM book_author WHERE author_id = ?";
            return $this->pdo->execute($sql, [$authorId]);
        }
        return false;
    }

}