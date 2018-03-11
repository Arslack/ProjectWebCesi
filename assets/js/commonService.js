/**
 * @author Kishor Mali
 */


jQuery(document).ready(function(){

	jQuery(document).on("click", ".deleteUser", function(){
		var id = $(this).data("id"),
			hitURL = baseURL + "deleteService",
			currentRow = $(this);

		var confirmation = confirm("Are you sure to delete this Service ?");

		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { id : id }
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Service successfully deleted"); }
				else if(data.status = false) { alert("Service deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});


	jQuery(document).on("click", ".searchList", function(){

	});

});
