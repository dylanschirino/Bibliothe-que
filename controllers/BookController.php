<?php
/**
 * File: BookController.php
 * User: Dylan Schirino
 * Date: 30/05/16
 * Time: 21:21
 */


namespace Controllers;
use Models\Book;

class BookController {

    private $books_model = null;

    // On lie author_model à Author
    public function __construct()
    {
        $this->books_model = new Book();
    }
    // On crée la fonction index
    public function index(){
        $books = $this->books_model->all();
        $page_title='BiblioTECH - Auteurs';
        $view = 'index_books.php';
        return ['books' => $books, 'page_title' => $page_title, 'view' => $view,];
    }
    public function show()
    {
        if (!isset($_GET['id'])) {
            die('Il manque l’identifiant de votre Auteurs');
        }
        $id = intval($_GET['id']);
        $books = $this->books_model->find($id);
        if (isset($_GET['with'])) {
            $with = explode(',', $_GET['with']);
            if (in_array('books', $with)) {
                $books_model = new Books();
                $books = $books_model->getBooksByAuthorId($authors->id);
            }
        }
        $editors = null;
        $page_title = 'la fiche de ' . $authors->name;
        $view = 'show_authors.php';
        return [
            'authors' => $authors,
            'books' => $books,
            'editors' => $editors,
            'page_title' => $page_title,
            'view' => $view,
        ];
    }
}