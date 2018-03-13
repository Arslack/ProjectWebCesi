/**
 * @author
 */


 jQuery(document).ready(function(){

 	jQuery(document).on("click", ".deleteUser", function(){
 		var userId = $(this).data("userid"),
      serviceId = $(this).data("serviceId"),
 			hitURL = baseURL + "addNewUserService",
 			currentRow = $(this);

 		var confirmation = confirm("Etes vous sur de vouloir ajouter cet utilisateur ?");

 		if(confirmation)
 		{
 			jQuery.ajax({
 			type : "POST",
 			dataType : "json",
 			url : hitURL,
 			data : { userId : userId, serviceId : serviceId }
 			}).done(function(data){
 				console.log(data);
 				currentRow.parents('tr').remove();
 				if(data.status = true) { alert("Affection d'utilisateur réussie"); }
 				else if(data.status = false) { alert("Affection d'utilisateur raté"); }
 				else { alert("Acces refusé..!"); }
 			});
 		}
 	});


 	jQuery(document).on("click", ".searchList", function(){

 	});

 });
