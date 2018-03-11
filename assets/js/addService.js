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

	var addUserForm = $("#addProfil");

	var validator = addUserForm.validate({

		rules:{
			name :{ required : true },
      desc :{ required : true }
		},
		messages:{
			name :{ required : "This field is required" },
      desc :{ required : "This field is required" }
		}
	});
});
