<?php 

namespace Controllers;
use MVC\Router;
use Model\Admin;


class LoginController{

    public static function login(Router $router){

        $errors = Admin::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);
            $errors = $auth->validate();

            if(empty($errors)){
                // Verify if user exist
                $resutl = $auth->userExist();
                
                if(!$resutl){
                    $errors = Admin::getErrors();
                }else {
                    // Verify password
                    $authenticated = $auth->checkPassword($resutl);

                    if($authenticated){
                        // auth user
                        $auth->authenticate();
                    }else {
                        $errors = Admin::getErrors();

                    }
                }
            }
        }

        $router->render('auth/login', [
            'errors' => $errors
        ]);
    }

    public static function logout(){
        session_start();

        $_SESSION = [];

        header('Location: /');

       debbuger($_SESSION); 
    }
}