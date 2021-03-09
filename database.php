<?php
	/**
	 * Accès à la base de données du site
	 */
	try {
		$db = new PDO('sqlite:'.__DIR__.'/database.db');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo __DIR__.'/database.db';
	 }
	 catch (PDOException $e) {
	 	echo $e ;
	 }
?>