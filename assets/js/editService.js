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
			name :{ required : true },
			desc :{ required : true }

		},
		messages:{
			name :{ required : "This field is required" },
			desc :{ required : "This field is required" },
		}
	});
});
