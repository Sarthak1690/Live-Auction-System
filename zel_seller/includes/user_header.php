<?php ob_start(); ?>

 <?php
$login_session="" ;
 $url="";
 $status="";
 include('./php_action/lock.php');
?>
<?php ob_end_flush(); ?> 

<?php if($login_session)  
        {   
            $status="Welcome ".$login_session; 
            $url="./profile.php";
            $url1="./php_action/logout.php";
            $status1="Logout";  
        }
        else
        { 
            $status="Welcome Guest"; 
            $url1="./login.php";
			$url="./register.php";
            $status1="Login"; 
         }
          
?>
	
<script type="text/javascript" src="assets/js/activemenu.js"></script>	
<section class="top-header">

  <div class="container">

    <div class="row" style="margin-top:3%;">

      <!--<div class="col-lg-6">Welcome Guest</div>
      <div class="col-lg-6">
	          <div class="top-sub-navbar">
          <ul class="top-menus">
           <li><a href="profile.php">My Profile</a></li>
            <li><a href="matches.php">Matches</a> </li>
            <li><a href="inbox.php">Mail</a></li>
          </ul>
        </div>
		      </div>-->
    </div>
	
  </div>

</section>
 
<!--Top Navigation-->
<nav class="navbar navbar-default navbar-fixed-top">

  <div class="container">
    
	<div class="navbar-header">
	<a href="index.php"><img src="images/responsive-matrimony.png" class="hidden-lg hidden-md hidden-sm" width="270" height="55" border="0" class="hidden-xs" /></a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
	  <img src="images/moblogo.png" width="270" height="55" border="0" class="hidden-xs" />
	 </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
       <li ><a href="../index.php" class="btn rose-btn">Back To Website</a></li>
       <li ><a href="./download.php" class="btn rose-btn">Downloads</a></li>
		<li ><a href="<?php echo  $url; ?>" class="btn rose-btn"><?php echo $status; ?></a></li>
        <li  class="login-top-menu"><a class="btn rose-btn" href="<?php echo  $url1; ?>"><?php echo $status1; ?></a></li>		 
      </ul>
    </div>
  </div>
</nav>
<section class="top-header" style="margin-bottom:-3px; ">
  <div class="container">
    <div class="row" style="margin-top:1%; ">
    </div>
  </div>
</section>