<?php function app()
{
    require_once __DIR__ . "/../vendor/autoload.php";
    require_once __DIR__ . "/../sources/models/Database.php";
    require_once __DIR__ . "/../sources/controllers/Page.php";
    require_once __DIR__ . "/../sources/router/path.php";
} ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week-Light</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php echo app() ?>
    <script type="module" src="./assets/script.js"></script>
</body>

</html>