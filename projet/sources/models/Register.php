<?php

namespace models;

use models\Database;
use PDOException;

class Register
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function register($firstName, $lastName, $birth, $gender, $email, $password)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $SQL = "INSERT INTO users (first_name, last_name, birth, gender, email, password)
                VALUES (:firstName, :lastName, :birth, :gender, :email, :password)";

        $statement = $this->connection->PDO->prepare($SQL);

        try {
            $statement->bindParam(':firstName', $firstName);
            $statement->bindParam(':lastName', $lastName);
            $statement->bindParam(':birth', $birth);
            $statement->bindParam(':gender', $gender);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password_hash);
            $statement->execute();

            return "<span>Bienjouer! Tu es maintenant dans le club des Weeklight 😊\</span>";
        } catch (PDOException $error) {
            return "<h1>Inscription échouée</h1> " . $error;
        }
    }
}
