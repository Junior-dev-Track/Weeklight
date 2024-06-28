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

            if ($user) {
                $email = $user['email'];

                $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateSql = "UPDATE users SET password = :password, reset_token = NULL, reset_token_expires = NULL WHERE email = :email";
                $updateQuery = $this->database->pdo->prepare($updateSql);
                $updateQuery->bindParam(':password', $passwordHash);
                $updateQuery->bindParam(':email', $email);
                $updateQuery->execute();

                session_start();
                $_SESSION['message'] = "Votre mot de passe a été réinitialisé avec succès.";
                header('Location: /');
                exit;
            } else {
                session_start();
                $_SESSION['message'] = "Le lien de réinitialisation est invalide ou a expiré.";
                header('Location: /');
                exit;
            }
        } catch (PDOException $error) {
            error_log("Erreur de base de données : {$error->getMessage()}");
            header('Location: /');
            exit;
        }
    }
}
