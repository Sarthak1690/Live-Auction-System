<?php
include('./conn.php');
include('./lock.php');
include('./getprofile.php');
$error="";
$show="display:none;";
$alert="alert alert-danger";

if (isset($_POST['del_photo'])){

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if($gender=="Male"){
			  $localimgpath="./uploads/profile_photo/avatar_male.png";
			  }
			  else{
				$localimgpath="./uploads/profile_photo/avatar_female.png";
			  }
			  $sqlphoto="UPDATE photo SET imgpath='$localimgpath', update_date=@now := now(), photo_status=0 WHERE euser_id=$user_id";
			  if($conn->query($sqlphoto)=== TRUE) {
				$error="Profile Photo Removed!";
				$show="display:show;";
				$alert="alert alert-success";
				header("Location:../edit-profile.php?error=$error&show=$show&alert=$alert");
			  }
}
}


if (isset($_POST['submitphoto'])){

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
$uidsend=$user_id;
//********************************************************************************************************
if(!isset($_FILES['userfile']))
{
    //echo '<p>Please select a file</p>';
	$error="Please Select File To Upload!";
    $show="display:show;";
    $alert="alert alert-danger";
	header("Location:../edit-profile.php?error=$error&show=$show&alert=$alert");
}
else
{
    try {
    $msg= upload($uidsend);  //this will upload your image
    $error=$msg;
    $show="display:show;";
    $alert="alert alert-success";
	header("Location:../edit-profile.php?error=$error&show=$show&alert=$alert");
    //echo $msg;  //Message showing success or failure.
    }
    catch(Exception $e) {
    echo $e->getMessage();
    //echo 'Sorry, could not upload file';
    $error="Sorry, could not upload file";
    $show="display:show;";
    $alert="alert alert-danger";
	header("Location:../edit-profile.php?error=$error&show=$show&alert=$alert");
    }
}
}
}

//***********************************************************************************************************

function upload($uidsend) {
    //include "file_constants.php";
   $msg=null;
     $privacy = test_input($_POST["view_status"]);
    
    // $img = test_input($_POST["fileToUpload"]);
    
     //$currdate= date("Y-m-d"); 
     $status=1;
     $uid=$uidsend;


    //$maxsize = 10000000; //set to approx 10 MB
    $maxsize = 300000; //set to approx 300 KB

    //check associated error code
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    

            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize) {  
  
               //checks whether uploaded file is of image type
              //if(strpos(mime_content_type($_FILES['userfile']['tmp_name']),"image")===0) {
                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    

                    // prepare the image for insertion in database
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
					// coding for save image in directory
					//move_uploaded_file($_FILES['userfile']['tmp_name'],"uploads/".$_FILES['userfile']['name']);
					
					include('./lock.php');
	  
					$temp = explode(".", $_FILES["userfile"]["name"]);
					//$newfilename = round(microtime(true)) . '.' . end($temp);
					$newfilename = $user_id."_".date("Ymdhis").'.' . end($temp);
					//$newfilename = $user_id."_".date("Ymdhis").'.' . end($temp);
					//move_uploaded_file($_FILES["userfile"]["tmp_name"], "../img/imageDirectory/" . $newfilename);
					//$destination_path = getcwd().DIRECTORY_SEPARATOR;
					//$target_path = $destination_path . basename( $_FILES["userfile"]["name"]);
					//move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path);
					move_uploaded_file($_FILES["userfile"]["tmp_name"],"../uploads/profile_photo/".$newfilename);
					
					
					
                    // put the image in the db...
                    // database connection
                    //mysql_connect($host, $user, $pass) OR DIE (mysql_error());

                    // select the db
                    //mysql_select_db ($db) OR DIE ("Unable to select db".mysql_error());
                 
					$imgpath="./uploads/profile_photo/".$newfilename;
					
                    // our sql query
					$sql = "UPDATE photo SET imgpath='$imgpath', privacy='$privacy', update_date=@now := now(), photo_status='$status' WHERE euser_id=$user_id";
                    //$sql = "INSERT INTO photo (imgpath, privacy, updatedate, status, euser_id) VALUES ( '$imgpath','$privacy', @now := now(), '$status', $user_id)";
					include('./conn.php');
                    // insert the image
                    if($conn->query($sql)===TRUE){
                    //mysql_query($sql) or die("Error in Query: " . mysql_error());
                    $msg='<p>Profile Picture Is Updated successfully !</p>';
                    }
                  
                }
                else
                    $msg="<p>Uploaded file is not an image.</p>";
            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='File exceeds the Maximum File limit, Maximum File limit is '.$maxsize.' bytes, File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].' bytes';
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

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>