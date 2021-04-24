<?php
	/**
	 * @file parameters.php
	 * @brief Page des paramètres utilisateurs
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */

	require("controller/authentification.php");
	session_start();
	/**
	 * Vérification: Si pas d'utilisateur connecté, l'accès est interdit
	 */
	if (!isset($_SESSION['user'])) {
		header ("location: /index.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
	<?php
		$title_page = "DodoCiné | Mon espace" ;

		$css_addon = "<link href='static/css/parameters.css' rel='stylesheet' />";
		require_once ("elements/head.php");
	?>

	<body class="d-flex flex-column">

		<div class="flex-grow-1 flex-shrink-0">
			<?php require('elements/navigation.php'); ?>


			<div class="container main-container">

				<div class="row">
					<div class="col">	
						<h1>Mon espace</h1>
					</div>
				</div>

				<?php
					// inclusion de la fenetre modale que l'on va réutiliser pour chaque affichage de 	message
					$header_dodo_modal = "Information";
					$content_dodo_modal = "message d'information";
					include ("elements/dodo-modal.php");
				?>

				<div class="row">

					<!-- Le menu -->
					<div class="col-md-4 col-sm-12">
						<ul class="list-group list-group-flush">
							<li class="list-group-item">
								<div class="title-menu-param"><h4 class="user-name-param"><?php echo $_SESSION['user'];?></h4>
								</div>
							</li>
							<button id="menu-rating" class="list-group-item d-flex justify-content-between buttonalign-items-center active">
								Mes notes et messages
								<span class="badge badge-primary badge-pill">14</span>
							</button>
							<button id="menu-fav" class="list-group-item d-flex justify-content-between align-items-center">
								Mes Favoris
								<span class="badge badge-primary badge-pill">14</span>
							</button>
							<button id="menu-looking" class="list-group-item d-flex justify-content-between align-items-center">
								Apparence
							</button>
							<button id="menu-param" class="list-group-item d-flex justify-content-between align-items-center">
								Paramètres du compte
							</button>
						</ul>
					</div>

					<!-- la partie content -->
					<div class="col-md-8 col-sm-12 card">
						
						<div id="menu-content-rating" class="content-param">
							<?php include ("elements/parameters-rating.php") ?>
						</div>

						<div id="menu-content-fav" class="content-param">
							<?php include ("elements/parameters-fav.php") ?>
						</div>

						<div id="menu-content-looking" class="content-param">
							<?php include ("elements/parameters-looking.php") ?>
						</div>						


						<div id="menu-content-param" class="content-param">
							<?php include ("elements/parameters-config.php") ?>
						</div>
					</div>
				</div>

			</div>
		</div>
		<?php require ("elements/footer.php"); ?>
		<?php 
			$js_addon = "<script src='static/js/parameters.js'></script>";
			require ("elements/js_files.php"); 
		?>
	</body>
</html>
