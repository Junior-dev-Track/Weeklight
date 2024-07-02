<?php

namespace models;

use models\Database;
use PDOException;

class Search
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function profile(string $nickName): ?array
    {
        $sql = "SELECT first_name, last_name, birth, gender, email FROM users WHERE nick_name = :nickName LIMIT 1";

        $query = $this->database->pdo->prepare($sql);

        try {
            $query->bindParam(':nickName', $nickName, \PDO::PARAM_STR);
            $query->execute();

            $result = $query->fetch(\PDO::FETCH_ASSOC);

            if ($result) {
                return $result;
            } else {
                return null;
            }
        } catch (PDOException $error) {
            return null;
        }
    }

    public function email(string $email): bool
    {
        $sql = "SELECT email FROM users WHERE email = :email";

        $query = $this->database->pdo->prepare($sql);

        $query->bindParam(':email', $email, \PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
