function delete_doc(doc_id = null) {
	if(doc_id) {
		var r = confirm("Are You Sure To Delete Documents?");
		if(r==true){
			$.ajax({
				url: './delete_doc.php',
				type: 'post',
				data: {doc_id : doc_id},
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