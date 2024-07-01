<?php

namespace models;

use PDO;
use PDOException;

class Database
{
    public string $host = "188.166.24.55";
    public string $name = "hamilton-9-week-light";
    public string $database;
    public string $login = "week-light-admin";
    public string $password = "k997CHHoxsdgWKlk";

    public PDO $pdo;

    public function __construct()
    {
        $this->database = "mysql:host=$this->host;dbname=$this->name;charset=utf8";

        try {
            $this->pdo = new PDO($this->database, $this->login, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException) {
            session_start();
            $_SESSION['message'] = '
            <span class="message_error">
                <strong>❌ Erreur 500 | Serveur</strong>
                <p>Erreur interne du serveur<p>
            </span>';
            header('Location: /');
            exit;
        }
    }
}
