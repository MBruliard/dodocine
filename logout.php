<?php
	/**
	 * @file logout.php
	 * @brief Page de déconnexion pour les utilisateurs
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */


	session_start();
	session_destroy();
	header("location: /index.php");
?>