<?php

namespace controllers;

use controllers\SessionManager;
use models\ResetPassword;
use models\TokenManager;
use models\SearchUser;

class ViewController
{
    public function home()
    {
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
                        $_SESSION['message'] = '
                        <span class="message_error">
                            <strong>❌ Erreur !</strong>
                            <p>Les mots de passe ne correspondent pas<p>
                        </span>';
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
                    $tokenManager = new TokenManager();
                    $account = $tokenManager->emailToken($_GET['token']);
                    break;
            }
        }

        if (isset($_SESSION["account"])) {
            $token = $_COOKIE["token"] ?? null;

            if ($token) {
                $tokenManager = new TokenManager();
                $account = $tokenManager->matchToken($token);

                if ($account) {
                    include __DIR__ . "/../../public/views/page_home.php";
                } else {
                    $session->logout();
                }
            } else {
                $session->logout();
            }
        } else {
            include __DIR__ . "/../../public/views/page_login.php";

            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        }
    }

    public function forgotPassword()
    {
        include __DIR__ . "/../../public/views/page_forgot_password.php";
    }

    public function friends()
    {
        include __DIR__ . "/../../public/views/page_friends.php";
    }

    public function messages()
    {
        include __DIR__ . "/../../public/views/page_messages.php";
    }

    public function profile($path)
    {
        session_start();
        $user = new SearchUser();
        $_SESSION["search"] = $user->profile($path);
        include __DIR__ . "/../../public/views/page_profile.php";
    }

    public function error404(): void
    {
        include __DIR__ . "/../../public/views/page_404.php";
    }

    public function maintenance(): void
    {
        include __DIR__ . "/../../public/views/page_maintenance.php";
    }
}
