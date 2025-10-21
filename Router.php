<?php 

namespace MVC;

class Router{

    public $GETroutes = [];
    public $POSTroutes = [];

    public function get($url,$fn){
        $this->GETroutes[$url] = $fn;
    }

    public function checkRoutes(){
        $actualURL = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        

        if($method === 'GET'){
            $fn = $this->GETroutes[$actualURL] ?? null;
        }

        if($fn){
            // URL exist and had a function associated
            call_user_func($fn, $this);
        } else{
            echo 'ERROR 404';
        }
    }
}

