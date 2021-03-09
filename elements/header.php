<?php 
  require_once("controller/authentification.php");
  is_connected();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
        <title>
            <?php
                if (isset($title_page))
                {
                    echo $title_page;
                }
                else {
                    echo "DodoCiné";
                }
            ?>
        </title>


        <link href="static/css/dodocine.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="shortcut icon" href="fas fa-book" />

    </head>

    

    <body>
        <header>
          <!-- Mise en place de la banderolle de DodoCine -->
          
        </header>

        <!-- navbar -->
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
                <a class="nav-link" href="#"><i class="fas fa-home"></i> Cinéma <span class="sr-only"></span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#"><i class="fas fa-home"></i> Acteurs <span class="sr-only"></span></a>
              </li>
            </ul>

            <ul class="navbar-nav ml-auto ml-md-0">
              <?php if (isset($_SESSION['user'])) : ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> 
                    <?php  echo $_SESSION['user'] ?>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="#"><i class="fas fa-hammer"></i> Préférences</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"><i class="fas fa-power-off"></i> Déconnexion</a>
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

        <div id="page-container">
            <div class="basis-container">
              <!-- CONTENU DE LA PAGE -->
        