/**
 * File : editUser.js
 *
 * This file contain the validation of edit user form
 *
 * @author BURGER Clément
 */
$(document).ready(function(){

	var editUserForm = $("#editService");

	var validator = editServiceForm.validate({

		rules:{
			fname :{ required : true },
			desc :{ required : true }

		},
		messages:{
			fname :{ required : "This field is required" },
			desc :{ required : "This field is required" },
		}
	});
});
