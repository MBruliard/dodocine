<?php
	
	/**
	 * @file legales.php
	 * @brief Page d'accueil de notre site
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */

	require("controller/authentification.php");
	session_start();
?>

<!DOCTYPE html>
<html lang='fr'>

	<?php require("elements/head.php"); ?>

	<body class="d-flex flex-column">
		<div class="flex-grow-1 flex-shrink-0">
			<?php require('elements/navigation.php'); ?>


			<div class="container main-container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="dodo-red">Mentions légales </h1>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<p>Ce site est la présentation d'un projet universitaire</p>
					</div>
				</div>

				
		</div>


		<?php require('elements/footer.php'); ?>
		<?php require('elements/js_files.php'); ?>
	</body>
</html>