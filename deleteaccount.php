<?php
	/**
	 * @file deleteaccount.php
	 * @brief Suppression d'un utilisateur
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */

	session_start();
	require_once("controller/authentification.php");
	
	/**
	 * Variable relative à la base de données
	 */
	global $db;


	/**
	 * Vérification: Si aucun utilisateur connecté, impossible de supprimer son compte
	 */
	if (!isset($_SESSION['user'])) {
		header("location: /index.php");
	}

	delete_user($db, $_SESSION['user']);
	session_destroy();

	// TODO: une petite fenetre modale pour dire que c'est fait 
	
	header("location: /index.php");
?>