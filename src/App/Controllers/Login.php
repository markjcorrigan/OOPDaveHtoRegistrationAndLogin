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

////////////////////////////////////NB from the Login course
    public function create(): Response
    {
        $user = $this->model->authenticate($_POST['email'], $_POST['password']);
        $email = $this->request->post["email"];
        $password = $this->request->post["password"];
        $userObj = $this->model->findByEmail($_POST['email']);

//        var_dump($userObj);

        if ($user) {
            if (password_verify($password, $user->password_hash)) {
                return $this->view("Login/success.mvc.php", [

                    "password" => $password,
                    'email' => $email,
                    "userObj" => $userObj
                ]);
            } else {
                // Handle incorrect password
                return $this->view("Login/new.mvc.php", [
                    // "email" => $email,
                    // "password" => $password,
                    // "userObj" => $userObj
                ]);
            }
        } else {
            // Handle user not found
            return $this->view("404.php", [
                // "email" => $email,
                // "password" => $password,
                // "userObj" => $userObj
            ]);
        }
    }

////////////////////////////////////NB from the Login course

}

