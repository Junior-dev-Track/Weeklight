<?php

namespace models;

use PDO;
use PDOException;

class Database
{
    public string $host = "188.166.24.55";
    public string $name = "hamilton-9-week-light";
    public string $data;
    public string $login = "week-light-admin";
    public string $password = "k997CHHoxsdgWKlk";

    public PDO $PDO;

    public function __construct()
    {
        $this->data = "mysql:host=$this->host;dbname=$this->name;charset=utf8";

        try {
            $this->PDO = new PDO($this->data, $this->login, $this->password);
            $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            // die("<h1>Erreur ! Impossible de se connecter à la base de données: </h1>" . $error->getMessage());
            header(__DIR__ . "/../../public/views/500.php");
        }
    }
}
