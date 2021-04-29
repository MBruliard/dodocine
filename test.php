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


<!DOCTYPE html>
<html lang='fr'>

	<?php 
		$title_page = 'Dodociné | Test';
		//$css_addon = "<link href='static/css/slider.css' rel='stylesheet' />";
		require_once("elements/head.php"); 
	?>

	<body class="d-flex flex-column" style="position:relative; z-index:1;">
		<div class="flex-grow-1 flex-shrink-0">
			<div class="container">
			
				<form id="search-form" class="form inline-form" method="post" action="search.php">
					<div class="form-row">
						<div class="col-sm-9 my-1">
							<label class="sr-only" for="search-input-navbar">Recherche</label>
							<div class="input-group">
								<input type="text" class="form-control" name="search-input-navbar" id="search-input-navbar" placeholder="Recherche...">
							</div>
							<div id="list-results-search">
							</div>
	    				</div>
						<div class="col-sm-3 my-1">
							<button type="submit" id="search-btn" class="btn btn-lg fas fa-search"></button>
						</div>
					</div>
				</form>	
			    
    		
			    <div class="row">
			    	<p>Je suis un texte sensé etre caché par la liste à faire apparaitre</p>
			    </div>

			</div>
		</div>

		<?php
			require("elements/js_files.php"); 
		?>
	</body>

</html>