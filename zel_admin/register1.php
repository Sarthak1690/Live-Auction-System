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
<meta name="author" content="Collge Admission System ">
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

<title>Admin Registration </title>

<meta name="Description" content="Online Auction System">
<meta name="keywords" content="Online Auction System">

<!--<link rel="shortcut icon" href="images/favicon.png" />

--><noscript>

<meta http-equiv=\"refresh\" content=\"0;url=index.php\">
</noscript>

    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="dist/js/framework/bootstrap.js"></script>

	
	<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>

<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>

<script type="text/javascript">
 function chil()
	{
	  
	  document.getElementById('child').style.display='block';
	  
	}
  function hidechil()
  {
	  if(document.getElementById('marital_status').value !="Unmarried"){
	  document.getElementById('child').style.display='block';
	  }
	  else{
	  document.getElementById('child').style.display='none';
	  }
	  
  }	
  
  function Child()
  {
  	if((document.getElementById('children').value !="No") && (document.getElementById('children').value !="")){
	  document.getElementById('living').style.display='block';
	  document.getElementById('childid').style.display='block';
	  }
	  else{
	  document.getElementById('living').style.display='none';
	  document.getElementById('childid').style.display='none';
	  }
  }
  </script>
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
<body onload="retrieve_location()" id="register">
<?php
include('./includes/header.php');
?>
<section id="regsec" style="display:show;" class="full-width-inner">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
      <div align="center"  class="<?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>"><?php echo $error; ?></div>
	  <div id="mes" name="mes"> </div>
    </div> <!-- close col-->
  </div> <!--close row-->
    <div class="row">
      <div class="col-lg-12 col-md-12" style="margin-top:10px;">
        <h2 class="page-title remove-top-padding">Admin Registration</h2>
        <div class="row">
          <div class="col-lg-8 well">
		  <p style="display:none;" id="demo"></p>
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
                 <div class="col-sm-6 col-md-12">
                 <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label>Captcha</label>
                    <div class="form-group" id="captcha">
						<img src="./php_action/CaptchaSecurityImages.php"  />
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6" >
                  <div class="form-group">
                    <label>Type the Text from Captcha<span class="red">*</span></label>
                    <div class="form-group">
                      <input id="security_code" name="security_code" type="text" class="form-control" autocomplete="off" required/>  
					  <span id="capterr"></span>
                    </div>
                  </div>
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
    </div>
  </div>
</section>


<!--Footer-->
<?php
include('./includes/footer.php');
?>
<div id="back-top" style="display:none;"> <a href="#" class="scroll" data-scroll>
  <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-up"></i></button>
  </a> </div>

</body>
</html>
