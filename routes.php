<?php
/**
 * File: routes.php
 * User: Dylan Schirino
 * Date: 18/05/16
 * Time: 20:25
 */
$routes = [
    'default' => 'GET/home/page',
    'admin_page'=>'GET/admin/page',
    'index_editors' =>'GET/index/editor',
    'show_editors' =>'GET/show/editor',
    'index_authors' =>'GET/index/author',
    'show_authors' =>'GET/show/author',
    'get_register'=>'GET/getRegister/auth',
    'get_login'=>'GET/getLogin/auth',
    'get_logout'=>'GET/getLogout/auth',
    'post_register'=>'POST/postRegister/auth',
    'post_login'=>'POST/postLogin/auth'
];