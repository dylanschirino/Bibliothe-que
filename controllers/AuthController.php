<?php
/**
 * File: AuthController.php
 * User: Dylan Schirino

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
            header('Location: ?a=admin&r=page');
            return;
        }
        else{

        }
    }
    public function postRegister(){

        $this->user_model->save(['password'=>sha1($_POST['password']),
        'email'=>$_POST['mail'],'username'=>$_POST['username']]);
        return ['view'=>'login.php','ressource_title'=>'Please login'];
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