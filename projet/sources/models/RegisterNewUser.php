<?php

namespace models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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

        $token = bin2hex(random_bytes(32));

        $sql = "INSERT INTO users (first_name, last_name, nick_name, birth, gender, email, password, token)
                VALUES (:firstName, :lastName, :nickName, :birth, :gender, :email, :password, :token)";

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
            $query->bindParam(':token', $token);
            $query->execute();

            $this->confirmationEmail($email, $token);

            $_SESSION['message'] = '
            <span class="message_validate">
                <strong>✅ Bien joué ! Tu es bien inscrit sur Weeklight.</strong>
                <p>Maintenant, il te reste seulement à activer ton compte via ta boîte mail<p>
            </span>';
            header('Location: /');
            exit;
        } catch (PDOException $error) {
            $_SESSION['message'] = '
            <span class="message_error">
                <strong>❌ Erreur !</strong>
                <p>Inscription échouée<p>
            </span>';
            header('Location: /');
            exit;
        }
    }

    private function confirmationEmail($email, $token)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'weeklight.company@gmail.com';
            $mail->Password   = 'mzqz ajal asqp ycxn';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $confirmationURL = "http://localhost:3000/?token=$token";

            // Destinataires
            $mail->setFrom('weeklight.company@gmail.com', 'Weeklight');
            $mail->addAddress($email);

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = 'Nouveau compte';
            $mail->Body    = "
                <h1>Bienvenue sur Weeklight ! 😊</h1>
                <p>Merci de vous être inscrit. <br>Veuillez cliquer sur le bouton ci-dessous pour confirmer votre adresse email.</p>
                <a href=\"$confirmationURL\" style=\"background-color: #4CAF50; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; border-radius: 5px;\">Confirmer votre email</a>
            ";
            $mail->AltBody = 'Merci de vous être inscrit. Veuillez confirmer votre adresse email en cliquant sur le lien suivant : ' . $confirmationURL;
            $mail->send();
        } catch (Exception $error) {
            $_SESSION['message'] = '
            <span class="message_error">
                <strong>❌ Erreur !</strong>
                <p>Le message n\'a pas pu être envoyé<p>
            </span>';
            header('Location: /');
            exit;
        }
    }
}
