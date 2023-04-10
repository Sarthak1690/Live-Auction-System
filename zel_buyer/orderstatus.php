<?php
$now=date('Y-m-d');
include('./php_action/lock.php');
$error="";
$show="display:none;";
$alert="";
$order_status="";
$order_message="";
if (isset($_GET['error'])) {
  $error=$_GET['error'];
  $show=$_GET['show'];
  $alert=$_GET['alert'];
  $order_status=$_GET['order_status'];
}
if($order_status==="Success"){
	$imgpath="./images/success.png";
	$order_message="Thank You !<a>".$login_session."</a> Your Order Is Completed Successfully!";
	unset($_SESSION['pid']);
}
else{
	$imgpath="./images/fail.png";
	$order_message="Sorry !<a>".$login_session."</a> Your Payment Is Failed or not Processed! <a href='./profile.php'><u>Try Again!</u></a>";
}
?>

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

<title>Order Status</title>
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
        <h2 class="page-title remove-top-padding">Order Status</h2>
        <div class="row">
         <?php
			include('./includes/sidebar.php');
			?>
           <div class="col-sm-8 col-md-9 col-lg-9">
            <div class="panel panel-info light-pink">
              <div class="panel-heading">
                <h3 class="panel-title">Order Status</h3>
              </div>
              <div class="panel-body">
				<div class="alert row <?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>">
								<div class="col-md-4">
									<img src="<?php echo $imgpath; ?>"> 
								</div>
								<div class="col-md-8">
									<h4><?php echo $order_message; ?></h4>
									<p><?php echo $error; ?></p>
									<p class="text-right wow bounceIn" data-wow-delay="0.4s">
						<a href="./pay_fees_online.php" class="btn btn-skin btn-lg">Continue <i class="fa fa-angle-right"></i></a>
						</p>
								</div>
							</div>
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
