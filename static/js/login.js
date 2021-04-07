$(document).ready(function() {
	$('#signup-form').hide();
});

$('#signup-btn').click(function() {
	$("#login-title").text("S'inscrire");
	$("#signup-form").show();
	$("#login-form").hide();
	$("#signup-btn").addClass("btn-primary");
	$("#login-btn").removeClass("btn-primary");
});

$("#login-btn").click(function() {
	$("#login-title").text("Se Connecter");
	$("#signup-form").hide();
	$("#login-form").show();
	$("#login-btn").addClass("btn-primary");
	$("#signup-btn").removeClass("btn-primary");
});

