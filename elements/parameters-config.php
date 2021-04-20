<?php

	/**
	 * @file elements/parameter-config.php
	 * @brief section  gestion des paramètres du compte comme changer d'email, de mot de pasee, etc  dans la page espace utilisateur
	 */
?>


<div class="row">
	<div class="col-sm-12">
		<h5 style="text-align:center;">Paramètres du compte</h5>
	</div>
</div>

<div class="row space-before-row">
	<div class="col-sm-12">

		<div class="card">
			<div class="card-header alert alert-warning">
				Changer son mot de passe
			</div>

			<div class="card-body">
				<form id="pwd-form" action="" method="POST">
					<div class="row">
						<div id="new_pwd_group" class="form-group col col-md-5">
							<label for="new_pwd">Nouveau mot de passe</label>
							<input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="*****">
						</div>
						<div id="conf_new_pwd_group" class="form-group col col-md-5">
							<label>Confirmation</label>
							<input type="password" class="form-control" id="conf_new_pwd" name="conf_new_pwd" placeholder="*****">
						</div>
					</div>
					<div class="row">
						<div class="col offset-md-10 col-md-2">
							<button type="submit" class="btn btn-warning">Modifier</button>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>

<div class="row space-before-row">
	<div class="col-sm-12">
		<!-- changer l'email -->
		<div class="card">
			<div class="card-header alert alert-info">Changer son adresse email</div>
			<div class="card-body">
				<form id="email-form" method="post">
					<div class="row">
						<div id="new_email_group" class="form-group col col-md-10">
							<label for="new_email">Nouvel Email</label>
							<input type="email" class="form-control" id="new_email" name="new_email" placeholder="exemple@domain.com">
						</div>
					</div>
					<div class="row">
						<div class="col offset-md-10 col-md-2">
							<button type="submit" class="btn btn-info">Modifier</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row space-before-row">
	<div class="col-sm-12">

		<!-- Supprimer son compte -->
		<div class="card">
			<div class="card-header alert alert-danger">Supprimer mon compte</div>
			<div class="card-body">
				<p>Votre compte sera supprimé immédiatement à la suite de cette action et toutes vos informations seront perdues</p>
				<div class="text-right">
					<button id="delete_account_btn" class="btn btn-danger btn-lg">Supprimer</button>
				</div>
			</div>
		</div>
	</div>
</div>

