<?php

namespace models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use models\Database;
use PDOException;

class NewPasswordUser
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function sendMail($email)
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
            $mail->Body = "
                <h1>Réinitialisez votre mot de passe</h1>
                <p>Veuillez cliquer sur le lien ci-dessous pour réinitialiser votre mot de passe :</p>
                <a href=\"$resetURL\">Réinitialiser mon mot de passe</a>
            ";
            $mail->send();
        } catch (PDOException $error) {
            error_log("Erreur de base de données : {$error->getMessage()}");
        } catch (Exception $error) {
            error_log("Le message n'a pas pu être envoyé. Erreur de Mailer : {$mail->ErrorInfo}");
        }
    }
}
