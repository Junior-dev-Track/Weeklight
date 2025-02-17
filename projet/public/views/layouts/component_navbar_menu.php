<header>
	<nav>
		<a href="/" class="logo_nav_bar">Weeklight</a>

		<form class="form_search" action="" method="get">
			<img src="./../../assets/svgs/magnifer.svg" alt="icône recherche">
			<input type="search" name="" placeholder="Rechercher sur Weeklight">
		</form>

		<ul class="menu">
			<li id="link_home">
				<a href="/">
					<img src="/projet/public/assets/svgs/station.svg" alt="lien home">
				</a>
			</li>
			<li id="link_friends">
				<a href="/friends">
					<img src="/projet/public/assets/svgs/friends.svg" alt="lien amis">
				</a>
			</li>
			<li id="link_messages">
				<a href="/messages">
					<img src="/projet/public/assets/svgs/messages.svg" alt="lien messagerie">
				</a>
			</li>
			<li id="link_profile">
				<a href="/<?php echo $_SESSION["account"]["nick_name"] ?>">
					<img src="/projet/public/assets/svgs/user.svg" alt="lien profil">
				</a>
			</li>
		</ul>
	</nav>
</header>