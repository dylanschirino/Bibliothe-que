<?php
/**
 * File: BookController.php
 * User: Dylan Schirino
 * Date: 25/05/16
 * Time: 15:33
 */

namespace Controller;

use Model\Book;

class BooksController
{
    private $books_model = null;

    public function __construct()
    {
        $this->books_model = new Book();
    }
    public function index(){
        $book=$this->$books_model->all();
        $page_title='BiblioTECH - Livres';
        $view='index_books.php';
        return ['book'=>$book,'view'=>$view,'page_title'=>$page_title];
    }
}