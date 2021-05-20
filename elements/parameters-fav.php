<?php

	/**
	 * @file elements/parameter-fav.php
	 * @brief section des films favoris de l'utilisateurdans la page espace utilisateur
	 */
?>

<div class="row">
    <div class="col-md-12">
        <h5 style="text-align:center;">Mes films favoris</h5>
    </div>
</div>

<?php 
    $films_array = $favoris_films;
    include ("elements/films-slider.php");
?>

