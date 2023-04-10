<?php
include('./php_action/conn.php');
include('./php_action/lock.php');

	if (isset($_GET['pid'])) {	
	  $pid=$_GET['pid'];
      $sql1 = "SELECT * FROM product p WHERE p.pid=$pid AND p.status!=0";
      $result = $conn->query($sql1);
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
		$pname = $row['pname'];
		$paddress = $row["paddress"];
		$area = $row["area"];
		$size = $row["size"];
		$variety = $row["variety"];
		$production = $row["production"];
		$sugar = $row["sugar"];
		$farm_reg = $row["farm_reg"];
		$residue_free_check = $row["residue_free_check"];
		$residue_result = $row["residue_result"];
		$global_gap = $row["global_gap"];
		$pdesc = $row["pdesc"];
		$base_rate = $row["base_rate"];
		$bid_start_date = $row["bid_start_date"];
		$bid_end_date = $row["bid_end_date"];
		$vdopath = $row["vdopath"];
		$latitude = $row["latitude"];
		$longitude = $row["longitude"];
		$regdate = $row["regdate"];
		$sid = $row["sid"];
		}
	  }
	}
	
		$currdate=date("Y/m/d");
		$diff = abs(strtotime($currdate) - strtotime($regdate));
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
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
		<div class="row">
           <?php
			include('./includes/sidebar.php');
		   ?>          
 
		<div class="col-sm-8 col-md-9 col-lg-9">
            <div class="panel panel-info light-pink">
              <div class="panel-heading action-box">
                <div class="panel-caption">
                  <h3 class="panel-title">Product Details </h3>				 
                </div>
				 <div style="padding-left:20px;" class="panel-tools" ><a href="view-seller-profile.php?sid=<?php echo $sid?>" class="btn btn-white-outline btn-xsmall">Seller Profile</a></div>
				 <div style="padding-left:20px;" class="panel-tools" ><a href="#" onclick=printbill(); class="btn btn-white-outline btn-xsmall">Print</a></div>
                </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                  <div class="profile-sumup">
                    <p class="profile-user-name"><a href="#"><?php echo $pname; ?></a> <span class="profile-user-id"><?php echo $pid; ?></span></p>
                    <div class="row">
                      <div class="col-lg-6">
                        <table class="table table-condensed table-user-information">
                              <tbody>
                                <tr>
                                  <td class="col-xs-4 col-sm-4">Added Date</td>
                                 <td><span>:</span> <?php echo date( "d/m/Y", strtotime($regdate)); ?></td>
                                </tr>
                                <tr>
                                  <td class="col-xs-4 col-sm-4">Bid Start Date-Time</td>
                                 <td><span>:</span> <?php echo date( 'd-m-Y h:i:a', strtotime($bid_start_date));?></td>
                                </tr>
								<tr>
                                  <td class="col-xs-4 col-sm-4">Bid End Date-Time</td>
                                 <td><span>:</span> <?php echo date( 'd-m-Y h:i:a', strtotime($bid_end_date)); ?></td>
                                </tr>
                                <tr>
                                  <td class="col-xs-4 col-sm-4">Farm Area</td>
                                  <td><span>:</span> <?php echo $area; ?></td>
                                </tr>
                                <tr>
                                  <td class="col-xs-4 col-sm-4">Product Size</td>
                                  <td ><span>:</span> <?php echo $size; ?></td>
                                </tr>
                                <tr>
                                  <td class="col-xs-4 col-sm-4">Variety</td>
                                  <td ><span>:</span> <?php echo $variety; ?>  </td>
                                </tr>
                                <tr>
                                  <td class="col-xs-4 col-sm-4">Expected Production</td>
                                  <td><span>:</span>  <?php echo $production; ?>	 </td>
                                </tr>
								<tr>
                                  <td class="col-xs-4 col-sm-4">Latitude</td>
                                  <td><span>:</span>  <?php echo $latitude; ?>	 </td>
                                </tr>
								<tr>
                                  <td class="col-xs-4 col-sm-4">Address</td>
                                  <td><span>:</span>  <?php echo $paddress; ?>	 </td>
                                </tr>
                              </tbody>
                            </table>
                      </div>
                      <div class="col-lg-6">
                        <table class="table table-condensed table-user-information">
                              <tbody>
                                <tr>
                                  <td class="col-xs-4 col-sm-4">Base Rate</td>
                                  <td><span>:</span> <?php echo $base_rate; ?></td>
                                </tr>
								<tr>
                                  <td class="col-xs-4 col-sm-4">Sugar</td>
                                  <td><span>:</span> <?php echo $sugar; ?></td>
                                </tr>
                                <tr>
                                  <td class="col-xs-4 col-sm-4">Farm Registration</td>
                                  <td><span>:</span> <?php echo $farm_reg; ?> </td>
                                </tr>
								<tr>
                                  <td class="col-xs-4 col-sm-4">Residue Free</td>
                                  <td><span>:</span><?php echo $residue_free_check; ?> </td>
                                </tr>
                                <tr>
                                  <td class="col-xs-4 col-sm-4">Residue Check Result</td>
                                  <td><span>:</span><?php echo $residue_result; ?> </td>
                                </tr>
                                <tr>
                                  <td class="col-xs-4 col-sm-4">Global Gap</td>
                                  <td><span>:</span> <?php echo $global_gap; ?></td>
                                </tr>
								<tr>
                                  <td class="col-xs-4 col-sm-4">Longitude</td>
                                  <td><span>:</span> <?php echo $longitude; ?></td>
                                </tr>
								<tr>
                                  <td class="col-xs-4 col-sm-4">Description</td>
                                  <td><span>:</span> <?php echo $pdesc; ?></td>
                                </tr>
                              </tbody>
                            </table>
                      </div>
                    </div>
                    </div>
                  </div>
                </div><hr/>
				<div class="row">
                  <div class='table-responsive' style="padding-bottom:100px;">
				  <?php
				  error_reporting(E_ALL);
				  $sql = "SELECT * FROM bidding bid, seller s, buyer b, product p  WHERE b.bid=bid.bid AND s.sid=p.sid AND p.pid=bid.pid AND p.pid=$pid AND bid.bid_status=1 ORDER BY bid.bid_amt DESC";
				  $result = $conn->query($sql);
				  if ($result->num_rows > 0) {
					  echo "<table class='table table-striped'>
					  <thead>
						<tr>
						  <th>Sr. No</th>
						  <th>Bid Id</th>
						  <th>Seller Name</th>
						  <th>Buyer Id</th>
						  <th>Buyer Name</th>
						  <th>Product</th> 
						  <th>Bidding Date-Time</th> 
						  <th>Amount</th>			  						   		  
					   </tr>
					  </thead>
					  <tbody>";
					  $count=0;
					  $grandtotal=0;
						while($row = $result->fetch_assoc()) {
							$count++;
						echo"<tr>";
						echo "<td>".$count."</td>";
						echo "<td>".$row['bid_id']."</td>";
						echo "<td>".$row['sname']."</td>";
						echo "<td>".$row['bid']."</td>";
						echo "<td>".$row['bname']."</td>";
						echo "<td>".$row['pname']."(".$row['pid'].")</td>";						
						echo "<td>".date( 'd/m/Y g:i:s a', strtotime($row['bid_date']))."</td>";
						echo "<td>".$row['bid_amt']."</td>";
						echo "</tr>";
					 }
					  echo"</tbody>
				  </table>";
					}  
					else {
					 echo "No Bidding Results Found!";
					}					
					?> 
				  </div>				 
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
	<script> 
