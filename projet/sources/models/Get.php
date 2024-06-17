
<?php

namespace models;

class Get
{

    public function get_all_hikes()
    {

        $SQL = "SELECT * FROM hikes";

        try {
            $query = $this->PDO->query($SQL);

            if ($query->rowCount() > 0) {
                while ($row = $query->fetch()) {
                    echo "<p>Id : " . $row["id"] . "</p>";
                    echo "<p>Nom : " . $row["name"] . "</p>";
                    echo "<p>Distance : " . $row["distance"] . " km</p>";
                    echo "<p>Durée : " . $row["duration"] . "</p>";
                    echo "<p>Élévation : " . $row["elevation"] . " m</p>";
                    echo "<br>";
                }
            } else {
                echo "0 résultats";
            }
        } catch (PDOException $error) {
            die("<h1>Erreur ! Impossible d'exécuter la requête: </h1>" . $error->getMessage());
        }
    }
}
