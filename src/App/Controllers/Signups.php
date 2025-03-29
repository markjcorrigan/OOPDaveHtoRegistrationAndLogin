<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models;
use App\Models\Signup;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

class Signups extends Controller
{

    public function __construct(private Signup $model)
    {
    }

     public function new(): Response
     {
      return $this->view("Signup/new.mvc.php", [
          "title" => "User"
      ]);
    }

    public function create(): Response
    {
        $password_hash = password_hash($this->request->post["password"], PASSWORD_DEFAULT);
//        var_dump($password_hash);
        $data = [
            "name" => $this->request->post["name"],
            "email" => $this->request->post["email"],
            "password" => $this->request->post["password"],
            "password_confirmation" => $this->request->post["password_confirmation"],
            "password_hash" => $password_hash,
        ];

        if ($this->model->insert($data)) {

//            return $this->redirect("/signup/{$this->model->getInsertID()}/show");
            return $this->view("Signup/success.mvc.php", [
                "title" => "Successful Sign Up"
            ]);

        } else {

            return $this->view("Signup/new.mvc.php", [
                "errors" => $this->model->getErrors(),
                "data" => $data
            ]);

        }
    }

//    private function getUser(string $id): array
//    {
//        $user = $this->model->find($id);
//
//        if ($user === false) {
//
//            throw new PageNotFoundException("Signup not found");
//
//        }
//
//        return $user;
//    }


}

