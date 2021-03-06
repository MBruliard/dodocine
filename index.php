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

	require("controller/datafilms.php");
	require("controller/dataindividus.php");


	$alea_film = getAleaFilm($db);
	$alea_actor = getAleaActor($db);
?>

<!DOCTYPE html>
<html lang='fr'>

	<?php require("elements/head.php"); ?>

	<body class="d-flex flex-column">
		<div class="flex-grow-1 flex-shrink-0">

			<?php require('elements/navigation.php'); ?>
			<div class="jumbotron jumbotron-fluid">
				<h1 class="display-4 text-white">Bienvenue sur DodoCiné!</h1>
				<p class="lead">Sortez le plaid et installez vous confortablement pour binge-watcher avec nous !</p>
			</div>

			<div class="container main-container">

				<div class="row">
					<div class="col-md-4 col-sm-12">
						<h4 class="subtitle">à l'affiche</h4>
						<?php require('elements/carousel.php'); ?>
					</div>

					<div class="col-md-4 col-sm-12">
						<h4 class="subtitle">Spotlight sur </h4>
						<?php 
							$img_dodo_card = $alea_actor['photo'];
							$content_dodo_card = $alea_actor['prenom'] .  " " . $alea_actor['nom'];
							$link_dodo_card = "/actor.php?id_ind=" . $alea_actor['id_individu'];
							include ("elements/dodo-card.php");
						?>
					</div>

					<div class="col-md-4 col-sm-12">
						<h4 class="subtitle">Connaissez vous ce film ?</h4>
						<?php 
							$img_dodo_card = $alea_film['photo'];
							$content_dodo_card = $alea_film['titre'];
							$link_dodo_card = "/film.php?id_film=" . $alea_film['id_film'];
							include ("elements/dodo-card.php");
						?>
					</div>
				</div>
			</div>

		</div>

		<?php require('elements/footer.php'); ?>
		<?php require('elements/js_files.php'); ?>
	</body>
</html>