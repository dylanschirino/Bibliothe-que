<?php
/**
 * File: AuthorController.php
 * User: Dylan Schirino
 * Date: 25/05/16
 * Time: 14:49
 */
namespace Controllers;
use Models\Authors;
use Models\Book;
use Models\Editor;

class AuthorController {

    private $authors_model = null;

    // On lie author_model à Author
    public function __construct()
    {
        $this->authors_model = new Authors();
    }
    // On crée la fonction index
    public function index(){
        $authors = $this->authors_model->all();
        $page_title='BiblioTECH - Auteurs';
        $view = 'index_authors.php';
        return ['author' => $authors, 'page_title' => $page_title, 'view' => $view];
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
                $books_model = new Book();
                $books = $books_model->getBooksByAuthorId($authors->id);
            }
        }
        $editors = null;
        if (isset($_GET['with'])) {  //on regarde si la clé with existe si oui on explose sont contenu
            $with = explode(',', $_GET['with']);
            if (in_array('editors', $with)) { //on verifie si le mots editors est dans le tableau
                $editors_model = new Editor(); // on crée un nouveau model des editeurs
                $editors = $editors_model->getEditorsByAuthorId($authors->id);
            }
        }
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
    public function getAuthor(){
        return['view'=>'registerauthor.php','ressource_title'=>'register new Author'];

    }
    public function postAuthor(){
        if ($this->authors_model->save([
            'name' => $_POST['name'],
            'description' => $_POST['descriptionEd'],
            'picture' => $_POST['picture']
        ])
        ) {
            return ['view' => '?a=index&r=editor.php', 'ressource_title' => 'Liste des éditeurs'];
        }
    }

}