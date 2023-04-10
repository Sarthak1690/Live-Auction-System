<?php
include('./php_action/conn.php');
include('./php_action/lock.php');
include('./php_action/getprofile.php');
$error="";
$show="display:none;";
$alert="alert alert-success";
if (isset($_POST['persdtlsub'])){
   	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$bname = test_input($_POST["bname"]);
		$email = test_input($_POST["email"]);
		$comp_name = test_input($_POST["comp_name"]);
		$comp_mob = test_input($_POST["comp_mob"]);
		$comp_type = test_input($_POST["comp_type"]);
		$comp_prod = test_input($_POST["comp_prod"]);
		$city = test_input($_POST["city"]);
		$taluka = test_input($_POST["taluka"]);
		$dist = test_input($_POST["dist"]);
		$pincode = test_input($_POST["pincode"]);
		$address = test_input($_POST["address"]);
          $sql = "UPDATE buyer SET bname='$bname', email='$email',comp_name='$comp_name',comp_mob='$comp_mob',comp_type='$comp_type',comp_prod='$comp_prod',city='$city', taluka='$taluka', dist='$dist', pincode='$pincode', address='$address' WHERE bid=$bid";
          if ($conn->query($sql) === TRUE) {
			  $error="Details Are Updated Successfully!";
			  $show="display:show;";
			  $alert="alert alert-success";
          }
          else{
			  $error="Your Operation is invalid Somthing Wrong!";
			  $show="display:show;";
			  $alert="alert alert-danger";
          }
		  header( "Refresh:3; url=./edit-profile.php?alert=$alert&show=$show&error=$error", true, 303);
	}
}
if (isset($_POST['submitphoto'])){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(!isset($_FILES['otherfile']))
		{
			$error="Please Select File To Upload!";
			$show="display:show;";
			$alert="alert alert-danger";
		}	 
		else
		{
			try {
				$msg= uploadphoto($bid);
				$error=$msg;
				$show="display:show;";
				$alert="alert alert-info";
			}
			catch(Exception $e) {
				echo $e->getMessage();
				$error="Sorry, could not upload file";
				$show="display:show;";
				$alert="alert alert-danger";
			}
		}
		header( "Refresh:3; url=./edit-profile.php?alert=$alert&show=$show&error=$error", true, 303);
	}
}
function uploadphoto($bid) {
    $msg=null;
	$currdate = date('Y-m-d');
	include('./php_action/conn.php');		
    $filecount=count($_FILES['otherfile']['name']);
	$maxsizeimg = 900000; //set to approx 900 KB
	for($i=0; $i<$filecount; $i++){
		if($_FILES['otherfile']['error'][$i]==UPLOAD_ERR_OK) {
			if(is_uploaded_file($_FILES['otherfile']['tmp_name'][$i])) {    
				if( $_FILES['otherfile']['size'][$i] < $maxsizeimg) {  
					 $finfo = finfo_open(FILEINFO_MIME_TYPE);
					if(strpos(finfo_file($finfo, $_FILES['otherfile']['tmp_name'][$i]),"image")===0) {
						$imgData =addslashes (file_get_contents($_FILES['otherfile']['tmp_name'][$i]));
						$temp = explode(".", $_FILES["otherfile"]["name"][$i]);
						$newfilename = $bid."_".$i."_".date("Ymdhis").'.' . end($temp);
						move_uploaded_file($_FILES['otherfile']['tmp_name'][$i],"./uploads/docs_images/".$newfilename);
						$imgpath="/uploads/docs_images/".$newfilename;
						$sql = "INSERT INTO buyer_doc (imgpath, photo_date, photo_status, bid)VALUES ('$imgpath', '$currdate',1, $bid)";  
						if($conn->query($sql)===TRUE){
							$msg='<p>Documents Photos Is Updated successfully !</p>';										
						}											
					}
				}
			}
		}
	}	
    return $msg;
}
function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
include('./php_action/getprofile.php');
if (isset($_GET['alert'])) {
 $alert=$_GET['alert'];
 $error=$_GET['error'];
 $show=$_GET['show'];
}
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
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
<title>Edit Profile </title>
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
	<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script src="./sss.js"></script>
