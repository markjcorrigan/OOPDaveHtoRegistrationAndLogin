<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models;
use App\Models\User;
use Exception;
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

        $data = [
            "name" => $this->request->post["name"],
            "email" => $this->request->post["email"],
            "password_hash" => $password_hash,
        ];

        if ($this->model->insert($data)) {
            return $this->view("Signup/success.mvc.php", [
                "title" => "Successful Sign Up"
            ]);
        } else {
            return $this->view("Signup/new.mvc.php", [
                "errors" => $this->model->getErrors(),
                "user" => $data
            ]);
        }
    }


/*
 * The MariaBD trigger below is in the user table.  It removes the data for password and password_confirmation.
 * These needed to be in plane text in order to run the validation code against these fields.
 * I created the password and password_confirmation columns as the query would not let me insert the data into the table without these columns.
 * I am sure there is a better way but for now I am not looking for it.
 * -- Create the audit_log table
CREATE TABLE audit_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    action VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the triggers
DELIMITER $$

CREATE TRIGGER trg_update_user
AFTER INSERT ON user
FOR EACH ROW
BEGIN
    -- Perform operations that don't update the user table
    INSERT INTO audit_log (user_id, action) VALUES (NEW.id, 'insert');
END$$

CREATE TRIGGER remove_passwords_after_insert
BEFORE INSERT ON user
FOR EACH ROW
BEGIN
    -- Remove passwords before inserting the row
    SET NEW.password = NULL;
    SET NEW.password_confirmation = NULL;
END$$

DELIMITER ;

 */


    private function getUser(string $id): array
    {
        $user = $this->model->find($id);

        if ($user === false) {

            throw new PageNotFoundException("Signup not found");

        }

        return $user;
    }


}

