<?php
/**
 * File: EditorController.php
 * User: Dylan Schirino
 * Date: 30/05/16
 * Time: 21:21
 */


namespace Controllers;
use Models\Authors;
use Models\Book;
use Models\Editor;

class EditorController
{

    private $editor_model = null;

    // On lie author_model à Author
    public function __construct()
    {
        $this->editor_model = new Editor();
    }

    // On crée la fonction index
    public function index()
    {
        $editors = $this->editor_model->all();
        $page_title = 'BiblioTECH - Editeurs';
        $view = 'index_editors.php';
        return ['editor' => $editors, 'page_title' => $page_title, 'view' => $view,];
    }

    function show()
    {
        if (!isset($_GET['id'])) {
            die('Il manque l’identifiant de votre Editeurs');
        }
        $id = intval($_GET['id']);
        $editors = $this->editor_model->find($id);
        $books = null;
        if (isset($_GET['with'])) {
            $with = explode(',', $_GET['with']);
            if (in_array('books', $with)) {
                $books_model = new Book();
                $books = $books_model->getBooksByEditorId($editors->id);
            }
        }
        $authors = null;
        if (isset($_GET['with'])){  //on regarde si la clé with existe si oui on explose sont contenu
            $with = explode(',',$_GET['with']);
            if(in_array('authors',$with)){ //on verifie si le mots authors est dans le tableau
                $authors_model = new Authors(); // on crée un nouveau model des auteurs
                $authors = $authors_model->getAuthorsByEditorId($editors->id);
            }
        }
        $page_title = 'la fiche de ' . $editors->society;
        $view = 'show_editors.php';
        return [
            'authors' => $authors,
            'books' => $books,
            'editors' => $editors,
            'page_title' => $page_title,
            'view' => $view,
        ];
    }
}
