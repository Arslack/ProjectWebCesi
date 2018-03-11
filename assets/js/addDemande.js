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
      desc :{ required : true }
		},
		messages:{
			title :{ required : "This field is required" },
      desc :{ required : "This field is required" }
		}
	});
});
