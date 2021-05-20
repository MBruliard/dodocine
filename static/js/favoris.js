/**
 * @file static/js/rating.js
 * @brief Fonctions jQuery/Javascript associées au système de notes des films
 */

var isFav = false;
var id_film = (new URLSearchParams(window.location.search)).get('id_film'); 

$(document).ready(function() {
    update_fav_button();
});

/**
 * Lorsque l'on clique sur le bouton on ajoute le film aux favoris
 */
$("#add-fav-button").click(function () {
    $.ajax({
        url: "fav-response.php",
        method: "POST",
        data: {
            id_film: id_film,
            addfav: true
        }, 
        dataType: "json",
        success: function(data) {
            update_fav_button();
        },
        error: function(xhr, textStatus, errorThrown) {
                alert(errorThrown);
        }
    });
});

/**
 * Lorsque l'on clique sur le bouton on supprime le film aux favoris
 */
$("#remove-fav-button").click(function () {
    $.ajax({
        url: "fav-response.php",
        method: "POST",
        data: {
            id_film: id_film,
            delfav: true
        }, 
        dataType: "json",
        success: function(data) {
            update_fav_button();
        },
        error: function(xhr, textStatus, errorThrown) {
                alert(errorThrown);
        }
    });
});


/*
 * on détermine quel bouton est visible selon si le film est déjà dans les favoris ou non
 */
function update_fav_button() {
    $.ajax({
        url: "fav-response.php",
        method: "GET",
        data: {
            id_film: id_film
        }, 
        dataType: "json",
        success: function(data) {
            if (data.res) {
                $("#add-fav-button").hide();
                $('#remove-fav-button').show();
            }
            else {
                $("#add-fav-button").show();
                $("#remove-fav-button").hide();
            }
        },
        error: function(xhr, textStatus, errorThrown) {
                alert(errorThrown);
        }
    });
   
};