var myVideo = document.getElementById("video1"); 

function playPause() { 
  if (myVideo.paused) 
    myVideo.play(); 
  else 
    myVideo.pause(); 
} 

function makeBig() { 
    myVideo.width = 560; 
} 

function makeSmall() { 
    myVideo.width = 250; 
} 

function makeNormal() { 
    myVideo.width = 420; 
} 
</script> 

<!--Footer-->
<?php
include('./includes/footer.php');
?>
<div id="back-top" style="display:none;"> <a href="#" class="scroll" data-scroll>
  <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-up"></i></button>
  </a> </div>
  
       <div  id="invoice"  style="border:1px solid #ccc; padding:10px; height:100%; width:590pt; display:none;">
		<div style="text-align:left; border:0px solid #ccc; padding-top:20px; float:left; width:70px;">
            <img src="./images/logo.png" width="160" height="80">
        </div>
        <div style="text-align:center; border:0px solid #ccc; padding-top:20px;  float:center; width:100%;">
            <small>Online Auction System</small><br/>
            <b>Sangam Agro Foods Pvt. Ltd.</b><br/>
			<small>Manchar,Ambegaon, Maharashtra 410503</small><br/>
        </div>       
         <div Style=" clear:both; float:none;"></div>
         <h4 align="center">Product Bidding Details</h4><hr/>
		<div style="text-align:center; border:0px solid #ccc; float:right; width:660px;">
          <table style= 'width:100%; font-size:13px;' border-collapse: collapse; cellspacing='0'>
          <tbody>
			<tr>
              <td colspan="2" style='text-align:left; font-size:15px; font-style:bold; padding: 0px; border-bottom: 1px solid;'><b><?php echo $pname; ?></b></td>
			  <td width="100" style='text-align:left; font-size:15px; font-style:bold; padding: 0px; border-bottom: 1px solid;'><b>Id</b></td>
			  <td  style='text-align:left; font-size:15px; font-style:bold;  padding: 0px; border-bottom: 1px solid;'> <span>:</span> <b><?php echo $pid; ?></b></td>
			</tr>
			<tr>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Added Date</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo date( "d/m/Y", strtotime($regdate)); ?></td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Bid Start Date-Time</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo date( 'd-m-Y h:i:a', strtotime($bid_start_date));?> </td>
			</tr>
			<tr>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Base Rate(Rs)</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $base_rate; ?></td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Bid Start Date-Time</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo date( 'd-m-Y h:i:a', strtotime($bid_end_date)) ;?> </td>
			</tr>
			<tr>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Variety</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $variety; ?> </td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Expected Production</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $production; ?> </td>
            </tr>
            <tr>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Latitude</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $latitude; ?> </td>
			  <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Longitude</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $longitude; ?> </td>              
            </tr>
			<tr>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Sugar</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $sugar; ?> </td>
			  <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Farm Registration</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $farm_reg; ?> </td>
              
            </tr> 
			<tr>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Residue Free</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $residue_free_check; ?> </td>
			  <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Residue Result</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $residue_result; ?> </td>
              
            </tr> 
			<tr>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Global Gap</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $global_gap; ?> </td>
			  <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Address</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $paddress; ?> </td>
              
            </tr> 
			<tr>              
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Description</td>
              <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'><span>:</span> <?php echo $pdesc; ?></td>
            </tr>			
        </tbody>
      </table>
	  </div>
	  	  <div Style=" clear:both; float:none;"></div>
         <h4 align="center">Bidding Details</h4><hr/>
		<div style="text-align:center; border:0px solid #ccc; float:right; width:660px;">
          <?php
			$sql = "SELECT * FROM bidding bid, seller s, buyer b, product p  WHERE b.bid=bid.bid AND s.sid=p.sid AND p.pid=bid.pid AND p.pid=$pid AND bid.bid_status=1 ORDER BY bid.bid_amt DESC";
			  $result = $conn->query($sql);
			  if ($result->num_rows > 0) {
          echo"<table style= 'width:100%; font-size:10px;' border-collapse: collapse; cellspacing='0'>
		  <thead>
			<tr>
			  <th style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Sr.No</th>
			  <th style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Bid Id</th>
			  <th style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Seller Name</th>
			  <th style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Buyer Id</th>
			  <th style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Buyer Name</th>
			  <th style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Product</th>
			  <th style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Bid Date-Time</th>
			  <th style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>Amount</th> 									  			   
		   </tr>
		  </thead>
          <tbody>";
		  $count=0;
			while($row = $result->fetch_assoc()) {
				$count++;
				echo"<tr>
				  <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>".$count."</td>
				  <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>".$row['bid_id']."</td>
				  <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>".$row['sname']."</td>
				  <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>".$row['bid']."</td>
				  <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>".$row['bname']."</td>
				  <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>".$row['pname']."(".$row['pid'].")</td>
				  <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>".date( 'd/m/Y g:i:s a', strtotime($row['bid_date']))."</td>
				  <td style='text-align:left;  padding: 3px; border-bottom: 1px solid;'>".$row['bid_amt']."</td>
				</tr>";
			}
          echo"</tbody>
			  </table>";
			  }
			  else{
				  echo "No Bidding Details Found!";
			  }
			  $conn->close();
			?>
	  </div>
	   <div style="text-align:center; border:0px solid #ccc; padding-top:50px;  float:left; width:150px;">
            <p>Date:</p>
        </div>
		<div style="text-align:center; border:0px solid #ccc; padding-top:50px;  float:right; width:150px;">
            <p>Stamp & Signature</p>
        </div>
</div> <!--Close Invoice--> 
  </body>
</html>
