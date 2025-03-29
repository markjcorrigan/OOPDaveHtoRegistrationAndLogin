<?php

declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class Signup extends Model
{
//    protected $table = "user";

    protected function validate(array $data): void
    {
        if (empty($data["name"])) {

            $this->addError("name", "Name is required");

        }

//        if ($data["password"] != $data["password_confirmation"]) {
//            $this->addError("password","Password must match confirmation");
////            $this->errors[] = 'Password must match confirmation';
//        }
        // email address
        if (filter_var($data["email"], FILTER_VALIDATE_EMAIL) === false) {
            $this->addError("email","Invalid email");
//            $this->errors[] = 'Invalid email';
        }
//        if ($this->emailExists($data["email"])) {
//            $this->addError("email","email already taken");
////            $this->errors[] = 'email already taken';
//        }

        // Password
//        if ($data["password"] != $data["password_confirmation"]) {
//            $this->addError("password","Password must match confirmation");
////            $this->errors[] = 'Password must match confirmation';
//        }

        if (strlen($data["password"]) < 6) {
            $this->addError("password","Please enter at least 6 characters for the password");
//            $this->errors[] = 'Please enter at least 6 characters for the password';
        }

        if (preg_match('/.*[a-z]+.*/i', $data["password"]) == 0) {
            $this->addError("password","Password needs at least one letter");
//            $this->errors[] = 'Password needs at least one letter';
        }

        if (preg_match('/.*\d+.*/i', $data["password"]) == 0) {
            $this->addError("password","Password needs at least one number");
//            $this->errors[] = 'Password needs at least one number';
        }
    }

    public function getTotal(): int
    {
        $sql = "SELECT COUNT(*) AS total
                FROM user";

        $conn = $this->database->getConnection();

        $stmt = $conn->query($sql);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int) $row["total"];
    }

//    protected function emailExists($email): bool
//    {
//        $sql = "SELECT * FROM `user` WHERE email = :email";
//
//        $conn = $this->database->getConnection();
//
//        $stmt = $conn->query($sql);
//
//        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//
//        $stmt->execute();
//
//        return $stmt->fetch() !== false;
//    }
}