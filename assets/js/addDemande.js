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

	var addDemandeForm = $("#addDemande");

	var validator = addDemandeForm.validate({

		rules:{
			title :{ required : true },
            desc :{ required : true },
						service : { required : true, selected : true}
		},
		messages:{
			title :{ required : "Ce champ est obligatoire" },
      desc :{ required : "Ce champ est obligatoire" },
			service : { required : "Ce champ est obligatoire", selected : "Sélectionner au moins une option" }
		}
	});
});
