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
            header(__DIR__ . "/../../public/views/500.php");
            exit;
        }
    }
}
