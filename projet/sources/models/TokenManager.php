<?php

namespace models;

use models\Database;
use PDOException;

class TokenManager
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function addToken(string $email): bool
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
            $query = $this->database->pdo->prepare($sql);
            $query->bindParam(':email', $email, \PDO::PARAM_STR);
            $query->execute();
            $account = $query->fetch(\PDO::FETCH_ASSOC);

            if (!$account) {
                return false;
            }

            $token = bin2hex(random_bytes(32));

            $sql = "UPDATE users SET token = :token WHERE email = :email";
            $query = $this->database->pdo->prepare($sql);
            $query->bindParam(':token', $token, \PDO::PARAM_STR);
            $query->bindParam(':email', $email, \PDO::PARAM_STR);
            $query->execute();

            return $query->rowCount() > 0;
        } catch (PDOException $error) {
            return false;
        }
    }

    public function getToken(string $email): ?string
    {
        try {
            $sql = "SELECT token FROM users WHERE email = :email LIMIT 1";
            $query = $this->database->pdo->prepare($sql);
            $query->bindParam(':email', $email, \PDO::PARAM_STR);
            $query->execute();
            $account = $query->fetch(\PDO::FETCH_ASSOC);

            return $account ? $account['token'] : null;
        } catch (PDOException $error) {
            return null;
        }
    }

    public function matchToken(string $token): ?array
    {
        try {
            $sql = "SELECT * FROM users WHERE token = :token";
            $query = $this->database->pdo->prepare($sql);
            $query->bindParam(':token', $token, \PDO::PARAM_STR);
            $query->execute();
            $account = $query->fetch(\PDO::FETCH_ASSOC);

            return $account ? $account : null;
        } catch (PDOException $error) {
            return null;
        }
    }

    public function emailToken(string $token): ?array
    {
        try {
            $sql = "SELECT * FROM users WHERE token = :token";
            $query = $this->database->pdo->prepare($sql);
            $query->bindParam(':token', $token, \PDO::PARAM_STR);
            $query->execute();
            $account = $query->fetch(\PDO::FETCH_ASSOC);

            if ($account) {
                $sqlUpdate = "UPDATE users SET account = 1, token = NULL WHERE token = :token";
                $queryUpdate = $this->database->pdo->prepare($sqlUpdate);
                $queryUpdate->bindParam(':token', $token, \PDO::PARAM_STR);
                $queryUpdate->execute();
                return $account;
            }
            return null;
        } catch (PDOException $error) {
            return null;
        }
    }
}
