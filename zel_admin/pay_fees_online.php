<?php
include('./php_action/conn.php');
include('./php_action/lock.php');
include('./php_action/getprofile.php');
$error="";
$show="display:none;";
$alert="alert alert-success";
$feestab="style='pointer-events: show;'";
if (isset($_GET['error'])) {
      $error=$_GET['error'];
      $show=$_GET['show'];
      $alert=$_GET['alert'];
}
if($paystatus == 1)
{
	$showprint="display:show;";
}
else
{
	$showprint="display:none;";
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

<title>Pay Fees Online </title>

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
</head>

<body>

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
        <h2 class="page-title remove-top-padding">Pay Fees Online</h2>
        <div class="row">
<?php
include('./includes/sidebar.php');
?>

 <div class="col-sm-8 col-md-9 col-lg-9">
 <div align="center" style="padding:1px; margin-bottom:5px;" class="<?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>"><?php echo $error; ?></div>
 <div align="center" style="padding:1px; margin-bottom:5px;" class="alert alert-warning" role="alert">You must have to make payment before adding the products for online auction.</div>
		    <div class="panel panel-info light-pink">
              <div class="panel-heading action-box">
                <div class="panel-caption">
                  <h3 class="panel-title">Online Payment</h3>
                </div>
				<div style="padding-left:20px;" class="panel-tools" ><a style="<?php echo $showprint; ?>" href="#" onclick=printreceipt(); class="btn btn-white-outline btn-xsmall">Print Payment Receipt</a></div>
				<div class="panel-tools"><a href="profile.php" class="btn btn-white-outline btn-xsmall">Back</a></div>
              </div>
              <div class="panel-body">
<div class="profile-subhead">
                        <h3 class="triangle well">Pay Auction Fees Online</h3>
							<form method="POST" name="customerData" action="./ccavenue/ccavRequestHandler.php">
							<input type="hidden" name="tid" id="tid" readonly  required/>
							<input type="hidden" name="merchant_id" value="182032" required/>
							<input type="hidden" name="order_id" value="<?php echo $bid."_".date("Ymdhis");?>" required/>
							<input type="hidden" name="amount" value="<?php echo round(5000,2);?>" required/>
							<input type="hidden" name="currency" value="INR" required/>
							<input type="hidden" name="redirect_url" value="https://zelosinfotech.com/auction/zel_buyer/ccavenue/ccavResponseHandler.php" required/>
							<input type="hidden" name="cancel_url" value="https://zelosinfotech.com/auction/zel_buyer/ccavenue/ccavResponseHandler.php" required/>
							<input type="hidden" name="language" value="EN" required/>
							<input type="hidden" name="billing_name" value="<?php echo $bname;?>" required/>
							<input type="hidden" name="billing_address" value="<?php echo $address;?>" required/>
							<input type="hidden" name="billing_city" value="<?php echo $city;?>"required />
							<input type="hidden" name="billing_state" value="MH" required />
							<input type="hidden" name="billing_zip" value="<?php echo $pincode;?>" required />
							<input type="hidden" name="billing_country" value="India" required />
							<input type="hidden" name="billing_tel" value="<?php echo $mobile;?>" required />
							<input type="hidden" name="billing_email" value="<?php echo $email;?>" required />
							<input type="hidden" name="merchant_param1" value="<?php echo $bid;?>" required />
						<div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Selected Payment Name</label>
                              <input type="text" class="form-control" name="pay_name" value="Buyer Deposit" readonly  required >
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Select Payment Mode</label>
                              <select id="payment_mode" name="payment_mode" class="form-control selectpicker" required>
									<option value="">Select</option>					  	
									<option selected value="Pay Online">Pay Online</option>
									<option disabled value="Pay Offline">Pay Offline</option>
								</select>
                            </div>
                          </div>
                        </div>
						<div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Your Order Id</label>
                              <input type="text" class="form-control" name="order" value="<?php echo $bid."_".date("Ymdhis");?>" readonly  required >
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Total Fees</label>
                              <input name="admission_fees" type="text" class="form-control" value="<?php echo round(5000,2);?>" readonly required>
                            </div>
                          </div>
                        </div>
						
						<div class="row">
                          <div class="col-xs-12 col-md-6">
							  <div align="center"  class="success" role="alert"><h3>Rs. <?php echo round(5000,2);?></h3></div>
							</div> <!-- close col-->
							<div class="col-xs-12 col-md-6">
							  <div class="form-group">
                              <input type="submit" name="btnpayfeesonline" class="btn btn-default pink2-btn  butt-on btn-block" value="Pay Fees Online!" />
                            </div>
                          </div>
                        </div>
						 </form>						
                      </div>
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
<div  id="receipt"  style="border:1px solid #ccc; padding:10px; height:100%; width:590pt; display:none;">
		<div style="text-align:left; border:0px solid #ccc; padding-top:20px; float:left; width:70px;">
            <img src="./images/logo.png" width="160" height="80">
        </div>
        <div style="text-align:center; border:0px solid #ccc; padding-top:20px;  float:center; width:100%;">
            <small>Online Auction System</small><br/>
            <b>Sangam Agro Foods Pvt. Ltd.</b><br/>
			<small>Manchar,Ambegaon, Maharashtra 410503</small><br/>
        </div>       
         <div Style=" clear:both; float:none;"></div>
         <h4 align="center"> Buyer Payment Receipt</h4><hr/>
		   <div style=" clear:both; text-align:center;  border:0px solid #ccc; float:right; width:100%;">			
          <table style= 'width:100%; font-size:11px;' border-collapse: collapse; cellspacing='0'>
          <tbody>
		  	<tr>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Buyer Id</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $bid; ?></td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Buyer Name</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $bname; ?></td>
			</tr>
			<tr>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Payment Id</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $bd_id; ?></td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Order Id</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $order_id; ?></td>
			</tr>
			<tr>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Amount</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $amt; ?></td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Order Status</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $order_status; ?></td>
			</tr>
			<tr>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Tracking Id</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $tracking_id; ?></td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Transaction Date</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $trans_date; ?></td>
			</tr>
          </tbody>
      </table>
	  </div>
	
	  <div style="text-align:center; border:0px solid #ccc; padding-top:50px;  float:left; width:150px;">
            <p>Date:</p>
        </div>
		<div style="text-align:center; border:0px solid #ccc; padding-top:50px;  float:right; width:150px;">
            <p>Stamp & Signature</p>
        </div>       
</div> <!--Close Invoice-->
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

