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

	var addUserForm = $("#addService");

	var validator = addUserForm.validate({

		rules:{
			name :{ required : true },
      desc :{ required : true }
		},
		messages:{
			name :{ required : "Ce champ est obligatoire" },
      desc :{ required : "Ce champ est obligatoire" }
		}
	});
});
