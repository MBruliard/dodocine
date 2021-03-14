<?php
	
	/**
	 * @file signin.php
	 * @brief Page d'inscription au site
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */

	/**
	 * Titre de la page
	 */
	$title_page = "DodoCiné - Inscription" ;
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
	 *	On vérifie que l'utilisateur ne tente pas de se connecter alors qu'une session est déjà en cours
	 */
	if (isset($_SESSION['user'])) {
		header ("location: index.php");
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
	}

?>

<div class="row">
	<div class="col">
		<h1>Inscription</h1>
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
				<p> <?php echo $message ?></p>
			</div>
		<?php endif ?>

		<div class="card centered-container">
			<div class="card-body">
				<form method="post" action="">
					<div class="form-group row">
						<label class="col col-md-3">Identifiant: </label>
						<input name="username" id="username" type="text" placeholder="Personne" aria-describedby="descrPseudo" class="form-control col col-md-9">
						<small id="descrPseudo" class="form-text text-muted">Seul ce nom apparaitra publiquement sur le site</small>
					</div>

					<div class="form-group row">
						<label class="col col-md-3">Email: </label>
						<input name="email" id="email" type="email" placeholder="ulysse@odyssee.fr" class="form-control col col-md-9">
					</div>
					
					<div class="form-group row">
						<label class="col col-md-4">Mot de passe: </label>
						<input name="password" id="password" type="password" placeholder="****" class="form-control col col-md-8">
					</div>
					<div class="form-group row">
						<label class="col col-md-4">Confirmation mot de passe: </label>
						<input name="password2" id="password2" type="password" placeholder="****"class="form-control col col-md-8">
					</div>
					
					<div class="row">
						<div class="col text-right">
							<button type="submit" id="signsend" name="signsend" class="btn btn-primary">S'enregistrer</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="col col-md-3 col-sm-4 text-center">
		<div class="card">
			<div class="card-header">
				Déjà inscrit sur DodoCiné ?
			</div>
			<div class="card-body">
				<p class="card-text">Connectez-vous maintenant</p>
				<a href="login.php" class="btn btn-info">Se connecter</a>
			</div>
		</div>
	</div>
</div>


<?php
	require_once("elements/footer.php");
?>