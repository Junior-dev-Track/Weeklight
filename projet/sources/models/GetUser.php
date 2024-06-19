<?php

namespace models;

use models\Database;
use PDOException;

class GetUser
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function searchUser(string $firstName)
    {
        $sql = "SELECT * FROM users WHERE first_name = :first_name";

        $query = $this->database->pdo->prepare($sql);
        try {
            $query->bindParam(':first_name', $firstName);
            $query->execute();

            $result = $query->fetch();

            return $result;
        } catch (PDOException) {
            return null;
        }
    }
}
