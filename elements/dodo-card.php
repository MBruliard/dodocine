<?php
	/**
	 * @file views/dodo-card.php
	 * @brief Architecture HTML d'une 'card' de type Bootstrap à réutiliser
	 * @details Les variables à renseigner: 
	 * 		header_dodo_card :  le titre de la card 
	 *		img_dodo_card : le chemin de l'image à afficher
	 * 		content_dodo_card : le contenu à écrire dans le card
	 * 		link_dodo_card : Le lien pour le bouton à afficher
	 */
?>

<div class="card dodo-card">
	<?php if (isset($header_dodo_card)): ?>
		<div class="card-header dodo-card-header"><?php echo $header_dodo_card; ?></div>
	<?php endif ?>

	<?php if (isset($img_dodo_card)): ?>
		<img class="card-img-top" src=<?php echo "'" . $img_dodo_card . "'" ; ?> alt="Card image cap">
	<?php endif ?>
	<div class="card-body">
		<?php if (isset($content_dodo_card)): ?>
			<p class="card-text dodo-card-content"><?php echo $content_dodo_card; ?></p>
		<?php endif ?>

		<?php if (isset($link_dodo_card)): ?>
			<a id="dodo-card-btn" href=<?php echo "'" . $link_dodo_card . "'" ; ?> class="btn float-right">J'en veux plus !</a>
		<?php endif ?>
	</div>
</div>