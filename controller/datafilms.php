<?php
	/**
	 * @file controller/datafilms.php
	 * @brief Définition des fonctions d'accès à la base de données pour les films 
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */

	include ("database.php");
	
	/**
	 * Variable globale pour l'accès à la base de données
	 */
	global $db;

	/**
	 * @brief récupère de la base de données les films 
	 * @param first_letter_title 1ere lettre des films que l'on souhaite récupérer. Si null alors on renvoie tous les films
	 * @return array tableau des films
	 */
	function getFilms($first_letter_title=null) : array {
		return array();
	}

	/**
	 * @brief récupère de la base de données un film 
	 * @param id_film le numéro d'identification du film que l'on souhaite voir
	 * @return array contenu du film en question
	 */
	function getFilms($first_letter_title=null) : array {
		return array();
	}	
?>
