<?php
/**
 * File: PageController.php
 * User: Dylan Schirino
 */
namespace Controllers;

use Models\Authors;
use Models\Book;

class PageController extends Controller{

    public function home(){
        return ['view'=>'home.php','ressource_title'=>'Home Page'];
    }
    public function __construct()
    {
        $this->books_model = new Book();
        $this->authors_model = new Authors();
    }
    function books(){
        $book=$this->books_model->all();
        $page_title='BiblioTECH - Livres';
        $view='index_books.php';
        return ['book'=>$book,'view'=>$view,'ressource_title'=>$page_title];
    }
    function authors(){
        $authors = $this->authors_model->all();
        $page_title='BiblioTECH - Auteurs';
        $view = 'index_authors.php';
        return ['author' => $authors, 'ressource_title' => $page_title, 'view' => $view,];
    }

    public function admin(){
        //on verifie sur l'utilisateur est bien connecter, chaque fois qu'on veut sécuriser une page on doit mettre ceci
        if(!isset($_SESSION['user'])){
            header('Location: ?a=getLogin&r=auth');
        }
        return ['view'=>'admin.php','ressource_title'=>'Admin Page'];
    }
}