<?php
include('./php_action/conn.php');
include('./php_action/lock.php');
	// // coding for fetching user name
    $sql1="SELECT * FROM seller s, seller_deposit sd WHERE s.sid=sd.sid AND s.status=1 AND s.sid=$sid";
    $result = $conn->query($sql1);
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
		$sid = $row['sid'];
		$sname = $row['sname'];
		$mobile = $row["mobile"];
		$pass = $row["pass"];
		$email = $row["email"];
		$city = $row["city"];
		$taluka = $row["taluka"];
		$dist = $row["dist"];
		$pincode = $row["pincode"];
		$address = $row["address"];
		$address = $row["address"];
		$latitude = $row["latitude"];
		$longitude = $row["longitude"];
		$paystatus = $row["paystatus"];		
		$regdate = $row["regdate"];	

		$sd_id = $row["sd_id"];
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