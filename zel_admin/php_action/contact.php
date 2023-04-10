<?php
ob_start();
session_start();
$code=$_SESSION['cap_code'];
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$user_code = test_input($_POST["capt"]);
	if($code===$user_code){
    $name = test_input($_POST["name"]);
    $mob = test_input($_POST["mob"]);
    $cmail = test_input($_POST["email"]);
    $sub = test_input($_POST["sub"]);
    $msg = test_input($_POST["msg"]);
    $adminemail="zelosinfotech@gmail.com";  
	 // sms sending code
	  $username="zelosit";
	  $message="You hanve new inquiry from aacmanchar.com PLease Check The email. Tnak You!";
	  //$password="8888789402";
	  $sender="AJVIVH"; //ex:INVITE
	  $mobile_number="8888789402";
	  //$url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($mobile_number)."&message=".urlencode($message)."&sender=".urlencode($sender)."&type=".urlencode('3');
	  $url="http://sms.hspsms.com/sendSMS?username=".urlencode($username)."&message=".urlencode($message)."&sendername=".urlencode($sender)."&smstype=TRANS&numbers=".urlencode($mobile_number)."&apikey=66e0f95f-4335-48ff-bfd8-0f994027e092";
	  $ch = curl_init($url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  $curl_scraped_page = curl_exec($ch);
	  curl_close($ch);
	  
	$error="We have sent your inquiry to our team please keep visting us Thank You";
    $show="display:show;";
    $alert="alert alert-success";
	header("Location:../contact.php?error=$error&show=$show&alert=$alert");
}
else{
	$error="So Sorry Please Enter Captcha Code Carefully! Try Again!";
    $show="display:show;";
    $alert="alert alert-danger";
	header("Location:../contact.php?error=$error&show=$show&alert=$alert");
}
}
ob_end_flush();
   function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
