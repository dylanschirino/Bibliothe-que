<?php
/**
 * File: Book.php
 * User: Dylan Schirino
 * Date: 25/05/16
 * Time: 15:35
 */
namespace Models;
class Book extends Model
{
    protected $table = 'book';
    public function getBooksByEditorId($id){
        $sql = 'SELECT book.* FROM book JOIN editor ON (editor.id=editor_id) WHERE editor.id=:id
        ';
        $pdoSt = $this->connection->prepare($sql);
        $pdoSt->execute(['id'=>$id]);
        return $pdoSt->fetchAll();
    }
    public function getBooksByAuthorId($id)
    {
        $sql ='SELECT book.* FROM book JOIN author_book on book.id=author_book.book_id JOIN author ON author_book.author_id=author.id WHERE author.id = :id';
        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);
        return $pdoSt->fetchAll();
    }
}