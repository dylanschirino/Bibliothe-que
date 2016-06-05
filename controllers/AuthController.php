<?php
/**
 * File: AuthController.php
 * User: Dylan Schirino
 * Date: 28/04/16
 * Time: 16:19
 */
namespace Controllers;

use Models\User;

class AuthController{

    private $user_model=null;

    public function __construct(User $user){
        $this->user_model=$user;
    }
    public function getLogin(){
        return['view'=>'login.php','ressource_title'=>'User login'];
    }
    public function getRegister(){
        return['view'=>'register.php','ressource_title'=>'register new user'];
    }
    public function postLogin(){
        if($user=$this->user_model->check(['username'=>$_POST['username'],'password'=>sha1($_POST['password'])
        ])){
            $_SESSION['user']=json_encode($user);
            header('Location: index.php');
            return;
        }
        else{

        }
    }
    public function postRegister(){

        $errors=[];
        if (empty($_POST['mail'])) {
            $errors['mail'] = 'Veuillez entrer un email';
        }else{
            if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) == false) {
                $errors['mail'] = 'Veuillez entrer un email valide';
            }
        }
        if (empty($_POST['password'])) {
            $errors['password'] = 'Veuillez entrer un mot de passe';
        }

        if (count($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old_datas'] = $_POST;
            header('Location: index.php?r=auth&a=getRegister');
            return; //le header ne sufffit pas il faut mettre en plus un return pour le faire sortir
        }
        if ($this->user_model->save([
            'password' => sha1($_POST['password']),
            'email' => $_POST['mail'],
            'username' => $_POST['username']
        ])
        ) {
            return ['view' => 'login.php', 'ressource_title' => 'Please login'];
        }
    }
    public function getLogout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            session_destroy();
            setcookie(session_name(),'',time()-3600);

        }
        header('Location: index.php');
        return;
    }

}