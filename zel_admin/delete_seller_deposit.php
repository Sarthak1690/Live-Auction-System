<?php 	
//require_once 'core.php';
require_once './php_action/conn.php';
$valid['success'] = array('success' => false, 'messages' => array());
$sd_id = $_POST['sd_id'];
if($sd_id) { 
 $sql = "UPDATE seller_deposit SET pay_status=0 WHERE sd_id = $sd_id";
 if($conn->query($sql) === TRUE ) {
	$sql1="SELECT sid FROM seller_deposit WHERE sd_id=$sd_id";
	$result = $conn->query($sql1);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
		$sid = $row['sid'];			
		}
	}
	$sql = "UPDATE seller SET paystatus=0 WHERE sid=$sid";
	$conn->query($sql);
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 $conn->close();
 echo json_encode($valid);
} // /if $_POST