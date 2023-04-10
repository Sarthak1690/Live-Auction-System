<?php ob_start(); ?>
<?php
$login_session="" ;
 $url="";
 $status="";
 include('./php_action/lock.php');
?>
<?php
include ("./php_action/conn.php");
$error="";
$show="display:none;";
$alert="";

if (isset($_GET['sid'])) {	
	$sid=$_GET['sid'];
	$sql1="SELECT * FROM seller WHERE sid=$sid AND status=1";
	$result = $conn->query($sql1);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
		$sname = $row['sname'];
		$mobile = $row["mobile"];			
		}
	}
}
else{
	header('Location:./seller-list.php');
}


if (isset($_POST['getpaid'])) {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sid = test_input($_POST["sid"]);
		$amt = test_input($_POST["amt"]);
		$order_id = test_input($_POST["order_id"]);
		$tracking_id = test_input($_POST["tracking_id"]);
		$pay_mode = test_input($_POST["pay_mode"]);
		$currdate= date("Y-m-d"); 
          $sql = "UPDATE seller_deposit SET amt='$amt', order_status='Success', order_id='$order_id', tracking_id='$tracking_id', pay_mode='$pay_mode', trans_date='$currdate', pay_status=1 WHERE sid=$sid";
          if ($conn->query($sql) === TRUE) {
			  $sql = "UPDATE seller SET paystatus=1 WHERE sid=$sid";
			  $conn->query($sql);
          $error="Payment Is Addes successfully!";
          $show="display:show;";
          $alert="alert alert-success";
		  header( "Refresh:1; url=./seller_getpaid.php?sid=$sid&alert=$alert&show=$show&error=$error", true, 303);
          }
          else{
          $error="Your Process is invalid";
          $show="display:show;";
          $alert="alert alert-danger";
		  header( "Refresh:1; url=./seller_getpaid.php?sid=$sid&alert=$alert&show=$show&error=$error", true, 303);
          }
	}
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
<?php ob_end_flush(); ?>

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

<title>Add Seller Payment Details </title>

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
    <script type="text/javascript" src="./sss.js"></script>


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
        <h2 class="page-title remove-top-padding">Sller Payment</h2>
        <div class="row">
         <?php
		include('./includes/sidebar.php');
		?>
           <div class="col-sm-8 col-md-9 col-lg-9">
		   <div class="<?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>"><?php echo $error; ?></div>
		   <div class="panel panel-info">
      <div class="panel-heading" align="center">Payment Details</div>
      <div class="panel-body">
        <div class='table-responsive'>
      <?php
      include('./php_action/conn.php');
      error_reporting(E_ALL);
      $sql = "SELECT * FROM seller_deposit WHERE sid=$sid AND pay_status=1";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
          echo "<table class='table table-striped'>
          <thead>
            <tr>
              <th>Pay ID</th>
              <th>Seller ID</th>
              <th>Amount</th>
              <th>Order Status </th>
              <th>Order ID </th>
              <th>Tracking ID </th>
              <th>Pay Mode </th>
              <th>Trans Date </th>
              <th>Status </th>
              <th>Action </th>
           </tr>
          </thead>
          <tbody>";
          while($row = $result->fetch_assoc()) {
           echo"<tr>";
              echo "<td>".$row['sd_id']."</td>";
              echo "<td>".$row['sid']."</td>";
              echo "<td>".$row['amt']."</td>";
              echo "<td>".$row['order_status']."</td>";
              echo "<td>".$row['order_id']."</td>";
              echo "<td>".$row['tracking_id']."</td>";
              echo "<td>".$row['pay_mode']."</td>";
              echo "<td>".$row['trans_date']."</td>";
              echo "<td>".$row['pay_status']."</td>";
              echo  "<td><button type='submit' onclick='delete_seller_deposit(".$row['sd_id'].")' class='btn btn-default btn-sm' name ='btndel' id='btndel'> <span class='glyphicon glyphicon-trash'></span> Delete</button></td>";
           echo "</tr>";
         }
          echo"</tbody>
      </table>";
        }  
        else {
         echo "0 results";
        }
        $conn->close();
        ?> 
      </div>
      </div><!-- Close panel Body -->
</div> <!-- Close Panel -->
            <div class="panel panel-info light-pink">
              <div class="panel-heading">
                <h3 class="panel-title">Get Seller Payment</h3>
              </div>
              <div class="panel-body">
                					 					
               <form method="post" name="myforms" onsubmit="return ValidatePass()" action="./seller_getpaid.php?sid=<?php echo $sid;?>">
			  <div class="form-group">
				<label for="sname">Seller Name</label>
				<input type="hidden" name="sid" class="form-control" value="<?php echo $sid?>" readonly required />
				<input type="text" name="sname" class="form-control" value="<?php echo $sname?>" readonly required />
			  </div>
			  <div class="form-group">
				<label for="mobile">Seller Mobile</label>
				<input type="text" name="mobile" class="form-control" value="<?php echo $mobile?>" readonly required />
			  </div>
			  <div class="form-group">
				<label class="control-label">Amount</label>
				<input class="form-control" type="number" id="amt" name= "amt" placeholder="Amount" required>
			  </div>
			  <div class="form-group">
				<label class="control-label">Order Id</label>
				<input class="form-control" type="text" id="order_id" name= "order_id" placeholder="Order ID" required>
			  </div>
			  <div class="form-group">
				<label class="control-label">Tracking Id</label>
				<input class="form-control" type="text" id="tracking_id" name= "tracking_id" placeholder="Tracking ID" required>
			  </div>
			  <div class="form-group">
				<label class="control-label">Pay Mode</label>
			   <select class="form-control" name="pay_mode" id="pay_mode" required>
			   <option value="">Select payment Mode</option>
			   <option value="Online">Online</option>
			   <option value="Offline">Offline</option>
			   </select>
			  </div>
			<input type="submit" name="getpaid"  class="btn btn-default pink2-btn  butt-on" value="Update Payment"/>
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
