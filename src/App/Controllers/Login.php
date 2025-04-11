<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Exception;
use Framework\Auth;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Flash;
use Framework\Response;


class Login extends Controller
{


    public function __construct(private readonly User $model)
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

    $errors = $this->validate($data);

    if (!empty($errors)) {
        $data = [
            "email" => "",
            "password" => "",
        ];
        return $this->view("Login/new.mvc.php", ["errors" => $errors, "user" => $data]);
    }

    $user = $this->model->authenticate($data["email"], $data["password"]);

    if ($user) {
        if (password_verify($data["password"], $user->password_hash)) {

//            Flash::addMessage('Login was successful');
            Flash::addMessage('Login was successful', Flash::WARNING);
            $messages = Flash::getMessages();
//            var_dump($messages);
            $_SESSION['user_id'] = $user->id;
            $userData = [
                "user" => $data,
                "userObj" => $this->model->findByEmail($data["email"]),
                "session" => $_SESSION['user_id'],
                "messages" => $messages
//                "flash_notifications" => $_SESSION['flash_notifications']
            ];

//            var_dump($_SESSION['flash_notifications']);
//            Flash::addMessage('Login was successful', Flash::SUCCESS);
  
            return $this->view("Login/success.mvc.php", $userData);

        } else {
            $errors["password"] = "Invalid password";
            $data = [
                "email" => "",
                "password" => "",
            ];
//            Flash::addMessage('Login unsuccessful, please try again', Flash::WARNING);
            return $this->view("Login/new.mvc.php", ["errors" => $errors, "user" => $data]);
        }
    } else {
        $data = [
            "email" => "",
            "password" => "",
        ];
//        Flash::addMessage('Login unsuccessful, please try again', Flash::WARNING);
        return $this->view("Login/new.mvc.php", ["errors" => $errors, "user" => $data]);
    }
}



                                            private function validate(array $data): array
                                            {
                                                $errors = [];
                                                $test = $this->model->emailExists($data['email']);

                                                if (empty($data["email"])) {
                                                    $errors["email"] = "Email is required";
                                                } elseif (filter_var($data["email"], FILTER_VALIDATE_EMAIL) === false) {
                                                    $errors["email"] = "Invalid email";
                                                } elseif (!$test) {
                                                    $errors["email"] = "User not found";
                                                }

                                                if (empty($data["password"])) {
                                                    $errors["password"] = "Password is required";
                                                } elseif (strlen($data["password"]) < 6) {
                                                    $errors["password"] = "Please enter at least 6 characters for the password";
                                                } elseif (preg_match('/.*\d+.*/i', $data["password"]) == 0) {
                                                    $errors["password"] = "Password needs at least one number";
                                                }

                                                return $errors;
                                            }


    public function destroy(): void
    {
        Auth::logout();

        $this->redirect('/login/show-logout-message');
    }

    public function showLogoutMessage(): void
    {
        Flash::addMessage('Logout successful');

        $this->redirect('/');
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

