<?php 	
//require_once 'core.php';
require_once './php_action/conn.php';
$valid['success'] = array('success' => false, 'messages' => array());
$photo_id = $_POST['photo_id'];
if($photo_id) { 
 $sql = "DELETE FROM product_photo WHERE photo_id = $photo_id";
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