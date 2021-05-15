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

	<body class="d-flex flex-column login-body">

		<!-- n'est pas responsive ... utilisé les colonnes de bootstrap -->
		<div class="center-container">
		
				<div class="card form-container">
					<div class="card-header">
						<h4 class="align-center" id='login-title'>Se Connecter</h4>
					</div>
					<div class="card-body text-center">

						<div class="space-before-row btn-group">
							<button id='login-btn' class="btn btn-lg btn-dark">Se connecter</button>
							<button id='signup-btn' class="btn btn-lg btn-outline-dark">S'inscrire</button>
						</div>

						<!-- login -->
						<?php require("elements/login-form.php"); ?>

						<!-- signup -->
						<?php require("elements/signup-form.php"); ?>

					</div>
				</div>
		</div>

		<?php 
			$js_addon = "<script src='static/js/login.js'></script>";
			require("elements/js_files.php"); 
		?>
	</body>

</html>