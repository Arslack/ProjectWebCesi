/**
 * @author Kishor Mali
 */


jQuery(document).ready(function(){

	jQuery(document).on("click", ".deleteDemande", function(){
		var demandeId = $(this).data("id"),
			hitURL = baseURL + "deleteDemande",
			currentRow = $(this);

		var confirmation = confirm("Etes vous sure de vouloir supprimer cette demande ?");

		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { demandeId : demandeId }
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Demande supprimer avec succés"); }
				else if(data.status = false) { alert("Demande non supprimer"); }
				else { alert("Accés refusé..!"); }
			});
		}
	});


	jQuery(document).on("click", ".searchList", function(){

	});

});
