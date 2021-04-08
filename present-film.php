<?php

	/**
	 * @file present-film.php
	 * @brief Présentation d'un film donné
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 8 avril 2021
	 */
	require("controller/authentification.php");
	session_start();

	require("controller/datafilms.php");
	//global $db;

	// RÉCUPÉRER ID dans URL
	if (!isset($_GET['id_film'])) {
		header("location: /filmslist.php");

	}

	$film_id = htmlspecialchars($_GET["id_film"]);

	$film = getFilm($db, $film_id);
	if (!$film['res']) {
			header ("location: /filmslist.php");
	}

	/**
	 * On cherche un film dans la même catégorie
	 */
	$same_cat = aleaSameCategory($db, $film_id);
	
	/**
	 * Film du même réalisateur
	 */

	/**
	 * Film ayant un acteur en commun
	 */
?>

<!DOCTYPE html>
<html lang='fr'>

	<?php
		$title_page = "Fiche Film";
		require("elements/head.php"); 
	?>

	<body class="d-flex flex-column">
		<div class="flex-grow-1 flex-shrink-0">
			<?php require('elements/navigation.php'); ?>


			<div class="container">

				<!-- presentation -->
				<div class="row">

					<div class="col-md-4 col-sm-12">
						todo: FIXER LA TAILLE DE L'IMAGE MAX POUR EVITER LES SURPRISES
						<img class="img-fluid" src="/static/img/template_img.jpg" />
					</div> 

					<div class="col-md-8 col-sm-12">
						<div class="row">
							<h2 class="align-center"><?php if ($film['res']) {echo $film['values']['titre'];} ?></h2>

							<div class="note align-right">
								<p>une ligne en dessous et à droite todo</p>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="category-name">Catégorie:</div> <?php if ($film['res']) { echo $film['values']['catnom']; } ?>
								<p>Réalisateur</p>
								<p>Acteurs principaux</p>
							</div>

							<div class="col-md-6 col-sm-12">
								<p>Année</p>
								<p>Nationalité</p>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<h3>Vous aimerez peut-être</h3>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="card" style="width: 18rem;">
							<img class="card-img-top" src="..." alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">Par le même réalisateur</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>

					
					<div class="col-md-4 col-sm-12">
						<div class="card" style="width: 18rem;">
							<img class="card-img-top" src="..." alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">Avec "cet acteur qui sera automatiquement choisi"</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>

					<?php if ($same_cat['res']) : ?>
						<div class="col-md-4 col-sm-12">
							<div class="card" style="width: 18rem;">
								<img class="card-img-top" src="..." alt="TODO url du film à afficher">
								<div class="card-body">
									<h5 class="card-title">Dans la même catégorie</h5>
									<p class="card-text">
										<?php echo $same_cat['values']['titre']; ?>
									</p>
									<a href=<?php echo "/present-film.php?id_film=" . $same_cat['values']['id_film']; ?> class='btn btn-primary'>Plus d'infos</a>
								</div>
							</div>
						</div>
					<?php endif ?>

				</div>

				<!-- suggestions -->
				<div class="row">

					todo
				</div>

			</div>
		</div>

		<?php require("elements/footer2.php"); ?>
		<?php require("elements/js_files.php"); ?>
	</body>
</html>