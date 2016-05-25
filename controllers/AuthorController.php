<?php
/**
 * File: AuthorController.php
 * User: Dylan Schirino
 * Date: 25/05/16
 * Time: 14:49
 */
namespace Controller;

use Models\Authors;

class AuthorController{

    private $authors_model = null;

    // On lie author_model à Author
    public function __construct()
    {
        $this->authors_model = new Authors();
    }
    // On crée la fonction index
    function index(){
        $authors = $this->authors_model->all();
        $page_title='BiblioTECH - Auteurs';
        $view = 'index_authors.php';
        return ['author' => $authors, 'page_title' => $page_title, 'view' => $view,];
    }
    function show()
    {
        if (!isset($_GET['id'])) {
            die('Il manque l’identifiant de votre Auteurs');
        }
        $id = intval($_GET['id']);
        $authors = $this->authors_model->find($id);
        $books = null;
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