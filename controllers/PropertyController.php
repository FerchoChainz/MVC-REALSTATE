<?php  

namespace Controllers;
use MVC\Router;
use Model\Propertie;
use Model\Seller;

class PropertyController{
    public static function index(Router $router){

        $properties = Propertie::all();
        $result = null;
        
        $router->render('propertys/admin',[
            "properties" => $properties,
            "result" => $result
        ]);
    }
    public static function create(Router $router){

        $property = new Propertie();
        $sellers = Seller::all();

        $router->render('propertys/create',[
            "property" => $property,
            "sellers" => $sellers
        ]);
    }
    public static function update(){
        echo 'updating';
    }
}