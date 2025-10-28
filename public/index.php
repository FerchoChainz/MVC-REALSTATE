<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\BlogController;
use MVC\Router;
use Controllers\PropertyController;
use Controllers\SellerController;
use Controllers\PageController;

// -------------- PRIVATE ZONE -------------------

$router = new Router();

// ROUTES PROPERTY
$router->get('/admin', [PropertyController::class, 'index']);
$router->get('/property/create', [PropertyController::class, 'create']);
$router->post('/property/create', [PropertyController::class, 'create']);
$router->get('/property/update', [PropertyController::class, 'update']);
$router->post('/property/update', [PropertyController::class, 'update']);
$router->get('/property/delete', [PropertyController::class, 'delete']);
$router->post('/property/delete', [PropertyController::class, 'delete']);

// ROUTES SELLER
$router->get('/seller/create',[SellerController::class, 'create']);
$router->post('/seller/create',[SellerController::class, 'create']);
$router->get('/seller/update',[SellerController::class, 'update']);
$router->post('/seller/update',[SellerController::class, 'update']);
$router->get('/seller/delete',[SellerController::class, 'delete']);
$router->post('/seller/delete',[SellerController::class, 'delete']);

// ROUTES BLOG
$router->get('/blog/create', [BlogController::class, 'create']);
$router->post('/blog/create', [BlogController::class, 'create']);

// -------------- END PRIVATE ZONE -------------------

// MAIN PAGES ROUTING
$router->get('/',[PageController::class, 'index']);
$router->get('/about',[PageController::class, 'about']);
$router->get('/ads',[PageController::class, 'ads']);
$router->get('/ad',[PageController::class, 'ad']);
$router->get('/blog',[PageController::class, 'blog']);
$router->get('/entry',[PageController::class, 'entry']);
$router->get('/contact',[PageController::class, 'contact']);


$router->checkRoutes();


// POST routes
