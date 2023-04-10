<?php
include('./php_action/conn.php');
include('./php_action/lock.php');
include('./php_action/getprofile.php');

 // // coding for fetching user name
     $sql1="SELECT appstatus  FROM end_user WHERE euser_id='$user_id'";
     $result = $conn->query($sql1);
      if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
			$aprovestatus=$row["appstatus"];
			}
	  }
       if($aprovestatus==1){
				$error='Your <b>User Id: '.$user_id.'</b>'." "."Is Approved By college! You Cannot Edit Profile! Please visit college office for any changes in your profile !";
				$show="display:show;";
				$alert="alert alert-success";
				header("Location:./profile.php?error=$error");
		}
		// // coding for fetching user name
     $sql1="SELECT pay_status  FROM payment WHERE euser_id='$user_id'";
     $result = $conn->query($sql1);
      if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
			$pay_status=$row["pay_status"];
			}
	  }
       if($pay_status==1){
				$error='Your <b>User Id: '.$user_id.'</b>'." "."has been already paid! You Cannot pay custom! Please visit college office for any changes in your profile !";
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

<title>Custom Payment</title>

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
<script type="text/javascript" src="assets/js/activemenu.js"></script>

</head>
<!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 
<body id="custompay">

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
        <h2 class="page-title remove-top-padding">Custom Payment</h2>
        <div class="row">
<?php
include('./includes/sidebar.php');
?>        

 <div class="col-sm-8 col-md-9 col-lg-9">
            <div class="panel panel-info light-pink">
              <div class="panel-heading">
                <h3 class="panel-title">Custom Payment</h3>
              </div>
              <div class="panel-body">
				<div class="col-lg-12">					
                      <div class="profile-subhead">
                        <h3 class="triangle well">Pay Admission Fees Online (<a href="./bnkdetails.php"target="self"> Click Here for Bank Details!</a>)</h3>
						<?php
						$output="";
						  $output .=" <div class='row table-responsive' style='padding-bottom:100px;'>";							  
						  $output .="<h4 class=''>Fees Details:</h4>";							  
							  $sql = "SELECT c.cource_name, fh.fh_name, fh.fh_date, fs.fs_id, fs.fs_amt FROM fees_head fh, fees_structure fs, cources c WHERE c.cource_id=$cource_id AND c.cource_id=fs.cource_id AND fh.fh_id=fs.fh_id AND fs.status=1 order by fh.fh_name ASC";
							  $result = $conn->query($sql);
							  if ($result->num_rows > 0) {
								// output data of each row
								  $output.="<table class='table table-bordered'>
								  <thead>
									<tr>
									  <th>Sr.No</th>
									  <th>Particulars</th>
									  <th>Amount</th> 									  			   
								   </tr>
								  </thead>
								  <tbody>";
								  $total=0;
								  $count=0;
									while($row = $result->fetch_assoc()) {
									$count++;
									$total=$total + $row['fs_amt'];
									$output.="<tr>
									<td>".$count."</td>
									<td>".$row['fh_name']."</td>
									<td>".$row['fs_amt']."</td>																	
									</tr>";
								 }
								 $output.="<tr>
									<td colspan='2' align='right'><b>Total Fees Amount</b></td>
									<td><b>".round($total,2)."</b></td>																	
									</tr>								
								  </tbody>
							  </table>";
								}  
								else {
								 $output.= "0 results";
								}
								$conn->close();
								
							$output.="</div>";
							?> 
							<form method="POST" name="customerData" action="./ccavenue/ccavRequestHandler.php">
							<input type="hidden" name="tid" id="tid" readonly  required/>
							<input type="hidden" name="merchant_id" value="264199" required/>
							<input type="hidden" name="order_id" value="<?php echo $user_id."_".date("Ymdhis");?>" required/>							
							<input type="hidden" name="currency" value="INR" required/>
							<input type="hidden" name="redirect_url" value="https://sitarangcharitablesociety.in/zel_user/ccavenue/ccavResponseHandler.php" required/>
							<input type="hidden" name="cancel_url" value="https://sitarangcharitablesociety.in/zel_user/ccavenue/ccavResponseHandler.php" required/>
							<input type="hidden" name="language" value="EN" required/>
							<input type="hidden" name="billing_name" value="<?php echo $fname." ".$lname ;?>" required/>
							<input type="hidden" name="billing_address" value="<?php echo $address;?>" required/>
							<input type="hidden" name="billing_city" value="<?php echo $city;?>"required />
							<input type="hidden" name="billing_state" value="MH" required />
							<input type="hidden" name="billing_zip" value="<?php echo $pin;?>" required />
							<input type="hidden" name="billing_country" value="India" required />
							<input type="hidden" name="billing_tel" value="<?php echo $mobileno;?>" required />
							<input type="hidden" name="billing_email" value="<?php echo $email;?>" required />
							<input type="hidden" name="merchant_param1" value="<?php echo $user_id;?>" required />
						<div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Selected Course Name</label>
                              <input type="text" class="form-control" name="cource_name" value="<?php echo $cource_name;?>" readonly  required >
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
                              <input type="text" class="form-control" name="order" value="<?php echo $user_id."_".date("Ymdhis");?>" readonly  required >
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Total Admission Fees</label>
                              <input name="admission_fees" type="text" class="form-control" value="<?php echo round($total,2);?>" readonly required>
                            </div>
                          </div>
                        </div>
						
						<div class="row">
                          <div class="col-xs-12 col-md-6">
							  <div align="center"  class="success" role="alert"><h3>Rs. <?php echo round($total,2);?></h3></div>
							</div> <!-- close col-->
							<div class="col-md-6">
                            <div class="form-group">
                              <label>Pay Custom Fees Amount</label>
                              <input name="amount" type="number" class="form-control" required>
                            </div>
                          </div>
                          </div>
						  
						  <div class="row">
							<div class="col-xs-12 col-md-6">
							</div>
							<div class="col-xs-12 col-md-6">
							  <div class="form-group">
                              <input type="submit" name="btnpayfeesonline" class="btn btn-default pink2-btn  butt-on btn-block" value="Pay Fees Online!" />
                            </div>
                          </div>
                        </div>
						 </form>
						<?php echo $output;?>
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
