<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 12.01.2019
 * Time: 13:08
 */

namespace app\models;

use vendor\core\base\Model;


class Authors extends Model
{
    public $table = 'authors';


    public function findByBookId($id)
    {
        $sql = "SELECT * FROM book_author LEFT JOIN {$this->table} ON book_author.author_id={$this->table}.id WHERE book_id = ?";
        return $this->pdo->query($sql,[$id]);
    }

    public function add($author)
    {
        $slug = translit($author);

        $sql = "INSERT INTO {$this->table} (name, slug) VALUES (?, ?)";
        return $this->pdo->execute($sql,[$author, $slug]);
    }

    public function remove($authorId){
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        if($this->pdo->execute($sql, [$authorId])){
            $sql = "DELETE FROM book_author WHERE author_id = ?";
            return $this->pdo->execute($sql, [$authorId]);
        }
        return false;
    }

    public function update($authorId, $author)
    {
        $slug = translit($author);

        $sql = "UPDATE {$this->table} SET name = ?, slug = ?  WHERE id = ?";
        return $this->pdo->execute($sql, [$author, $slug, $authorId]);
    }

}