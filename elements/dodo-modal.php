<?php
	
	/**
	 * @file elements/dodo-modal.php
	 * @brief Création d'une fenêtre modale pour afficher des informations à l'utilisateur
	 * @details 
	 * Paramètres à inclure lors de l'appel: hearder_dodo_modal = le titre de la fenetre modale
	 * et content_dodo_modal = le contenu de la fenetre
	 * ID des éléments pour le JAVASCRIPT: dodo-modal pour la fenetre et button-dodo-modal pour le bouton OK de la fenetre
	 */
?>

<div class="modal fade" id="dodo-modal" tabindex="-1" role="dialog" aria-labelledby="dodo-modal-label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php if(isset($header_dodo_modal)): ?>
				<div class="modal-header">
					<h5 class="modal-title" id="dodo-modal-label">
						<?php echo $header_dodo_modal ; ?>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

			<?php endif ?>
			
			<?php if(isset($content_dodo_modal)) : ?>
			<div class="modal-body" id="dodo-modal-content">
				<?php echo $content_dodo_modal; ?>
			</div>
			<?php endif ?>
			
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-secondary">OK</button>
			</div>
		</div>
	</div>
 </div>