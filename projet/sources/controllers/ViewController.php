<?php

namespace controllers;

use controllers\SessionManager;
use models\Password;
use models\TokenManager;
use models\Search;

class ViewController
{
    public function pageHome()
    {
        session_start();
        $session = new SessionManager();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch (true) {
                case isset($_POST['register']):
                    $session->registerUser();
                    break;
                case isset($_POST['logout']):
                    $session->logoutUser();
                    break;

                case isset($_POST['new_password_user']):
                    $email = $_POST['new_password_user'];
                    $session->resetPassword($email);
                    break;

                case isset($_POST['email']) && isset($_POST['password']):
                    $session->loginUser();
                    break;

                case !empty($_POST['token']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password']):
                    $token = $_POST['token'];
                    $newPassword = $_POST['new_password'];
                    $confirmPassword = $_POST['confirm_password'];

                    if ($newPassword === $confirmPassword) {
                        $resetPassword = new Password;
                        $resetPassword->resetPassword($token, $newPassword);
                    } else {
                        session_start();
                        $_SESSION['message'] = '
                        <span class="message_error">
                            <strong>❌ Attention !</strong>
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
                    $session->logoutUser();
                }
            } else {
                $session->logoutUser();
            }
        } else {
            include __DIR__ . "/../../public/views/page_login.php";

            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        }
    }

    public function pageForgotPassword()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['email'])) {
            $search = new Search;
            $email = urldecode($_GET['email']);
            $result = $search->email($email);

            if ($result) {
                $session = new SessionManager;
                $session->resetPassword($email);
            } else {
                $_SESSION['message'] = '
                    <span class="message_error">
                        <strong>❌ Erreur !</strong>
                        <p>Mais vous n\'avez pas de compte Weeklight.<p>
                    </span>';
            }
        }

        include __DIR__ . "/../../public/views/page_forgot_password.php";

        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }

    public function pageFriends()
    {
        include __DIR__ . "/../../public/views/page_friends.php";
    }

    public function pageMessages()
    {
        include __DIR__ . "/../../public/views/page_messages.php";
    }

    public function pageProfile($url)
    {
        session_start();
        $getAccount = new Search();
        $_SESSION["search"] = $getAccount->profile($url);

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $session = new SessionManager;
            $session->loginUser();
        }

        include __DIR__ . "/../../public/views/page_profile.php";
    }

    public function pageError404(): void
    {
        include __DIR__ . "/../../public/views/page_404.php";
    }

    public function pageMaintenance(): void
    {
        include __DIR__ . "/../../public/views/page_maintenance.php";
    }
}
