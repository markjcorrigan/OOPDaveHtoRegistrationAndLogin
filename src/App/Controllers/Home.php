<?php

declare(strict_types=1);

namespace App\Controllers;
use App\Models\User;
use Framework\Controller;
use Framework\Response;
use Framework\View;
use Framework\Flash;

class Home extends Controller
{
    public function index(): Response
    {
//        echo $this->viewer->render("shared/header.php", [
//            "title" => "Home"
//        ]);
//
//        echo $this->viewer->render("Home/index.php");
        return $this->view("Home/index.mvc.php", [
            "title" => "Home"
        ]);
    }
    public static function twig(): Response {

        //            Flash::addMessage('Login was successful');
        Flash::addMessage('Login was successful', Flash::WARNING);
        $messages = Flash::getMessages();
////            var_dump($messages);


        View::renderTemplate("Home/twigindex.html", [
            "title" => "Home",
            "messages" => $messages,
//            "user" =>  $userData
        ]);
        return new Response();
    }

}