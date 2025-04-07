<?php

declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;
use PDOException;

class User extends Model
{
    // protected $table = "products";

    protected function validate(array $data): void
    {
        if (empty($data["name"])) {

            $this->addError("name", "Name is required");

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
        try {
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }

    public function authenticate($email, $password)
    {
        $sql = 'SELECT id, email, password_hash FROM user WHERE email = :email';
        $conn = $this->database->getConnection();
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            $user = $stmt->fetch();

            if ($user === false) {
                // Handle the case where the user was not found
                return null;
            }

            return $user;
        } catch (PDOException $e) {
            // Handle the exception, e.g., log the error or return an error message
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
        }
    }
//////////////////////////////////NB above from Login course


}