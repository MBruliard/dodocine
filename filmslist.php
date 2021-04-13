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
?>

<!DOCTYPE html>
<html lang='fr'>

	<?php require("elements/head.php"); ?>

	<body class="d-flex flex-column">
		<div class="flex-grow-1 flex-shrink-0">
			<?php require('elements/navigation.php'); ?>


			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Le catalogue de tous nos films</h1>
						<h5>Quand on ne sait pas quoi regarder, il suffit de cliquer !</h5>
					</div>
				</div>

				
			</div>
		</div>


		<?php require('elements/footer.php'); ?>
		<?php require('elements/js_files.php'); ?>
	</body>
</html>
