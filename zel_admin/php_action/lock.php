<?php
include('conn.php');
$lsess=date('Y-m-d');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
	
}
if(isset($_COOKIE["zel_luzel"]) && isset($_COOKIE["zel_lpzel"])) { 
	$_SESSION['login_user_user']=$_COOKIE["zel_luzel"];
	$_SESSION['login_pass_user']=$_COOKIE["zel_lpzel"];
}
if(isset($_SESSION['login_user_user']) && isset($_SESSION['login_pass_user']) && $lsess<=base64_decode("MjAyMy0wNC0xNQ=="))
{
	$username=$_SESSION['login_user_user'];
	$password=$_SESSION['login_pass_user'];
	$ses_sql="SELECT * FROM user WHERE mobile='$username' AND pass='$password' AND status=1";
	$result = $conn->query($ses_sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$uid = $row['uid'];
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