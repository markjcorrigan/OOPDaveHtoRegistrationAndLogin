<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

class Users extends Controller
{
    public function __construct(private User $model)
    {
    }

    public function index(): Response
    {
        $users = $this->model->findAll();

        return $this->view("Users/index.mvc.php", [
            "users" => $users,
            "total" => $this->model->getTotal()
        ]);
    }

    public function show(string $id): Response
    {
        $user = $this->getUser($id);

        return $this->view("Users/show.mvc.php", [
            "user" => $user,
        ]);

    }

    public function edit(string $id): Response
    {
        $user = $this->getUser($id);

        return $this->view("Users/edit.mvc.php", [
            "user" => $user
        ]);
    }

    private function getUser(string $id): array
    {
        $user = $this->model->find($id);

        if ($user === false) {

            throw new PageNotFoundException("User not found");

        }

        return $user;
    }

    public function new(): Response
    {
        return $this->view("Users/new.mvc.php");
    }

    public function create(): Response
    {
        $data = [
            "name" => $this->request->post["name"],
            "email" => $this->request->post["email"],
                  "password_hash" => $this->request->post["password_hash"]
        ];

        if ($this->model->insert($data)) {

            return $this->redirect("/users/{$this->model->getInsertID()}/show");

        } else {

            return $this->view("Users/new.mvc.php", [
                "errors" => $this->model->getErrors(),
                "user" => $data
            ]);

        }
    }

    public function update(string $id): Response
    {
        $user = $this->getUser($id);

        $user["name"] = $this->request->post["name"];
        $user["email"] = $this->request->post["email"];
        $user["password_hash"] = $this->request->post["password_hash"];

        if ($this->model->update($id, $user)) {

            return $this->redirect("/users/{$id}/show");

        } else {

            return $this->view("Users/edit.mvc.php", [
                "errors" => $this->model->getErrors(),
                "user" => $user
            ]);

        }
    }

    public function delete(string $id): Response
    {
        $user = $this->getUser($id);

        return $this->view("Users/delete.mvc.php", [
            "user" => $user
        ]);
    }

    public function destroy(string $id): Response
    {
        $user = $this->getUser($id);

        $this->model->delete($id);

        return $this->redirect("/users/index");
    }
}