<?php

namespace models;

use models\Database;
use models\TokenManager;

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
                        $_SESSION['message'] = '
                        <span class="message_alert">
                            <strong>😕 Il y a eu une leger soucis.</strong>
                            <p>Veillez réessayer de vous réconnecter<p>
                        </span>';
                        header('Location: /');
                        exit;
                    }
                } else {
                    $_SESSION['message'] = '
                        <span class="message_alert">
                            <strong>😒 Attention !</strong>
                            <p>Email ou mot de passe incorrect<p>
                        </span>';
                    header('Location: /');
                    exit;
                }
            } else {
                $_SESSION['message'] = '
                <span class="message_alert">
                    <strong>😔 Votre compte n\'est pas encore activé</strong>
                    <p>Veuillez vérifier votre boîte mail pour activer votre compte Weeklight<p>
                </span>';
                header('Location: /');
                exit;
            }
        } else {
            $_SESSION['message'] = '
            <span class="message_alert">
                <strong>🫢 Ooh !</strong>
                <p>Vous n\'avez pas créer un compte Weeklight ?<p>
            </span>';
            header('Location: /');
            exit;
        }
    }
}
