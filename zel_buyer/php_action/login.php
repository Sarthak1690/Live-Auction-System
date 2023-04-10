<?php
$error="";
$show="display:none;";
include("conn.php");
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
	$currdate = date('Y-m-d H:i:s a');
}
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_COOKIE["zel_luzel"]) && isset($_COOKIE["zel_lpzel"])) { 
	$_SESSION['login_user_buyer']=$_COOKIE["zel_luzel"];
	$_SESSION['login_pass_buyer']=$_COOKIE["zel_lpzel"];
}

if(isset($_SESSION['login_user_buyer']) && isset($_SESSION['login_pass_buyer']))
{
	header("Location:../profile.php");
	exit;
}

if(isset($_POST['submitlogin'])){
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$myusername=test_input($_POST['mobile']); 
		$mypassword=test_input($_POST['pass']);		
		$status=0;
		$ip=$_SERVER['REMOTE_ADDR'];
		$latitude = test_input($_POST["Latitude"]);
		$longitude = test_input($_POST["Longitude"]);
		$sql="SELECT * FROM buyer WHERE mobile='$myusername' AND status=1";
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
				$bid=$row['bid'];
				$mobile=$row['mobile'];
				$pass=$row['pass'];
				$status=$row['status'];
			}
					
			if($mobile==$myusername && password_verify($mypassword, $pass) && $status==1)
			{
				$_SESSION['login_user_buyer']=$mobile;
				$_SESSION['login_pass_buyer']=$pass;
				if(!empty($_POST["remember"]))   
				{  
					setcookie ("zel_luzel",$mobile,time()+ (10 * 365 * 24 * 60 * 60));  
					setcookie ("zel_lpzel",$pass,time()+ (10 * 365 * 24 * 60 * 60));
				}  
				else  
				{  
					if(isset($_COOKIE["zel_luzel"]))   
					{   
					setcookie("zel_luzel", "", time() - 3600); 
					}  
					if(isset($_COOKIE["zel_lpzel"]))   
					{  
					 setcookie("zel_lpzel", "", time() - 3600);
					} 
				}  
				
				$sql="UPDATE buyer SET last_login_date='$currdate', last_login_ip='$ip', latitude='$latitude', longitude='$longitude' WHERE bid=$bid";
				$conn->query($sql);
				header("location:../profile.php");
				exit();
			}
			else{
				$error="Your Login Name or Password is invalid";
				$show="display:show;";
				$alert="alert alert-danger";
				header("Location:../login.php?error=$error&show=$show&alert=$alert");
			}
		}
		else{
			$error="Your Login Name or Password is invalid";			
			$show="display:show;";
			$alert="alert alert-danger";
			header("Location:../login.php?error=$error&show=$show&alert=$alert");
		}
	}
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>