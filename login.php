<?php
	/**
	 * @file login.php
	 * @brief Page de connexion pour les utilisateurs
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */

	/**
	 * Titre de la page
	 */
	$title_page = "DodoCiné - Connexion" ;
	
	require_once("elements/header.php") ;

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

?>

<div class="row">
	<div class="col">
		<h1>Connexion</h1>
	</div>
</div>
<div class="row">
	<div class="col col-md-9 col-sm-8">
		<?php if (isset($color_message)) : ?>
			<?php if ($color_message) : ?>
				<div class='alert alert-success' >
			<?php else : ?>
				<div class='alert alert-danger' >
			<?php endif ?>	
				<p><?php echo $message ?></p>
			</div>
		<?php endif ?>

		<div class="card centered-container">
			<div class="card-body">
				<form method="post" action="">
					<div class="form-group row">
						<label class="col col-md-3">Identifiant: </label>
						<input name="username" id="username" type="text" placeholder="pseudo" aria-describedby="descrPseudo" class="form-control col col-md-9">
					</div>
					
					<div class="form-group row">
						<label class="col col-md-4">Mot de passe: </label>
						<input name="password" id="password" type="password" placeholder="****" class="form-control col col-md-8">
					</div>
					

					<div class="row">
						<div class="col text-right">
							<button type="submit" id="loginsend" name="loginsend" class="btn btn-primary">Se connecter</button>
						</div>
					</div>
				</form>
				<a href="#">Mot de passe oublié ?</a>	
			</div>
		
		</div>
	</div>

	<div class="col col-md-3 col-sm-4 text-center">
		<div class="card">
			<div class="card-header">
				Pas encore inscrit ?
			</div>
			<div class="card-body">
				<h6 class="card-title">Rejoignez la communauté des férus du divan</h6>
				<p class="card-text">Créez votre compte maintenant</p>
				<a href="signin.php" class="btn btn-info">S'inscrire</a>
			</div>
		</div>
	</div>
</div>

<?php
	require_once("elements/footer.php");
?>