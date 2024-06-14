<?php

namespace controllers;

use models\Database;
use PDOException;

class Login
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function authenticate($email, $password)
    {
        $SQL = "SELECT * FROM users WHERE email = :email";
        $statement = $this->connection->PDO->prepare($SQL);

        try {
            $statement->bindParam(':email', $email);
            $statement->execute();

            $user = $statement->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION["user"] = $user;
                header('Location: http://localhost:3000/');
                exit();
            } else {
                return '<h1 class="error_message">Email ou mot de passe incorrect</h1>';
            }
        } catch (PDOException $error) {
            return '<h1>Erreur lors de la connexion</h1> ' . $error->getMessage();
        }
    }
}
