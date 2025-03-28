<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

class Signup extends Controller
{

    public function __construct(private User $model)
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
        $users = [
            "name" => $this->request->post["name"],
            "email" => $this->request->post["email"],
            "password_hash" => $password_hash,
        ];

        if ($this->model->insert($users)) {

//            return $this->redirect("/signup/{$this->model->getInsertID()}/show");
            return $this->view("Signup/success.mvc.php", [
                "title" => "Successful Sign Up"
            ]);

        } else {

            return $this->view("Signup/new.mvc.php", [
                "errors" => $this->model->getErrors(),
                "users" => $users
            ]);

        }
    }

    public function save(): Response
    {
        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO users (name, email, password_hash)
            VALUES (:name, :email, :password_hash)';

        $conn = $this->database->getConnection();

        $stmt = $conn->query($sql);

        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);

        $stmt->execute();
    }

}

