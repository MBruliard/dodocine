<?php
	/**
	 * @file login-form.php
	 * @brief architecture en HTML du formulaire de connexion
	 */
?>

<div id="login-form" class="space-before-row text-center">
	<?php if (isset($color_message)) : ?>
		<?php if ($color_message) : ?>
			<div class='alert alert-success' >
		<?php else : ?>
			<div class='alert alert-danger' >
		<?php endif ?>	
			<p><?php echo $message ?></p>
		</div>
	<?php endif ?>
	<form method="post" action="">
		<div class="form-group">
			<label class="sr-only" for="username">Identifiant</label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-user"></i></div>
				</div>
				<input name="username" id="username" type="text" placeholder="identifiant" class="form-control">
			</div>
		</div>
		
		<div class="form-group">
			<label class="sr-only" for="password">Mot de passe: </label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-key"></i></div>
				</div>
				<input name="password" id="password" type="password" placeholder="****" class="form-control">
			</div>
		</div>
		
		<button type="submit" id="loginsend" name="loginsend" class="btn btn-primary">Se connecter</button>
	
	</form>
	<a href="#">Mot de passe oublié ?</a>	
</div>

