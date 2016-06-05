<?php
/**
 * File: AuthorBook.php
 * User: Dylan Schirino
 * Date: 5/06/16
 * Time: 22:17
 */
namespace Models;
class AuthorBook extends Model{

    protected $table = 'author_book';

    public function insertAuthorBook(){
        $sFieldsJokers = implode(', :', array_keys($fields));
        $sql=sprintf('INSERT INTO author_book (book_id,author_id) VALUES (:%s)', $sFieldsJokers);
        $pdoSt = $this->cn->prepare($sql);
        return $pdoSt->execute();
    }
}
