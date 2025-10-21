<?php  

namespace Controllers;
use MVC\Router;
use Model\Propertie;

class PropertyController{
    public static function index(Router $router){

        $properties = Propertie::all();
        $result = null;
        
        $router->render('propertys/admin',[
            "properties" => $properties,
            "result" => $result
        ]);
    }
    public static function create(){
        echo 'creating';
    }
    public static function update(){
        echo 'updating';
    }
}