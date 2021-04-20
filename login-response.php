<?php
	
	/**
	 * @file login-response.php
	 * @brief actions sur la base de données depuis @file login.php
	 * @details appelée via AJAX
	 */

	require("controller/authentification.php");
	session_start();

	/**
	 * Tentative de connexion après envoi des informations via le formulaire
	 */
	if (isset($_POST['username_login']) && isset($_POST['password_login'])) {
		$res = login_user($db, $_POST['username_login'], $_POST['password_login']);

		if ($res['res']) {
			// on ajoute cette info dans le $_SESSION
			$_SESSION['user'] = $_POST['username_login'];
		}
		$res['redirect'] = "index.php";
		echo json_encode($res);
	}

	/**
	 * Tentative d'inscription après envoi des informations via le formulaire
	 */
	if (isset($_POST['username_signup']) && isset($_POST['email_signup']) && isset($_POST['password_signup']) && isset($_POST['password2_signup'])) {
		$res = create_new_user($db, $_POST['username_signup'], $_POST['email_signup'], $_POST['password_signup'], $_POST['password2_signup']);

		if ($res['res']) {
			// on ajoute cette info dans le $_SESSION
			$_SESSION['user'] = $_POST['username_signup'];
		}
		$res['redirect'] = "index.php";
		
		echo json_encode($res);
	}

?> 

