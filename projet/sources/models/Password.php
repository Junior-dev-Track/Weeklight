<?php

namespace models;

use models\Database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Password
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function sendAnEmail($email)
    {
        $token = bin2hex(random_bytes(32));
        $expires = date("U") + 1800; // Le token expire dans 30 minutes

        $sql = "UPDATE users SET reset_token = :token, reset_token_expires = :expires WHERE email = :email";
        $query = $this->database->pdo->prepare($sql);

        try {
            $query->bindParam(':token', $token);
            $query->bindParam(':expires', $expires);
            $query->bindParam(':email', $email);
            $query->execute();

            // Envoyer l'email
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'weeklight.company@gmail.com';
            $mail->Password = 'mzqz ajal asqp ycxn';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $resetURL = "http://localhost:3000/forgot-password?token=$token";

            $mail->setFrom('weeklight.company@gmail.com', 'Weeklight');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Changement de mot de passe';
            $mail->Body =
                "
                <h1>Vous venez de faire une demande pour modifier votre mot de passe</h1>
                <p>Veuillez cliquer sur le lien ci-dessous pour réinitialiser votre mot de passe :</p>
                <a href=\"$resetURL\">Réinitialiser mon mot de passe</a>
                ";
            $mail->send();

            $_SESSION['message'] = '
            <span class="message_alert">
                <strong>🙃 Un email vient d\'être envoyé</strong>
                <p>Allez dans votre boîte mail pour changer votre mot de passe<p>
            </span>';

            header('Location: /forgot-password');
            exit;
        } catch (Exception $error) {
            $_SESSION['message'] = '
            <span class="message_error">
                <strong>❌ Erreur !</strong>
                <p>Le message n\'a pas pu être envoyé<p>
            </span>';
            header('Location: /forgot-password');
            exit;
        }
    }

    public function resetPassword($token, $newPassword)
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
                    <strong>✅ Bien joué</strong>
                    <p>Votre mot de passe a été réinitialisé avec succès<p>
                </span>';
                header('Location: /');
                exit;
            } else {
                $_SESSION['message'] = '
                <span class="message_alert">
                    <strong>😔 Zute</strong>
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
