<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;

$router = new Router();

$router->get('/about-us', 'about_us');
$router->get('/admin', 'about_admin');
$router->get('/about-contact', 'about_contact');
$router->checkRoutes();