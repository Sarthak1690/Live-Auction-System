<?php
include('./php_action/conn.php');
include('./php_action/lock.php');
	// // coding for fetching user name
    $sql1="SELECT * FROM buyer b, buyer_deposit bd WHERE b.bid=bd.bid AND b.status=1 AND b.bid=$bid";
    $result = $conn->query($sql1);
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
		$bid = $row['bid'];
		$bname = $row['bname'];
		$mobile = $row["mobile"];
		$pass = $row["pass"];
		$email = $row["email"];
		$comp_name = $row["comp_name"];
		$comp_mob = $row["comp_mob"];
		$comp_type = $row["comp_type"];
		$comp_prod = $row["comp_prod"];
		$city = $row["city"];
		$taluka = $row["taluka"];
		$dist = $row["dist"];
		$pincode = $row["pincode"];
		$address = $row["address"];
		$latitude = $row["latitude"];
		$longitude = $row["longitude"];
		$paystatus = $row["paystatus"];		
		$regdate = $row["regdate"];	

		$bd_id = $row["bd_id"];
		$amt = $row['amt'];
		$order_status = $row['order_status'];
		$order_id = $row['order_id'];
		$tracking_id = $row['tracking_id'];
		$pay_mode = $row['pay_mode'];
		$trans_date = $row['trans_date'];
		$pay_status = $row['pay_status'];	
		}
	  }
?>