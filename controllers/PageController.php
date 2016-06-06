<?php
/**
 * File: PageController.php
 * User: Dylan Schirino
 */
namespace Controllers;

use Models\Authors;
use Models\Book;

class PageController extends Controller{
    private $authors_model = null;
    private $books_model = null;

    // On lie author_model à Author
    public function __construct()
    {
        $this->authors_model = new Authors();
        $this->books_model = new Book();
    }
    public function home(){
        $page = 0;
        if(isset($_GET['page'])) {
            $page = intval($_GET['page']);
        }
        $authors = $this->authors_model->all($page);
        $books = $this->books_model->all($page);
        $view = 'home.php';
        return ['author' => $authors,'books'=>$books, 'view' => $view,'ressource_title'=>'Home Page','page'=>$page];
    }
    public function admin(){
        //on verifie sur l'utilisateur est bien connecter, chaque fois qu'on veut sécuriser une page on doit mettre ceci
        if(!isset($_SESSION['user'])){
            header('Location: ?a=getLogin&r=auth');
        }
        return ['view'=>'admin.php','ressource_title'=>'Admin Page'];
    }
}