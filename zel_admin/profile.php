<?php
//include('./php_action/conn.php');
//include('./php_action/lock.php');
include('./php_action/getprofile.php');
	/*$fname = "";
	$lname = "";
	$email = "";
	$pass = "";
	$bdate = "";
	$gender = "";
	$landline = "";
	$mobile = "";
	$mstatus = "";
	$child = "";
	$live_child = "";
	$mothertongue = "";
	$religion = "";
	$caste = "";
	$creater = "";
	$height = "";*/
	
$error="";
$show="display:none;";
$alert="alert alert-success";

if (isset($_GET['error'])) {	
	$error=$_GET['error'];
	$show="display:show;";
	$alert="alert alert-danger";
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

<title>Profile View </title>
<!--<link rel="shortcut icon" href="images/favicon.png" />

--><noscript>

<meta http-equiv=\"refresh\" content=\"0;url=index.php\">

</noscript>
    <link rel="stylesheet" href="dist/css/formValidation.css"/>

    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/formValidation.js"></script>
    <script type="text/javascript" src="dist/js/framework/bootstrap.js"></script>

	<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA98Q7bgqRSax-gSZJW9eBG9OUJmPomZIw&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
<script type="text/javascript">
  function printbill(){
    //alert("hiiiiiiiiiiii");
    var prtContent = document.getElementById("invoice");
    var WinPrint = window.open('Todays Cases', 'Todays Cases', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
   }
</script>
<script type="text/javascript">
  function printreceipt(){
    //alert("hiiiiiiiiiiii");
    var prtContent = document.getElementById("receipt");
    var WinPrint = window.open('receipt', 'Receipt', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
   }
</script>
<style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
      }
    </style>
	 <script>
      // In this example, we center the map, and add a marker, using a LatLng object
      // literal instead of a google.maps.LatLng object. LatLng object literals are
      // a convenient way to add a LatLng coordinate and, in most cases, can be used
      // in place of a google.maps.LatLng object.
      let map;

      function initMap() {
        const mapOptions = {
          zoom: 14,
          center: { lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?> },
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        const marker = new google.maps.Marker({
          // The below line is equivalent to writing:
          // position: new google.maps.LatLng(-34.397, 150.644)
          position: { lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?> },
          map: map,
        });
        // You can use a LatLng literal in place of a google.maps.LatLng object when
        // creating the Marker object. Once the Marker object is instantiated, its
        // position will be available as a google.maps.LatLng object. In this case,
        // we retrieve the marker's position using the
        // google.maps.LatLng.getPosition() method.
        const infowindow = new google.maps.InfoWindow({
          content: "<p>Marker Location:" + marker.getPosition() + "</p>",
        });
        google.maps.event.addListener(marker, "click", () => {
          infowindow.open(map, marker);
        });
      }
    </script>
</head>
<!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 
<body id="profile">

<?php
include('./includes/user_header.php');
?>
<style>
.form-control-feedback {
    position: absolute;
    top: 20px !important;
    right: 13px !important;
    z-index: 2;
    display: block;
    width: 34px;
    height: 34px;
    line-height: 34px;
    text-align: center;
    pointer-events: none;
}
</style>
<section class="full-width-inner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="page-title remove-top-padding">Profile</h2>
		<div align="center"  class="<?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>"><?php echo $error; ?></div>
         <div class="row">
           <?php
			include('./includes/sidebar.php');
		   ?>          
 
		<div class="col-sm-8 col-md-9 col-lg-9">
            <div class="panel panel-info light-pink">
              <div class="panel-heading action-box">
                <div class="panel-caption">
                  <h3 class="panel-title">Admin Profile </h3>
                </div>                
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-4 col-lg-3"> 						  
                          
						  <a href="#"><img src="./uploads/profile_photo/avatar_male.png" width="157" height="207" class="thumbnail" /></a>
                          </div>
                  <div class="col-md-8 col-lg-9">
                  <div class="profile-sumup">
                    <p class="profile-user-name"><a href="#"><?php echo $uname; ?></a> <span class="profile-user-id"><?php echo $uid; ?></span></p>
                    <div class="row">
                      <div class="col-lg-6">
                        <table class="table table-condensed table-user-information">
                          <tbody>
                            <tr>
                              <td class="col-xs-4 col-sm-4">Full Name</td>
                              <td><span>:</span> <?php echo $uname;?></td>
                            </tr>
							<tr>
                              <td class="col-xs-4 col-sm-4">Mobile </td>
                              <td><span>:</span> <?php echo $mobile; ?></td>
                            </tr>																				
                          </tbody>
                        </table>
                      </div>
                      <div class="col-lg-6">
                        <table class="table table-condensed table-user-information">
                          <tbody>						   
							<tr>
                              <td class="col-xs-4 col-sm-4">Latitude</td>
                              <td><span>:</span> <?php echo $latitude; ?>  </td>
                            </tr>
							<tr>
                              <td class="col-xs-4 col-sm-4">Longitude</td>
                              <td><span>:</span> <?php echo $longitude; ?>  </td>
                            </tr>                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>

            
			 </div>
            </div><h4> Last Login Location </h4>
	  <div id="map"></div>
            
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
