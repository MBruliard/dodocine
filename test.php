<?php
	/**
	 * @file login.php
	 * @brief nouvelle version pour s'inscrire et se connecter à notre site
	 * @author Margaux BRULIARD
	 */
	require_once("controller/authentification.php");
  	session_start();


  	$q = $db->query("SELECT * FROM forum ORDER BY date DESC");
  	var_dump($q->fetchAll());

?>


<!DOCTYPE html>
<html lang='fr'>

	<?php 
		$title_page = 'Dodociné | Test';
		$css_addon = "<link rel='stylesheet' href='/static/css/forum.css' />";
		require_once("elements/head.php"); 
	?>

	<body class="d-flex flex-column">
		<div class="flex-grow-1 flex-shrink-0">
			
			<?php require("elements/navigation.php"); ?>

			<div class="container">
			
				<button type="button" id="forum-new-message" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-new-message"><i class="fas fa-plus"></i></button>

				<!-- modal pour un nouveau message -->
				<div class="modal fade" id="modal-new-message" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Nouveau Message</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
				
							<div class="modal-body">
								<form class="form">
									<div id="new-message-form-group" class="from-group">
										<label for="new-message-input">Ecrivez votre message ici:</label>
	      								<textarea class="form-control" id="new-message-input" placeholder="Votre message" row="6" required></textarea>
      								</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
								<button type="button" id="forum-send-new-msg" class="btn btn-primary">Envoyer</button>
							</div>
						</div>
					</div>
				</div>


				<!-- exemple d'un message -->
				<div class="card forum-card">
					<div class="row">
						<div class="col-sm-3 forum-header">
							<div class="forum-author">Auteur</div>
							<div class="forum-date">Date</div>
						</div>


						<div class="col-sm-9 forum-content">
							<small class="forum-answer">Ici on répond au message de quelqu'un d'autre</small>
							<div class="forum-msg">Je suis un message dans le forum</div>
						
							<div class="forum-buttons">
								<button type="button" id="forum-reply-btn" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Répondre à ce message">
									<i class="fas fa-reply"></i>
								</button>
								<button type="button" id="forum-delete-btn" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Supprimer le message">
									<i class="fas fa-trash-alt"></i>
								</button>
							</div>
						</div>


					</div>

				</div>

			</div>
		</div>

		<?php
			$js_addon = "<script src='static/js/forum.js'></script>";
			require("elements/js_files.php"); 
		?>
	</body>

</html>