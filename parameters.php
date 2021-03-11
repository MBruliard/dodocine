<?php
	/**
	 * @file parameters.php
	 * @brief Page des paramètres utilisateurs
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */

	/**
	 * Titre de la page
	 */
	$title_page = "DodoCiné | Paramètres Utilisateurs" ;
	
	require_once ("elements/header.php");

	/**
	 * Vérification: Si pas d'utilisateur connecté, l'accès est interdit
	 */
	if (!isset($_SESSION['user'])) {
		header ("location: /index.php");
		exit();
	}

	/**
	 * Si le bouton modifier mot de passe a été selectionné
	 */
	if (isset($_POST['changpwd'])) {
		extract($_POST);
		$mod = modify_password($db, $_SESSION['user'], $new_pwd, $conf_new_pwd);;
		
		// TODO: une fenetre modale pour annoncer la réussite
	}



	/**
	 * Si le bouton Modifier email a été sélectionné
	 */
	if (isset($_POST['changemail'])) {
		extract($_POST);
		modify_email($db, $_SESSION['user'], $new_email);

		// TODO: une fenetre modale pour annoncer la réussite
	}


?>


<div class="row">
	<div class="col">	
		<h1>Paramètres Utilisateurs</h1>
		<h2><?php echo $_SESSION['user']; ?></h2>
	</div>
</div>

<div class="row">
	<div class="col col-md-9">
		<div class="card">
			<h6 class="card-header">Statistiques</h6>

			<div class="card-body">
				<p>un joli tableau sera bientot ici</p>
			</div>
		</div>
	</div>

	<div class="col col-md-3">
		<div class="card">
			<h6 class="card-header">Apparence</h6>
			<div class="card-body">
				<div class="custom-control custom-switch">
					<input type="checkbox" class="custom-control-input" id="customSwitch1">
					<label class="custom-control-label" for="customSwitch1">Activer le mode Nuit</label>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row space-before-row">
	<div class="col offset-md-1 col-md-10 offset-md-1">
		<div class="card">
			<h6 class="card-header">Paramètres du compte</h6>
			<div class="card-body">
				
				<!-- changer le mot de passe -->
				<div class="card">
					<div class="card-header alert alert-warning">
						Changer son mot de passe
					</div>

					<div class="card-body">
						<form method="post">
							<div class="row">
								<div class="form-group col col-md-5">
									<label>Nouveau mot de passe</label>
									<input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="*****">
								</div>
								<div class="form-group col col-md-5">
									<label>Confirmation</label>
									<input type="password" class="form-control" id="conf_new_pwd" name="conf_new_pwd" placeholder="*****">
								</div>
							</div>
							<div class="row">
								<div class="col offset-md-10 col-md-2">
									<button type="submit" id="changpwd" name="changpwd" class="btn btn-warning">Modifier</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- changer l'email -->
				<div class="card space-before-row">
					<div class="card-header alert alert-info">Changer son adresse email</div>
					<div class="card-body">
						<form method="post">
							<div class="row">
								<div class="form-group col col-md-10">
									<label for="new_email">Nouvel Email</label>
									<input type="email" class="form-control" id="new_email" name="new_email" placeholder="exemple@domain.com">
								</div>
							</div>
							<div class="row">
								<div class="col offset-md-10 col-md-2">
									<button type="submit" id="changemail" name="changemail" class="btn btn-info">Modifier</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- Supprimer son compte -->
				<div class="card space-before-row">
					<div class="card-header alert alert-danger">Supprimer mon compte</div>
					<div class="card-body">
						<p>Votre compte sera supprimé immédiatement à la suite de cette action et toutes vos informations seront perdues</p>
						<div class="text-right">
							<a class="btn btn-danger btn-lg" href="deleteaccount.php">Supprimer</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


Theme Dark/Light à choisir
Statistiques nbr de notes, moyenne des notes, nbr de messages publiés 


<?php
	require_once ("elements/footer.php");
?>