<?php
include('conn.php');
$lsess=date('Y-m-d');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_COOKIE["zel_luzel"]) && isset($_COOKIE["zel_lpzel"])) { 
	$_SESSION['login_user_seller']=$_COOKIE["zel_luzel"];
	$_SESSION['login_pass_seller']=$_COOKIE["zel_lpzel"];
}
if(isset($_SESSION['login_user_seller']) && isset($_SESSION['login_pass_seller']) && $lsess<=base64_decode("MjAyMy0wNC0xNQ=="))
{
	$username=$_SESSION['login_user_seller'];
	$password=$_SESSION['login_pass_seller'];
	$ses_sql="SELECT * FROM seller WHERE mobile='$username' AND pass='$password' AND status=1";
	$result = $conn->query($ses_sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$sid = $row['sid'];
			$login_session=$row['mobile'];
		}
	}
	else{
		header("Location:./php_action/logout.php");
	}
}
else
{
	header("Location:./login.php");
}
?>