<?php
	/**
	 * @file signup-form.php
	 * @brief architecture HTML du formulaire d'inscription
	 */
?>

<div id="signup-form" class="space-before-row text-center">
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
				<input name="username" id="username" type="text" aria-describedby="descrPseudo" placeholder="identifiant" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label class="sr-only">Email: </label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-at"></i></div>
				</div>
				<input name="email" id="email" type="email" placeholder="ulysse@odyssee.fr" class="form-control">
			</div>
			
		</div>
		
		<div class="form-group">
			<label class="sr-only">Mot de passe: </label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-key"></i></div>
				</div>
				<input name="password" id="password" type="password" placeholder="****" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label class="sr-only">Confirmation: </label>
			<div class="input-group mb-2">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-key"> Vérification</i></div>
				</div>
				<input name="password2" id="password2" type="password" placeholder="****" class="form-control">		
			</div>
			
		</div>
		
		<button type="submit" id="signsend" name="signsend" class="btn btn-primary">S'enregistrer</button>
	</form>
</div>
					