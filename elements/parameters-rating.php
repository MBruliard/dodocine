<?php

	/**
	 * @file elements/parameter-rating.php
	 * @brief section de notation et des messages concernant les films dans la page espace utilisateur
	 */
?>

<?php 
	$rated_films = getRatingsFromUser($db, $_SESSION['user']);
?>

<div class="row">
	<div class="col-sm-12">
		<h5 style="text-align:center;">Statistiques du compte</h5>
	</div>
</div>

<div class="row space-before-row">
	<div class="col-md-4 col-sm-12">		
		<div class="card">
			<div class=card-header>Nombre de films notés:</div>
			<div class="card-body">
				<?php echo count($rated_films); ?>
			</div>
		</div>
	</div>

	<div class="col-md-4 col-sm-12">
		<div class="card">
			<div class="card-header">Moyenne des notes données:</div>
			<div class="card-body">
				<?php 
					$avg_rate = getAverageRatingFromUser($db, $_SESSION['user']); 
					if ($avg_rate['res']) {
						echo $avg_rate['mean'];
					}
					else {
						echo '0';
					}
				?>
			</div>
		</div>
	</div>

	<div class="col-md-4 col-sm-12">
		<div class="card">
			<div class="card-header">Nombre de messages postés:</div>
			<div class="card-body">

			</div>
		</div>
	</div>
</div>

<?php if(count($rated_films) > 0) : ?>
<div class="row space-before-row">
	<div class="col-sm-12">
		<h5>Les derniers films notés</h5>
		<table class="table">
  			<thead>
				<tr>
					<th scope="col">Film</th>
					<th scope="col">Note</th>
				</tr>
  			</thead>
  			<tbody>
  				<?php for ($i=0; $i<count($rated_films); $i++) : ?>
				<tr>
					<td><?php echo $rated_films[$i]['titre'] ; ?></td>
					<td><?php echo $rated_films[$i]['note']  .'/5'; ?></td>
				</tr>
				<?php endfor ?>
			</tbody>
		</table>
	</div>
</div>
<?php endif ?>

<div class="row space-before-row">
	<div class="col-sm-12">
		<h5>Les derniers messages:</h5>
		<table class="table">
  			<thead>
				<tr>
					<th scope="col">Film</th>
					<th scope="col">Message</th>
				</tr>
  			</thead>
  			<tbody>
				<tr>
					<td>Mark</td>
					<td>Otto</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
