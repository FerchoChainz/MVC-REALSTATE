<?php  

namespace Controllers;

use Model\Propertie;
use Model\Seller;
use MVC\Router;
use SoapServer;

class SellerController{

    public static function create(Router $router){
        $seller = new Seller();

        $errors = Seller::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $seller = new Seller($_POST['seller']);

            $errors = $seller->validate();

            if(empty($errors)){
                $seller->saveData();
            }
        }

        $router->render('sellers/create',[
            "seller" => $seller,
            "errors" => $errors
        ]);
    }

    
    public static function update(Router $router){
        $id = validateOrRedirect('/admin');
        $seller = Seller::find($id);
        $errors = Seller::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $args = $_POST['seller'];

            // sync obeject in memory
            $seller->sync($args);

            $errors = $seller->validate();

            if(empty($errors)){
                $seller->saveUpdate();
            }
        }

        $router->render('/sellers/update',[
            "seller" => $seller,
            "errors" => $errors
        ]);
    }
    public static function delete(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $type = $_POST['type'];

                if (validateTypeContent($type)) {
                    // Compare the type that will be deleted
                    $seller = Seller::find($id);

                    // TODO: Method Where to check if seller had or no properties registered by his name

                    $seller->delete();
                }
            }
        }
    }
}