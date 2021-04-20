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
		$mod = modify_password($db, $_SESSION['user'], $_POST['new_pwd'], $_POST['conf_new_pwd']);
		echo json_encode($mod);
	}



	/**
	 * Si le bouton Modifier email a été sélectionné
	 */
	if (isset($_POST['new_email'])) {
		$res = modify_email($db, $_SESSION['user'], $_POST['new_email']);
		echo json_encode($res);
	}

	/**
	 * Si le bouton suppression de compte a été sélectionné
	 */
	if (isset($_POST['delete_account'])) {
		$res = delete_user($db, $_SESSION['user']);

		$res['redirect'] = 'index.php';
		if ($res['res']) {
			session_destroy();
		}

		echo json_encode($res);
	}

?>