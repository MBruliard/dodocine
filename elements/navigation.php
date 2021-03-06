<?php
	/**
	 * @file elements/navigation.php
	 * @brief Définiton de la barre de navigation de chaque page HTML
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 7 avril 2021
	 */
?>

<nav class="navbar navbar-expand-lg">
	<a class="navbar-brand" href="#">
		<img class="logo-dodocine" src="static/img/logo2.jpg">DodoCiné
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <i class="fas fa-bars"></i>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="/index.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="/filmslist.php"><i class="fas fa-film"></i> Cinéma <span class="sr-only"></span></a>
			</li>
		</ul>

		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item-active">
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
							<button id="search-btn" class="btn btn-primary"><i class="fas fa-search"></i></button>
						</div>
					</div>
				</form>
			</li>
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