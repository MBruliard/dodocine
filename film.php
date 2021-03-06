<?php

	/**
	 * @file present-film.php
	 * @brief Présentation d'un film donné
	 * @author Margaux BRULIARD
	 * @date 8 avril 2021
	 */
	require("controller/authentification.php");
	session_start();

	require("controller/datafilms.php");

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
	 * On récupère le nom du réalisateur du film
	 */
	$real = getDirectorFilm($db, $film_id);

	/**
	 * On récupère les noms des acteurs principaux du film
	 */
	$actors = getActorsFilm($db, $film_id);

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
		$css_addon = "<link rel='stylesheet' href='static/css/rating.css' /><link rel='stylesheet' href='static/css/forum.css' />";
		require("elements/head.php"); 
	?>

	<body class="d-flex flex-column">
		<div class="flex-grow-1 flex-shrink-0">
			<?php require('elements/navigation.php'); ?>


			<div class="container main-container">

				<!-- presentation -->
				<div class="row space-before-row">

					<div class="col-md-4 col-sm-12 align-center">
						<img class="dodo-present-img" src=
							<?php 
								if($film['res']) {
									echo $film['values']['photo'];
								} 
								else {
									echo '/static/img/template_img.jpg';
								}

							?>
							/>

							<?php if(isset($_SESSION['user'])): ?>
								<div class="fav-buttons-div align-center">
									<button id="add-fav-button" class="btn btn-danger btn-sm"><i class="fas fa-plus-circle"></i> Mes Favoris</button>
									<button id='remove-fav-button' class="btn btn-outline-danger btn-sm">
										<i class="fas fa-minus-circle"></i> Mes Favoris
									</button>
								</div>
							<?php endif ?>
					</div> 

					<div class="col-md-8 col-sm-12">
						<div class="row align-center">
							<h2><?php if ($film['res']) {echo $film['values']['titre'];} ?></h2>
						</div>

						
						<div class="row space-before-row">
							<div class="col-sm-12">

								<table class="table full-row">
									<tr>
										<td colspan="4">
											<div class="category-name">Note de la communauté:</div>
											<?php include("elements/rating-system.php"); ?>
										</td>
									</tr>
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
										<td>
											<?php if($real['res']) : ?>
												<a href=<?php echo "'/actor.php?id_ind=" . $real['id_real'] . "'"; ?>><?php echo $real['realisateur']; ?></a> 
											<?php else: ?>
												<p>Inconnu</p>
											<?php endif ?>
										</td>
										<td><div class="category-name">Nationalité:</div></td>
										<td>
											<?php if ($film['res']) { echo $film['values']['pays']; } ?>
										</td>
									</tr>
									<tr>
										<td><div class="category-name">Acteurs principaux:</div></td>
										<td colspan="3">
											<?php for ($i=0; $i<count($actors); $i++) : ?>
												<a href=<?php echo "'/actor.php?id_ind=" . $actors[$i]['id_acteur'] . "'";  ?> >
													<?php echo "  " . $actors[$i]['acteur'] . ","; ?>
												</a>
											<?php endfor ?>
										</td>
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
					<h3 class='create-space-row 3 subsubtitle'>Vous aimerez peut-être</h3>
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

				<div class="row space-before-row">
					<h3 class="subsubtitle">Commentaires:</h2>
				</div>

				<?php include ("elements/forum.php"); ?>

			</div>
		</div>
			
		<?php require("elements/footer.php"); ?>
		<?php 
			$js_addon = "<script src='static/js/rating.js'></script><script src='static/js/forum.js'></script><script src='static/js/favoris.js'></script>";
			require("elements/js_files.php"); 
		?>
	</body>
</html>