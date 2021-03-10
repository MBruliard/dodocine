<?php
	require_once("elements/header.php");
?>

<h1>Bienvenue sur DodoCiné ! </h1>
<h5>Les cinémas sont fermés, mais pas notre canapé !</h5>

<p>Pourquoi pas un petit carousel ici, qui fera apparaitre les derniers films</p>

<div class="row">
	<div class="jumbotron col col-md-5">
		<h5 class="display-4">Découvrez cet acteur</h5>
		<p class="lead">Un acteur choisi au hasard apparaitra ici</p>
		<hr class="my-4">
		<p>J'espère que ce sera Ryan Reynolds... Croisons les doigts !</p>
		<div class="text-right">
			<a class="btn btn-warning" href="#" role="button">Voir la fiche</a>
		</div>
	</div>

	<div class="jumbotron col offset-md-1 col-md-5">
		<h5 class="display-4">Découvrez ce film</h5>
		<p class="lead">Un film choisi au hasard apparaitra ici</p>
		<hr class="my-4">
		<p>Ben forcément un film de Ryan sinon rien ! (Deadpool avec un peu de chance)</p>
		<div class="text-right">
			<a class="btn btn-warning" href="#" role="button">Voir la fiche</a>
		</div>
	</div>
</div>


<?php 
	require_once ("elements/footer.php");
?>