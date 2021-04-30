<?php
    
    /**
     * @file forum-response.php
     * @brief traitement des informations pour l'affichage de messages de forum
     * @author Margaux BRULIARD
     * @date 30 avril 2021
     */

    require_once("controller/authentification.php");
    require_once("controller/dataforum.php");
    session_start();

    if (isset($_POST['new_message'])) {
        
        if (isset($_POST['id_response'])) {
            $result = addMessageForum($db, $_POST['id_film'], $_SESSION['user'], $_POST['new_message'], $_POST['id_response']);
            echo json_encode($result);
        }
        else {
            $result = addMessageForum($db, $_POST['id_film'], $_SESSION['user'], $_POST['new_message'], 'NULL');
            echo json_encode($result);
        }
    }


?>