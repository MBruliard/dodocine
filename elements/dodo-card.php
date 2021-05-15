<?php
	/**
	 * @file views/dodo-card.php
	 * @brief Architecture HTML d'une 'card' de type Bootstrap à réutiliser
	 * @details Les variables à renseigner: 
	 *		img_dodo_card : le chemin de l'image à afficher
	 * 		content_dodo_card : le contenu à écrire dans le card
	 * 		link_dodo_card : Le lien pour le bouton à afficher
	 */
?>

<div class="card dodo-card">
	<?php if (isset($img_dodo_card)): ?>
		<img class="card-img-top" src=<?php echo "'" . $img_dodo_card . "'" ; ?> alt="Card image cap">
	<?php endif ?>

	<div class="card-body">
		<?php if (isset($content_dodo_card)): ?>
			<h5 class="card-title align-center"><?php echo $content_dodo_card; ?></h5>
		<?php endif ?>
    	
    	<?php if (isset($link_dodo_card)): ?>
			<a id="dodo-card-btn" href=<?php echo "'" . $link_dodo_card . "'" ; ?> class="btn float-right">J'en veux plus !</a>
		<?php endif ?>
  	</div>
</div>