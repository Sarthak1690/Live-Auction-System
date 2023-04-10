<?php
include('./php_action/conn.php');
include('./php_action/lock.php');
header("Refresh: 10");
$error="";
$show="display:none;";
$alert="";
	$sqlcnt="SELECT COUNT(*)AS count FROM product WHERE status=1";
	  $resultcnt = $conn->query($sqlcnt);
      if ($resultcnt->num_rows > 0){
        while($rowcnt = $resultcnt->fetch_assoc()) {
		$count = $rowcnt['count'];
		}
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
<script type="text/javascript" src="./sss.js"></script>

<title>Pending Products</title>

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


</head>
<!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 
<body id="matches">
<?php
include('./includes/user_header.php');
?>
 



<script type="text/javascript">
function user_request(str,iid)
{ 

var xmlhttp;
if (str.length==0)
  {
  
  document.getElementById("req"+iid).innerHTML="";
  return;
  }
 // document.getElementById('progress'+iid).style.display='block';
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("req"+iid).innerHTML=xmlhttp.responseText;
	// document.getElementById('progress'+iid).style.display='none';
    }
  }
xmlhttp.open("GET","ajax_req.php?q="+str,true);
xmlhttp.send();
	
}

</script>
<script type="text/javascript">
function user_shortlist(str,iid)
{ 

var xmlhttp;
if (str.length==0)
  {
  
  document.getElementById("short"+iid).innerHTML="";
  return;
  }
  //document.getElementById('progress'+iid).style.display='block';
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("short"+iid).innerHTML=xmlhttp.responseText;
	// document.getElementById('progress'+iid).style.display='none';
    }
  }
xmlhttp.open("GET","ajax_short.php?q="+str,true);
xmlhttp.send();
	
}
</script>
<script type="text/javascript">
		function validation(){
			var bid_amt = document.getElementById('bid_amt').value;
			if(bid_amt == ""){
				document.getElementById('bid_amtalert').innerHTML ="Please fill Bid Amount";
				return false;
			}
			if(isNaN(bid_amt)){
				document.getElementById('bid_amtalert').innerHTML ="Must write digits only";
				return false;
			}			
		}
	</script>
<!-- Inner Page Full Width -->

<section class="full-width-inner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="page-title remove-top-padding">Pending Products</h2>
        <div class="row">
          
<?php
include('./includes/sidebar.php');
?>         
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
				   <div class="<?php echo $alert; ?>" role="alert" style="<?php echo $show; ?>"><?php echo $error; ?></div>
         <div class="panel panel-info light-pink">
              <div class="panel-heading">
                <h3 class="panel-title">
				<span class="badge pull-right"><?php echo $count; ?></span>Bidding Products</h3>
              </div>
              <div class="panel-body remove-padding remove-border">
