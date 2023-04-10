<?php ob_start(); ?>
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
<?php ob_end_flush(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="author" content="Online Auction System">
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

<title>Add New User </title>

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
<body id="changepass">
<?php
include('./includes/user_header.php');
?>
<!-- Inner Page Full Width -->

<section class="full-width-inner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="page-title remove-top-padding">Add New User</h2>
        <div class="row">
         <?php
		include('./includes/sidebar.php');
		?>
     <div class="col-sm-8 col-md-9 col-lg-9">        
		  <div align="center"  class="<?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>"><?php echo $error; ?></div>
		  <p style="display:none;" id="demo"></p>
		  <div class="panel panel-info light-pink">
              <div class="panel-heading">
                <h3 class="panel-title">Register New Admin</h3>
              </div>
              <div class="panel-body">
            <form action="./php_action/user_registration.php" name="register" id="register" method="post"  >
			<input type="hidden" id="Latitude" name="Latitude">
			<input type="hidden" id="Longitude" name="Longitude">
              <div class="row">
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label"  >Full Name<span class="red">*</span></label>
                    <input type="text" id="bname" class="form-control" name="bname" required>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label"  >Mobile Number<span class="red" >*</span></label>
                    <input type="text" id="mobile" class="form-control" name="mobile" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label"  >Password<span class="red">*</span></label>
                    <input type="password" name="pass" id="pass"  class="form-control" required>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label" >Confirm Password<span class="red">*</span></label>
                    <input type="password" id="cpass" name="cpass" class="form-control" required>
                  </div>
                </div>
              </div>			   	 
			  <div class="row">
              </div>
               <input class="btn btn-default pink2-btn  butt-on btn-block" type="submit" name="rsubmit" value="Proceed" />
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
