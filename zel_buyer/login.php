<?php 
ob_start(); 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 if(isset($_SESSION['login_user_buyer']))
{
  header("Location:./profile.php");
  exit;
}
else
{
  //header("Location:./login.php");
  //exit;
}

ob_end_flush(); ?> 
<?php
// define variables and set to empty values
	  $error="";
	  $show="display:none;";
	  $alert="alert alert-danger";
	if (isset($_GET['error'])) {
      $error=$_GET['error'];
      $show=$_GET['show'];
      $alert=$_GET['alert'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="author" content="Login Profile">
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

<title>Log In </title>

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
<script language="javascript">
		var x = document.getElementById("demo");
    function display_geolocation_properties(position)
    {
       document.getElementById('demo').innerHTML = "W o r k i n g . . .";
       document.getElementById('Latitude').value = position.coords.latitude;
       document.getElementById('Longitude').value = position.coords.longitude;
    }

    function handle_error(error)
    {
       //document.getElementById('demo').innerHTML = "ERROR: " + error.code;
	    switch(error.code) {
		case error.PERMISSION_DENIED:
		  x.innerHTML = "User denied the request for Geolocation."
		  break;
		case error.POSITION_UNAVAILABLE:
		  x.innerHTML = "Location information is unavailable."
		  break;
		case error.TIMEOUT:
		  x.innerHTML = "The request to get user location timed out."
		  break;
		case error.UNKNOWN_ERROR:
		  x.innerHTML = "An unknown error occurred."
		  break;
	  }
    }

    function retrieve_location()
    {
       if (navigator.geolocation)
       {		   
          document.getElementById('demo').innerHTML = "Starting...";
          navigator.geolocation.getCurrentPosition(display_geolocation_properties, handle_error);
          document.getElementById('demo').innerHTML = "Finished";
       }
       else
       {
          alert("This browser does not support geolocation services.");
       }
    }
  </script>

</head>
<!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 
<body onload="retrieve_location()" id="login">
<?php
include('./includes/header.php');

?>

<script type="text/javascript">
function validate()
{ 
	if(document.form.email.value=="")
	{
	alert('Please Enter the Email (or) Member ID');
	document.form.email.focus();
	return false;
	}
	if(document.form.pass.value=="")
	{
	alert('Please Enter the Password');
	document.form.pass.focus();
	return false;
	}
}
</script>
	    
<section class="full-width-inner" >
<div class="container" >
              <div class="row" >
			   
                  <div class="col-xs-12 col-sm-5">
				  <h2 class="page-title-sub">Members Login</h2>
                      <div class="well">
					  <div class="row">
						<div class="col-md-12">
						  <div align="center"  class="<?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>"><?php echo $error; ?></div>
						  <div id="mes" name="mes"> </div>
						</div> <!-- close col-->
					  </div> <!--close row-->
					 <p class="login-text">Already a Member? Please Login Here</p>
					 <p style="display:none;" id="demo"></p>
             <form id="loginForm" method="POST"  action="./php_action/login.php" novalidate="novalidate" name="form">					  					  
                              <input type="hidden" id="Latitude" name="Latitude">
							  <input type="hidden" id="Longitude" name="Longitude">
							  <div class="form-group">
                                  <label for="username" class="control-label">Mobile No</label>
                                  <input type="number" class="form-control" name="mobile" id="mobile" >
                                  
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="pass" name="pass" >
                              </div>
							  <div class="form-group"style="padding-left:20px;">  
								 <input type="checkbox"  class="checkbox" name="remember" <?php if(isset($_COOKIE["zel_luzel"])) { ?> checked <?php } ?> />  
								 <label for="remember-me">Keep Me Logged In</label>  
								</div>
                              <div class="form-group" align="center">
                              <input type="submit" name="submitlogin" value="Login" class="rose3-btn butt-on" />
                              <!--<input type="submit" name="lsubmit" class="btn btn-block rose3-btn butt-on" />
                              
<a href="login_check1.php?login_face"> <p style="background:url('images/download.png'); border-radius: 4px; padding: 8px; color: white;font-weight: bold; text-align: center; margin-top: 15px; text-decoration:none; cursor: pointer;">
                                              Login in with facebook
                                            </p></a>-->
				</div>
			 <a href="./register.php" class="pull-left need-help">New User Click Here! </a>
			 <a href="forgot_pass.php" class="pull-right need-help">Forgot Password? </a><span class="clearfix"></span>
			 
                          </form>
						  
                      </div>
                  </div>
                  <div class="hidden-xs col-sm-5 col-sm-offset-1">
				  <h2 class="page-title-sub">Register now</h2>
                      <div class="well">
                      <ul class="list-unstyled free-register-login">
                          <li><i class="fa fa-file-text"></i> Create Account</li>
                          <li><i class="fa fa-file-text"></i> Access Account</li>
                          <li><i class="fa fa-file-text"></i> Edit Profile</li>
                          <li><i class="fa fa-phone"></i> View Profile</li>
                          <li><i class="fa fa-bell"></i> Update Photo</li>
                          <li><i class="fa fa-comments"></i> Print Profile</li>
                          <li><i class="fa fa-lock"></i> Close Account</li>
                      </ul>
                      <p class="clearfix"><a href="register.php" class="btn  btn-block pink3-btn  butt-on">Register now!</a></p>
					  </div>
                  </div>
              </div>
         
	
	</div>
	<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
   

    $('#loginForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    }
                    
                }
            }
            
        }
    });
});
</script>
</section>

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
