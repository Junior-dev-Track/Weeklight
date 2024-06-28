<?php

use controllers\SessionManager;
use models\ResetPassword;
use models\TokenManager;

session_start();
$session = new SessionManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch (true) {
        case isset($_POST['register']):
            $session->register();
            break;
        case isset($_POST['logout']):
            $session->logout();
            break;

        case isset($_POST['new_password_user']):
            $email = $_POST['new_password_user'];
            $session->forgotPassword($email);
            break;

        case isset($_POST['email']) && isset($_POST['password']):
            $session->login();
            break;

        case !empty($_POST['token']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password']):
            $token = $_POST['token'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($newPassword === $confirmPassword) {
                $resetPassword = new ResetPassword();
                $resetPassword->reset($token, $newPassword);
            } else {
                session_start();
                $_SESSION['message'] = "Les mots de passe ne correspondent pas.";
                header("Location: /forgot-password?token=$token");
                exit;
            }
            break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch (true) {
        case isset($_GET['new_password_user']):
            $email = urldecode($_GET['new_password_user']);
            $session->forgotPassword($email);
            break;

        case isset($_GET['token']):
            $token = $_GET['token'];
            $tokenManager = new TokenManager();
            $account = $tokenManager->emailToken($token);

            if ($account) {
                $_SESSION['message'] = 'Votre adresse email a été confirmée avec succès !';
            } else {
                $_SESSION['message'] = 'Le token est invalide ou a expiré.';
            }
            header('Location: /');
            break;
    }
}

if (isset($_SESSION["account"])) {
    $token = $_COOKIE["token"] ?? null;

    if ($token) {
        $tokenManager = new TokenManager();
        $account = $tokenManager->matchToken($token);

        if ($account) {
            require_once __DIR__ . "/components/home.php";
        } else {
            $session->logout();
        }
    } else {
        $session->logout();
    }
} else {
    require_once __DIR__ . "/components/login.php";

    if (isset($_SESSION['message'])) {
        echo '<span class="message">' . $_SESSION['message'] . '</span>';
        unset($_SESSION['message']);
    }
}
