<?php
	/**
	 * @file log_and_sign_in.php
	 * @brief nouvelle version pour s'inscrire et se connecter à notre site
	 * @details: ici on reconstruit tout: pas de header ou de footer on a une version épurée avec juste un canapé
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
	if (isset($_SESSION['user'])) {
		header ("location: index.php");
	}
	
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


<DOCTYPE html>
<html lang='fr'>

	<?php 
		$title_page = 'Test login';
		$css_addon = "<link href='static/css/login.css' rel='stylesheet' />";
		require_once("elements/head.php"); 
	?>

	<body class="d-flex flex-column dodo-background">
		<div id="page-container">

			<?php require("elements/header2.php"); ?>

			<?php require("elements/navigation.php"); ?>
			<div class="container-fluid">

				<div class="row full-row">
			
					<div class="col-md-6 col-sm-12">

				<div class="card form-container">
					<div class="card-header">
						<h4 class="align-center" id='login-title'>Se Connecter</h4>
					</div>
					<div class="card-body text-center">

						<div class="space-before-row btn-group">
							<button id='login-btn' class="btn  btn-primary">Se connecter</button>
							<button id='signup-btn' class="btn">S'inscrire</button>
						</div>

						<!-- login -->
						<?php require("views/login-form.php"); ?>

						<!-- signup -->
						<?php require("views/signup-form.php"); ?>

					</div>

				</div>
					</div>

					<div class="col-md-6 col-sm-12 container-align-middle">

						<img class="img-fluid img-align-middle" src="static/img/popcorn-155602_1280.png">
					</div>


			</div>
		</div>



			<!-- footer -->
			<?php require("elements/footer2.php"); ?>
			<?php 
				$js_addon = "<script src='static/js/login.js'></script>";
				require("elements/js_files.php"); 
			?>


		</div> <!-- page-container -->
	</body>

</html>