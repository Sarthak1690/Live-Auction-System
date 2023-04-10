<?php
session_start();
if(session_destroy())
{
header("Location:../login.php");
}
if(isset($_COOKIE["zel_luzel"]))   
{   
setcookie("zel_luzel", "", time() - 3600); 
}  
if(isset($_COOKIE["zel_lpzel"]))   
{  
 setcookie("zel_lpzel", "", time() - 3600);
} 
?>