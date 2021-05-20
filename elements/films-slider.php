<?php 
	/**
	 * @file elements/films-slider.php
	 * @brief un slider pour afficher des films
	 * @details $films-array un array qui contient tous les films que l'on veut afficher dans le slider avec leurs informations 
	 */
?>

<?php if(isset($films_array)): ?>
<div class="main-carousel">
	<?php for ($i=0; $i<count($films_array); $i++) : ?> 
		<div class="carousel-cell film-slider-item">
			<a href=<?php echo "'" . "film.php?id_film=" . $films_array[$i]['id_film'] . "'" ?> >
				<img class="img-dodo-slider" src=<?php echo "'" . $films_array[$i]['photo'] . "'"; ?> />
			</a>		
		</div>
	<?php endfor ?>
</div>
<?php endif ?>


