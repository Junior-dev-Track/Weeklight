<?php

namespace models;

use models\Database;
use PDOException;

class RegisterNewUser
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function register($firstName, $lastName, $birth, $gender, $email, $password)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (first_name, last_name, birth, gender, email, password)
                VALUES (:firstName, :lastName, :birth, :gender, :email, :password)";

        $query = $this->database->pdo->prepare($sql);

        session_start();

        try {
            $query->bindParam(':firstName', $firstName);
            $query->bindParam(':lastName', $lastName);
            $query->bindParam(':birth', $birth);
            $query->bindParam(':gender', $gender);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $password_hash);
            $query->execute();

            $_SESSION['message'] = "Bien joué !<br>Tu as bien inscript sur Weeklight.<br>Maintenant, il te reste seulement à rentre dans ta boîte-mail pour activer le ton compte.";
            header('Location: /');
            exit;
        } catch (PDOException) {
            $_SESSION['message'] = "Inscription échouée.";
            header('Location: /');
            exit;
        }
    }
}
