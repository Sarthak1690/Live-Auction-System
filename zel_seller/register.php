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
<title>User Registration </title>
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
  function register121(){
		document.getElementById('regsec').style.display='show';	  
        document.getElementById('conditions').style.display='none';
       
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
  <script type="text/javascript">
		function validation(){			
			var user = document.getElementById('sname').value;
			var pass = document.getElementById('pass').value;
			var confirmpass = document.getElementById('cpass').value;
			var mobileNumber = document.getElementById('mobile').value;
			var emails = document.getElementById('email').value;
			var img=document.forms['register']['userfile'];
			var valid_Ext=["jpeg","jpg","png","JPEG","JPG","PNG"];		
			if(user == ""){
				document.getElementById('username').innerHTML =" ** Please fill the username field";
				return false;
			}
			if((user.length <= 2) || (user.length > 40)) {
				document.getElementById('username').innerHTML =" ** Username lenght must be between 2 and 40";
				return false;	
			}
			if(!isNaN(user)){
				document.getElementById('username').innerHTML =" ** only characters are allowed";
				return false;
			}			
			if(mobileNumber == ""){
				document.getElementById('mobileno').innerHTML =" ** Please fill the mobile NUmber field";
				return false;
			}
			if(isNaN(mobileNumber)){
				document.getElementById('mobileno').innerHTML =" ** user must write digits only not characters";
				return false;
			}
			if(mobileNumber.length!=10){
				document.getElementById('mobileno').innerHTML =" ** Mobile Number must be 10 digits only";
				return false;
			}
			if(pass == ""){
				document.getElementById('passwords').innerHTML =" ** Please fill the password field";
				return false;
			}
			if((pass.length <= 5) || (pass.length > 20)) {
				document.getElementById('passwords').innerHTML =" ** Passwords lenght must be between  5 and 20";
				return false;	
			}
			if(pass!=confirmpass){
				document.getElementById('confrmpass').innerHTML =" ** Password does not match the confirm password";
				return false;
			}
			if(confirmpass == ""){
				document.getElementById('confrmpass').innerHTML =" ** Please fill the confirmpassword field";
				return false;
			}
			if(emails == ""){
				document.getElementById('emailids').innerHTML =" ** Please fill the email idx` field";
				return false;
			}
			if(emails.indexOf('@') <= 0 ){
				document.getElementById('emailids').innerHTML =" ** @ Invalid Position";
				return false;
			}
			if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
				document.getElementById('emailids').innerHTML =" ** . Invalid Position";
				return false;
			}
			if(img.value!=''){
				var img_ext=img.value.substring(img.value.lastIndexOf('.')+1);
				var result=valid_Ext.includes(img_ext);
				if(result==false){
					document.getElementById('doc').innerHTML =" ** Selected File is not image";
					return false;
				}
				else{
					if(parseFloat(img.files[0].size/(1024*1024)) >= 3){
						document.getElementById('doc').innerHTML ="File Size must be smaller than 3 MB. Current file size: "+ parseFloat(img.files[0].size/(1024*1024));
						return false;
					}	
				}				
			}
			else{
				document.getElementById('doc').innerHTML =" ** No Image Selected!";
				return false
			}
			return true;
		}
	</script>
</head>
<!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 
<body onload="retrieve_location()">
<?php
include('./includes/header.php');
?>

<section id="conditions" class="full-width-inner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="page-title">New Registration</h2>
                     <div class="col-xs-12 col-md-12" style="margin-top: 5px;">
				<div class="panel panel-info">
				
					<div class="panel-heading">
				<h2 class="panel-title"> नियम व अटी : </h2>
					<table class="table" border="1">
						<tr>
							<td class="odd">1.</td>
							<td class="even">संस्था बाजारभाव पाहून लिलावासाठी बेस रेट ठरवेल.</td>
						</tr>
						<tr>
							<td class="odd">2.</td>
							<td class="even">शेतकऱ्याला लिलावात भाग घेण्यासाठी अनामत म्हणून ५००० रु ऑनलाईन  जमा करावे लागतील. लिलावानंतर सदर रकमेतून १००० रु. रेजिस्ट्रेशन फी वगळता इतर रक्कम परत केली जाईल. </td>
						</tr>
						<tr>
							<td class="odd">3.</td>
							<td class="even">ज्या साईझच्या मालाची माहिती लिलावासाठी दिली आहे त्याच साईझचा माल शेतकऱ्याने हार्वेस्टिंग करून पॅक करून द्यावयाचा आहे. चुकीचा माळ पॅक करून दिल्यास त्या प्रमाणात वाजवट  केली जाईल.</td>
						</tr>
						<tr>
							<td class="odd">4.</td>
							<td class="even">व्यापाऱ्याने निवडलेल्या पॅकिंग प्रमाणे शेतकऱ्याने माल पॅक  करून व्यापाऱ्याची गाडी भरून द्यावयाची आहे. पॅकिंगला येणाऱ्या खर्चा प्रमाणे संस्थेने जे आदर्श पॅकिंग खर्च ठरवले आहेत त्याप्रमाणे शेतकऱ्याला पॅकिंग खर्च दिला जाईल. </td>
						</tr>
						<tr>
							<td class="odd">5.</td>
							<td class="even">मालाची गाडी भरून दिल्यानंतर ५ दिवसांमध्ये शेतकऱ्याला संस्थेकडून मालाच्या संख्येनुसार सर्व्हिसचार्ज वगळता संपूर्ण देयक अदा केले जाईल. </td>
						</tr>
						<tr>
							<td class="odd">6.</td>
							<td class="even">जर व्यापाऱ्याने लिलाव घेऊनही माळ घेतला नाही तर शेतकऱ्याला नुकसान भरपाई म्हणून ४००० रु. इतकी रक्कम अदा केली जाईल. तसेच जर शेतकऱ्याने लिलाव रद्द केला तर शेतकऱ्याची अनामत रक्कम म्हणून जमा असलेली रक्कम संस्था व्यापाऱ्याला अदा करेल. </td>
						</tr>
						<tr>
							<td class="odd">7.</td>
							<td class="even">व्यवहाराला मुदत दोन दिवसाची राहील. </td>
						</tr>							
					</table>	
					<p class="clearfix"><a Onclick="register121()" class="btn  btn-block pink3-btn  butt-on">वरील नियम व अटी मला मान्य आहेत. </a></p>					
				</div>
				</div>
				</div>

