<?php
	/**
	 * @file database.php
	 * @brief Fichier de configuration pour l'accès à la base de données
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */

	/**
	 * Accès à la base de données du site
	 */
	try {
		/**
		 * Variable relative à la base de données
		 */
		$db = new PDO('sqlite:'.dirname(__FILE__).'/database.sqlite');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo __DIR__.'/database.db';
	 }
	 catch (PDOException $e) {
	 	echo $e ;
	 }
?>