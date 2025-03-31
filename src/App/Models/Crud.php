<?php

declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class Crud extends Model
{
    // protected $table = "Cruds";

    protected function validate(array $data): void
    {
        if (empty($data["name"])) {

            $this->addError("name", "Name is required");

        }
    }

    public function getTotal(): int
    {
        $sql = "SELECT COUNT(*) AS total
                FROM Crud";

        $conn = $this->database->getConnection();

        $stmt = $conn->query($sql);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int) $row["total"];
    }
}