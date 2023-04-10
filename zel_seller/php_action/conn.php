<?php
if($_SERVER['HTTP_HOST']=="localhost"){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database= "prj_auction_db";
	$local_mode = true;
}
else{
	$servername = "localhost";
	$username = "auction_User";
	$password = "Auction@121$";
	$database= "prj_auction_db";
	$conn = new mysqli($servername, $username, $password, $database);
	$local_mode = false;
}
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>