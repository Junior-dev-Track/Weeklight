<?php

namespace controllers;

use models\Database;
use PDOException;

class Subscribe
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function register($firstName, $lastName, $nickName, $email, $password)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $SQL = "INSERT INTO users (first_name, last_name, nick_name, email, password, number_of_posts, number_of_tags) 
            VALUES (:first_name, :last_name, :nick_name, :email, :password, NULL, NULL)";

        $statement = $this->connection->PDO->prepare($SQL);

        try {
            $statement->bindParam(':first_name', $firstName);
            $statement->bindParam(':last_name', $lastName);
            $statement->bindParam(':nick_name', $nickName);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password_hash);
            $statement->execute();

            return "<h1>Inscription réussie ! 🎉</h1>";
        } catch (PDOException $error) {
            return "<h1>Inscription échouée</h1> " . $error;
        }
    }
}
