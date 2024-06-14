<?php

use models\Database;
use controllers\Session;

$database = new Database();

$navigation = new Session();
$navigation->to_subscribe();

require_once "includes/header.php" ?>

<main>
    <h1>Page Home</h1>
    <?php echo $database->get_all_hikes() ?>
</main>

<?php require_once "includes/footer.php" ?>