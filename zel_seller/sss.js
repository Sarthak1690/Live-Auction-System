function delete_product(pid = null) {
	if(pid) {
		var r = confirm("Are You Sure To Delete Product?");
		if(r==true){
			$.ajax({
				url: './delete_product.php',
				type: 'post',
				data: {pid : pid},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						 location.reload();
						 alert("Product Deleted Successfully!");
						 $("#mes").html("ookkk");
					} else {
					} // /else
				} // /success
			});  // /ajax function to remove the order
	} else{
		location.reload();
	}
	}
	else {
		alert('error! refresh the page again');
	}	
}
function delete_photo(photo_id = null) {
	if(photo_id) {
		var r = confirm("Are You Sure To Delete Photo?");
		if(r==true){
			$.ajax({
				url: './delete_photo.php',
				type: 'post',
				data: {photo_id : photo_id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						 location.reload();
						 alert("Photo Deleted Successfully!");
						 $("#mes").html("ookkk");
					} else {
					} // /else
				} // /success
			});  // /ajax function to remove the order
	} else{
		location.reload();
	}
	}
	else {
		alert('error! refresh the page again');
	}	
}
function delete_doc(sdoc_id = null) {
	if(sdoc_id) {
		var r = confirm("Are You Sure To Delete Documents?");
		if(r==true){
			$.ajax({
				url: './delete_doc.php',
				type: 'post',
				data: {sdoc_id : sdoc_id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						 location.reload();
						 alert("Documents Deleted Successfully!");
						 $("#mes").html("ookkk");
					} else {
					} // /else
				} // /success
			});  // /ajax function to remove the order
	} else{
		location.reload();
	}
	}
	else {
		alert('error! refresh the page again');
	}	
}