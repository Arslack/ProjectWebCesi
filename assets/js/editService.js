/**
 * File : editUser.js
 *
 * This file contain the validation of edit user form
 *
 * @author BURGER Clément trad; Jantet Alain
 */
$(document).ready(function(){

	var editServiceform = $("#editService");

	var validator = editServiceform.validate({

		rules:{
			name :{ required : true },
			desc :{ required : true }

		},
		messages:{
			name :{ required : "Ce champ est obligatoire" },
			desc :{ required : "Ce champ est obligatoire" },
		}
	});
});
