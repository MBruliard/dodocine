<?php
	/**
	 * @file login.php
	 * @brief nouvelle version pour s'inscrire et se connecter à notre site
	 * 
	 */
	require_once("controller/authentification.php");
  	session_start();

	/**
	 * Message à afficher quand à la réussite ou l'échec de la connexion
	 */
	$message = null;
	
	/** 
	 * Couleur du message (Vert pour réussite/Rouge pour échec) à afficher
	 */
	$color_message = null;

	/**
	 * Vérification: Pas d'utilisateur déjà connecté
	 */
	// if (isset($_SESSION['user'])) {
	// 	header ("location: index.php");
	// }
?>


<DOCTYPE html>
<html lang='fr'>

	<?php 
		$title_page = 'Dodociné | Se connecter';
		$css_addon = "<link href='static/css/login.css' rel='stylesheet' />";
		require_once("elements/head.php"); 
	?>

	<body>

		<?php 
			$header_dodo_modal = "coucou";
			$content_dodo_modal = "je suis du contenu";
			include ("elements/dodo-modal.php");
		?>

		<button class="btn btn-secondary" id="buttonModal" data-toggle="modal" data-target="#dodo-modal">Clik pour ouvrir</button>

		<?php 
			$js_addon = "<script src='static/js/parameters2.js'></script>";
			require("elements/js_files.php"); 
		?>
	</body>

</html>