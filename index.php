<?php
	
	/**
	 * @file index.php
	 * @brief Page d'accueil de notre site
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */

	require("controller/authentification.php");
	session_start();
?>

<!DOCTYPE html>
<html lang='fr'>

	<?php require("elements/head.php"); ?>

	<body class="d-flex flex-column">
		<div class="flex-grow-1 flex-shrink-0">
			<?php require('elements/navigation.php'); ?>


			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="dodo-red">Bienvenue sur DodoCiné ! </h1>
						<h5>Les cinémas sont fermés, mais pas notre canapé !</h5>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<?php require('views/carousel.php'); ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<h4>A découvrir</h4>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="card">
							<img class="card-img-top" src="static/img/template_img.jpg" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">Spotlight sur "mettre le nom de l'acteur"</h5>
								<p class="card-text">Le retour de Ryan Reynolds.</p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-12">
						<div class="card">
							<img class="card-img-top" src="static/img/template_img.jpg" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">Mise en lumière "nom du film"</h5>
								<p class="card-text">Un nouveau film</p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>


		<?php require('elements/footer2.php'); ?>
		<?php require('elements/js_files.php'); ?>
	</body>
</html>