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

	<body class="d-flex flex-column" style="position:relative; z-index:1;">
		<div class="flex-grow-1 flex-shrink-0">
			<?php require("elements/navigation.php"); ?>
			
			<div class="container">
				<h1>Votre recherche pour '<?php echo $_GET['search']; ?>'</h1>
				<!-- si pas de résultat -->
				<?php if (!isset($results_search['films']) && (!isset($results_search['ind']))) :?>
					<div class="row">
						<div class="col">
							<div id="no-result-search">
								<p>Oops !</p>
								<p>Il semblerait qu'aucun film, ni acteur ne corresponde à votre recherche...</p>
							</div>
						</div>
					</div>
				<?php endif ?>

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
						
					</div>
				<?php endif ?>
						
			</div>

		</div>
		<?php require ("elements/footer.php"); ?>

		<?php 
			$js_addon = "<script src='static/js/search.js'></script><script src='static/js/slider.js'></script>";
			require("elements/js_files.php"); 
		?>
	</body>

</html>