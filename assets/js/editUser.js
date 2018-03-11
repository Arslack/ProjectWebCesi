/**
 * File : editUser.js 
 * 
 * This file contain the validation of edit user form
 *
 */
$(document).ready(function(){
	
	var editUserForm = $("#editUser");
	
	var validator = editUserForm.validate({
		
		rules:{
			fname :{ required : true },
			email : { required : true, email : true, remote : { url : baseURL + "checkEmailExists", type :"post", data : { userId : function(){ return $("#userId").val(); } } } },
			cpassword : {equalTo: "#password"},
			mobile : { required : true, digits : true },
			role : { required : true, selected : true}
		},
		messages:{
			fname :{ required : "Ce champ est obligatoire" },
			email : { required : "Ce champ est obligatoire", email : "Votre adresse email doit être valide", remote : "Email déjà pris" },
			cpassword : {equalTo: "Please enter same password" },
			mobile : { required : "Ce champ est obligatoire", digits : "Des nombres uniquement" },
			role : { required : "Ce champ est obligatoire", selected : "Sélectionnez au moins une option" }
		}
	});
});