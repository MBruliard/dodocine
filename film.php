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
	$same_real = aleaSameProductor($db, $film_id);


	/**
	 * Film ayant un acteur en commun
	 */
	$same_actor = aleaSameActor($db, $film_id);
?>

<!DOCTYPE html>
<html lang='fr'>

	<?php
		$title_page = "Fiche Film";
		$css_addon = "<link rel='stylesheet' href='static/css/rating.css' />";
		require("elements/head.php"); 
	?>

	<body class="d-flex flex-column">
		<div class="flex-grow-1 flex-shrink-0">
			<?php require('elements/navigation.php'); ?>


			<div class="container">

				<!-- presentation -->
				<div class="row">

					<div class="col-md-4 col-sm-12">
						<img class="img-fluid" src=
							<?php 
								if($film['res']) {
									echo $film['values']['photo'];
								} 
								else {
									echo '/static/img/template_img.jpg';
								}

							?>
							/>
					</div> 

					<div class="col-md-8 col-sm-12">
						<div class="row">
							<h2 class="align-center"><?php if ($film['res']) {echo $film['values']['titre'];} ?></h2>
						</div>

						<div class="row">
							<div class="col align-self-end">
								<?php include ("elements/rating-system.php"); ?>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">

								<table class="table full-row">
									<tr>
										<td><div class="category-name">Catégorie:</div></td>
										<td>
											<?php if ($film['res']) { echo $film['values']['catnom']; } ?>
											
										</td>
										<td><div class="category-name">Année:</div></td>
										<td>
											<?php if ($film['res']) { echo $film['values']['annee']; } ?>
										</td>
									<tr>
									<tr>
										<td><div class="category-name">Réalisateur:</div></td>
										<td></td>
										<td><div class="category-name">Nationalité:</div></td>
										<td>
											<?php if ($film['res']) { echo $film['values']['pays']; } ?>
										</td>
									</tr>
									<tr>
										<td><div class="category-name">Acteurs principaux:</div></td>
										<td colspan="3"></td>
									</tr>
									<tr>
										<td><div class="category-name">Durée:</div></td>
										<td colspan="3"> <?php if ($film['res']) { echo $film['values']['duree']; } ?> min </td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<h3 class='create-space-row dodo-blue'>Vous aimerez peut-être</h3>
				</div>
				<div class="row">
					<?php if ($same_real['res']) : ?>
						<div class="col-md-4 col-sm-12">
							<?php 
								$header_dodo_card = "Par le même réalisateur";
								$img_dodo_card = $same_real['values']['photo'];
								$content_dodo_card = $same_real['values']['titre'];
								$link_dodo_card = "/film.php?id_film=" . $same_real['values']['id_film']; 
								include ("elements/dodo-card.php");
							?>
						</div>
					<?php endif ?>
					
					<?php if ($same_cat['res']) : ?>
						<div class="col-md-4 col-sm-12">
							<?php 
								$header_dodo_card = "Dans la même catégorie";
								$img_dodo_card = $same_cat['values']['photo'];
								$content_dodo_card = $same_cat['values']['titre'];
								$link_dodo_card = "/film.php?id_film=" . $same_cat['values']['id_film']; 
								include ("elements/dodo-card.php");
							?>
						</div>
					<?php endif ?>
 
					<?php if ($same_actor['res'] ) : ?>
						<div class="col-md-4 col-sm-12">
							<?php 
								$header_dodo_card = "Avec " . $same_actor['values']['prenom'] . " " . $same_actor['values']['nom'];
								$img_dodo_card = $same_actor['values']['photo'];
								$content_dodo_card = $same_actor['values']['titre'];
								$link_dodo_card = "/actor.php?id_ind=" . $same_actor['values']['id_acteur']; 
								include ("elements/dodo-card.php");
							?>
						</div>
					<?php endif ?>

				</div>

				<!-- suggestions -->
				<div class="row">

					todo gérer les tailles des images -> image du film doit être plus grande que celles des suggestions
				</div>

			</div>
		</div>

		<?php require("elements/footer.php"); ?>
		<?php 
			$js_addon = "<script src='static/js/rating.js'></script>";
			require("elements/js_files.php"); 
		?>
	</body>
</html>