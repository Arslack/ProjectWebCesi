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
			lname :{ required : "This field is required" },
      fname :{ required : "This field is required" },
			email : { required : "This field is required", email : "Please enter valid email address", remote : "Email already taken" },
			mobile : { required : "This field is required", digits : "Please enter numbers only" },
      fixe : { required : "This field is required", digits : "Please enter numbers only" },
      cpostal : { required : "This field is required", digits : "Please enter numbers only" },
      adresse :{ required : "This field is required" },
      city :{ required : "This field is required" },
      country :{ required : "This field is required" }
		}
	});
});
