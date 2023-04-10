<?php
include('./conn.php');
include('./sms.php');
	if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
/*if(isset($_POST['rsubmit'])){
	$user_code = test_input($_POST["security_code"]);
	if($code===$user_code){				
		$bname = test_input($_POST["bname"]);
		$mobile = test_input($_POST["mobile"]);
		$pass = test_input($_POST["pass"]);
		$cpass = test_input($_POST["cpass"]);
		$email = test_input($_POST["email"]);
		$comp_name = test_input($_POST["comp_name"]);
		$comp_mob = test_input($_POST["comp_mob"]);
		$comp_type = test_input($_POST["comp_type"]);
		$comp_prod = test_input($_POST["comp_prod"]);
		$city = test_input($_POST["city"]);
		$taluka = test_input($_POST["taluka"]);
		$dist = test_input($_POST["dist"]);
		$pincode = test_input($_POST["pincode"]);
		$address = test_input($_POST["address"]);
		$latitude = test_input($_POST["Latitude"]);
		$longitude = test_input($_POST["Longitude"]);
		$currdate = date('Y-m-d H:i:s a');
		$status=1;
		// // coding for fetching user name
		$sql1="SELECT * FROM buyer WHERE status=1 AND mobile='$mobile'";
		//$result=mysql_query($sql); 
		$result = $conn->query($sql1);
		if ($result->num_rows > 0){
			$error=$bname ." "."User Mobile is already exist! If you forgot your password please <a href='./forgot_pass.php'>Click Here</a> !";
			$show="display:show;";
			$alert="alert alert-danger";
			header("Location:../register.php?error=$error&show=$show&alert=$alert");
		}
		else 
		{
			if($pass===$cpass)
			{
				$strpass=password_hash($pass, PASSWORD_BCRYPT);
				$sql = "INSERT INTO buyer (bname, mobile, pass, email,comp_name, comp_mob, comp_type, comp_prod, address, city, taluka, dist, pincode, latitude,longitude,regdate, status)
				VALUES ('$bname', '$mobile', '$strpass', '$email','$comp_name','$comp_mob','$comp_type','$comp_prod','$address', '$city', '$taluka', '$dist','$pincode','$latitude','$longitude', '$currdate', '$status')";
				// use exec() because no results are returned
				if ($conn->query($sql) === TRUE) {	
					$bid = $conn->insert_id;
					$sqlprvedu="INSERT INTO buyer_deposit (bid) VALUES ($bid)";
					$conn->query($sqlprvedu);								
					//code for sms sending
					$message="Welcome ".$bname." Your Account is Successfully created. Your User Name: ".$mobile." and password: ".$pass." Thank You.";
					$mobile_number=$mobile;				  
					$message1= sms_unicode($message);
					sentsms($message1, $mobile_number);	
					$_SESSION['login_user_buyer']=$mobile;
					$_SESSION['login_pass_buyer']=$strpass;					
					$error="User Is Added successfully! Please make payment to participate in Online Auction System!";
					$show="display:show;";
					$alert="alert alert-success";
					header("Location:../pay_fees_online.php?error=$error&show=$show&alert=$alert");
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
	else{
		$error="Captcha Code Is Invalid!";
		$show="display:show;";
		$alert="alert alert-danger";
		header("Location:../register.php?error=$error&show=$show&alert=$alert");
	}

}*/
if (isset($_POST['rsubmit'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	$bname = test_input($_POST["bname"]);
	$mobile = test_input($_POST["mobile"]);	
	$pass = test_input($_POST["pass"]);
	$cpass = test_input($_POST["cpass"]);
	$sql1="SELECT * FROM buyer WHERE status=1 AND mobile='$mobile'";
	$result = $conn->query($sql1);
	if ($result->num_rows > 0){
		$error=$bname ." "."User Mobile is already exist! If you forgot your password please <a href='./forgot_pass.php'>Click Here</a> !";
		$show="display:show;";
		$alert="alert alert-danger";
	}
	else if($pass!=$cpass){
		$error="Password and Confirm Password Not Match! Try Again.";
		$show="display:show;";
		$alert="alert alert-danger";
	}		
	else if(!isset($_FILES['userfile']))
	{
		$msg=register_buyer();
		$error="Please Select File To Upload!";
		$show="display:show;";
		$alert="alert alert-danger";
	}	 
	else
	{
		try {
		$msg= upload();  //this will upload your image
		$error=$msg;
		$show="display:show;";
		$alert="alert alert-info";
		//echo $msg;  //Message showing success or failure.
		}
		catch(Exception $e) {
		echo $e->getMessage();
		//echo 'Sorry, could not upload file';
		$error="Sorry, could not upload file";
		$show="display:show;";
		$alert="alert alert-danger";
		}
	}
	header( "Refresh:0; url=../register.php?alert=$alert&show=$show&error=$error", true, 303);
	}
	}
//***********************************************************************************************************
function upload() {
    $msg=null;
	include('./conn.php');
		$bname = test_input($_POST["bname"]);
		$mobile = test_input($_POST["mobile"]);
		$pass = test_input($_POST["pass"]);
		$cpass = test_input($_POST["cpass"]);
		$email = test_input($_POST["email"]);
		$comp_name = test_input($_POST["comp_name"]);
		$comp_mob = test_input($_POST["comp_mob"]);
		$comp_type = test_input($_POST["comp_type"]);
		$comp_prod = test_input($_POST["comp_prod"]);
		$city = test_input($_POST["city"]);
		$taluka = test_input($_POST["taluka"]);
		$dist = test_input($_POST["dist"]);
		$pincode = test_input($_POST["pincode"]);
		$address = test_input($_POST["address"]);
		$latitude = test_input($_POST["Latitude"]);
		$longitude = test_input($_POST["Longitude"]);
		$currdate = date('Y-m-d H:i:s a');
		$status=1;
		$strpass=password_hash($pass, PASSWORD_BCRYPT);
    $maxsize = 5000000; //set to approx 300 KB
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    
            if( $_FILES['userfile']['size'] < $maxsize) {  
                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
					$temp = explode(".", $_FILES["userfile"]["name"]);
					$newfilename = date("Ymdhis").'.' . end($temp);
					move_uploaded_file($_FILES['userfile']['tmp_name'],"../uploads/docs_images/".$newfilename);
					$imgpath="/uploads/docs_images/".$newfilename;
					$sql = "INSERT INTO buyer (bname, mobile, pass, email,comp_name, comp_mob, comp_type, comp_prod, address, city, taluka, dist, pincode, latitude,longitude,regdate, status)
					VALUES ('$bname', '$mobile', '$strpass', '$email','$comp_name','$comp_mob','$comp_type','$comp_prod','$address', '$city', '$taluka', '$dist','$pincode','$latitude','$longitude', '$currdate', '$status')";
					// use exec() because no results are returned
					if ($conn->query($sql) === TRUE) {	
						$bid = $conn->insert_id;
						$sqlprvedu="INSERT INTO buyer_deposit (bid) VALUES ($bid)";
						$conn->query($sqlprvedu);
						$sqldocs="INSERT INTO buyer_doc (imgpath, photo_date, photo_status, bid) VALUES ('$imgpath', '$currdate', 1, $bid)";
						$conn->query($sqldocs);							
						//code for sms sending
						$message="Welcome ".$bname." Your Account is Successfully created. Your User Name: ".$mobile." and password: ".$pass." Thank You.";
						$mobile_number=$mobile;				  
						$message1= sms_unicode($message);
						sentsms($message1, $mobile_number);	
						$_SESSION['login_user_buyer']=$mobile;
						$_SESSION['login_pass_buyer']=$strpass;					
						$error="User Is Added successfully! Please make payment to participate in Online Auction System!";
						$show="display:show;";
						$alert="alert alert-success";
						$msg='<p>Seller User Is Registered successfully !</p>';
						header("Location:../pay_fees_online.php?error=$error&show=$show&alert=$alert");
					}
					else{
						$msg='<p>Invalid Operation!</p>';
					}					
                }
                else
                    $msg="<p>Uploaded file is not an Images.</p>";
            }
             else {
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        else
		{
            $msg="File not uploaded successfully.";
		}
    }
    else {
        $msg= file_upload_error_message($_FILES['userfile']['error']);
		if($msg=="No file was uploaded"){
			$msg=register_buyer();
		}
    }
    return $msg;
}
function register_buyer(){
	include('../conn.php');
	$bname = test_input($_POST["bname"]);
	$mobile = test_input($_POST["mobile"]);
	$pass = test_input($_POST["pass"]);
	$cpass = test_input($_POST["cpass"]);
	$email = test_input($_POST["email"]);
	$comp_name = test_input($_POST["comp_name"]);
	$comp_mob = test_input($_POST["comp_mob"]);
	$comp_type = test_input($_POST["comp_type"]);
	$comp_prod = test_input($_POST["comp_prod"]);
	$city = test_input($_POST["city"]);
	$taluka = test_input($_POST["taluka"]);
	$dist = test_input($_POST["dist"]);
	$pincode = test_input($_POST["pincode"]);
	$address = test_input($_POST["address"]);
	$latitude = test_input($_POST["Latitude"]);
	$longitude = test_input($_POST["Longitude"]);
	$currdate = date('Y-m-d H:i:s a');
	$status=1;
	$strpass=password_hash($pass, PASSWORD_BCRYPT);	 
	$sql = "INSERT INTO buyer (bname, mobile, pass, email,comp_name, comp_mob, comp_type, comp_prod, address, city, taluka, dist, pincode, latitude,longitude,regdate, status)
	VALUES ('$bname', '$mobile', '$strpass', '$email','$comp_name','$comp_mob','$comp_type','$comp_prod','$address', '$city', '$taluka', '$dist','$pincode','$latitude','$longitude', '$currdate', '$status')";
	// use exec() because no results are returned
	if ($conn->query($sql) === TRUE) {	
		$bid = $conn->insert_id;
		$sqlprvedu="INSERT INTO buyer_deposit (bid) VALUES ($bid)";
		$conn->query($sqlprvedu);								
		//code for sms sending
		$message="Welcome ".$bname." Your Account is Successfully created. Your User Name: ".$mobile." and password: ".$pass." Thank You.";
		$mobile_number=$mobile;				  
		$message1= sms_unicode($message);
		sentsms($message1, $mobile_number);	
		$_SESSION['login_user_buyer']=$mobile;
		$_SESSION['login_pass_buyer']=$strpass;					
		$error="User Is Added successfully! Please make payment to participate in Online Auction System!";
		$show="display:show;";
		$alert="alert alert-success";
		$msg='<p>User Is Added successfully! Please make payment to participate in Online Auction System!</p>';
		header("Location:../pay_fees_online.php?error=$error&show=$show&alert=$alert");
	}
	else{
		$msg='<p>Invalid Operation!</p>';
	}
		  return $msg;
}
//*********************************************************************************************************************
function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>