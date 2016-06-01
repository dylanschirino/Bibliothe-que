<?php
/**
 * File: BookController.php
 * User: Dylan Schirino
 * Date: 30/05/16
 * Time: 21:21
 */


namespace Controllers;
use Models\Authors;
use Models\Book;
use Models\Editor;

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
        $authors = null;
        if (isset($_GET['with'])) {
            $with = explode(',', $_GET['with']);
            if (in_array('authors', $with)) {
                $authors_model = new Authors();
                $authors = $authors_model->getAuthorsByBookId($books->id);
            }
        }
        $editors = null;
        if (isset($_GET['with'])) {  //on regarde si la clé with existe si oui on explose sont contenu
            $with = explode(',', $_GET['with']);
            if (in_array('editors', $with)) { //on verifie si le mots editors est dans le tableau
                $editors_model = new Editor(); // on crée un nouveau model des editeurs
                $editors = $editors_model->getEditorsByBookId($books->id);
            }
        }
        $page_title = 'la fiche de ' . $books->title;
        $view = 'show_books.php';
        return [
            'authors' => $authors,
            'books' => $books,
            'editors' => $editors,
            'page_title' => $page_title,
            'view' => $view,
        ];
    }
}