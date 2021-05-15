$(document).ready(function() {
	$('#signup-container').hide();

	restartErrorsInput();

	$("#login-form").submit(function (event) {

		restartErrorsInput();

		var formData = {
			username_login : $("#username-login").val(),
			password_login : $("#password-login").val()
		};


		$.ajax({
			type: "POST",
			url: "login-response.php",
			data: formData,
			dataType: "json",
			encode: true,
			success: function(data) {
				if (data.res == true) {
					// on retourne a la page d'accueil 
					window.location.replace(data.redirect);
				}
				else {

					//si il y a une erreur sur le pseudo
					if (data.pseudo) {
						$("#username-login").addClass("is-invalid");
						$("#username-login-group").append(
							"<small class='text-danger text-left'>" + data.pseudo + "</small>"
						);
					}

					// si il y a une erreur sur le mot de passe
					if (data.password) {
						$("#password-login").addClass("is-invalid");
						$("#password-login-group").append(
							"<small class='text-danger text-left'>" + data.password + "</small>"
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
		
		// pour éviter de recharger la page !!! super important !
		event.preventDefault();
	});



	$("#signup-form").submit(function (event) {

		restartErrorsInput();

		var formData = {
			username_signup : $("#username-signup").val(),
			email_signup : $("#email-signup").val(),
			password_signup : $("#password-signup").val(),
			password2_signup : $('#password2-signup').val()
		};


		$.ajax({
			type: "POST",
			url: "login-response.php",
			data: formData,
			dataType: "json",
			encode: true,
			success: function(data) {
				if (data.res == true) {
					// on retourne a la page d'accueil 
					window.location.replace(data.redirect);
				}
				else {

					//si il y a une erreur sur le pseudo
					if (data.pseudo) {
						$("#username-signup").addClass("is-invalid");
						$("#username-signup-group").append(
							"<small class='text-danger text-left'>" + data.pseudo + "</small>"
						);
					}

					//si il y a une erreur sur l'email
					if (data.email) {
						$("#email-signup").addClass("is-invalid");
						$("#email-signup-group").append(
							"<small class='text-danger text-left'>" + data.email + "</small>"
						);
					}

					// si il y a une erreur sur le mot de passe
					if (data.password) {
						$("#password-signup").addClass("is-invalid");
						$("#password-signup-group").append(
							"<small class='text-danger text-left'>" + data.password + "</small>"
						);
					}
					//si il y a une erreur sur le pseudo
					if (data.conf_password) {
						$("#password2-signup").addClass("is-invalid");
						$("#password2-signup-group").append(
							"<small class='text-danger text-left'>" + data.conf_password + "</small>"
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
		
		// pour éviter de recharger la page !!! super important !
		event.preventDefault();
	});


	/**
	 * Permet de passer du formulaire de connexion à celui d'inscription
	 */
	$('#signup-btn').click(function() {
		$("#login-title").text("S'inscrire");
		$("#signup-container").show();
		$("#login-container").hide();

		$("#signup-btn").addClass("btn-dark");
		$("#login-btn").addClass("btn-outline-dark");

		$("#signup-btn").removeClass("btn-outline-dark");
		$("#login-btn").removeClass("btn-dark");
	});


	/** 
	 * Permet de passer du formulaire d'inscription à celui de connexion
	 */
	$("#login-btn").click(function() {
		$("#login-title").text("Se Connecter");
		$("#signup-container").hide();
		$("#login-container").show();

		$("#login-btn").addClass("btn-dark");
		$("#signup-btn").addClass("btn-outline-dark");

		$("#login-btn").removeClass("btn-outline-dark");
		$("#signup-btn").removeClass("btn-dark");
	});
	
});

function restartErrorsInput() {
	$("input").removeClass("is-invalid");
	$("small").remove();
}







