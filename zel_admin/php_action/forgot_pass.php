<?php

include("conn.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//check up
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

 if(isset($_SESSION['login_user']))
{
  header("Location:../profile.php");
  exit;
}
else
{
  //header("Location:login.php");
  //exit;
}


 $active=null;
 $user_type=null;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from forgot password form
$myusername=addslashes($_POST['txtuname']); 
$sql="SELECT fname, lname, email, mobile, pass FROM end_user WHERE status=1 AND (email='$myusername' OR mobile='$myusername')"; 
$result = $conn->query($sql);
if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()) {
		$mobile=$row['mobile'];
		$email=$row['email'];
		$mypassword=$row['pass'];
		$fname=$row['fname'];
		$lname=$row['lname'];
	}
	// sms sending code	  
	  $message="Your User Name: ".$mobile." and password: ".$mypassword." Thank You! https://sitarangcharitablesociety.in";	  
	  $mobile_number=$mobile;		  
	  $message1= sms_unicode($message);
	  sentsms($message1, $mobile_number);
	$error="We have sent your user name and password on Mobile Number ".$mobile." and Email id ".$email." If you got your password please <a href='./login.php'>Click Here to login</a> !";
    $show="display:show;";
    $alert="alert alert-success";
	header("Location:../forgot_pass.php?error=$error&show=$show&alert=$alert");
}


else{
	$error="User email or mobile number are not matched! <a href='./register.php'>Create New Account </a>";
	$show="display:show;";
	$alert="alert alert-danger";
	header("Location:../forgot_pass.php?error=$error&show=$show&alert=$alert");
	}
}
?>