<?php

    /**
     * @file forum.php
     * @brief Architecture HTML d'un forum pour un film donné
     * @author Margaux BRULIARD
     * @date 30 avril 2021
     */

?>

<?php if (isset($_SESSION['user'])): ?>
    <!-- on affiche sur la droite le bouton + -->

    <!-- modal pour un nouveau message -->
    <div class="modal fade" id="modal-new-message" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body">
                    <form class="form">
                        <div id="new-message-form-group" class="from-group">
                            <label for="new-message-input">Ecrivez votre message ici:</label>
                            <textarea class="form-control" id="new-message-input" placeholder="Votre message" row="6" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" id="forum-send-new-msg" class="btn btn-primary">Envoyer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- affichage du bouton pour un nouveau message -->
    <div class="row space-before-row">
        <div class="col">
            <button type="button" id="forum-new-message" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-new-message">Nouveau message <i class="fas fa-plus"></i></button>
        </div>
    </div>
<?php endif ?>


<!-- maintenant on affiche les messages concernant le film -->
<div class="row">
    <div class="col">
        <div id="content-forum">
            
        </div>
    </div>
</div>
