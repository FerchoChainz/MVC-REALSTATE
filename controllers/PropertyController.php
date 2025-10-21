<?php  

namespace Controllers;
use MVC\Router;

class PropertyController{
    public static function index(Router $router){
        $router->render('propertys/admin');
    }
    public static function create(){
        echo 'creating';
    }
    public static function update(){
        echo 'updating';
    }
}