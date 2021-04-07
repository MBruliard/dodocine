<?php
	/**
	 * @file elements/navigation.php
	 * @brief Définiton de la barre de navigation de chaque page HTML
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 7 avril 2021
	 */
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#">DodoCiné</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="/index.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="#"><i class="fas fa-film"></i> Cinéma <span class="sr-only"></span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="#"><i class="fas fa-portrait"></i> Acteurs <span class="sr-only"></span></a>
			</li>
		</ul>

		<ul class="navbar-nav ml-auto ml-md-0">
			<?php if (isset($_SESSION['user'])) : ?>
				<li class="nav-item dropdown">
			  		<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> 
			  			<?php  echo $_SESSION['user'] ?>
			  		</a>
			  		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
			      		<a class="dropdown-item" href="/parameters.php"><i class="fas fa-hammer"></i> Paramètres</a>
			      		<div class="dropdown-divider"></div>
			      		<a class="dropdown-item" href="logout.php"><i class="fas fa-power-off"></i> Déconnexion</a>
			  		</div>
				</li>
			<?php else : ?>
				<li class="nav-item active">
			  		<a class="nav-link" href="login.php"><i class="fas fa-user fa-fw"></i> Connexion <span class="sr-only"></span></a>
				</li>
			<?php endif ?>
		</ul>
	</div>
</nav>