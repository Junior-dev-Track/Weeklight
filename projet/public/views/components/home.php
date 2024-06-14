<?php

use models\Database;

$data = new Database();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Weeklight</title>
  <link rel="stylesheet" href="./../styles/import.css" />
</head>

<body>
  <?php include_once __DIR__ . "/header.php" ?>

  <main>
    <h1>Profil :</h1>
    <h2>Bienvenue <?php echo $_SESSION["user"]["first_name"] ?> !</h2>

    <form action="/" method="post">
      <button type="submit">Se déconnecter</button>
    </form>
  </main>
</body>

</html>