<?php

namespace models;

use models\Database;
use models\TokenManager;

use PDOException;

class LoginUser
{
    private $database;
    private $tokenManager;

    public function __construct()
    {
        $this->database = new Database();
        $this->tokenManager = new TokenManager();
    }

    public function authenticate($email, $password)
    {
        session_start();

        if (empty($email) || empty($password)) {
            $_SESSION['message'] = "Veuillez remplir tous les champs";
            header('Location: /');
            exit;
        }

        try {
            $sql = "SELECT * FROM account WHERE email = :email LIMIT 1";
            $query = $this->database->pdo->prepare($sql);
            $query->bindParam(':email', $email, \PDO::PARAM_STR);
            $query->execute();
            $account = $query->fetch(\PDO::FETCH_ASSOC);

            if ($account && password_verify($password, $account['password'])) {
                if ($this->tokenManager->addToken($email)) {
                    $token = $this->tokenManager->getToken($email);
                    setcookie("token", $token, time() + 60 * 2);
                    $_SESSION["account"] = $account;
                    header('Location: /');
                    exit;
                } else {
                    $_SESSION['message'] = 'Erreur lors de la génération du token';
                    header('Location: /');
                    exit;
                }
            } else {
                $_SESSION['message'] = 'Email ou mot de passe incorrect';
                header('Location: /');
                exit;
            }
        } catch (PDOException $error) {
            header(__DIR__ . "/../../public/views/500.php");
            exit;
        }
    }
}
