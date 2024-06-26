<?php
$firstName = $_SESSION["account"]["first_name"];
$lastName = $_SESSION["account"]["last_name"];
$nickName = $_SESSION["account"]["nick_name"];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./../../assets/styles/import.css" />
  <title>Home | Weeklight</title>
</head>

<body>
  <?php require_once __DIR__ . "/navbar_menu.php" ?>

  <main>
    <h1>page home</h1>
  </main>

  <script defer src="./../../assets/scripts/header.js"></script>
</body>

</html>