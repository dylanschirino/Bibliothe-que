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
    'index_authors' => 'GET/authors/page',
    'index_books' => 'GET/books/page',
    'get_register'=>'GET/getRegister/auth',
    'get_login'=>'GET/getLogin/auth',
    'get_logout'=>'GET/getLogout/auth',
    'post_register'=>'POST/postRegister/auth',
    'post_login'=>'POST/postLogin/auth'
];