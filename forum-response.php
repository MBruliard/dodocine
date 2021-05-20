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

    if ((isset($_GET['delete_msg'])) && (isset($_GET['id_film']))) {
        deleteMessage($db, $_GET['delete_msg']);
        header ("location: film.php?id_film=" . $_GET['id_film']);
    }
    

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


    if (isset($_GET['id_film'])) {
            $res = getMessagesAboutFilm($db, $_GET['id_film']);


            foreach ($res as $row) {
                $to_print = "<div class='card forum-card'>
                                <div class='row'>
                                    <div class='col-sm-3 forum-header'>
                                        <div class='forum-author'>" . $row['id_user'] . "</div>
                                        <div class='forum-date'>" . $row['date'] ."</div>

                                    </div>
                                    <div class='col-sm-9 forum-content'>
                                        <small class='forum-answer'>" . "" ."</small>
                                        <div class='forum-msg'>" . $row['contenu'] . "</div>

                                        <div class='forum-buttons'>";

                if (isset($_SESSION['user'])) {    

                    if ($_SESSION['user'] == $row['id_user']) {
                        $to_print = $to_print . "<a id='forum-delete-btn-'" . $row['id_msg'] . "' class='btn btn-outline-danger btn-sm forum-delete-btn' data-toggle='tooltip' data-placement='bottom' title='Supprimer le message' href='forum-response.php?id_film=" . $row['id_film'] . "&delete_msg=" . $row['id_msg'] . "'>
                                                    <i class='fas fa-trash-alt'></i>
                                                </a>";
                    }
                }
                 
                $to_print = $to_print . "</div></div></div></div>";

                echo $to_print;
            }
    }


?>