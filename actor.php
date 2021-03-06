<?php

	/**
	 * @file present-film.php
	 * @brief Présentation d'un acteur donné
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 8 avril 2021
	 */

	require("controller/authentification.php");
	session_start();

	require("controller/dataindividus.php");

	// RÉCUPÉRER ID dans URL
	if (!isset($_GET['id_ind'])) {
		header("location: /indlist.php");

	}

	$id_ind = htmlspecialchars($_GET["id_ind"]);

	$ind = getIndividu($db, $id_ind);
	if (!$ind['res']) {
			header ("location: /indlist.php");
	}

	$as_actor = getFilmsFromActor($db, $id_ind);
	$as_real = getFilmsFromReal($db, $id_ind);
?>

<!DOCTYPE html>
<html lang='fr'>

	<?php
		$title_page = "Fiche Acteur | " . $ind['values']['prenom'] . " " . $ind['values']['nom'];
		$css_addon = "<link rel='stylesheet' href='static/css/rating.css' /><link rel='stylesheet' href='static/css/slider.css' />";
		require("elements/head.php"); 
	?>

	<body class="d-flex flex-column">
		<div class="flex-grow-1 flex-shrink-0">
			<?php require('elements/navigation.php'); ?>


			<div class="container main-container">

				<!-- presentation -->
				<div class="row">

					<div class="col-md-4 col-sm-12">
						<img class="img-fluid dodo-present-img" src=
							<?php
								if ($ind['res']) {
									echo $ind['values']['photo'];
								}
								else {
									echo '/static/img/template_img.jpg';
								}
							?>
						/>
					</div> 

					<div class="col-md-8 col-sm-12">
						<div class="row">
							<h2 class="align-center"><?php if ($ind['res']) {echo $ind['values']['prenom'] . ' ' . $ind['values']['nom'];} ?></h2>
						</div>

						<div class="row">
							<div class="col-sm-12">

								<table class="table full-row">
									<tr>
										<td><div class="category-name">Année de naissance:</div></td>
										<td>
											<?php if ($ind['res']) { echo $ind['values']['annee']; } ?>
											
										</td>
										<td><div class="category-name">Pays:</div></td>
										<td><?php if ($ind['res']) { echo $ind['values']['pays']; } ?></td>
									<tr>
									<tr>
										<td><div class="category-name">Activité:</div></td>
										<td>
											<?php
												echo getActivityFromIndividu($db, $id_ind);
											?>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<h3 class='subtitle'>Filmographie</h3>
				</div>

				<!-- acteur -->
				<?php if (count($as_actor) > 0) : ?>
					<div class="row">
						<h4 class="subsubtitle">En tant qu'acteur/actrice</h4> 
					</div>

					<?php
						$films_array = $as_actor;
						include ("elements/films-slider.php");
					?>
				<?php endif ?>
				
				<!-- realisateur -->
				<?php if (count($as_real) > 0) : ?>
					<div class="row">
						<h4 class="subsubtitle">En tant que réalisateur</h4>
					</div>

					<?php
						$films_array = $as_real;
						include ("elements/films-slider.php");
					?>
				<?php endif ?>
			</div>
		</div>

		<?php require("elements/footer.php"); ?>
		<?php 
			$js_addon = "<script src='static/js/rating.js'></script><script src='static/js/slider.js'></script>";
			require("elements/js_files.php"); 
		?>
	</body>
</html>