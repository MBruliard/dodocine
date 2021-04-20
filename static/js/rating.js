/**
 * @file static/js/rating.js
 * @brief Fonctions jQuery/Javascript associées au système de notes des films
 */


var ratedIndex = -1; // pas de note choisi -> index à -1
var id_film = (new URLSearchParams(window.location.search)).get('id_film'); // id du film que l'on étudie

$(document).ready(function () {
    reset_star_colors('black');
    update_rating();

    /*
     * gestion de l'animation des étoiles
     */
    $('.rated-star').on('click', function () {
       ratedIndex = parseInt($(this).data('index'));
    });

    $('.rated-star').mouseover(function () {
        reset_star_colors('black');
        var currentIndex = parseInt($(this).data('index'));
        set_stars(currentIndex);
    });

    $('.rated-star').mouseleave(function () {
        reset_star_colors('black');

        if (ratedIndex != -1)
            set_stars(ratedIndex);
    });


    $("#modal-rating-btn").click(function() {
        save_to_db();
        update_rating();
    });

});

function set_stars(max) {
    for (var i=0; i <= max; i++)
        $('.rated-star:eq('+i+')').css('color', 'yellow');
}

function reset_star_colors(color) {
    $('.fa-star').css('color', color);
}

function save_to_db() {
	$.ajax({
        url: "rating-response.php",
        method: "POST",
        data: {
            rating: ratedIndex,
            film: id_film
        }, 
        dataType: "json",
        success: function(data) {
        	if (data.redirect) {
                window.location.replace(data.redirect);
            }
        },
        error: function(xhr, textStatus, errorThrown) {
        		alert(errorThrown);
        }
    });

}

/**
 * Mise à jour des infos sur les notes de  la communauté dans son ensemble
 * La moyenne / le nombre de note
 */
function update_rating() {

    $.ajax({
       url: "rating-response.php",
       method: "GET",
       data: {film: id_film}, 
       dataType: "json",
       success: function(data) {
            $(".rating-header").text( data.mean + "/5");
            $(".rating-review").text( "sur " + data.nb + " notes");
            $(".my-previous-rating").text("Vous aviez noté ce film : " + data.myrating + "/5");
       },
       error: function(xhr, textStatus, errorThrown) {
            alert(errorThrown);
       }
    }).done(function (data) {
        console.log(data)
    });
}
