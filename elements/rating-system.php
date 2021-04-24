<?php
	
	/**
	 * @file views/rating-system.php
	 * @brief Architecture HTML pour l'affichage et la réception des notes relatives à un film
	 */

?>

<div class="modal fade" id="modal-rating" tabindex="-1" role="dialog" aria-labelledby="modal-rating" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Noter ce film</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		  <div class="modal-body">
		  	<div class="my-previous-rating"></div>
		  	<div class="rating-stars">
				<div align="center">
				 	<i class="fa fa-star fa-2x rated-star" data-index="0"></i>
			        <i class="fa fa-star fa-2x rated-star" data-index="1"></i>
			        <i class="fa fa-star fa-2x rated-star" data-index="2"></i>
			        <i class="fa fa-star fa-2x rated-star" data-index="3"></i>
			        <i class="fa fa-star fa-2x rated-star" data-index="4"></i>
				 </div>
			</div>
		  </div>
		  <div class="modal-footer">
		    <button type="button" id="modal-rating-btn" class="btn btn-secondary" data-dismiss="modal">Enregistrer</button>
		  </div>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-md-6 col-sm-12">
		<!-- moyenne des notes -->
		<div class="rating-header">
			
		</div>
		<div class="rating-stars">
			<div align="center">
			 	<i class="fa fa-star fa-2x star-avg" data-index="0"></i>
		        <i class="fa fa-star fa-2x star-avg" data-index="1"></i>
		        <i class="fa fa-star fa-2x star-avg" data-index="2"></i>
		        <i class="fa fa-star fa-2x star-avg" data-index="3"></i>
		        <i class="fa fa-star fa-2x star-avg" data-index="4"></i>
			 </div>
		</div>
		<div class="rating-review">

		</div>
	</div>

	<div class="col-md-6 col-sm-12 align-center">
		<!-- donner sa propre note -->
		<?php if (isset($_SESSION['user'])): ?>
			<button id="giveRating" data-toggle="modal" data-target="#modal-rating" class="btn btn-warning">Noter ce film</button>
		<?php endif ?>
	</div>
</div>