</div>
    </div>
  </div>
</section>

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
        <h2 class="page-title remove-top-padding">Seller Registration</h2>
        <div class="row">
          <div class="col-lg-8 well">
		  <p style="display:none;" id="demo"></p>
            <form enctype="multipart/form-data" action="./php_action/user_registration.php" onsubmit="return validation()" name="register" id="register" method="post">
			<input type="hidden" id="Latitude" name="Latitude">
			<input type="hidden" id="Longitude" name="Longitude">
              <div class="row">
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label"  >Full Name<span class="red">*</span></label>
                    <input type="text" id="sname" class="form-control" name="sname" required>
					<span id="username" class="text-danger font-weight-bold"> </span>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label"  >Mobile Number<span class="red" >*</span></label>
                    <input type="text" id="mobile" class="form-control" name="mobile" required>
					<span id="mobileno" class="text-danger font-weight-bold"> </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label"  >Password<span class="red">*</span></label>
                    <input type="password" name="pass" id="pass"  class="form-control" required>
					<span id="passwords" class="text-danger font-weight-bold"> </span>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label" >Confirm Password<span class="red">*</span></label>
                    <input type="password" id="cpass" name="cpass" class="form-control" required>
					<span id="confrmpass" class="text-danger font-weight-bold"> </span>
                  </div>
                </div>
              </div>
			   <div class="row">
                <div class="col-sm-6 col-md-6">                
                  <div class="form-group">
				  <label class="control-label" >City<span class="red">*</span></label>
                   <input type="text" class="form-control" name="city" id="city" required/>
				</div>
				</div>
				<div class="col-sm-6 col-md-6">                
                  <div class="form-group">
				  <label class="control-label" >Taluka<span class="red">*</span></label>
                   <input type="text" class="form-control" name="taluka" id="taluka" required/>
				</div>
				</div>                	
			 </div>
			 <div class="row">
                <div class="col-sm-6 col-md-3">                
                  <div class="form-group">
				  <label class="control-label" >District<span class="red">*</span></label>
                   <input type="text" class="form-control" name="dist" id="dist" required/>
				</div>
				</div>
				<div class="col-sm-6 col-md-3">                
                  <div class="form-group">
				  <label class="control-label" >Pin Code<span class="red">*</span></label>
                   <input type="number" class="form-control" name="pincode" id="pincode" required/>
				</div>
				</div>
				<div class="col-sm-6 col-md-6">                
                  <div class="form-group">
				  <label class="control-label" >Email<span class="red">*</span></label>
                   <input type="email" class="form-control" name="email" id="email" required/>
				   <span id="emailids" class="text-danger font-weight-bold"> </span>
				</div>
				</div>                	
			 </div>		

			 
			  <div class="row">
                 <div class="col-sm-6 col-md-6">
					<div class="form-group">
					 <label>Address<span class="red">*</span></label>
					   <textarea type="text" rows="3" name="address" class="form-control" required></textarea>
					</div>  
                </div>
                 <div class="col-sm-6 col-md-6">
					<div class="form-group">
						<label>Upload Aadhar Card Photo<span class="red">*</span></label>
						<input class="form-control" name="userfile" id="userfile" type="file" />
						<span id="doc" class="text-danger font-weight-bold"> </span>
					</div>
                </div>
              </div>
			  <div class="row">
              </div>
               <input class="btn btn-default pink2-btn  butt-on btn-block" type="submit" name="rsubmit" value="Proceed" />
            </form>
          </div>
		  
		                    <div class="hidden-xs col-lg-4">
							 <p class="login-text">Already a Member? Please <a href="./login.php"> Login Here </a></p>
				  <h2 class="page-title-sub well">Register now</h2>
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
