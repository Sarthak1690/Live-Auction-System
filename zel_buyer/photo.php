<?php
include('./php_action/getprofile.php');

// define variables and set to empty values
	  $error="";
	  $show="display:none;";
	  $alert="";
	if (isset($_GET['error'])) {
      $error=$_GET['error'];
      $show=$_GET['show'];
      $alert=$_GET['alert'];
    }
	
	  // // coding for fetching user name
     $sql1="SELECT appstatus  FROM end_user WHERE euser_id='$user_id'";
     $result = $conn->query($sql1);
      if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
			$aprovestatus=$row["appstatus"];
			}
	  }
       if($aprovestatus==1){
				$error='Your <b>User Id: '.$user_id.'</b>'." "."Is Approved By College! You Cannot Change Photo!  Please visit college office for any changes in your profile !";
				$show="display:show;";
				$alert="alert alert-success";
				header("Location:./profile.php?error=$error");
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="author" content="Annasaheb Awate Collge">
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

<title>Photo Upload</title>
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
<script type="text/javascript" src="assets/js/activemenu.js"></script>

</head>
<!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 
<body id="photo">

<?php
include('./includes/user_header.php');
?>

<!-- Inner Page Full Width -->
<script type="text/javascript">
function validate()
{
	if((!document.getElementById('private').checked) && (!document.getElementById('public').checked))
	{
		alert("Please select Your photo view status"); 
		return false;
	}
	if(document.getElementById('totalimg').value==3)
	{
		alert("Only 3 Photo Album Images Allowed"); 
		return false;
	}
}


</script>
<section class="full-width-inner">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <h2 class="page-title remove-top-padding">Upload photo</h2>
        <div class="row">
<?php
include('./includes/sidebar.php');
?>        

 <div class="col-sm-8 col-md-9 col-lg-9">
            <div class="panel panel-info light-pink">
              <div class="panel-heading">
                <h3 class="panel-title">My Photos</h3>
              </div>
              <div class="panel-body">
			  				 
				
				
				                <div class="row" id="profile-picture-upload">
								<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
				
				    <div class="profile-img-gallery"> <img src="<?php echo $imgpath; ?>" class="img-thumbnail img-responsive">
                      <form action="./php_action/photo.php" method="post" name="del_photo" id="del_photo"><button type="submit" class="btn  btn-xsmall btn-pink-outline" name="del_photo" id="del_photo">Delete Profile Image <i class="fa fa-times"></i></button></form>
					  						<div style="color:#669933;">Waiting for Approval</div>
						
						
                    </div>
                  </div>
				  				 
                </div>
				<form action="./php_action/photo.php" method="post" name="photo_form" id="photo_form" enctype="multipart/form-data" >
                
                <div class="row">
				<div class="col-md-6">
					
					<div class="form-group">
					 <label class="control-label">Photo Size Limit Max 300 kb (widht=160 Px & Height=210 px)</label>
					  <input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="10000000" />
					  </div>
					  <div class="form-group">
					  <input class="form-control" name="userfile" type="file" />
					 </div>
                </div>
				<div class="col-md-6">
					<div class="form-group">
					  <label>Privacy</label>
					  </div>
					<div class="form-group">
					  <div class="form-control">
					  <label class="radio-inline" for="view_status">
					 <input type="radio" name="view_status" id="private" value="private"  />
					 Private
					 </label>
					<label class="radio-inline" for="view_status">
					<input type="radio" name="view_status" id=	"public" value="public"  checked="checked"   />
					Public
					</label>
					</div>
					</div>
                </div>
				</div>
				<div class="row">
				<div class="col-md-12">
				  <div align="center"  class="<?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>"><?php echo $error; ?></div>
				  <div id="mes" name="mes"> </div>
				</div> <!-- close col-->
				</div> <!--close row-->
			
				<input type="hidden" name="totalimg" id="totalimg" value="0" />
				<input type="submit" class="btn btn-default pink2-btn  butt-on btn-block" name="submitphoto" value="Update Profile Photo" onclick="return validate();" />
				</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
