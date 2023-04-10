<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="author" content="Annasaheb Awate Collge | User Profile">
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

<title>Close Account</title>

<meta name="Description" content="Matrimony site for Responsive
Responsive Matrimonial">
<meta name="keywords" content="Responsive Matrimonial">

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
<body id="closeac">
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
            <div class="panel panel-info light-pink">
              <div class="panel-heading">
                <h3 class="panel-title">Close Account</h3>
              </div>
              <div class="panel-body">
                
               <form method="post" name="changepass" id="changepass">
			  <div class="form-group">
				<label for="InputPassword2">Enter Your Password</label>
				<input type="password" name="matses_pass" class="form-control" id="InputPassword3" >
			  </div>
			
			
			  <input type="submit" name="close_ac"  class="btn btn-default pink2-btn  butt-on" value="Continue to Close"/>
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
$(document).ready(function() {
    // Generate a simple captcha
   

    $('#changepass').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
            currpassword: {
                validators: {
                    notEmpty: {
                        message: 'The Current password is required'
                    }
                }
            },
			password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
					stringLength: {
                        min: 8,
                        message: 'The Password must be 8 characters long'
                    },
					identical: {
						field: 'cpassword',
						message: 'The New password and its confirm are not the same'
					}
                }
            },
            cpassword: {
                validators: {
                    notEmpty: {
                        message: 'The New password Confirmation is required'
                    },
				identical: {
                    field: 'password',
                    message: 'The New password and its confirm are not the same'
                }
                    
                }
            }
            
        }
    });
});
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
