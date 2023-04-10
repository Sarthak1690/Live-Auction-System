<?php ob_start(); ?>
<?php
$login_session="" ;
 $url="";
 $status="";
 include('./php_action/lock.php');
?>
<?php
include ("./php_action/conn.php");
$error="";
$show="display:none;";
$alert="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from form 
$currpass=test_input($_POST['currpass']);
$newpass=test_input($_POST['inputPassword']); 
$confpass=test_input($_POST['inputPasswordConfirm']); 
if($newpass===$confpass)
{
	$sql="SELECT pass FROM buyer WHERE bid='$bid' and status=1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$pass=$row['pass'];
		}
	}
	if(password_verify($currpass, $pass)){
		$strpass=password_hash($newpass, PASSWORD_BCRYPT);
		$sqlupdate = "UPDATE buyer SET pass='$strpass' WHERE bid='$bid' AND status=1";
		if ($conn->query($sqlupdate) === TRUE) {
			header("Location:./php_action/logout.php");
			die();
			$error="Your New Password is Change Successfully!";
			$show="display:show;";
			$alert="alert alert-success";
		}
	}
  else
  {
    $error="Your Current Password is Worng!";
    $show="display:show;";
    $alert="alert alert-danger";
  }
}
else
{
  $error="Your New Password and Confirm Password is Not Match!";
  $show="display:show;";
  $alert="alert alert-danger";
}
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
<?php ob_end_flush(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="author" content="Responsive Matrimonial">
<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<link rel="stylesheet" href="assets/css/custom.css">
<link type="text/css" rel="stylesheet" media="all" href="assets/css/chat.css" />
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
<script type="text/javascript" src="assets/js/ajaxfunction.js"></script>

<title>Change Password </title>

<meta name="Description" content="Online Auction System">
<meta name="keywords" content="Online Auction System">

<!--<link rel="shortcut icon" href="images/favicon.png" />

--><noscript>

<meta http-equiv=\"refresh\" content=\"0;url=index.php\">

</noscript>
    <link rel="stylesheet" href="dist/css/formValidation.css"/>

    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/formValidation.js"></script>
    <script type="text/javascript" src="dist/js/framework/bootstrap.js"></script>


</head>
<!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 
<body id="changepass">
<?php
include('./includes/user_header.php');
?>
<!-- Inner Page Full Width -->

<section class="full-width-inner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="page-title remove-top-padding">Change Password</h2>
        <div class="row">
         <?php
include('./includes/sidebar.php');
?>
           <div class="col-sm-8 col-md-9 col-lg-9">
		   <div class="<?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>"><?php echo $error; ?></div>
            <div class="panel panel-info light-pink">
              <div class="panel-heading">
                <h3 class="panel-title">Change Password</h3>
              </div>
              <div class="panel-body">
                					 					
               <form method="post" name="myforms" onsubmit="return ValidatePass()" action="">
			  <div class="form-group">
				<label for="InputPassword1">Current Password</label>
				<input type="password" name="currpass" class="form-control" value="" >
			  </div>
			  <div class="form-group">
				<label for="InputPassword1">New Password</label>
				<input type="password" name="inputPassword" class="form-control" >
			  </div>
			  <div class="form-group">
				<label for="InputPassword2">New  Password Confirm</label>
				<input type="password" name="inputPasswordConfirm" class="form-control"  >
			  </div>
			  <input type="submit" name="submitpass"  class="btn btn-default pink2-btn  butt-on" value="Change Password"/>
			</form>
                </div>
              </div>
            </div>
            <!---list-group---> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
	<script type="text/javascript">
 	
	function ValidatePass() {
		//fname validation
		var a = document.myforms.currpassword.value;
    if (a == "") {
        alert("Current password must be filled out");
        return false;
    }
	//lname validation
		var b = document.myforms.password.value;
    if (b == "") {
        alert("New password must be filled out");
        return false;
    }
	var c = document.myforms.cpassword.value;
    if (c == "") {
        alert("Confirm password must be filled out");
        return false;
    }
}
</script>	
		

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/chat.js"></script>
 <script>
    $('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});
    </script>

<!--Footer-->
<?php
include('./includes/footer.php');
?>
<div id="back-top" style="display:none;"> <a href="#" class="scroll" data-scroll>
  <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-up"></i></button>
  </a> </div>

</body>
</html>
