# Projet La Montagne

La Montagne est un projet ambitieux créé par BeCode Liège. L'objectif est de réaliser un projet solide en groupe en 6 semaines.

## Équipe dans le projet

Dans le projet, nous sommes 3 personnes :

- Julien Tilman (Front-End) https://github.com/JulienTilman
- Marc Romero (Back-End) https://github.com/webduckdodgers
- Denis Gerardy (Full-Stack) https://github.com/artisan24fullstack

## Nom de l'application : Week-Light

Signification : Mise en lumière de la semaine

## Qu'est-ce que Week-Light ?

**Week-Light est un réseau social similaire à Facebook,** mais avec une perspective différente. L'utilisateur choisira un seul contenu par semaine à sauvegarder dans sa biographie (autrement dit : Une ligne chronologique).
Voici comment cela fonctionnera :

- **Pendant toute la semaine,** l'utilisateur pourra poster des photos, des morceaux de musique qu'il aime, des liens de sites qui l'ont marqué, ou même des commentaires propres ou ceux d'autres utilisateurs.
- **Arrivé le dimanche,** il devra choisir un seul contenu à sauvegarder et afficher dans sa ligne chronologique. (Tout le reste du contenu sera effacé définitivement)

L'objectif est que l'utilisateur puisse vraiment apprécier le contenu qui l'a marqué pendant la semaine. Nous voulons éviter de créer un réseau social comme Instagram et bien d'autres, où les publications en masse ne permettent pas de comprendre ce qui a réellement marqué l'utilisateur (et de là éviter "un réseau social d'image"). Au fil du temps, il pourra revoir ce contenu, tout comme ses amis (ses suiveurs sur la plateforme), pour voir ce qui a vraiment compté pour lui chaque semaine, et donc au fil du temps, dans sa vie.

Nous allons essayer d'inciter les utilisateurs de la plateforme à créer de vrais moments qui les ont marqués (que ce soit négatif ou positif). Pour le moment, nous mettrons seulement en place un bouton simple dans le profil de l'utilisateur qui pourra activer ou désactiver à tout moment sa biographie pour qu'elle soit visible seulement par ses amis ou par tous les utilisateurs de la plateforme. (Comme aussi un autre bouton pour bloquer des utilisateur souhaité)

Comme tout réseau social qui se respecte, nous mettrons aussi en place un chat pour discuter avec les autres utilisateurs de la plateforme.

### Gestion du contenu le Dimanche

Un défi majeur du projet est de gérer les utilisateurs qui ne se connectent pas le dimanche pour sélectionner leur contenu le plus marquant.

Voici les solutions que nous avons envisagées :

- **Notification de Rappel** : Envoyer des notifications de rappel aux utilisateurs pour qu'ils choisissent leur contenu le plus marquant avant la fin de la journée du dimanche.
- **Sélection Automatique** : Si un utilisateur ne se connecte pas le dimanche, le contenu avec le plus d'interactions (likes, commentaires) pourrait être automatiquement sélectionné.
- **Flexibilité dans la Sélection** : Offrir une période de grâce où les utilisateurs peuvent se connecter le lundi matin pour effectuer leur sélection avant que le contenu ne soit définitivement effacé.

L'objectif est de trouver un équilibre entre la nécessité de réduire le contenu excessif et d'offrir une expérience utilisateur fluide et agréable.

## Technologies

### Front-End

- React

#### Langage

- Sass

### Back-End

- NodeJS

#### Framework

- ExpressJS

#### Fonctions

- Middleware
- Body-Parser
- Helmet

#### Bibliothèque

- Socket.IO

#### Base de données

- PHPAdmin

## Design et Interface (Rien n'est encore sûr)

### Les Couleurs

Nous voulons faire quelque chose de marquant et bien différent, c'est pourquoi nous avons opté pour plusieurs couleurs différentes pour le site. Cela nous aidera à attirer un large public jeune.

- **Bleu** : Associé à la tranquillité, la confiance et la sérénité. Idéal pour créer une ambiance apaisante et professionnelle.
- **Lavande** : Apaisante et douce, associée à la tranquillité et au bien-être.
- **Jaune** : Évoque la positivité et l'énergie.
- **Vert** : Évoque la nature, la croissance et la santé, offrant une sensation de fraîcheur et de relaxation.
- **Gris clair** : Crée une toile de fond apaisante et élégante, permettant de se concentrer sur le contenu.
