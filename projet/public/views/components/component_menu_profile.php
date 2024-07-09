<div id="component_menu_profile">
    <a href="/<?php echo $_SESSION["account"]["nick_name"] ?>"><?php echo $_SESSION["account"]["first_name"] . " " . $_SESSION["account"]["last_name"] . " |" ?>
        <img src="./../../assets/svgs/user.svg" alt="lien profil">
    </a>

    <a href="/settings">Paramètres |
        <img src="./../../assets/svgs/settings.svg" alt="lien paramètre">
    </a>

    <form action=" /" method="POST">
        <button type="submit" name="logout">Déconnecter |</button>
        <input type="image" src="./../../assets/svgs/hand.svg" alt="bouton déconnecter">
    </form>
</div>