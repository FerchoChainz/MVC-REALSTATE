<?php

namespace Controllers;

use Model\Blog;
use MVC\Router;
use Model\Propertie;
use PHPMailer\PHPMailer\PHPMailer;

class PageController
{

    public static function index(Router $router)
    {
        $properties = Propertie::get(3);
        $blog = Blog::get(2);

        $router->render('pages/index', [
            'properties' => $properties,
            'main' => true,
            'blog' => $blog
        ]);
    }
    public static function about(Router $router)
    {

        $router->render('pages/about', []);
    }
    public static function ads(Router $router)
    {
        $properties = Propertie::all();

        //  debbuger($_SERVER);

        $router->render('pages/ads', [
            'properties' => $properties
        ]);
    }
    public static function ad(Router $router)
    {
        $id = validateOrRedirect('/ads');

        $property = Propertie::find($id);

        $router->render('pages/ad', [
            'property' => $property
        ]);
    }
    public static function blog(Router $router)
    {

        $router->render('pages/blog', []);
    }
    public static function entry(Router $router)
    {

        $router->render('pages/entry', []);
    }
    public static function contact(Router $router)
    {

        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $answer = $_POST['contact'];



            // debbuger($answer);

            // Create a instance of phpmailer 
            $mail = new PHPMailer();

            // Config SMTP
            $mail->isSMTP();
            $mail->Host = 'live.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'smtp@mailtrap.io';
            $mail->Password = '152712f750cf53a0bf7fc9987b132f67';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // o 'tls'

            // Config email content
            $mail->setFrom('test@demomailtrap.co', 'RealState Demo');
            $mail->addAddress('a21110132@ceti.mx', 'RealState.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // Enable HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // debbuger($answer);

            // Define content
            $content = '<html>';
            $content .= '<p>Have a new Message.</p>';
            $content .= '<p>Name: ' . $answer['name'] . '</p>';
            
            // send depending if it is phone number or email
            if($answer['contact'] === 'phone'){
                $content .= '<p>Eligio ser contactado por Telefono:</p>';
                $content .= '<p>Phone: ' . $answer['phone'] . '</p>';
                $content .= '<p>Date: ' . $answer['date'] . '</p>';
                $content .= '<p>Hour: ' . $answer['hour'] . '</p>';
            } else {
                $content .= '<p>Eligio ser contactado por Email:</p>';
                $content .= '<p>Email: ' . $answer['email'] . '</p>';
            }

            $content .= '<p>Message: ' . $answer['message'] . '</p>';
            $content .= '<p>Type of proposal: ' . $answer['type'] . '</p>';
            $content .= '<p>Budget: $' . $answer['budget'] . '</p>';
            $content .= '<p>Type of contact: ' . $answer['contact'] . '</p>';

            $content .= '</html>';
            
            
            $mail->Body = $content;
            $mail->AltBody = 'Tienes un nuevo mensaje.';

            // Send email
            if ($mail->send()) {
                $message = 'Request submitted successfully';
            } else {
                $message = 'The message could not be sent';
            }
        }

        $router->render('pages/contact', [
            'message' => $message
        ]);
    }
}