<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
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
<body onload="retrieve_location()">
<?php
include('./includes/user_header.php');
?>
<link rel="stylesheet" href="css/datepicker.css" />
<!--<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                $('#datepick').datepicker({
                    format: "dd/mm/yyyy",
					autoclose: true
                });  
            });
        </script>-->
 <style>
 .select-arrowreg:before {
width: 35px;
}
.select-arrowreg:before {
 content: '';
right: 17px;
top: 23px;
width: 28px;
height: 30px;
background: #fff;
position: absolute;
pointer-events: none;
display: block;
}
.select-arrowreg:after {
top: 10px;
right: 10px;
}
.select-arrowreg:after {
content: " ";
border-top: 7px solid #872A94;
border-left: 4px solid transparent;
border-right: 4px solid transparent;
right: 25px;
top: 35px;
padding: 0;
position: absolute;
pointer-events: none;
}
.select-arrowin:before {
width: 25px;
}
.select-arrowin:before {
content: '';
right: 16px;
top: 2px;
width: 22px;
height: 30px;
background: #fff;
position: absolute;
pointer-events: none;
display: block;
}
.select-arrowin:after {
top: 10px;
right: 10px;
}
.select-arrowin:after {
content: " ";
border-top: 7px solid #872A94;
border-left: 4px solid transparent;
border-right: 4px solid transparent;
right: 25px;
top: 15px;
padding: 0;
position: absolute;
pointer-events: none;
}
 </style><style>
 .select-arrowreg:before {
width: 35px;
}
.select-arrowreg:before {
 content: '';
right: 17px;
top: 23px;
width: 28px;
height: 30px;
background: #fff;
position: absolute;
pointer-events: none;
display: block;
}
.select-arrowreg:after {
top: 10px;
right: 10px;
}
.select-arrowreg:after {
content: " ";
border-top: 7px solid #872A94;
border-left: 4px solid transparent;
border-right: 4px solid transparent;
right: 25px;
top: 35px;
padding: 0;
position: absolute;
pointer-events: none;
}
.select-arrowin:before {
width: 25px;
}
.select-arrowin:before {
content: '';
right: 16px;
top: 2px;
width: 22px;
height: 30px;
background: #fff;
position: absolute;
pointer-events: none;
display: block;
}
.select-arrowin:after {
top: 10px;
right: 10px;
}
.select-arrowin:after {
content: " ";
border-top: 7px solid #872A94;
border-left: 4px solid transparent;
border-right: 4px solid transparent;
right: 25px;
top: 15px;
padding: 0;
position: absolute;
pointer-events: none;
}
 </style>
<!-- Inner Page Full Width -->
<section class="full-width-inner">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <h2 class="page-title remove-top-padding">Edit Profile  </h2>
        <div class="row">
