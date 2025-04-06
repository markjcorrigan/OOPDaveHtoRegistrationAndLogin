<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;


class Login extends Controller
{

    public function __construct(private User $model)
    {
    }

    public function new(): Response
    {
        return $this->view("Login/new.mvc.php", [
            "title" => "Login"
        ]);
    }

    public function create(): Response
    {
        $email = $this->request->post["email"];
        $password = $this->request->post["password"];

        $emailExists = $this->model->emailExists($email);
        $test = $emailExists ? "Email exists" : "Email does not exist";

        $userCheck = [
            "email" => $email,
            // Avoid storing plain text passwords
            // "password" => $password,
        ];

        return $this->view("Login/show.mvc.php", [
            "test" => $test,
            "email" => $email,
            "password" => $password,
            "userCheck" => $userCheck,
            ]);
    }

}

