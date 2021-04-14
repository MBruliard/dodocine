<?php
	
	/**
	 * @file login-response.php
	 * @brief actions sur la base de données depuis @file login.php
	 * @details appelée via AJAX
	 */

	/**
	 * Tentative de connexion après envoi des informations via le formulaire
	 */
	if (isset($_POST['loginsend'])) {
		extract($_POST);
		$res = login_user($db, $username, $password);
		$message = $res['msg'];
		$color_message = $res['res'];

		if ($res['res']) {
			// on retourne directement à la page d'accueil
			$_SESSION['user'] = $username;
			header("location: /index.php");
			exit();
		}
	}

	/**
	 * Inscription d'une personne après récupération des informations envoyées via le formulaire
	 */
	if (isset($_POST['signsend'])) {
		extract($_POST);
		// $_POST['res'] = $res , ...
		$res = create_new_user($db, $username, $email, $password, $password2);
		$message = $res['msg'];
		$color_message = $res['res'];

		if ($res['res']) {
			// on retourne directement à la page d'accueil
			$_SESSION['user'] = $username;
			header("location: /index.php");
			exit();
		}
	}

?> 