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

        $lastTwoDigitsYear = substr(date('Y', strtotime($birth)), -2);
        $nickName = strtolower($firstName . $lastName . $lastTwoDigitsYear);

        $sql = "INSERT INTO account (first_name, last_name, nick_name, birth, gender, email, password)
                VALUES (:firstName, :lastName, :nickName, :birth, :gender, :email, :password)";

        $query = $this->database->pdo->prepare($sql);

        session_start();

        try {
            $query->bindParam(':firstName', $firstName);
            $query->bindParam(':lastName', $lastName);
            $query->bindParam(':nickName', $nickName);
            $query->bindParam(':birth', $birth);
            $query->bindParam(':gender', $gender);
            $query->bindParam(':email', $email);
            $query->bindParam(':password', $password_hash);
            $query->execute();

            $_SESSION['message'] = "Bien joué !<br>Tu t'es bien inscrit sur Weeklight.<br>Maintenant, il te reste seulement à vérifier ta boîte mail pour activer ton compte.";
            header('Location: /');
            exit;
        } catch (PDOException $error) {
            $_SESSION['message'] = "Inscription échouée.";
            $_SESSION['error'] = $error->getMessage();
            header('Location: /');
            exit;
        }
    }
}
