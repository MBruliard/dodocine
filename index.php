<?php
	
	/**
	 * @file index.php
	 * @brief Page d'accueil de notre site
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */

	require_once("elements/header.php");
?>

<h1>Bienvenue sur DodoCiné ! </h1>
<h5>Les cinémas sont fermés, mais pas notre canapé !</h5>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/static/img/pillow.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/static/img/pillow.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/static/img/pillow.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




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