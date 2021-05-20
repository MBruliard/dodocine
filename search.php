<?php
	
	/**
	 * @file search.php
	 * @brief Page affichant les résultats d'une recherche d'un utilisateur
	 * @details la recherche se fait à la fois sur les films et sur les acteurs/réalisateurs
	 */

	require_once("controller/authentification.php");
	session_start();

	require_once("controller/datafilms.php");
	$results_search = array();

	if (isset($_POST['search-input-navbar'])) {
		
		$q = $db->prepare("SELECT titre, id_film, photo FROM films WHERE UPPER(titre) like UPPER(:search)");
		$q->execute(["search" => "%" . $_POST['search-input-navbar'] . "%"]);

		$response = $q->fetchAll();
		if (count($response) > 0) {
			$results_search['films'] = $response;
		}

		$q = $db->prepare("SELECT id_individu, nom, prenom, photo FROM individus WHERE UPPER(nom) like UPPER(:search) OR UPPER(prenom) like UPPER(:search)");
		$q->execute(["search" => "%" . $_POST['search-input-navbar'] . "%"]);

		$response = $q->fetchAll();
		if (count($response) > 0) {
			$results_search['ind'] = $response;
		}
	}
?>

<!DOCTYPE html>
<html lang='fr'>

	<?php 
		$title_page = 'Dodociné | Recherche';
		$css_addon = "<link href='static/css/slider.css' rel='stylesheet' />";
		require_once("elements/head.php"); 
	?>

	<body class="d-flex flex-column">
		<div class="flex-grow-1 flex-shrink-0">
			<?php require("elements/navigation.php"); ?>
			
			<!-- si pas de résultat -->
			<?php if (!isset($results_search['films']) && (!isset($results_search['ind']))) :?>
				<div id="no-result-search">
					<div class="jumbotron jumbotron-fluid">
						<h1 class="display-4 text-white">Oops !</h1>
					</div>
					
					<h3 class="align-center">
						Il semblerait qu'aucun film ou acteur ne corresponde à votre recherche ... Désolé !
					</h3>
				</div>				
			<?php else: ?>
				<div class="container">
					<h1>Votre recherche pour '<?php if (isset($_POST['search-input-navbar'])) { echo $_POST['search-input-navbar']; } ?>'</h1>
					<!-- les films -->
					<?php if (isset($results_search['films'])) : ?>
						<div class="films-results-search">
							<div class="row space-before-row">
								<div class="col">
									<h4>Les films pouvant correspondre à votre recherche</h4>
								</div>
							</div>
							<?php
								$films_array = $results_search['films'];
								include ("elements/films-slider.php");
							?>
						</div>
					<?php endif ?>

					<!-- les acteurs -->
					<?php if (isset($results_search['ind'])) : ?>
						<div class="actors-results-search">
							<div class="row space-before-row">
								<div class="col">
									<h4>Les acteurs/réalisateurs pouvant correspondre à votre recherche</h4>
								</div>
							</div>

							<div class="main-carousel">
								<?php for ($i=0; $i<count($results_search['ind']); $i++) : ?> 
									<div class="carousel-cell film-slider-item">
										<a href=<?php echo "'" . "actor.php?id_ind=" . $results_search['ind'][$i]['id_individu'] . "'" ?> >
											<img class="img-dodo-slider" src=<?php echo "'" . $results_search['ind'][$i]['photo'] . "'"; ?> />
										</a>		
									</div>
								<?php endfor ?>
							</div>
							
						</div>
					<?php endif ?>
				</div>
			<?php endif ?>
					
			

		</div>
		<?php require ("elements/footer.php"); ?>

		<?php 
			$js_addon = "<script src='static/js/search.js'></script><script src='static/js/slider.js'></script>";
			require("elements/js_files.php"); 
		?>
	</body>

</html>