<?php 

namespace MVC;

class Router{

    public $GETroutes = [];
    public $POSTroutes = [];

    public function get($url,$fn){
        $this->GETroutes[$url] = $fn;
    }
    
    public function post($url, $fn){
        $this->POSTroutes[$url] = $fn;
    }

    public function checkRoutes(){
        $actualURL = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        

        if($method === 'GET'){
            $fn = $this->GETroutes[$actualURL] ?? null;
        } else {
            $fn = $this->POSTroutes[$actualURL] ?? null;
        }

        if($fn){
            // URL exist and had a function associated
            call_user_func($fn, $this);
        } else{
            echo 'ERROR 404';
        }
    }


    // Show the views 
    public function render($view ,$data = []){

        foreach($data as $key => $value){
            $$key = $value; // Variable of variable
        }
        
        ob_start(); // Saving objects in memory 


        include __DIR__ . "/views/$view.php";
        $content = ob_get_clean(); //cleaning memory 
        include __DIR__ . '/views/layout.php';
    }
}

