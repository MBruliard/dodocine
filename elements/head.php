<?php
	/**
	 * @file elements/head.php
	 * @brief Définiton de la section head de chaque page HTML
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 7 avril 2021
	 */
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?php
            /**
             * Titre de la page
             */
            if (isset($title_page))
            {
                echo $title_page;
            }
            else {
                echo "DodoCiné";
            }
        ?>
    </title>

    <link rel="icon" href="static/img/pillow.ico" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link href="static/css/dodocine.css" rel="stylesheet" />

    <?php 
    	if (isset($css_addon)) {
    		echo $css_addon;
    	}
    ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>