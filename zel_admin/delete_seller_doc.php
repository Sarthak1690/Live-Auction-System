<?php 	
//require_once 'core.php';
require_once './php_action/conn.php';
$valid['success'] = array('success' => false, 'messages' => array());
$sdoc_id = $_POST['sdoc_id'];
if($sdoc_id) { 
 $sql = "DELETE FROM seller_doc WHERE sdoc_id = $sdoc_id";
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