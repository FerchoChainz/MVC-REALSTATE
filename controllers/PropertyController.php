<?php

namespace Controllers;

use MVC\Router;
use Model\Propertie;
use Model\Seller;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class PropertyController
{
    public static function index(Router $router)
    {

        $properties = Propertie::all();
        $result = $_GET['result'] ?? null;
        $router->render('propertys/admin', [
            "properties" => $properties,
            "result" => $result
        ]);
    }
    public static function create(Router $router)
    {

        $property = new Propertie();
        $sellers = Seller::all();

        // error logs
        $errors = Propertie::getErrors();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $property = new Propertie($_POST['property']);


            // This code manage de upload files or images
            $nameImage = md5(uniqid(rand(), true)) . ".jpg";


            if ($_FILES['property']['tmp_name']['image']) {
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['property']['tmp_name']['image'])->cover(800, 600);
                $property->setImage($nameImage);

                // debbuger($image);
            }


            $errors = $property->validate();


            // review if error logs is empty
            if (empty($errors)) {

                // make directory

                if (!is_dir(DIR_IMAGES)) {
                    // if not exist, make it
                    mkdir(DIR_IMAGES);
                }

                // Save image in server
                $image->save(DIR_IMAGES . $nameImage);

                $result = $property->saveData();
            }
        }

        $router->render('propertys/create', [
            "property" => $property,
            "sellers" => $sellers,
            "errors" => $errors
        ]);
    }
    public static function update()
    {
        echo 'updating';
    }
}
