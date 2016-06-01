<?php
/**
 * File: Authors.php
 * User: Dylan Schirino
 * Date: 25/05/16
 * Time: 14:32
 */
namespace Models;
class Authors extends Model{

    protected $table = 'author';

    public function getAuthorsByBookId($id){
        $sql='SELECT author.* FROM author JOIN author_book ON author.id = author_book.author_id JOIN book ON    author_book.book_id=book.id WHERE book.id= :id';
        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);
        return $pdoSt->fetchAll();
    }

    public function getAuthorsByEditorId($id){
        $sql = ' SELECT DISTINCT author.* FROM author JOIN author_book ON author.id=author_book.author_id JOIN book ON
book.id=book_id JOIN editor ON book.editor_id=editor.id WHERE editor.id = :id';
        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute(['id'=>$id]);
        return $pdoSt->fetchAll();
    }

}