/**
 * @file static/js/rating.js
 * @brief Fonctions jQuery/Javascript associées au système de notes des films
 */


var ratedIndex = -1; // pas de note choisi -> index à -1
var uID = 0;

$(document).ready(function () {
    reset_star_colors('black');

    if (localStorage.getItem('ratedIndex') != null) {
        set_stars(parseInt(localStorage.getItem('ratedIndex')));
        uID = localStorage.getItem('uID');
    }

    $('.fa-star').on('click', function () {
       ratedIndex = parseInt($(this).data('index'));
       localStorage.setItem('ratedIndex', ratedIndex);
       save_to_db();
    });

    $('.fa-star').mouseover(function () {
        reset_star_colors('black');
        var currentIndex = parseInt($(this).data('index'));
        set_stars(currentIndex);
    });

    $('.fa-star').mouseleave(function () {
        reset_star_colors('black');

        if (ratedIndex != -1)
            set_stars(ratedIndex);
    });
});

function set_stars(max) {
    for (var i=0; i <= max; i++)
        $('.fa-star:eq('+i+')').css('color', 'green');
}

function reset_star_colors(color) {
    $('.fa-star').css('color', color);
}

function save_to_db() {
	/*$.ajax({
		url: 'present-film.php?id_film=1',
		method: "POST",
		datatype: "html",
		data: "&rating=" + (ratedIndex + 1)
	});*/
	//alert(ratedIndex);
	$.ajax({
       'url': "controller/rating.php",
       'method': "POST",
       'data': {"rating": ratedIndex}, 
       'dataType': 'text',
       success: function() {
       		alert('ok');
       },
       error: function(xhr, textStatus, errorThrown) {
       		alert(errorThrown);
       }
    });
}