<?php
include('./includes/sidebar.php');
?>
 <div class="col-sm-8 col-md-9 col-lg-9">
 <div align="center" style="padding:1px; margin-bottom:5px;" class="<?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>"><?php echo $error; ?></div>
 <p style="display:none;" id="demo"></p>
		    <div class="panel panel-info light-pink">
              <div class="panel-heading action-box">
                <div class="panel-caption">
                  <h3 class="panel-title">Edit Profile</h3>
                </div>
				<div class="panel-tools"><a href="myproducts.php" class="btn btn-white-outline btn-xsmall">Back</a></div>
              </div>
              <div class="panel-body">
				<ul class="nav nav-tabs">
        		<li class="nav-item active">
        			<a href="#personal" class="nav-link active" role="tab" data-toggle="tab">Product Details</a>
        		</li>				
				<li class="nav-item">
        			<a href="#photo" style="pointer-events: show;" class="nav-link" role="tab" data-toggle="tab">Upload Documents</a>
        		</li>
        	</ul>
				<div class="tab-content">
                  <div class="row well tab-pane fade in active" role="tabpanel" id="personal">
                    <div class="col-lg-12">
					<form method="post" name="editprofile" id="editprofile" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      <div class="profile-subhead">
                        <h3 class="triangle well">Personal Information</h3>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Full Name</label>
				            <input type="text" class="form-control" id="bname" name="bname" value="<?php echo $bname; ?>" onkeyup="" required/>
                            <div id="fnameer" style="float:right; font-size:14px;">&nbsp;</div>
							</div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Email</label>
                         <input name="email" type="text" id="email" class="form-control" value="<?php echo $email; ?>" required/>
                            <div id="lnameerr" style="float:right; font-size:14px;">&nbsp;</div>
							</div>
                          </div>
						  <div class="col-md-3">
                            <div class="form-group">
                              <label>City</label>
                         <input name="city" type="text" id="city" class="form-control" value="<?php echo $city; ?>" required/>
                            <div id="lnameerr" style="float:right; font-size:14px;">&nbsp;</div>
							</div>
                          </div>
                        </div>
						<div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Taluka</label>
				            <input type="text" class="form-control" id="taluka" name="taluka" value="<?php echo $taluka; ?>" onkeyup="" required/>
                            <div id="fnameer" style="float:right; font-size:14px;">&nbsp;</div>
							</div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>District</label>
                         <input name="dist" type="text" id="dist" class="form-control" value="<?php echo $dist; ?>" required/>
                            <div id="lnameerr" style="float:right; font-size:14px;">&nbsp;</div>
							</div>
                          </div>
                        </div>                 
						<div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Pincode</label>
								<input name="pincode" type="text" id="pincode" class="form-control" value="<?php echo $pincode; ?>" required/>
							</div>
                          </div>
						  
                          
						   <div class="col-md-6">
                            <div class="form-group">
                              <label>Address</label>
								<textarea rows="2" name="address" type="text" id="address" class="form-control" required><?php echo $address; ?></textarea>
							</div>
                          </div>						  
						</div>
                        			
							<div class="row">
							<div class="col-sm-6 col-md-6">                
							  <div class="form-group">
							  <label class="control-label" >Company Name<span class="red">*</span></label>
							   <input type="text" class="form-control" name="comp_name" id="comp_name" value="<?php echo $comp_name; ?>" required/>
							</div>
							</div>
							<div class="col-sm-6 col-md-6">                
							  <div class="form-group">
							  <label class="control-label" >Company Mobile<span class="red">*</span></label>
							   <input type="text" class="form-control" name="comp_mob" id="comp_mob" value="<?php echo $comp_mob; ?>" required/>
							</div>
							</div>                	
						 </div>
						 <div class="row">                
							<div class="col-sm-6 col-md-6">                
							  <div class="form-group">
							  <label class="control-label" >Company Type<span class="red">*</span></label>
							   <input type="text" class="form-control" name="comp_type" id="comp_type" value="<?php echo $comp_type; ?>" required/>
							</div>
							</div>
							<div class="col-sm-6 col-md-6">                
							  <div class="form-group">
							  <label class="control-label" >Company Product<span class="red">*</span></label>
							   <input type="text" class="form-control" name="comp_prod" id="comp_prod" value="<?php echo $comp_prod; ?>" required/>
							</div>
							</div>                	
						 </div>	
						 <div class="row">
						    <div class="col-xs-12 col-md-6">
							  <div align="center"  class="<?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>"><?php echo $error; ?></div>
							  <div id="mes" name="mes"> </div>
							</div> <!-- close col-->
							<div class="col-xs-12 col-md-6">
							  <div class="form-group">
                              <input type="submit" name="persdtlsub" class="btn btn-default pink2-btn  butt-on btn-block" value="Update Personal Details" />
                              </div>
                          </div>
                        </div>
						</form>
                      </div>
                    </div>
                    </div>
                <!--  </div> -->                 			  				 
				  <!--  </div> -->                 			  
				  <div class="row well tab-pane" role="tabpanel" id="photo">
                    <div class="col-lg-12">					
                      <div class="profile-subhead">
						<div class="row" id="profile-picture-upload">
							
							<?php
							  $sql1 = "SELECT * FROM buyer_doc WHERE bid=$bid AND photo_status=1";
							  $result = $conn->query($sql1);
							  if ($result->num_rows > 0){
								while($row = $result->fetch_assoc()) {
									echo"<div class='col-xs-6 col-sm-6 col-md-3 col-lg-3'>
											<div class='profile-img-gallery'>
												<img src='./".$row['imgpath']."' style=height:150px;width:400px' class='img-thumbnail img-responsive'>
												<button type='button' onclick='delete_doc(".$row['doc_id'].")' class='btn  btn-xsmall btn-pink-outline' name='del_photo' id='del_photo'>Delete Image <i class='fa fa-times'></i></button>
											</div>
										</div>";
								}
							  }
							  ?>
						</div>
						<form enctype="multipart/form-data" data-toggle="validator" method="post" name="edit-product-photo" id="edit-product-photo" action="./edit-profile.php?bid=<?php echo $bid;?>">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" name="otherfile[]" type="file" multiple />
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
							<input type="submit" class="btn btn-default pink2-btn  butt-on btn-block" name="submitphoto" value="Update Documents" onclick="return validate();" />
						</form>						
                      </div>
                    </div>
                  </div>
					</div><!--close tab content-->
                <!--  </div>-->
				</div>
				</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include('./includes/footer.php');
