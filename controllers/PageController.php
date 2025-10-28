<?php 

namespace Controllers;

use Model\Blog;
use MVC\Router;
use Model\Propertie;

class PageController{
   
    public static function index(Router $router){
        $properties = Propertie::get(3);
        $blog = Blog::get(2);

        $router->render('pages/index',[
            'properties' => $properties,
            'main' => true,
            'blog' => $blog
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
    public static function ad(Router $router){
        $id = validateOrRedirect('/ads');

        $property = Propertie::find($id);

        $router->render('pages/ad',[
            'property' => $property
        ]);
    }
    public static function blog(Router $router){
        
        $router->render('pages/blog',[
            
        ]);
    }
    public static function entry(Router $router){

        $router->render('pages/entry',[

        ]);
    }
    public static function contact(Router $router){

        $router->render('pages/contact',[

        ]);
    }
}