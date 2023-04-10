<?php
include('./php_action/conn.php');
if (isset($_GET['pid'])) {	
	  $pid=$_GET['pid'];
      $sql1 = "SELECT * FROM product p WHERE p.pid=$pid AND p.status=1";
      $result = $conn->query($sql1);
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {		
		$bid_start_date = $row["bid_start_date"];		
		$bid_end_date = $row["bid_end_date"];				
		}
	  }
	}
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
$currdate =date('d-m-Y H:i:s');
echo $bid_start_date;
?>
<form>
    <label for="party">Enter a date and time for your party booking:</label>
    <input id="party" type="datetime-local" name="partydate" min="2017-06-01T08:30" max="2017-06-30T16:30">
    <input id="party" type="submit" name="partydate" min="2017-06-01T08:30" max="2017-06-30T16:30">
  </form>