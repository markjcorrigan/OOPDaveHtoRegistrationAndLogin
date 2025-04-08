<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Exception;
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
    $data = [
        "email" => $this->request->post["email"],
        "password" => $this->request->post["password"],
    ];

    $errors = [];

    if (empty($data["email"])) {
        $errors["email"] = "Email is required";
    }

    if (empty($data["password"])) {
        $errors["password"] = "Password is required";
    } elseif (strlen($data["password"]) < 6) {
        $errors["password"] = "Please enter at least 6 characters for the password";
    }

    if (!empty($errors)) {
        return $this->view("Login/new.mvc.php", ["errors" => $errors, "user" => $data]);
    }

    $user = $this->model->authenticate($data["email"], $data["password"]);
    $test = $this->model->emailExists($data['email']);

    if ($user) {
        if (password_verify($data["password"], $user->password_hash)) {
            $userData = [
                "user" => $data,
                "userObj" => $this->model->findByEmail($data["email"]),
            ];

            return $this->view("Login/success.mvc.php", $userData);
        } else {
            $errors["password"] = "Invalid password";
            return $this->view("Login/new.mvc.php", ["errors" => $errors, "user" => $data]);
        }
    } else {
        if (!$test) {
            $errors["email"] = "User not found";
        }

        return $this->view("Login/new.mvc.php", ["errors" => $errors, "user" => $data]);
    }
}







//        else {
//            // Handle user not found
//            return $this->view("Login/new.mvc.php", [
//                "email" => $_POST['email'],
//                 "test" => $test,
//                // "password" => $password,
//                // "userObj" => $userObj
//            ]);
//        }
////////////////////////////////////NB from the Login course

}

