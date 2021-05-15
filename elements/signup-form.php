<?php
	/**
	 * @file signup-form.php
	 * @brief architecture HTML du formulaire d'inscription
	 */
?>

<div id="signup-container" class="space-before-row text-center">
	
	<form id="signup-form" method="post" action="">
		
		<div id="username-signup-group" class="form-group">
			<label class="sr-only" for="username">Identifiant</label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-user"></i></div>
				</div>
				<input name="username-signup" id="username-signup" type="text" aria-describedby="descrPseudo" placeholder="identifiant" class="form-control">
			</div>
		</div>

		<div id="email-signup-group" class="form-group">
			<label class="sr-only">Email: </label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-at"></i></div>
				</div>
				<input name="email-signup" id="email-signup" type="email" placeholder="ulysse@odyssee.fr" class="form-control">
			</div>
			
		</div>
		
		<div id="password-signup-group" class="form-group">
			<label class="sr-only">Mot de passe: </label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-key"></i></div>
				</div>
				<input name="password-signup" id="password-signup" type="password" placeholder="****" class="form-control">
			</div>
		</div>

		<div id="password2-signup-group" class="form-group">
			<label class="sr-only">Confirmation: </label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-key"> Vérification</i></div>
				</div>
				<input name="password2-signup" id="password2-signup" type="password" placeholder="****" class="form-control">		
			</div>
			
		</div>
		
		<button type="submit" id="signsend" name="signsend" class="btn btn-dark">S'enregistrer</button>
	</form>
</div>
					