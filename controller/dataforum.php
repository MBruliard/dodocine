<?php 

    /**
     * @file controller/dataforum.php
     * @brief définition des fonctions permettant d'accéder aux informations concernant les forums des films
     * @author Margaux BRULIARD
     * @date 30 avril 2021
     */

    require_once("database.php");
    global $db;


    /**
     * @brief Ajoute un message dans la base de données
     * @param $db la base de données
     * @param $id_film l'identifiant du film
     * @param $pseudo l'auteur du message
     * @param $content le contenu du message
     * @param $answer l'id du message auquel on souhaite répondre
     * @return $result un array qui contient la réussite ou l'échec (avec message d'erreur à afficher)
     */
    function addMessageForum($db, $id_film, $pseudo, $content, $answer): array {

        if (empty($content)) {
            return ['res' => false, 'content' => 'Le message est vide !'];
        }

        $q = $db->prepare("INSERT INTO forum (id_user, id_film, id_msg_ans, contenu, date) VALUES(:pseudo, :film, :reponse, :contenu, :d)");
        $q->execute([
            'pseudo' => $pseudo,
            'film' => $id_film,
            'contenu' => $content,
            'reponse' => $answer,
            'd' => date('Y-m-d h:i:s')
        ]);

        return ['res' => true];
    }

    /**
     * Renvoie tous les messages concernant un film 
     * @param $db la base de données
     * @param $id_film le film dont on veut récupérer les messages
     * @return $array l'array qui contient tous les messages
     */
    function getMessagesAboutFilm($db, $id_film): array {
        $q = $db->prepare("SELECT * FROM forum WHERE id_film = :id_film ORDER BY date DESC");
        $q->execute([
            'id_film' => $id_film
        ]);


        return $q->fetchAll();
    }


    /**
     * Renvoie tous les messages postés par un même utilisateur 
     * @param $db la base de données
     * @param $id_user le pseudo de l'utilisateur dont on veut les messages
     * @return $array l'array qui contient tous les messages
     */
    function getMessagesFromUser($db, $id_user): array {
        $q = $db->prepare("SELECT forum.id_film as id_film, titre, contenu FROM forum INNER JOIN films ON forum.id_film = films.id_film WHERE id_user = :id_user ORDER BY date DESC");
        $q->execute([
            'id_user' => $id_user
        ]);


        return $q->fetchAll();
    }

?>