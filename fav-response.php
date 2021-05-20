<?php 
    /**
     * @file fav-response.php
     * @brief script PHP pour répondre aux interactions avec les boutons favoris
     */

    require_once ("controller/datafilms.php");
    session_start();


    if (isset($_GET['id_film'])) {
        $res = ['res' => false];

        if (isset($_SESSION['user'])) {

            // on dit si le le film appartient aux favoris de l'utilisateur ou non
            $val = isFavForUser($db, $_GET['id_film'], $_SESSION['user']);
            echo json_encode(['res' => true, 'value' => $val]);
        }
        else {
            echo json_encode($res);
        }
    }

    if (isset($_POST['addfav'])) {
        if (isset($_SESSION['user'])) {
            addFilmToUserFav($db, $_POST['addfav'], $_SESSION['user']);
            
            echo json_encode(['res' => true]);
        }
        else {
            echo json_encode(['res' => false]);
        }
    }

    if (isset($_POST['delfav'])) {

        if (isset($_SESSION['user'])) {

            removeFilmToUserFav($db, $_POST['delfav'], $_SESSION['user']);
            
            echo json_encode(['res' => true]);
        }
        else {
            echo json_encode(['res' => false]);
        }
    }
?>