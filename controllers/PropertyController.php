<?php

namespace Controllers;

use Intervention\Image\Colors\Profile;
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
        $sellers = Seller::all();


        $result = $_GET['result'] ?? null;
        $router->render('properties/admin', [
            "properties" => $properties,
            "result" => $result,
            "sellers" => $sellers
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

        $router->render('properties/create', [
            "property" => $property,
            "sellers" => $sellers,
            "errors" => $errors
        ]);
    }
    public static function update(Router $router)
    {
        $id = validateOrRedirect('/admin');
        $property = Propertie::find($id);
        $errors = Propertie::getErrors();
        $sellers = Seller::all();


        // exect after user send form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            // Asign atributes
            $args = $_POST['property'];;


            // this metod sync the late input by user and the object in memory
            $property->sync($args);


            // validate
            $errors = $property->validate();

            // upload files
            // This code manage de upload files or images
            $nameImage = md5(uniqid(rand(), true)) . ".jpg";
            if ($_FILES['property']['tmp_name']['image']) {
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['property']['tmp_name']['image'])->cover(800, 600);
                $property->setImage($nameImage);

                // debbuger($image);
            }



            // review if error logs is empty
            if (empty($errors)) {
                if ($_FILES['property']['tmp_name']['image']) {
                    // save the image 
                    $image->save(DIR_IMAGES . $nameImage);
                }
                $property->saveUpdate();
            }
        }

        $router->render('/properties/update', [
            "property" => $property,
            "sellers" => $sellers,
            "errors" => $errors
        ]);
    }

    public static function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $type = $_POST['type'];

                if (validateTypeContent($type)) {
                    // Compare the type that will be deleted
                    $seller = Propertie::find($id);
                    $seller->delete();
                }
            }
        }
    }
}
