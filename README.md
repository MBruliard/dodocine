# DodoCine

Projet de Programmation WEB 
Université Sorbonne Paris Nord 
Licence 3 Informatique
Année 2020 - 2021

## Description

Nous vous proposons ici un "clone" du site web AlloCiné.com revisité. 

Il s'agit d'un projet universitaire

## Outils utilisés

* PHP 7
* HTML5/CSS3
* Bootstrap 4
* Fontawesome
* SQLite3

## API et Documentation

Une documentation des sources du projet est disponible. Ecrite à l'aide du logiciel Doxygen, elle est disponible sous format HTML

Pour relancer la compilation de la documentation
> ```doxygen Doxyfile```


L'ensemble de l'API se trouve dans le répertoire documentation/
Pour afficher la documentation, ouvrir dans le navigateur
> ```documentation/html/index.html```

## References:

* le site de Pixabay pour des images libres de droit
* construction du gif avec GIMP 

## TODO:

* Couper en plusieurs sections le header et le footer:
	* navigation - ok
	* header - ok
	* head - ok
	* javascript - ok
	* footer - ok
* Faire un header (banderolle) pour la présentation du site 
* Faire le choix des couleurs - ok
* Avoir une navigation plus agréable -> voir les templates disponibles

### Partie I:
* Dans index.php : Mettre des cards à la place des jubotrons pour que ce soit plus joli
* Construction de la base de données avec Modele entité association -> rapport
* Remplissage de la base de données:
	* films : ajouter les urls des films ainsi que leur année de parution
	* individus : ajouter les infos sur les individus
	* forum : remplissage partiel de la table -> remplissage manuel directement dans la base de données ?

### Partie II: PHP
* Architecture page film
* Architecture page acteur/réalisateur


### Partie III : Connexion/inscriptions
* Mettre l'inscription/la connexion sur la même page avec un button pour switcher entre les deux ce sera plus joli 
	* utiliser du jquery pour l'affichage des messages pour plus de lisibilité
	* Migrer vers la deuxième version de connexion/inscription
	* Mettre à jour le choix des images 
* Créer une fenetre modale pour indiquer connexion/inscription puis retour à l'accueil lors de la fermeture de la fenetre
* Dans le cas contraire on garde l'affichage dans la fenetre comme avant

### Section Utilisateurs

* Apparence dans Paramètres Utilisateurs:
	* faire JS associé au dark mode
	* mettre en place des fenetres modales pour annoncer que les changements mdp/email ont bien été effectués
	* Faire les statistiques sur l'utilisateur
	* Accèder rapide à ses messages sur les forums des films auxquels il participe 

* Noter un film et laisser un commentaire
* Forum par film

### Page d'accueil
* Mise en place d'un caroussel (option)
* Mise en place de la recherche automatique




