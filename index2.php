<?php
	require("controller/authentification.php");
	session_start();
?>

<!DOCTYPE html>
<html lang='fr'>

	<?php require("elements/head.php"); ?>

	<body class="d-flex flex-column">
		<div id="page-container">

			<?php require("elements/header2.php"); ?>

			<?php require("elements/navigation.php"); ?>
			<div class="container">

				<p>Je suis du texte</p>

			</div>
			<?php require("elements/footer2.php"); ?>
		</div>
		<?php require("elements/js_files.php"); ?>
	</body>
</html>