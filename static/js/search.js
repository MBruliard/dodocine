$(document).ready(function() {
	/**
	 * au passage de la souris on active l'item sur lequel on est
	 * @TODO: Ne fonctionne pas ...
	 */
	$(".search-results-item").mouseover(function() {
		alert("mouse");
		$(this).addClass("active");
	});
	

	/** 
	 * lorsque l'on clique sur un item cela écrit automatiquement le nom dans la barre de recherche
	 * @TODO: Ne fonctionne pas...
	 */
	$(".search-results-item").click(function() {
		alert("click");
		//$("#search-input").text($(this).val());
	});

	/**
	 * la recherche 
	 */
	$("#search-input-navbar").keyup(function () {
		let searchText = $(this).val();
		if (searchText != "") {
			$.ajax({
				url: "search-response.php",
				method: "post",
				data: {
	  				search: searchText,
				},
				type: "json",
				success: function (response) {
					$("#list-results-search").html(response);
				},
			});
		} 
		else {
			$("#list-results-search").html("");
		}
	});
});