<?php 
    /**
     * @file fav-response.php
     * @brief script PHP pour répondre aux interactions avec les boutons favoris
     */

    require_once ("controller/datafilms.php");
    session_start();


    if (isset($_GET['id_film']) && isset($_SESSION['user'])) {
        // on dit si le le film appartient aux favoris de l'utilisateur ou non

        echo json_encode(['res' => isFavForUser($db, $_GET['id_film'], $_SESSION['user'])]);
    }

    if (isset($_POST['id_film']) && isset($_SESSION['user']) && isset($_POST['addfav'])) {
        addFilmToUserFav($db, $_POST['id_film'], $_SESSION['user']);
        
        echo json_encode(true);
    }

    if (isset($_POST['id_film']) && isset($_SESSION['user']) && isset($_POST['delfav'])) {removeFilmToUserFav($db, $_POST['id_film'], $_SESSION['user']);
        
        echo json_encode(true);
    }

?>