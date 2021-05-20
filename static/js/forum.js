/**
 * @file static/js/forum.js
 * @brief Script Javascript relatif aux forums des films
 * @author Margaux BRULIARD
 */


var id_film = (new URLSearchParams(window.location.search)).get('id_film'); // id du film que l'on étudie

/**
 * Script au chargement de la page
 */
$(document).ready(function() {

    update_messages();
    reset_modal_errors();

    /**
     * Ajout d'un nouveau message dans le forum
     */
    $("#forum-send-new-msg").click(function () {
        reset_modal_errors();

        $.ajax({
            type: "POST",
            url: "forum-response.php",
            data: {
                new_message: $("#new-message-input").val(),
                id_film: id_film
            },
            dataType: "json",
            encode: true,
            success: function(data) {
                if (!data.res) {
                    $("#new-message-input").addClass("is-invalid");
                        $("#new-message-form-group").append(
                            "<small class='text-danger text-left'>" + data.content + "</small>"
                        );
                }
                else {
                    $('#modal-new-message').modal('hide');
                }
                update_messages();   
            },
            error: function (response, status, xhr) {
                alert(xhr);
            }
        }).done(function (data) {
            console.log(data);
        });


    });

});


/** 
 * Reset les erreurs possibles sur la fenetre modale
 */ 
function reset_modal_errors() {
    $("#new-message-input").removeClass("is-invalid");
    $("#new-message-form-group small").remove();
}


/**
 * Récupération des messages et affichage 
 */
function update_messages() {
    $.ajax({
        type: "GET",
        url: "forum-response.php",
        data: {
            id_film: id_film
        },
        dataType: "html",
        success: function(data) {
            $("#content-forum").html(data);
            //alert(data);
        },
        error: function (response, status, xhr) {
                alert(xhr);
        }
    }).done(function (data) {
        console.log(data);
    });
}