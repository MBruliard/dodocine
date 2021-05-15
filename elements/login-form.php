<?php
	/**
	 * @file login-form.php
	 * @brief architecture en HTML du formulaire de connexion
	 */
?>

<div id="login-container" class="space-before-row text-center">

	<form id="login-form" method="post" action="">
		
		<div id="username-login-group" class="form-group">
			<label class="sr-only" for="username-login">Identifiant</label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-user"></i></div>
				</div>
				<input name="username-login" id="username-login" type="text" placeholder="identifiant" class="form-control">
			</div>
		</div>
		
		<div id="password-login-group" class="form-group">
			<label class="sr-only" for="password-login">Mot de passe: </label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-key"></i></div>
				</div>
				<input name="password-login" id="password-login" type="password" placeholder="****" class="form-control">
			</div>
		</div>
		
		<button type="submit" class="btn btn-dark">Se connecter</button>
	
	</form>
	<a href="#">Mot de passe oublié ?</a>	
</div>