?>
<!--<script type="text/javascript">
$( "#target" ).keyup(function() {
});
jQuery( document ).ready(function(){
 $('#fname').keyup(function() {
    var value = $(this).val();
    if(value == '')
	{
     $('#fnameer').innerHTML='<font color="red" style="font-size:12px;" ><i>The First Name is required</i></font>';  
       jQuery("input[name='esubmit']").prop('disabled', 'true'); 
	   var characterReg = /^\s*[a-zA-Z]+\s*$/;
	   if(!characterReg.test(value))
	   $(this).after('<font color="red" style="font-size:12px;" ><i>First Name must consist of Alphabets only</i></font>');
    }
	else
	{
	 jQuery("input[name='esubmit']").removeAttr('disabled'); 
	}
});
});
</script>-->
	<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    $('#editprofile').formValidation({
        message: 'This value is not valid',
        icon: {
           /* valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',*/
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fname: {
                validators: {
                    notEmpty: {
                        message: 'The First Name is required'
                    }
                }
            },
            lname: {
                validators: {
                    notEmpty: {
                        message: 'The Last Name is required'
                    }
                }
            },
			 gender: {
                validators: {
                    notEmpty: {
                        message: 'The Field is required'
                    }
                }
            },
			date: {
                validators: {
                    notEmpty: {
                        message: 'The Field is required'
                    },
					date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date'
                    }
                }
            },
			 marital_status: {
                validators: {
                    notEmpty: {
                        message: 'The Field is required'
                    }
                }
            },
			 mothertongue: {
                validators: {
                    notEmpty: {
                        message: 'The Field is required'
                    }
                }
            },
			aboutme: {
                validators: {
                    notEmpty: {
                        message: 'About Me is required'
                    }
                }
            },
			height: {
                validators: {
                    notEmpty: {
                        message: 'Height is required'
                    }
                }
            },
			weight: {
                validators: {
                    notEmpty: {
                        message: 'Weight is required'
                    }
                }
            },
			/*weight: {
                validators: {
                    notEmpty: {
                        message: 'Weight is required'*/
					/*regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Weight must consist of Only Numbers.'
                    },*/
					/*between: {
                        message: 'Weight must be between 40KG to 140KG.',
						min:40,
                        max:140,*/
					/*}
                }
            },*/
			body_type: {
                validators: {
                    notEmpty: {
                        message: 'Body Type is required'
                    }
                }
            },
			complexion: {
                validators: {
                    notEmpty: {
                        message: 'Complexion is required'
                    }
                }
            },
			special_cases: {
                validators: {
                    notEmpty: {
                        message: 'Special Cases is required'
                    }
                }
            },
			blood_group: {
                validators: {
                    notEmpty: {
                        message: 'Blood Group is required'
                    }
                }
            },
			religion: {
                validators: {
                    notEmpty: {
                        message: 'Religion is required'
                    }
                }
            },
			caste: {
                validators: {
                    notEmpty: {
                        message: 'Caste is required'
                    }
                }
            },
			creater: {
                validators: {
                    notEmpty: {
                        message: 'Profile Creator is required'
                    }
                }
            },
			smoke: {
                validators: {
                    notEmpty: {
                        message: 'Smoking Field is required'
                    }
                }
            },
			drink: {
                validators: {
                    notEmpty: {
                        message: 'Drinking Field is required'
                    }
                }
            },
			diet: {
                validators: {
                    notEmpty: {
                        message: 'Diet Field is required'
                    }
                }
            },
			education: {
                validators: {
                    notEmpty: {
                        message: 'Education Field is required'
                    }
                }
            },
			specific_area: {
                validators: {
                    notEmpty: {
                        message: 'Specific Area Field is required'
                    }
                }
            },
			profession: {
                validators: {
                    notEmpty: {
                        message: 'Profession Field is required'
                    }
                }
            },
			annual_income: {
                validators: {
                    notEmpty: {
                        message: 'Annual Income Field is required'
                    }
                }
            },
			father_pro: {
                validators: {
                    notEmpty: {
                        message: 'Father Profession Field is required'
                    }
                }
            },
			mother_pro: {
                validators: {
                    notEmpty: {
                        message: 'Mother Profession Field is required'
                    }
                }
            },
			mar_sis: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'This Field must consist of Only Numbers.'
                    }
                }
            },
			unmar_sis: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'This Field must consist of Only Numbers.'
                    }
                }
            },
			mar_bro: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'This Field must consist of Only Numbers.'
                    }
                }
            },
			unmar_bro: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'This Field must consist of Only Numbers.'
                    }
                }
            },
			family_values: {
                validators: {
                    notEmpty: {
                        message: 'Family Value Field is required'
                    }
                }
            },
			family_status: {
                validators: {
                    notEmpty: {
                        message: 'Family Status Field is required'
                    }
                }
            },
			father_name: {
                validators: {
                    notEmpty: {
                        message: 'Father Name Field is required'
                    }
                }
            },
			mother_name: {
                validators: {
                    notEmpty: {
                        message: 'Mother Name Field is required'
                    }
                }
            },
			address: {
                validators: {
                    notEmpty: {
                        message: 'The Address is required'
                    }
                }
            },
			country: {
                validators: {
                    notEmpty: {
                        message: 'The Country is required'
                    }
                }
            },
			state: {
                validators: {
                    notEmpty: {
                        message: 'The State is required'
                    }
                }
            },
			city: {
                validators: {
                    notEmpty: {
                        message: 'The City is required'
                    }
                }
            },
			mobileno: {
                validators: {
                    notEmpty: {
                        message: 'The Mobile Number is required'
                    }
                }
            },
			from_height: {
                validators: {
                    notEmpty: {
                        message: 'Partner From Height is required'
                    }
                }
            },
			to_height: {
                validators: {
                    notEmpty: {
                        message: 'Partner To Height is required'
                    }
                }
            },
			pfamily_values: {
                validators: {
                    notEmpty: {
                        message: 'Partner Family Values is required'
                    }
                }
            },
			pmarital_status: {
                validators: {
                    notEmpty: {
                        message: 'Marital Status is required'
                    }
                }
            },
			pdrink: {
                validators: {
                    notEmpty: {
                        message: 'Drink field is required'
                    }
                }
            },
			psmoke: {
                validators: {
                    notEmpty: {
                        message: 'This Field is required'
                    }
                }
            },
			pdrink: {
                validators: {
                    notEmpty: {
                        message: 'This Field is required'
                    }
                }
            },
			pbodytype: {
                validators: {
                    notEmpty: {
                        message: 'This Field is required'
                    }
                }
            },
			pcomplexion: {
                validators: {
                    notEmpty: {
                        message: 'This Field is required'
                    }
                }
            },
			pdiet: {
                validators: {
                    notEmpty: {
                        message: 'This Field is required'
                    }
                }
            },
			pspcase: {
                validators: {
                    notEmpty: {
                        message: 'This Field is required'
                    }
                }
            },
			peducation: {
                validators: {
                    notEmpty: {
                        message: 'This Field is required'
                    }
                }
            },
			pprofession: {
                validators: {
                    notEmpty: {
                        message: 'This Field is required'
                    }
                }
            }
        }
    });
});
</script>