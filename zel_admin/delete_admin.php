<?php 	
//require_once 'core.php';
require_once './php_action/conn.php';
$valid['success'] = array('success' => false, 'messages' => array());
$uid = $_POST['uid'];
if($uid) { 
 $sql = "Update user SET status=0 WHERE uid = $uid";
 if($conn->query($sql) === TRUE ) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 $conn->close();
 echo json_encode($valid);
} // /if $_POST