<?php
$str=md5(microtime());
$str=substr($str,0,6);
session_start();
$_SESSION['cap_code']=$str;

$img=imagecreate(100,50);
imagecolorallocate($img,255,255,255);
$txtcol=imagecolorallocate($img,0,0,0);
imagestring($img,20,5,5,$str,$txtcol);
header('Content:image/jpeg');
imagejpeg($img);



/*
create_image(); 
exit(); 

function create_image() { 
    //Let's generate a totally random string using md5 
    $md5_hash = md5(rand(0,999)); 
    //We don't need a 32 character long string so we trim it down to 5 
    $security_code = substr($md5_hash, 15, 5); 

    //Set the session to store the security code
    $_SESSION["security_code"] = $security_code;

    //Set the image width and height 
    $width = 100; 
    $height = 20;  

    //Create the image resource 
    $image = ImageCreate($width, $height);  

    //We are making three colors, white, black and gray 
    $white = ImageColorAllocate($image, 255, 255, 255); 
    $black = ImageColorAllocate($image, 0, 0, 0); 
    $grey = ImageColorAllocate($image, 204, 204, 204); 

    //Make the background black 
    ImageFill($image, 0, 0, $black); 

    //Add randomly generated string in white to the image
    ImageString($image, 3, 30, 3, $security_code, $white); 

    //Throw in some lines to make it a little bit harder for any bots to break 
    ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
    imageline($image, 0, $height/3, $width, $height/2, $grey); 
    imageline($image, $width/2, 0, $width/2, $height, $grey); 

    //Tell the browser what kind of file is come in 
    header("Content-Type: image/jpeg"); 

    //Output the newly created image in jpeg format 
    ImageJpeg($image); 

    //Free up resources
    ImageDestroy($image); 
}*/
?>