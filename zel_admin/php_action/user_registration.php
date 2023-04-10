<?php
include('./conn.php');
include('./sms.php');
	if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
if(isset($_POST['rsubmit'])){			
		$bname = test_input($_POST["bname"]);
		$mobile = test_input($_POST["mobile"]);
		$pass = test_input($_POST["pass"]);
		$cpass = test_input($_POST["cpass"]);		
		$latitude = test_input($_POST["Latitude"]);
		$longitude = test_input($_POST["Longitude"]);
		$currdate = date('Y-m-d H:i:s a');
		$status=1;
		// // coding for fetching user name
		$sql1="SELECT * FROM user WHERE status=1 AND mobile='$mobile'";
		//$result=mysql_query($sql); 
		$result = $conn->query($sql1);
		if ($result->num_rows > 0){
			$error=$bname ." "."User is already exist!";
			$show="display:show;";
			$alert="alert alert-danger";
			header("Location:../register.php?error=$error&show=$show&alert=$alert");
		}
		else 
		{
			if($pass===$cpass)
			{
				$strpass=password_hash($pass, PASSWORD_BCRYPT);
				$sql = "INSERT INTO user (uname, mobile, pass, latitude,longitude,regdate, status)
				VALUES ('$bname', '$mobile', '$strpass', '$latitude','$longitude', '$currdate', '$status')";
				// use exec() because no results are returned
				if ($conn->query($sql) === TRUE) {																
					$error="User Is Added successfully!";
					$show="display:show;";
					$alert="alert alert-success";
					header("Location:../register.php?error=$error&show=$show&alert=$alert");
				}
				else{
					$error="Your Operation is invalid";
					$show="display:show;";
					$alert="alert alert-danger";
					header("Location:../register.php?error=$error&show=$show&alert=$alert");
				}
			}
			else{
				$error="Your Password and Confirm Password is Not Match!";
				$show="display:show;";
				$alert="alert alert-danger";
				header("Location:../register.php?error=$error&show=$show&alert=$alert");
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