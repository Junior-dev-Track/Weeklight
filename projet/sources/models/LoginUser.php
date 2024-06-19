<?php

namespace models;

use models\Database;
use PDOException;

class LoginUser
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function authenticate($email, $password)
    {
        session_start();

        if (empty($email) || empty($password)) {
            $_SESSION['message'] = "Veuillez remplir tous les champs";

            header('Location: /');
            exit;
        }

        $sql = "SELECT * FROM users WHERE email = :email";

        $query = $this->database->pdo->prepare($sql);

        try {
            $query->bindParam(':email', $email);
            $query->execute();

            $account = $query->fetch();

            if ($account && password_verify($password, $account['password'])) {
                $_SESSION["account"] = $account;

                header('Location: /');
                exit;
            } else {
                $_SESSION['message'] = 'Email ou mot de passe incorrect';

                header('Location: /');
                exit;
            }
        } catch (PDOException) {
            header(__DIR__ . "/../../public/views/500.php");
            exit;
        }
    }
}
