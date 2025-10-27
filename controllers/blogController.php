<?php 

namespace Controllers;
use MVC\Router;

class BlogController{


    public static function create(Router $router){
        
        $router->render('blog/create',[
            
        ]);
    }
}