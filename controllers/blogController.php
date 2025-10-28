<?php

namespace Controllers;

use Model\Blog;
use MVC\Router;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class BlogController{

    

    public static function create(Router $router)
    {
        $blog = new Blog();

        // error logs
        $errors = Blog::getErrors();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $blog = new Blog($_POST['blog']);


            // This code manage de upload files or images
            $nameImage = md5(uniqid(rand(), true)) . ".jpg";


            if ($_FILES['blog']['tmp_name']['image']) {
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['blog']['tmp_name']['image'])->cover(800, 600);
                $blog->setImage($nameImage);

                // debbuger($image);
            }


            $errors = $blog->validate();


            // review if error logs is empty
            if (empty($errors)) {

                // make directory

                if (!is_dir(DIR_BLOG_IMAGES)) {
                    // if not exist, make it
                    mkdir(DIR_BLOG_IMAGES);
                }

                // Save image in server
                $image->save(DIR_BLOG_IMAGES . $nameImage);

                $result = $blog->saveData();
            }
        }

        $router->render('blog/create',[
            'blog' => $blog,
            'errors' => $errors
        ]);
    }

} // Class