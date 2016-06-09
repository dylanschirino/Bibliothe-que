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
        $page = 1;
        if(isset($_GET['page'])) {
            $page = intval($_GET['page']);
        }
        $books = $this->books_model->all($page);
        $nbpage = $this->books_model->getNbPages()->nbpage;
        $nbPages = intval($nbpage / 4);
        $page_title='BiblioTECH - Livres';
        $view = 'index_books.php';
        return ['books' => $books, 'ressource_title' => $page_title, 'view' => $view,'page'=>$page,'nbPages'=>$nbPages];
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
        $page_title = 'La fiche de ' . $books->title;
        $view = 'show_books.php';
        return [
            'authors' => $authors,
            'books' => $books,
            'editors' => $editors,
            'ressource_title' => $page_title,
            'view' => $view,
        ];
    }
    public function getBook(){
        $page=0;
        $editors = null;
        $this->editor_model = new Editor();
        $authors = null;
        $this->author_model = new Authors();
        $editors = $this->editor_model->all($page);
        return['view'=>'registerbook.php','ressource_title'=>'register new Book','editors'=>$editors];
    }
    public function postBook(){
        if ($this->books_model->save([
            'title' => $_POST['title'],
            'num_page' => $_POST['num_page'],
            'summary' => $_POST['summary'],
            'cover'=>$_POST['cover'],
            'rating'=>$_POST['rating'],
            'editor_id'=>$_POST['editorID']
        ])
        ) {
            return ['view' => '?a=index&r=book.php', 'ressource_title' => 'Liste des livres'];
        }
    }
    public function getAuthorBook(){
        $page=0;
        $authors = null;
        $this->author_model = new Authors();
        $book = null;
        $this->books_model= new Book();
        $book= $this->books_model->all($page);
        $authors = $this->author_model->all($page);
        $this->authorbook_model = new AuthorBook();
        $authorbook = $this->authorbook_model->all($page);
        return['view'=>'registerauthorbook.php','ressource_title'=>'Link author and book','authorbook'=>$authorbook,'authors'=>$authors,'books'=>$book];
    }
    public function postAuthorBook()
    {
        $this->authorbook_model = new AuthorBook();
        $this->authorbook_model->insertAuthorBook(['book_id'=>$_POST['bookID'],'author_id'=>$_POST['auteurID']]);
        return ['view' => '?a=index&r=book.php', 'ressource_title' => 'Liste des livres'];
    }
    public function deleteBook()
    {
        $this->books_model->delete($_GET['id']);
        return['view'=>'deleteBook.php','ressource_title'=>'Livre supprimé'];
    }
}