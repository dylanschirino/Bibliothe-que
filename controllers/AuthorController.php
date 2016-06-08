<?php
/**
 * File: AuthorController.php
 * User: Dylan Schirino
 * Date: 25/05/16
 * Time: 14:49
 */
namespace Controllers;
use Models\AuthorBook;
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
        $page = 1;
        if(isset($_GET['page'])) {
            $page = intval($_GET['page']);
        }
        $nbpage = $this->authors_model->getNbPages()->nbpage;
        $nbPages = intval($nbpage / 4);
        $authors = $this->authors_model->all($page);
        $page_title='BiblioTECH - Auteurs';
        $view = 'index_authors.php';
        return ['author' => $authors, 'ressource_title' => $page_title, 'view' => $view,'page'=>$page,'nbPages'=>$nbPages];
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
        $page_title = 'La fiche de ' . $authors->name;
        $view = 'show_authors.php';
        return [
            'authors' => $authors,
            'books' => $books,
            'editors' => $editors,
            'ressource_title' => $page_title,
            'view' => $view,
        ];
    }
    public function getAuthor(){
        $page=0;
        $editors = null;
        $this->editor_model = new Editor();
        $editors = $this->editor_model->all($page);
        return['view'=>'registerauthor.php','ressource_title'=>'Enregister un Auteur','editors'=>$editors];
    }
    public function postAuthor(){
        if ($this->authors_model->save([
            'name' => $_POST['name'],
            'firstname' => $_POST['firstname'],
            'biographie' => $_POST['biographie'],
            'photo'=>$_POST['photo'],
            'aut_rating'=>$_POST['rating'],
            'editor_id'=>$_POST['editorID']
        ])
        ) {
            return ['view' => '?a=index&r=author.php', 'ressource_title' => 'Liste des auteurs'];
        }
    }
    public function updateAuthor(){
        $authors = $this->authors_model->find($_GET['id']);
        $this->editor_model->delete($_GET['id']);
        $this->editor_model->updateEditors($_GET['id'],$editors->society,$editors->description);
        return ['view'=>'updateEditor.php','editors'=>$editors];
    }
    public function deleteAuthor()
    {
        $this->authors_model->delete($_GET['id']);
        return['view'=>'deleteAuthors.php','ressource_title'=>'Auteur supprimé'];
    }
}