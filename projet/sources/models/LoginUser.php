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
        try {
            $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
            $query = $this->database->pdo->prepare($sql);
            $query->bindParam(':email', $email, \PDO::PARAM_STR);
            $query->execute();
            $account = $query->fetch(\PDO::FETCH_ASSOC);

            session_start();
            if ($account) {
                if ($account['account'] == 1) {
                    if (password_verify($password, $account['password'])) {
                        if ($this->tokenManager->addToken($email)) {
                            $token = $this->tokenManager->getToken($email);
                            setcookie("token", $token, time() + 60 * 2);
                            $_SESSION["account"] = $account;
                            header('Location: /');
                            exit;
                        } else {
                            $_SESSION['message'] = "Oups!<br>Il y a eu une leger soucis..<br>Veillez réessayer de vous réconnecter";
                            header('Location: /');
                            exit;
                        }
                    } else {
                        $_SESSION['message'] = 'Erreur! 🧐<br>Email ou mot de passe incorrect';
                        header('Location: /');
                        exit;
                    }
                } else {
                    $_SESSION['message'] = 'Votre compte n\'est pas encore activé<br>Veuillez vérifier votre boîte mail pour activer votre compte Weeklight';
                    header('Location: /');
                    exit;
                }
            } else {
                $_SESSION['message'] = "Ooh!<br>Vous n'avez pas de compte Weeklight<br>Vous pouvez créer un en moins d'une minute ⏱️<br>en appuyant sur le bouton 'Créer un compte'";
                header('Location: /');
                exit;
            }
        } catch (PDOException $error) {
            header(__DIR__ . "/../../public/views/500.php");
            exit;
        }
    }
}
