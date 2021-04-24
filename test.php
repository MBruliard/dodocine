<?php
	/**
	 * @file login.php
	 * @brief nouvelle version pour s'inscrire et se connecter à notre site
	 * 
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


<DOCTYPE html>
<html lang='fr'>

	<?php 
		$title_page = 'Dodociné | Se connecter';
		//$css_addon = "<link href='static/css/slider.css' rel='stylesheet' />";
		require_once("elements/head.php"); 
	?>

	<body class="d-flex flex-column">
		<div class="flex-grow-1 flex-shrink-0">
			<div class="container">
				<div class="row">
					<h2><?php echo $categories[0]['nom']; ?></h2>
				</div>
					<?php
						$films_array = $categories[2]['films'];
						include ("elements/films-slider.php");
					?>

				<div class="row">
					<h3><?php echo $categories[1]['nom'] ?></h3>
				</div>

				<?php
					$films_array = $categories[0]['films'];
					include ("elements/films-slider.php");
				?>
				
			</div>
		</div>

		<?php require("elements/footer.php"); ?>
		

		


		

		<!-- <div class="main-carousel">
			<?php for ($i=0; $i<count($categories[0]['films']); $i++) : ?> 
				<div class="carousel-cell">
					<img src=<?php echo "'" . $categories[0]['films'][$i]['photo'] . "'"; ?> />			
				</div>
			<?php endfor ?>
  			<div class="carousel-cell">1</div>
  			<div class="carousel-cell">2</div>
  			<div class="carousel-cell">3</div>
		</div> -->



		<div class="film-slider">

			<div class="film-slider-container">
				<div class="film-slider-item">
					1
				</div>
				<div class="film-slider-item">
					2
				</div>
				<div class="film-slider-item">
					3
				</div>
				<div class="film-slider-item">
					4
				</div>
				<div class="film-slider-item">
					5
				</div>
				<div class="film-slider-item">
					6
				</div>
				<div class="film-slider-item">
					7
				</div>
				<div class="film-slider-item">
					8
				</div>
			</div>

			<div class="film-slider-actions">
				<span id="film-slider-btn-prev" aria-label="Précédent"><i class="fas fa-arrow-circle-left fa-3x"></i></span>
				<span id="film-slider-btn-next" aria-label="Suivant"><i class="fas fa-arrow-circle-right fa-3x"></i></span>
			</div>
			<?php for ($i=0; $i<count($categories[0]['films']); $i++) : ?> 
				<div class="film-slider-item">
					<img src=<?php echo "'" . $categories[0]['films'][$i]['photo'] . "'"; ?> />			
				</div>
			<?php endfor ?>

			<div class="film-slider-actions">
				<button id="film-slider-btn-prev" aria-label="Précédent"><</button>
				<button id="film-slider-btn-next" aria-label="Suivant">></button>
			</div>
		</div>

		<?php 
			$js_addon = "<script src='static/js/slider.js'></script>";
			require("elements/js_files.php"); 
		?>
	</body>

</html>