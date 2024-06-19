<header>
	<nav>
		<div class="search">
			<a href="/" class="logo_nav_bar">Weeklight</a>
			<form id="form_search" action="" method="get">
				<img id="icon_search" src="./../../svgs/magnifer.svg" alt="icône recherche">
				<input id="input_search" type="search" name="" placeholder="Rechercher sur Weeklight">
			</form>
		</div>

		<ul class="menu">
			<li id="link_home">
				<a href="/">
					<img src="./../../svgs/station.svg" alt="icône home">
				</a>
			</li>
			<li id="link_friends">
				<a href="/friends">
					<img src="./../../svgs/friends.svg" alt="icône amis">
				</a>
			</li>
			<li id="link_messages">
				<a href="/messages">
					<img src="./../../svgs/messages.svg" alt="icône messagerie">
				</a>
			</li>
			<li id="link_profile">
				<button id="button_profile">
					<img src="./../../svgs/user.svg" alt="icône profil">
				</button>
			</li>
		</ul>
	</nav>
</header>

<div id="container_profile">
	<a href="/profile/<?php echo $firstName ?>">
		<img src="./../../svgs/user.svg" alt="lien profil">
		<?php echo $firstName ?>
	</a>

	<a href="/settings"><img src="./../../svgs/settings.svg" alt="lien paramètre">Paramètres</a>

	<form action="/" method="POST">
		<input type="image" src="./../../svgs/hand.svg" alt="bouton déconnecter">
		<button type="submit" name="logout">Déconnecter</button>
	</form>
</div>