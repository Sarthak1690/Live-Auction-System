<?php
include('./php_action/conn.php');
include('./php_action/lock.php');
include('./php_action/getprofile.php');
$error="";
$show="display:none;";
$alert="alert alert-success";
if($paystatus == 0)
{
	header('Location:./pay_fees_online.php');
}

if (isset($_POST['submitproduct'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$pname = test_input($_POST["pname"]);
	$variety = test_input($_POST["variety"]);
	 $today=date('Y-m-d');
     $sql = "SELECT * FROM product WHERE pname='$pname' AND variety='$variety' AND status=1 AND sid=$sid";
	 $query = $conn->query($sql);
	 $count = $query->num_rows;
if(!isset($_FILES['userfile']))
{
  $error="Please Select File To Upload!";
    $show="display:show;";
    $alert="alert alert-danger";
}	 
else if ($count >0){
	$error="Product Is Already Exist!";
	$show="display:show;";
	$alert="alert alert-danger";	
}
else
{
    try {
    $msg= upload($sid);  //this will upload your image
    $error=$msg;
    $show="display:show;";
    $alert="alert alert-info";
    //echo $msg;  //Message showing success or failure.
    }
    catch(Exception $e) {
    echo $e->getMessage();
    //echo 'Sorry, could not upload file';
    $error="Sorry, could not upload file";
    $show="display:show;";
    $alert="alert alert-danger";
    }
}
header( "Refresh:3; url=./addproduct.php?alert=$alert&show=$show&error=$error", true, 303);
}
}
//***********************************************************************************************************
function upload($sid) {
    $msg=null;
	include('./php_action/conn.php');
		$pname = test_input($_POST["pname"]);
		$variety = test_input($_POST["variety"]);
		$area = test_input($_POST["area"]);
		$size = test_input($_POST["size"]);
		$production = test_input($_POST["production"]);
		$sugar = test_input($_POST["sugar"]);
		$global_gap = test_input($_POST["global_gap"]);
		$farm_reg = test_input($_POST["farm_reg"]);
		$residue_free_check = test_input($_POST["residue_free_check"]);
		$residue_result = test_input($_POST["residue_result"]);
		$paddress = test_input($_POST["paddress"]);
		$pdesc = test_input($_POST["pdesc"]);
		$latitude = test_input($_POST["Latitude"]);
		$longitude = test_input($_POST["Longitude"]);
		$currdate = date('Y-m-d H:i:s a');
		$status=1;
    $maxsize = 5000000; //set to approx 300 KB
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    
            if( $_FILES['userfile']['size'] < $maxsize) {  
                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"video/mp4")===0) {    
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
					$temp = explode(".", $_FILES["userfile"]["name"]);
					$newfilename = $sid."_".date("Ymdhis").'.' . end($temp);
					move_uploaded_file($_FILES['userfile']['tmp_name'],"./uploads/product_vdo/".$newfilename);
					$vdopath="/uploads/product_vdo/".$newfilename;
                    $sql = "INSERT INTO product (pname, variety, area, size, production,sugar,global_gap,farm_reg,residue_free_check,residue_result,paddress,pdesc, latitude, longitude,vdopath, regdate, status, sid) 
							VALUES ('$pname', '$variety', '$area', '$size','$production', '$sugar', '$global_gap', '$farm_reg','$residue_free_check', '$residue_result','$paddress','$pdesc', '$latitude', '$longitude', '$vdopath', '$currdate',1, $sid)";
                    if($conn->query($sql)===TRUE){
						$pid = $conn->insert_id;						
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
											$newfilename = $pid."_".$i."_".date("Ymdhis").'.' . end($temp);
											move_uploaded_file($_FILES['otherfile']['tmp_name'][$i],"./uploads/products_images/".$newfilename);
											$imgpath="/uploads/products_images/".$newfilename;
											$sql = "INSERT INTO product_photo ( imgpath, photo_date, photo_status, pid)VALUES ('$imgpath', '$currdate',1, $pid)";
											$conn->query($sql);							  
										}
									}
								}
							}
							
						}						
					$msg='<p>Product Is Updated successfully !</p>';
					}                  
                }
                else
                    $msg="<p>Uploaded file is not an Video.</p>";
            }
             else {
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        else
		{
            $msg="File not uploaded successfully.";
		}
    }
    else {
        $msg= file_upload_error_message($_FILES['userfile']['error']);
    }
    return $msg;
}
//*********************************************************************************************************************
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

