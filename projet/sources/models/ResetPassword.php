<?php

namespace models;

use models\Database;
use PDOException;

class ResetPassword
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function reset($token, $newPassword)
    {
        try {
            $sql = "SELECT * FROM users WHERE reset_token = :token AND reset_token_expires >= :now LIMIT 1";
            $query = $this->database->pdo->prepare($sql);
            $now = date("U");
            $query->bindParam(':token', $token);
            $query->bindParam(':now', $now);
            $query->execute();

            $user = $query->fetch(\PDO::FETCH_ASSOC);

            session_start();
            if ($user) {
                $email = $user['email'];
                $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateSql = "UPDATE users SET password = :password, reset_token = NULL, reset_token_expires = NULL WHERE email = :email";
                $updateQuery = $this->database->pdo->prepare($updateSql);
                $updateQuery->bindParam(':password', $passwordHash);
                $updateQuery->bindParam(':email', $email);
                $updateQuery->execute();

                $_SESSION['message'] = '
                <span class="message_validate">
                    <strong>✅ Bien joué !</strong>
                    <p>Votre mot de passe a été réinitialisé avec succès<p>
                </span>';
                header('Location: /');
                exit;
            } else {
                $_SESSION['message'] = '
                <span class="message_alert">
                    <strong>😔 Zute !</strong>
                    <p>Le lien de réinitialisation est invalide ou a expiré<p>
                </span>';
                header('Location: /');
                exit;
            }
        } catch (PDOException $error) {
            $_SESSION['message'] = '
            <span class="message_error">
                <strong>❌ Erreur 500 | Serveur</strong>
                <p>Veuillez ressayer plus tard<p>
            </span>';
            header('Location: /');
            exit;
        }
    }
}
