<?php


	/**
	 * On lance une session si il n'y en a pas une déjà existante
	 */
	function is_connected() : bool {
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
			$_SESSION['user'] = null;
		}
		return !empty($_SESSION['connecte']);	
	}


?>