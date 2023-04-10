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
<title>Contact | Help </title>
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
<body id="contact">
<?php
include('./includes/header.php');
?>
<section class="full-width-inner">
  <div class="container">
    <div class="row" style="margin-top:30px;">
      <div class="col-lg-12 col-md-12">
        <h2 class="page-title remove-top-padding">Contact Us</h2>
        <div class="row">
         <div class="col-sm-4 col-md-3 col-lg-3 ">
            <div class="list-group">
			<h4>Adminission Department </h4>
			<div class="list-group-item">
			   <ul class="unstyled address">
			   <li>
				<b>Mahatma Phule Mahavidyalaya, Pimpri </b><br> 
				Pimpri, Pune 
				Maharashtra,<br/>
				India-
				411017, 
				India.</li>
				<li><b>Mechkar Sir </b> </li>
				<li><i  class=" fa fa-phone "></i> 020-27410334</li>
				<li><i  class="fa fa-envelope "></i> <a href="mailto:admin@mpcollegepimpri.com">admin@mpcollegepimpri.com</a></li>
				</ul>
			</div>
		  </div>
		<div class="list-group">
			<h4>Exam Deaprtment </h4>
			<div class="list-group-item">
			   <ul class="unstyled address">
				<li>
				<b>Mahatma Phule Mahavidyalaya, Pimpri </b><br> 
				Pimpri, Pune 
				Maharashtra,<br/>
				India-
				411017, 
				India.</li>
				<li><b>Mechkar Sir </b></li> 
				<li><i  class=" fa fa-phone "></i> 020-27410334</li>
				<li><i  class="fa fa-envelope "></i> <a href="mailto:exam@exam@mpcollegepimpri.com">exam@mpcollegepimpri.com</a></li>
				</ul>
			</div>
		  </div>
          </div>
           <div class="col-sm-8 col-md-9 col-lg-9">
		      <div class="row">
				<div class="col-md-12">
				  <div align="center"  class="<?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>"><?php echo $error; ?></div>
				  <div id="mes" name="mes"> </div>
				</div> <!-- close col-->
			  </div> <!--close row-->
            <div class="panel panel-info light-pink">
              <div class="panel-heading">
                <h3 class="panel-title">Contact Form</h3>
              </div>
              <div class="panel-body">
                  <form id="contact" method="POST" action="./php_action/contact.php">
				   <div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			  </div>
			  <div class="form-group">
				<label for="InputEmail1">Mobile Number</label>
				<input type="number" name="mob" class="form-control" id="mob" >
			  </div>
			  <div class="form-group">
				<label for="InputEmail1">Email</label>
				<input type="email" name="email" class="form-control" id="InputEmail1" >
			  </div>
			  <div class="form-group">
				<label>Subject</label>
				<input type="text" name="sub" class="form-control">
			  </div>
			  <div class="form-group">
				<label>Message</label>
				  <textarea name="msg" class="form-control" ></textarea>
			  </div>
			<div class="row">
              <div class="col-md-6">
				<div class="form-group">
					<div class="col-md-4">
						<label >Captcha</label>
						<img src="./php_action/CaptchaSecurityImages.php"/>
					</div>
				</div>
			  </div>
			  <div class="col-md-6">
				<div class="form-group">
					<label>Type the text from Captcha</label>
					<input class="form-control" type="text" name="capt" />
				  </div>
			  </div>
			  </div>
			  <input type="submit" name="csubmit" class="btn btn-block rose3-btn butt-on" value="Send" />
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
  <script type="text/javascript">
$(document).ready(function() {
    $('#contact').formValidation({
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    },
					regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'The name can only consist of alphabetical'
                    }
                }
            },
             email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            sub: {
                validators: {
                    notEmpty: {
                        message: 'The Subject should not be empty'
                    }
                }
            },
			msg: {
                validators: {
                    notEmpty: {
                        message: 'The comments should not be empty'
                    },
					stringLength: {
                        min: 10,
                        max: 500,
                        message: 'The comments must be min 10 and max 500 characters long'
                    }
                }
            },
			capt: {
                validators: {
                    notEmpty: {
                        message: 'The Captcha is required'
                    },
					stringLength: {
                        min: 7,
                        max: 7,
                        message: 'The Capcha must be 7 characters long'
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