<?php
	
	/**
	 * @file controller/rating.php
	 * @brief Ajout de la nouvelle note dans  la base de données
	 */
	require('controller/datafilms.php');
	session_start();
	
	// si il y a eu une note
	if (isset($_POST['rating'])) {

		$res = ['res' => false, 'redirect' => 'login.php'];
		if (isset($_SESSION['user'])) {
			$res = addRating($db, $_SESSION['user'], $_POST['film'], $_POST['rating'] + 1);	
		}

		echo json_encode($res);
	}

	if (isset($_GET['film'])) {
		$update = getRatingInfos($db, $_GET['film']);

		if (isset($_SESSION['user'])) {
			$myrate = getRatingUser($db, $_SESSION['user'], $_GET['film']);

			if ($myrate['res']) {
				$update['myrating'] = $myrate['myrating'];
			}
		}
		echo json_encode($update);
	}

?>