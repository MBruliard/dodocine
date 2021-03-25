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

## TODO:

* Mentions légales = Ecrire une page prévenant que ce site est un projet universitaire et non pas un véritable site web

### Partie I:
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




