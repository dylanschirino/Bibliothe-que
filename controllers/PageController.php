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

    public function admin(){
        //on verifie sur l'utilisateur est bien connecter, chaque fois qu'on veut sécuriser une page on doit mettre ceci
        if(!isset($_SESSION['user'])){
            header('Location: ?a=getLogin&r=auth');
        }
        return ['view'=>'admin.php','ressource_title'=>'Admin Page'];
    }
}