/**
 * File : addProfil
 *
 * This file contain the validation of add user form
 *
 * Using validation plugin : jquery.validate.js
 *
 * @author BURGER Clément
 */

$(document).ready(function(){

	var addUserForm = $("#addRequestUser");

	var validator = addUserForm.validate({

		rules:{
			fname :{ required : true },
			email : { required : true, email : true, remote : { url : baseURL + "checkEmailExists", type :"post"} },
			password : { required : true },
			cpassword : {required : true, equalTo: "#password"},
			mobile : { required : true, digits : true }
		},
		messages:{
			fname :{ required : "Ce champ est obligatoire" },
			email : { required : "Ce champ est obligatoire", email :  "Votre adresse email doit être valide", remote : "Email déjà pris" },
			password : { required : "Ce champ est obligatoire" },
			cpassword : {required : "Ce champ est obligatoire", equalTo: "Des nombres uniquement" },
			mobile : { required : "Ce champ est obligatoire", digits : "Des nombres uniquement" }
		}
	});
});
