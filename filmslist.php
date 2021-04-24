<?php
	
	/**
	 * @file filmslist.php
	 * @brief Liste des films disponibles sur le site
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 25 mars 2021
	 */


	require_once("controller/authentification.php");
	session_start();

	$q = $db->query("SELECT * FROM categories");
	$categories = $q->fetchAll();

	for ($i = 0; $i < count($categories); $i++) {
		$q = $db->prepare("SELECT * FROM films WHERE id_categorie = :id_cat");
		$q->execute(['id_cat' => $categories[$i]['id_categorie']]);

		$categories[$i]['films'] = $q->fetchAll();
	}

?>

<!DOCTYPE html>
<html lang='fr'>

	<?php
		$css_addon = "<link href='static/css/slider.css' rel='stylesheet' />";
		require("elements/head.php"); 
	?>

	<body class="d-flex flex-column">
		<div class="flex-grow-1 flex-shrink-0">

			<?php require('elements/navigation.php'); ?> 

			<div class="container main-container">
				<div class="row">
					<div class="col-md-12">
						<h1>Le catalogue de tous nos films</h1>
						<h5>Quand on ne sait pas quoi regarder, il suffit de cliquer !</h5>
					</div>
				</div>

				<?php for ($cat=0; $cat<count($categories); $cat++) : ?>
					<?php if (count($categories[$cat]['films']) > 0) : ?>
						<div class="row space-before-row">
							<h3>Dans la catégorie <?php echo $categories[$cat]['nom'] ; ?></h3>
						</div>

						<?php 
							$films_array = $categories[$cat]['films'];
							include ("elements/films-slider.php");
						?>
					<?php endif ?>
				<?php endfor ?>
			</div>			
		</div>


		<?php require('elements/footer.php'); ?>
		<?php 
			$js_addon = "<script src='static/js/slider.js'></script>";
			require('elements/js_files.php'); ?>
	</body>
</html>
