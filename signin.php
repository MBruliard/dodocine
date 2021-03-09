<?php
	$title_page = "DodoCiné - Inscription" ;
	require_once("elements/header.php") ;

	include ("controller/users_sql.php");

	$message = null;
	$color_message = null;
	if (isset($_POST['signsend'])) {
		extract($_POST);
		$res = create_new_user($db, $username, $email, $password, $password2);
		$message = $res['msg'];
		$color_message = $res['res'];
	}

?>


<h1>Inscription</h1>

<?php if (isset($color_message)) : ?>
	<?php if ($color_message) : ?>
		<div class='alert alert-success' >
	<?php else : ?>
		<div class='alert alert-danger' >
	<?php endif ?>	
		<p> <?php echo $message ?></p>
	</div>
<?php endif ?>


<form method="post" action="" class="centered-container">
	<div class="form-group">
		<label>Identifiant: </label>
		<input name="username" id="username" type="text" class="form-control">
	</div>

	<div class="form-group">
		<label>Email: </label>
		<input name="email" id="email" type="email" class="form-control">
	</div>
	
	<div class="form-group">
		<label>Mot de passe: </label>
		<input name="password" id="password" type="password" class="form-control">
	</div>

	<div class="form-group">
		<label>Confirmation du mot de passe: </label>
		<input name="password2" id="password2" type="password" class="form-control">
	</div>
	
	<button type="submit" id="signsend" name="signsend" class="btn btn-primary">Enregistrer</button>
</form>

<p>Vous avez déjà un compte ?</p> 
<a class="btn btn-primary" href="login.php">Se connecter</a>


<?php
	require_once("elements/footer.php");
?>