<?php
$sqlcnt = "SELECT * FROM product WHERE status=1";
$resultcnt = $conn->query($sqlcnt);
$rows = $resultcnt->num_rows;
$page_rows = 10;
$last = ceil($rows/$page_rows);
if($last < 1){
  $last = 1;
}
$pagenum = 1;
if(isset($_GET['pn'])){
  $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
$sql = "SELECT * FROM product p WHERE p.status=1  ORDER BY p.pid DESC $limit";
$query = $conn->query($sql);
$paginationCtrls = "";
if($last != 1){
  if ($pagenum > 1) {
        $previous = $pagenum - 1;
    $paginationCtrls .= "<li><a href='".$_SERVER['PHP_SELF']."?pn=".$previous."'>&laquo; Previous</a></li>";
    for($i = $pagenum-4; $i < $pagenum; $i++){
      if($i > 0){
            $paginationCtrls .= "<li><a href='".$_SERVER['PHP_SELF']."?pn=".$i."'>".$i."</a></li>";
      }
      }
    }
  $paginationCtrls .= "<li class='active'><a href='".$_SERVER['PHP_SELF']."?pn=".$pagenum."'>".$pagenum."</a></li>";
  for($i = $pagenum+1; $i <= $last; $i++){
    $paginationCtrls .= "<li ><a href='".$_SERVER['PHP_SELF']."?pn=".$i."'>".$i."</a></li>";
    if($i >= $pagenum+4){
      break;
    }
  }
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= " <li class='next'><a href='".$_SERVER['PHP_SELF']."?pn=".$next."'>Next &raquo;</a></li> ";
    }
}
				echo"<div class='row'>
                  <div class='hidden-xs hidden-sm col-md-2 col-lg-2'>
				  </div>
                  <div class='col-md-12 col-lg-12'>
                   <ul class='pagination remove-margin-pagination pull-right' id='pagination-flickr'>". $paginationCtrls."</ul> </div>
                </div>";


				$result = $conn->query($sql);
				  if ($result->num_rows > 0){
					while($row = $result->fetch_assoc()) {
						$currdate=date("Y/m/d");
						$bdate = $row["regdate"];
						$diff = abs(strtotime($currdate) - strtotime($bdate));
						$years = floor($diff / (365*60*60*24));
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
						
			    echo"<article class='profile-search-result'>
                  <div class='profile-search-list-box'>
                    <div class='row'>
                      <div class='col-sm-4 col-md-4 col-lg-4'> 
					  <div>
					  <video id='video1' width='250' controls>
						<source src='../zel_seller/".$row['vdopath']."' type='video/mp4'>
						<source src='../zel_seller/".$row['vdopath']."' type='video/ogg'>
						Your browser does not support HTML video.
					  </video>
					  </div>
					  <!--
						  <button onclick='playPause()'>Play/Pause</button> 
						  <button onclick='makeBig()'>Big</button>
						  <button onclick='makeSmall()'>Small</button>
						  <button onclick='makeNormal()'>Normal</button>
					  -->
					  <br/>";
						$sqlmax="SELECT MAX(bid_amt) AS highest_amount FROM bidding WHERE pid=".$row['pid']." AND bid_status=1";
						$resultmax = $conn->query($sqlmax);
						$highest_amount=0;
						if ($resultmax->num_rows > 0){
							while($rowmax = $resultmax->fetch_assoc()) {
							$highest_amount = $rowmax['highest_amount'];
							}
						}						
					  echo"<button class='btn btn-success'>Highest Bid Amount: <b>Rs. ".$highest_amount."</b></button><hr/><br/>
							
					  </div>
					  <div class='col-sm-8 col-md-8 col-lg-8'>
                        <p class='profile-user-name'><a href='/view-profile.php?pid=".$row['pid']."'>".$row['pname']." ".$row['variety']."</a> <span class='profile-user-id'>".$row['pid']."</span></p>
                        <div class='row'>
                          <div class='col-sm-6 col-md-6 col-lg-6'>
                            <table class='table table-condensed table-user-information'>
                              <tbody>
                                <tr>
                                  <td class='col-xs-4 col-sm-4'>Added Date</td>
                                 <td><span>:</span> ".date( 'd/m/Y', strtotime($row['regdate']))."</td>
                                </tr>
                                <tr>
                                  <td class='col-xs-4 col-sm-4'>Bid Start Date-Time</td>
                                 <td><span>:</span> ".date( 'd-m-Y h:i:a', strtotime($row['bid_start_date']))."</td>
                                </tr>
								<tr>
                                  <td class='col-xs-4 col-sm-4'>Bid End Date-Time</td>
                                 <td><span>:</span> ".date( 'd-m-Y h:i:a', strtotime($row['bid_end_date']))."</td>
                                </tr>
                                <tr>
                                  <td class='col-xs-4 col-sm-4'>Farm Area</td>
                                  <td><span>:</span> ".$row['area']."</td>
                                </tr>
                                <tr>
                                  <td class='col-xs-4 col-sm-4'>Product Size</td>
                                  <td ><span>:</span> ".$row['size']."</td>
                                </tr>
                                <tr>
                                  <td class='col-xs-4 col-sm-4'>Variety</td>
                                  <td ><span>:</span> ".$row['variety']."  </td>
                                </tr>
                                <tr>
                                  <td class='col-xs-4 col-sm-4'>Expected Production</td>
                                  <td><span>:</span>  ".$row['production']."	 </td>
                                </tr>
								<tr>
                                  <td class='col-xs-4 col-sm-4'>Latitude</td>
                                  <td><span>:</span>  ".$row['latitude']."	 </td>
                                </tr>
								<tr>
                                  <td class='col-xs-4 col-sm-4'>Longitude</td>
                                  <td><span>:</span> ".$row['longitude']."</td>
                                </tr>								
                              </tbody>
                            </table>
                          </div>
                          <div class='hidden-xs col-sm-6 col-md-6 col-lg-6'>
                            <table class='table table-condensed table-user-information'>
                              <tbody>
                                <tr>
                                  <td class='col-xs-4 col-sm-4'>Base Rate</td>
                                  <td><span>:</span> ".$row['base_rate']."</td>
                                </tr>
								<tr>
                                  <td class='col-xs-4 col-sm-4'>Sugar</td>
                                  <td><span>:</span> ".$row['sugar']."</td>
                                </tr>
                                <tr>
                                  <td class='col-xs-4 col-sm-4'>Farm Registration</td>
                                  <td><span>:</span> ".$row['farm_reg']." </td>
                                </tr>
								<tr>
                                  <td class='col-xs-4 col-sm-4'>Residue Free</td>
                                  <td><span>:</span>".$row['residue_free_check']." </td>
                                </tr>
                                <tr>
                                  <td class='col-xs-4 col-sm-4'>Residue Check Result</td>
                                  <td><span>:</span>".$row['residue_result']." </td>
                                </tr>
                                <tr>
                                  <td class='col-xs-4 col-sm-4'>Global Gap</td>
                                  <td><span>:</span> ".$row['global_gap']."</td>
                                </tr>
								<tr>
                                  <td class='col-xs-4 col-sm-4'>Address</td>
                                  <td><span>:</span>  ".$row['paddress']."	 </td>
                                </tr>
								<tr>
                                  <td class='col-xs-4 col-sm-4'>Description</td>
                                  <td><span>:</span> ".$row['pdesc']."</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                       
                      </div>
                    </div>";
                   echo" <div class='row top-border'>
                      <div class='col-md-12'>
                        <div class='btn-group btn-group-md profile-group-btn'>                          
                          <a href='view-product.php?pid=".$row['pid']."' type='button' class='btn btn-default pink2-btn btn-on'><i class='fa fa-eye'></i>View</a>
                          <a href='edit-product.php?pid=".$row['pid']."' type='button' class='btn btn-default pink2-btn btn-on'><i class='fa fa-pencil'></i>Edit</a>
						  <button onclick='delete_product(".$row['pid'].")' class='btn btn-default pink2-btn btn-on'><i class='fa fa-trash-o'></i>Delete</button>	
						  <a href='view-bidding.php?pid=".$row['pid']."' type='button' class='btn btn-default pink2-btn btn-on'><i class='fa fa-thumbs-up'></i>Bid Details</a>						  
						</div>
                      </div>
                    </div>
                  </div>
                </article>";
			}
		}
	
				echo"<div class='row'>
                  <div class='hidden-xs hidden-sm col-md-2 col-lg-2'>
				  </div>
                  <div class='col-md-12 col-lg-12'>
                   <ul class='pagination remove-margin-pagination pull-right' id='pagination-flickr'>". $paginationCtrls."</ul> </div>
                </div>";
    ?>
                 
                <div class="row">
                  <div class="hidden-xs hidden-sm col-md-2 col-lg-2 ">
                    <!--select id="minAge" name="minAge" class="form-control">
                      <option value="19" elected="">10</option>
                      <option value="20">50</option>
                      <option value="21">All</option>
                    </select-->
                  </div>
                  <div class="col-md-10 col-lg-10">
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
