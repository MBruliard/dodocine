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

* Choisir de nouvelles teintes de couleurs sur colorhunt
	* https://colorhunt.co/palette/219763

* Faire un header (banderolle) pour la présentation du site 
* Avoir une navigation plus agréable -> voir les templates disponibles

### CSS:
* Appliquer les couleurs pour homogeneiser le site

### Partie I:
* Construction de la base de données avec Modele entité association -> rapport
* Remplissage de la base de données:
	* forum : remplissage partiel de la table -> remplissage manuel directement dans la base de données ?

### Partie II: PHP
* Architecture page acteur/réalisateur 
	* faire la zone de filmographie/réalisation en utilisant une forme de carousel comme dans list-film

* Architecture de la page filmslist.php
	* utilisation de carousel type netflix avec des catégories

* Architecture de la page actorslist.php
	*

> Ne pas oublier la partie de recherche de films en AJAX

### Section Utilisateurs
* proposer de voir les statistiques dans Mes notes et messages
* proposer d'enregistrer des films favoris (à ajouter dans BDD + un bouton dans filmographie)
* zone apparence
* zone de paramètrage du compte

* Apparence dans Paramètres Utilisateurs:
	* faire JS associé au dark mode
	* mettre en place des fenetres modales pour annoncer que les changements mdp/email ont bien été effectués

* Changer les couleurs des étoiles dans rating-system
* faire un arrondi des notes récupérées pour une meilleure visualisation
* Forum par film
* enregistrer un film comme favori

### Page d'accueil
* Mise en place de la recherche automatique




