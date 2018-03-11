/**
 * File : addDemande
 *
 * This file contain the validation of add user form
 *
 * Using validation plugin : jquery.validate.js
 *

 *
 */

$(document).ready(function(){

	var addUserForm = $("#addProfil");

	var validator = addUserForm.validate({

		rules:{
			lname :{ required : true },
      fname :{ required : true },
			email : { required : true, email : true, remote : { url : baseURL + "checkEmailExists", type :"post"} },
			mobile : { required : true, digits : true },
      fixe : { required : true, digits : true },
      cpostal : { required : true, digits : true },
      adresse :{ required : true },
      city :{ required : true },
      country :{ required : true }
		},
		messages:{
			lname :{ required : "Ce champ est obligatoire" },
      fname :{ required : "Ce champ est obligatoire" },
			email : { required : "Ce champ est obligatoire", email : "Votre adresse email doit être valide", remote : "Email déjà pris" },
			mobile : { required : "Ce champ est obligatoire", digits : "Des nombres uniquement" },
      fixe : { required : "Ce champ est obligatoire", digits : "Des nombres uniquement" },
      cpostal : { required : "Ce champ est obligatoire", digits : "Des nombres uniquement" },
      adresse :{ required : "Ce champ est obligatoire" },
      city :{ required : "Ce champ est obligatoire" },
      country :{ required : "Ce champ est obligatoire" }
		}
	});
});
