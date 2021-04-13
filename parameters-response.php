<?php

	/**
	 * @file parameters-response.php
	 * @brief Actions sur la base de données associées à la page @file parameters.php
	 * @details appelée via AJAX dans parameters.php
	 */

	require("controller/authentification.php");
	session_start();

	global $db;

	/**
	 * Si le bouton modifier mot de passe a été selectionné
	 */
	if (isset($_POST['new_pwd']) && isset($_POST['conf_new_pwd'])) {
		
		if ($_SESSION['user'] == 'toto') {
			header("location: ../index.php");
		}

		$mod = modify_password($db, $_SESSION['user'], $_POST['new_pwd'], $_POST['conf_new_pwd']);
	}



	/**
	 * Si le bouton Modifier email a été sélectionné
	 */
	if (isset($_POST['changemail'])) {
		extract($_POST);
		modify_email($db, $_SESSION['user'], $new_email);

		// TODO: une fenetre modale pour annoncer la réussite
	}

?>