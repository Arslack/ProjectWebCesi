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
			etat : { required : true, selected : true}
		},
		messages:{
			etat : { required : "Ce champ est obligatoire", selected : "Sélectionnez au moins une option" }
		}
	});
});