<title>Add Product </title>

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
        <h2 class="page-title remove-top-padding">Add New Product</h2>
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
                  <h3 class="panel-title">Add New Product</h3>
                </div>
              </div>
              <div class="panel-body">
				<div class="tab-content">
                  <div class="row well tab-pane fade in active" role="tabpanel" id="personal">
                    <div class="col-lg-12">
					<form enctype="multipart/form-data" data-toggle="validator" method="post" name="addproduct" id="addproduct" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      <div class="profile-subhead">
                        <input type="hidden" id="Latitude" name="Latitude">
						<input type="hidden" id="Longitude" name="Longitude">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Product Name</label>
				            <input type="text" class="form-control" id="pname" name="pname" onkeyup="" required>
                            <div id="fnameer" style="float:right; font-size:14px;">&nbsp;</div>
							</div>
                          </div>
						  <div class="col-md-6">
                            <div class="form-group">
                              <label>Product Variety</label>
								<input name="variety" type="text" id="variety" class="form-control" required>
                            <div id="lnameerr" style="float:right; font-size:14px;">&nbsp;</div>
							</div>
                          </div>                          
                        </div>
						<div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Farm Area</label>
                         <input name="area" type="text" id="area" class="form-control" required>
                            <div id="lnameerr" style="float:right; font-size:14px;">&nbsp;</div>
							</div>
                          </div>
						  <div class="col-md-6">
                            <div class="form-group">
                              <label>Size</label>
                         <input name="size" type="text" id="size" class="form-control" required>
                            <div id="lnameerr" style="float:right; font-size:14px;">&nbsp;</div>
							</div>
                          </div>
                          
                        </div>                 
						<div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Expected Production</label>
								<input name="production" type="text" id="production" class="form-control" required>
							</div>
                          </div>
						  
                          
						   <div class="col-md-4">
                            <div class="form-group">
                              <label>Sugar</label>
							<input type="text" class="form-control" id="sugar" name="sugar" onkeyup="" required>
							</div>
                          </div>
						  <div class="col-md-4">
                            <div class="form-group">
                              <label>Global Gap </label>
                              <div class="select-arrowreg">
                                <select name="global_gap" class="form-control" required>
								  <option value="">Select</option>
                                  <option  value="Yes">Yes</option>
                                  <option  value="No">No</option>
                                </select>
                              </div>
                            </div>
                          </div>
						  
						</div>
						<div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Farm Registration</label>
                              <div class="select-arrowreg">
                                <select name="farm_reg" class="form-control" required>
								  <option value="">Select</option>
                                  <option  value="Yes">Yes</option>
                                  <option  value="No">No</option>
                                </select>
                              </div>
                            </div>
                          </div>
						  <div class="col-md-4">
                            <div class="form-group">
                              <label>Residue Free Checkup</label>
                              <div class="select-arrowreg">
                                <select name="residue_free_check" class="form-control" required>
								  <option value="">Select</option>
                                  <option  value="Yes">Yes</option>
                                  <option  value="No">No</option>
                                </select>
                              </div>
                            </div>
                          </div>
						  <div class="col-md-4">
                            <div class="form-group">
                              <label>Residue Free Checkup Result?</label>
                              <div class="select-arrowreg">
                                <select name="residue_result" class="form-control" required>
								  <option value="">Select</option>
                                  <option  value="Pass">Pass</option>
                                  <option  value="Fail">Fail</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          
                        </div>
						<div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Address</label>
							  <textarea rows="3" name="paddress" type="text" id="paddress" class="form-control" required></textarea>				            
                            <div id="fnameer" style="float:right; font-size:14px;">&nbsp;</div>
							</div>
                          </div>
						  <div class="col-md-6">
                            <div class="form-group">
                              <label>Product Description</label>
							  <textarea rows="3" name="pdesc" type="text" id="pdesc" class="form-control" required></textarea>				            
                            <div id="fnameer" style="float:right; font-size:14px;">&nbsp;</div>
							</div>
                          </div>
                        </div>				
						<div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Upload Photos</label>
							<input class="form-control" name="otherfile[]" type="file" multiple />
                            <div id="lnameerr" style="float:right; font-size:14px;">&nbsp;</div>
							</div>
                          </div>
						  <div class="col-md-6">
                            <div class="form-group">
                              <label>Upload Video</label>
							<input class="form-control" name="userfile" type="file" required/>
                            <div id="lnameerr" style="float:right; font-size:14px;">&nbsp;</div>
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
                              <input type="submit" name="submitproduct" class="btn btn-default pink2-btn  butt-on btn-block" value="Add Product" />
                              </div>
                          </div>
                        </div>
						</form>
                      </div>
                    </div>
                <!--  </div> -->                 			  		  			  
				  
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

