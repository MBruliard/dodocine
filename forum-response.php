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


    if (isset($_GET['id_film'])) {
            $q = $db->prepare("SELECT * FROM forum WHERE id_film = :id ORDER BY date DESC");
            $q->execute(['id' => $_GET['id_film']]);
            $res = $q->fetchAll();


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
                    $to_print = $to_print . "<button type='button' id='forum-reply-btn' class='btn btn-outline-primary btn-sm' data-toggle='tooltip' data-placement='bottom' title='Répondre à ce message'>
                                                <i class='fas fa-reply'></i>
                                            </button>";
                

                    if ($_SESSION['user'] == $row['id_user']) {
                        $to_print = $to_print . "<button type='button' id='forum-delete-btn' class='btn btn-outline-danger btn-sm' data-toggle='tooltip' data-placement='bottom' title='Supprimer le message'>
                                                    <i class='fas fa-trash-alt'></i>
                                                </button>";
                    }
                }
                 
                $to_print = $to_print . "</div></div></div></div>";

                echo $to_print;
            }
    }


?>