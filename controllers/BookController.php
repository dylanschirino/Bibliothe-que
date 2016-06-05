<?php
/**
 * File: BookController.php
 * User: Dylan Schirino
 * Date: 30/05/16
 * Time: 21:21
 */


namespace Controllers;
use Models\AuthorBook;
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
        $page_title='BiblioTECH - Livres';
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
    public function getBook(){
        $editors = null;
        $this->editor_model = new Editor();
        $authors = null;
        $this->author_model = new Authors();
        $authorbook=null;
        $this->authorbook_model = new AuthorBook();
        $authorbook = $this->authorbook_model->all();
        $editors = $this->editor_model->all();
        $authors = $this->author_model->all();
        return['view'=>'registerbook.php','ressource_title'=>'register new Book','editors'=>$editors,'authors'=>$authors,'authorbook'=>$authorbook];
    }
    public function postBook(){
        if ($this->books_model->save([
            'title' => $_POST['title'],
            'num_page' => $_POST['num_page'],
            'summary' => $_POST['summary'],
            'cover'=>$_POST['cover'],
            'editor_id'=>$_POST['editorID']
        ])
        ) {
            return ['view' => '?a=index&r=author.php', 'ressource_title' => 'Liste des éditeurs'];
        }
    }
    public function deleteBook()
    {
        $this->books_model->delete($_GET['id']);
        return['view'=>'deleteBook.php'];
    }
}