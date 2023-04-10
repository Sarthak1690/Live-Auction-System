<?php
include('./php_action/conn.php');
include('./php_action/lock.php');
	// // coding for fetching user name
    $sql1="SELECT * FROM user WHERE status=1 AND uid=$uid";
    $result = $conn->query($sql1);
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
		$uid = $row['uid'];
		$uname = $row['uname'];
		$mobile = $row["mobile"];
		$pass = $row["pass"];		
		$latitude = $row["latitude"];
		$longitude = $row["longitude"];		
		$regdate = $row["regdate"];		
		}
	  }
?>