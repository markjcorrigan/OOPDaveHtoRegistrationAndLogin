<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Crud;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

class Cruds extends Controller
{
    public function __construct(private Crud $model)
    {
    }

    public function index(): Response
    {
        $cruds = $this->model->findAll();

        return $this->view("Cruds/index.mvc.php", [
            "cruds" => $cruds,
            "total" => $this->model->getTotal()
        ]);
    }

    public function show(string $id): Response
    {
        $crud = $this->getcrud($id);

        return $this->view("Cruds/show.mvc.php", [
            "crud" => $crud
        ]);
    }

    public function edit(string $id): Response
    {
        $crud = $this->getcrud($id);

        return $this->view("Cruds/edit.mvc.php", [
            "crud" => $crud
        ]);
    }

    private function getcrud(string $id): array
    {
        $crud = $this->model->find($id);

        if ($crud === false) {

            throw new PageNotFoundException("crud not found");

        }

        return $crud;
    }

    public function new(): Response
    {
        return $this->view("Cruds/new.mvc.php");
    }

    public function create(): Response
    {
        $data = [
            "name" => $this->request->post["name"],
            "surname" => $this->request->post["surname"],
            "email" => $this->request->post["email"],
            "cell" => $this->request->post["cell"],
            "description" => empty($this->request->post["description"]) ? null : $this->request->post["description"]
        ];

        if ($this->model->insert($data)) {

            return $this->redirect("/Cruds/{$this->model->getInsertID()}/show");

        } else {

            return $this->view("Cruds/new.mvc.php", [
                "errors" => $this->model->getErrors(),
                "crud" => $data
            ]);

        }
    }

    public function update(string $id): Response
    {
        $crud = $this->getcrud($id);

       $crud["name"] = $this->request->post["name"];
        $crud["surname"] = $this->request->post["surname"];
        $crud["email"] = $this->request->post["email"];
        $crud["cell"] = $this->request->post["cell"];
        $crud["description"] = empty($this->request->post["description"]) ? null : $this->request->post["description"];

        if ($this->model->update($id, $crud)) {

            return $this->redirect("/Cruds/{$id}/show");

        } else {
                return $this->view("Cruds/edit.mvc.php", [
                "errors" => $this->model->getErrors(),
                "crud" => $crud
            ]);

        }
    }

    public function delete(string $id): Response
    {
        $crud = $this->getcrud($id);

        return $this->view("Cruds/delete.mvc.php", [
            "crud" => $crud
        ]);
    }

    public function destroy(string $id): Response
    {
        $crud = $this->getcrud($id);

        $this->model->delete($id);

        return $this->redirect("/Cruds/index");
    }
}