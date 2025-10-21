<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropertyController;

$router = new Router();

// GET routes

$router->get('/admin', [PropertyController::class, 'index']);
$router->get('/property/create', [PropertyController::class, 'create']);
$router->get('/property/update', 'about_contact');
$router->checkRoutes();