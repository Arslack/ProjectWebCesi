/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @ Jantet Alain  
 */

$(document).ready(function(){
	
	var addUserForm = $("#addUser");
	
	var validator = addUserForm.validate({
		
		rules:{
			fname :{ required : true },
			email : { required : true, email : true, remote : { url : baseURL + "checkEmailExists", type :"post"} },
			password : { required : true },
			cpassword : {required : true, equalTo: "#password"},
			mobile : { required : true, digits : true },
			role : { required : true, selected : true}
		},
		messages:{
			fname :{ required : "Ce champ est obligatoire" },
			email : { required : "Ce champ est obligatoire",  "Votre adresse email doit être valide", remote : "Email déjà pris" },
			password : { required : "Ce champ est obligatoire" },
			cpassword : {required : "Ce champ est obligatoire", equalTo: "Saisir le même mot de passe" },
			mobile : { required : "Ce champ est obligatoire", digits : "Des nombres uniquement" },
			role : { required : "Ce champ est obligatoire", selected : "Sélectionner au moins une option" }			
		}
	});
});
