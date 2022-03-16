<?php

/** Initialisation de l'autoloading et du router ******************************/

require('src/Autoloader.php');
Autoloader::register();
session_start();

$router = new router\Router(basename(__DIR__));

/** Définition des routes *****************************************************/

// GET "/"
$router->get('/', 'controller\IndexController@index');

// Erreur 404
$router->whenNotFound('controller\ErrorController@error');

// GET "/store"
$router->get('/store','controller\StoreController@store');

//GET "/store/{:num}
$router->get('/store/{:num}','controller\StoreController@product');

//route page account
$router->get('/account','controller\AccountController@account');

//route /login
$router->post('/account/login','controller\AccountController@login');

//route /signin
$router->post('/signin','controller\AccountController@signin');

//route logout
$router->get('/account/logout','controller\AccountController@logout');

//route postComment
$router->post('/postComment','controller\CommentController@postComment');

//route search
$router->post('/search','controller\StoreController@search');

//route account/infos
$router->get('/account/infos','controller\AccountController@infos');

//route account/update
$router->post('/account/update','controller\AccountController@update');

//route cart GET
$router->get('/cart','controller\CartController@cart');

//route cart/add POST
$router->post('/cart/add','controller\CartController@add');

$router->get('/apropos','controller\AproposController@apropos');
/** Ecoute des requêtes entrantes *********************************************/

$router->listen();
