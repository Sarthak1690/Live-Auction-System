<?php 	
//require_once 'core.php';
require_once './php_action/conn.php';
$valid['success'] = array('success' => false, 'messages' => array());
$bd_id = $_POST['bd_id'];
if($bd_id) { 
 $sql = "UPDATE buyer_deposit SET pay_status=0 WHERE bd_id = $bd_id";
 if($conn->query($sql) === TRUE ) {
	$sql1="SELECT bid FROM buyer_deposit WHERE bd_id=$bd_id";
	$result = $conn->query($sql1);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
		$bid = $row['bid'];			
		}
	}
	$sql = "UPDATE buyer SET paystatus=0 WHERE bid=$bid";
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