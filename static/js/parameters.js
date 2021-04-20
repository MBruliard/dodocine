/**
 * @file static/js/parameters.js
 * @brief Script Javascript/JQuery/AJAX associée à @file parameters.php
 */


 $(document).ready(function() {

 	deactivate_menu();
 	restartErrorsInput();

 	$('#menu-rating').addClass('active');
 	$('#menu-content-rating').show();

 	/*
 	 * Commençons par les boutons du menu
 	 */
 	$('#menu-rating').click(function() {
 		deactivate_menu();
 		$('#menu-rating').addClass('active');
 		$('#menu-content-rating').show();

 	});

 	$('#menu-looking').click(function() {
 		deactivate_menu();
 		$('#menu-looking').addClass('active');
 		$('#menu-content-looking').show();
 	});

 	$('#menu-fav').click(function() {
 		deactivate_menu();
 		$('#menu-fav').addClass('active');
 		$('#menu-content-fav').show();
 	});

 	$('#menu-param').click(function() {
 		deactivate_menu();
 		$('#menu-param').addClass('active');
 		$('#menu-content-param').show();
 	});

 	/**
 	 * Changement du mot de passe
 	 */
 	$("#pwd-form").submit(function (event) {
 		restartErrorsInput();
 		var formData = {
 			new_pwd : $("#new_pwd").val(),
 			conf_new_pwd : $('#conf_new_pwd').val()
 		};


 		$.ajax({
			type: "POST",
			url: "parameters-response.php",
			data: formData,
			dataType: "json",
			encode: true,
			success: function(data) {
				if (data.res) {
			 		$("#dodo-modal-label").text("Changement effectué !");
					$("#dodo-modal-content").text("Le nouveau mot de passe a bien été pris en compte");
					$("#dodo-modal").modal('show');
				}
				else {
					if (data.password) {
						$("#new_pwd").addClass("is-invalid");
						$("#new_pwd_group").append(
							"<small class='text-danger text-left'>" + data.password + "</small>"
						);
					}

					if (data.confirmation) {
						$("#conf_new_pwd").addClass("is-invalid");
						$("#conf_new_pwd_group").append(
							"<small class='text-danger text-left'>" + data.confirmation + "</small>"
						);
					}
				}
	
			},
			error: function (response, status, xhr) {
				alert(xhr);
			}
		}).done(function (data) {
			console.log(data);
		});

 		event.preventDefault();
 	});


 	/**
 	 * Changement de l'email
 	 */
 	$("#email-form").submit(function (event) {
 		restartErrorsInput();
 		var formData = {
 			new_email : $("#new_email").val()
 		};
 		
 		$.ajax({
			type: "POST",
			url: "parameters-response.php",
			data: formData,
			dataType: "json",
			encode: true,
			success: function(data) {
				if (data.res) {
			 		$("#dodo-modal-label").text("Changement effectué !");
					$("#dodo-modal-content").text("Le nouvel email a bien été pris en compte");
					$("#dodo-modal").modal('show');
				}
				else {
					if (data.email) {
						$("#new_email").addClass("is-invalid");
						$("#new_email_group").append(
							"<small class='text-danger text-left'>" + data.email + "</small>"
						);
					}
				}
	
			},
			error: function (response, status, xhr) {
				alert(xhr);
			}
		}).done(function (data) {
			console.log(data);
		});

 		event.preventDefault();
 	});


 	/**
 	 * Suppression du compte
 	 */
 	$("#delete_account_btn").click(function (event) {
 		restartErrorsInput();
 		var formData = {
 			delete_account : 'true'
 		};
 		
 		$.ajax({
			type: "POST",
			url: "parameters-response.php",
			data: formData,
			dataType: "json",
			encode: true,
			success: function(data) {
				if (data.res) {
			 		$("#dodo-modal-label").text("Compte supprimé avec succès");
					$("#dodo-modal-content").text("Votre compte vient d'être supprimé... Vous nous quittez maintenant mais notre porte vous sera toujours ouverte !");
					$("#dodo-modal").modal('show');

					window.location.replace(data.redirect);
				}
				else {
					if (data.email) {
						$("#dodo-modal-label").text("Oops !");
						$("#dodo-modal-content").text("Une erreur est survenue pendant la suppression du compte, vous allez rester un petit plus longtemps avec nous");
						$("#dodo-modal").modal('show');
					}
				}
	
			},
			error: function (response, status, xhr) {
				alert(xhr);
			}
		}).done(function (data) {
			console.log(data);
		});

 		event.preventDefault();
 	});


 });



function deactivate_menu() {
	$(".list-group-item").removeClass('active');
	$(".content-param").hide();
}

function restartErrorsInput() {
	$("input").removeClass("is-invalid");
	$("small").remove();
}