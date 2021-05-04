<?php 
    
    /**
     * @file forum-message.php
     * @brief Architecture HTML d'un message dans le forum
     * @author Margaux BRULIARD
     * @date 30 avril 2021
     * @details require $message_content pour le contenu du message. Autres variables possibles :
       - $message_author (le nom de l'auteur), $message_date (la date de parution), $message_short_answer (répétition du début du message auquel on répond)
     */


?>

<div class="card forum-card">
    <div class="row">
        <div class="col-sm-3 forum-header">
            <?php if (isset($message_author)): ?>
                <div class="forum-author"><?php echo $message_author; ?></div>
            <?php endif ?>

            <?php if (isset($message_date)): ?>
                <div class="forum-date"><?php echo $message_date; ?></div>
            <?php endif ?>
        </div>


        <div class="col-sm-9 forum-content">
            <?php if (isset($message_short_answer)) : ?>
                <small class="forum-answer"><?php echo $message_short_answer; ?></small>
            <?php endif ?>

            <div class="forum-msg"><?php echo $message_content; ?></div>

            <div class="forum-buttons">
                <button type="button" id="forum-reply-btn" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Répondre à ce message">
                    <i class="fas fa-reply"></i>
                </button>

                <?php if ($message_author == $_SESSION['user']): ?>
                    <button type="button" id="forum-delete-btn" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Supprimer le message">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>