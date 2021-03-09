<?php
	$title_page = "DodoCiné - Connexion" ;
	require_once("elements/header.php") ;

?>

<h1>Connexion</h1>


<form method="post" action="" class="centered-container">
	<div class="form-group">
		<label>Identifiant: </label>
		<input name="username" id="username" type="text" class="form-control">
	</div>
	
	<div class="form-group">
		<label>Password: </label>
		<input name="password" id="password" type="password" class="form-control">
	</div>
	
	<button type="submit" id="loginsend" name="loginsend" class="btn btn-primary">Se connecter</button>
</form>

<p>Vous n'avez pas de compte ?</p>
<a class="btn btn-primary" href="signin.php">S'inscrire</a>

<?php
	require_once("elements/footer.php");
?>