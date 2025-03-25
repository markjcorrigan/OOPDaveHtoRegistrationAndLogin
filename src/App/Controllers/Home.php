<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Controller;
use Framework\Response;

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
}