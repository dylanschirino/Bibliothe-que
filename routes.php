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

    'index_books' =>'GET/index/book',
    'show_books' =>'GET/show/book',
    'get_register'=>'GET/getRegister/auth',

    'get_book'=>'GET/getBook/book',
    'post_book'=>'POST/postBook/book',
    'delete_book'=>'GET/deleteBook/book',


    'get_author'=>'GET/getAuthor/author',
    'post_author'=>'POST/postAuthor/author',
    'delete_author'=>'GET/deleteAuthor/author',

    'get_login'=>'GET/getLogin/auth',
    'get_logout'=>'GET/getLogout/auth',
    'post_register'=>'POST/postRegister/auth',

    'get_editor'=>'GET/getEditor/editor',
    'post_editor'=>'POST/postEditor/editor',
    'delete_editor'=>'GET/deleteEditor/editor',
    'update_editor'=>'GET/updateEditor/editor',

    'post_login'=>'POST/postLogin/auth'
];