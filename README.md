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


### CSS:
* Appliquer les couleurs pour homogeneiser le site

### Base de données:
* Gérer les problèmes d'images et de noms dans la base de données -> via CSV ?
* Ajouter des films et acteurs plus connus
	* Jennifer Lawrence (Hunger Games, Passengers)
	* Blockbusters -> Marvel/DC 

### Partie I:
* Construction de la base de données avec Modele entité association -> rapport
* Remplissage de la base de données:
	* forum : remplissage partiel de la table -> remplissage manuel directement dans la base de données ?

### Partie II: PHP
* Architecture page Film
	* ajout du film en favori

* Architecture de la page filmslist.php
	* construire un tooltip pour un film avec son nom, sa note et l'ajout possible en favori

* Architecture de la page actorslist.php
	* A faire en entier

### Section Utilisateurs
* construire les fonction sur les messages dans le forum
* proposer d'enregistrer des films favoris (à ajouter dans BDD + un bouton dans filmographie)
* zone apparence

* Apparence dans Paramètres Utilisateurs:
	* faire JS associé au dark mode

### Accueil
* modifier le carousel pour le rendre plus joli
* Faire CSS pour la partie recherche




