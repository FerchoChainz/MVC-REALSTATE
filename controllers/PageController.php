<?php 

namespace Controllers;

use MVC\Router;
use Model\Propertie;

class PageController{
   
    public static function index(Router $router){
        $properties = Propertie::get(3);

        $router->render('pages/index',[
            'properties' => $properties,
            'main' => true
        ]);
    }
    public static function about(Router $router){

        $router->render('pages/about',[

        ]);
    }
    public static function ads(Router $router){
        $properties = Propertie::all();

        //  debbuger($_SERVER);

        $router->render('pages/ads',[
            'properties' => $properties
        ]);

    }
    public static function ad(){
        echo 'FROM AD';
    }
    public static function blog(){
        echo 'FROM BLOG';
    }
    public static function entry(){
        echo 'FROM ENTRY';
    }
    public static function contact(){
        echo 'FROM CONTACT';
    }
}