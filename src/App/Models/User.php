<?php

declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class User extends Model
{


//    protected function validate(array $data): void
//    {
//        if (empty($data["email"])) {
//
//            $this->addError("email", "Email is required");
//
//        }
//    }

    protected function validate(array $data): void
    {
        if (empty($data["name"])) {
            $this->addError("name", "Name is required");
        }

        // Email address
        if (filter_var($data["email"], FILTER_VALIDATE_EMAIL) === false) {
            $this->addError("email", "Invalid email");
        }

        if ($this->emailExists($data["email"])) {
            $this->addError("email", "Email already taken");
        }

        // Password
        if ($data["password"] != $data["password_confirmation"]) {
            $this->addError("password", "Password must match confirmation");
        }

        if (strlen($data["password"]) < 6) {
            $this->addError("password", "Please enter at least 6 characters for the password");
        }

        if (preg_match('/.*[a-z]+.*/i', $data["password"]) == 0) {
            $this->addError("password", "Password needs at least one letter");
        }

        if (preg_match('/.*\d+.*/i', $data["password"]) == 0) {
            $this->addError("password", "Password needs at least one number");
        }
    }

    public function getTotal(): int
    {
        $sql = "SELECT COUNT(*) AS total FROM user";
        $conn = $this->database->getConnection();
        $stmt = $conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row["total"];
    }

//    public function emailExists($email): int
//    {
//        $sql = "SELECT * FROM `user` WHERE email = :email";
//        $conn = $this->database->getConnection();
//        $stmt = $conn->prepare($sql);
//        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//        $stmt->execute();
//        return (int) $stmt->fetchColumn();
//    }

/////////////////////////////////NB Below from Login course
    public function emailExists($email): bool
    {
        return $this->findByEmail($email) !== false;
    }

    public function findByEmail($email)
    {

        $sql = 'SELECT id, name, email, password_hash FROM user WHERE email = :email';
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_OBJ);

            $stmt->execute();
            return $stmt->fetch();

    }

//    public function authenticate($email, $password)
//    {
//        $sql = 'SELECT id, email, password_hash FROM user WHERE email = :email';
//        $conn = $this->database->getConnection();
//        $stmt = $conn->prepare($sql);
//        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
//        $stmt->setFetchMode(PDO::FETCH_OBJ);
//        $stmt->execute();
//        $user = $stmt->fetch();
//
//            if ($user === false) {
//                // Handle the case where the user was not found
//                return null;
//            }
//
//            return $user;
//
//    }

    public function authenticate($email, $password)
    {
        $user = $this->findByEmail($email);

        if ($user) {
            if (password_verify($password, $user->password_hash)) {
                return $user;
            }
        }

        return false;
    }
//////////////////////////////////NB above from Login course


}