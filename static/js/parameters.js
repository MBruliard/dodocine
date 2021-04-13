/**
 * @file static/js/parameters.js
 * @brief Script Javascript/JQuery/AJAX associée à @file parameters.php
 */


 $(document).ready(function() {

 	$("#pwd-form").submit(function (event) {
 		var formData = {
 			new_pwd : $("#new_pwd").val(),
 			conf_new_pwd : $('#conf_new_pwd').val()
 		};

 		save_in_database(formData);
 	});
 });

function alertme() {
	alert("ok");
}

function save_in_database (json_data){
	
	$.ajax({
		type: "POST",
		url: "parameters-response.php",
		data: json_data,
		dataType: "json",
		encode: true,
	}).done(function (data) {
		console.log(data);
		//alert('Your password has been changed !')
	});

	event.preventDefault();
}