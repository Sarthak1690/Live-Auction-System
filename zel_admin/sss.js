function delete_seller(sid = null) {
	if(sid) {
		var r = confirm("Are You Sure To Delete Seller?");
		if(r==true){
			$.ajax({
				url: './delete_seller.php',
				type: 'post',
				data: {sid : sid},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						 location.reload();
						 alert("Seller Deleted Successfully!");
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
function delete_buyer(bid = null) {
	if(bid) {
		var r = confirm("Are You Sure To Delete Buyer?");
		if(r==true){
			$.ajax({
				url: './delete_buyer.php',
				type: 'post',
				data: {bid : bid},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						 location.reload();
						 alert("Buyer Deleted Successfully!");
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
function delete_admin(uid = null) {
	if(uid) {
		var r = confirm("Are You Sure To Delete Admin User?");
		if(r==true){
			$.ajax({
				url: './delete_admin.php',
				type: 'post',
				data: {uid : uid},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						 location.reload();
						 alert("Admin Deleted Successfully!");
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
function delete_seller_deposit(sd_id = null) {
	if(sd_id) {
		var r = confirm("Are You Sure To Delete Seller Payment?");
		if(r==true){
			$.ajax({
				url: './delete_seller_deposit.php',
				type: 'post',
				data: {sd_id : sd_id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						 location.reload();
						 alert("Seller Payment Deleted Successfully!");
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
function delete_buyer_deposit(bd_id = null) {
	if(bd_id) {
		var r = confirm("Are You Sure To Delete Buyer Payment?");
		if(r==true){
			$.ajax({
				url: './delete_buyer_deposit.php',
				type: 'post',
				data: {bd_id : bd_id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						 location.reload();
						 alert("Buyer Payment Deleted Successfully!");
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
function delete_buyer_doc(doc_id = null) {
	if(doc_id) {
		var r = confirm("Are You Sure To Delete Documents?");
		if(r==true){
			$.ajax({
				url: './delete_buyer_doc.php',
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
function delete_seller_doc(sdoc_id = null) {
	if(sdoc_id) {
		var r = confirm("Are You Sure To Delete Documents?");
		if(r==true){
			$.ajax({
				url: './delete_seller_doc.php',
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