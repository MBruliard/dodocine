<?php
	session_start();
	require_once("controller/authentification.php");
	global $db;

	if (!isset($_SESSION['user'])) {
		// pas d'utilisateur connecte donc impossible de supprimer son compte
		header("location: /index.php");
	}

	delete_user($db, $_SESSION['user']);
	session_destroy();

	// TODO: une petite fenetre modale pour dire que c'est fait 
	
	header("location: /index.php");
?>