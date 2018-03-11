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

	var addUserForm = $("#addDemande");

	var validator = addUserForm.validate({

		rules:{
			title :{ required : true },
            desc :{ required : true },
            file:{ required : true }
		},
		messages:{
			title :{ required : "Ce champ est obligatoire" },
            desc :{ required : "Ce champ est obligatoire" },
            file:{ required : "Ce champ est obligatoire" }
		}
	});
});
