<?php
include('conn.php');
if(isset($_POST["action"]))
{
 $output = '';
 if($_POST["action"] == "cat")
 {
  //$query = "SELECT * FROM cources WHERE country = '".$_POST["query"]."' GROUP BY state";
  $query = "SELECT cource_id, cource_name from catagory cat, cources c WHERE cat.cat_id='".$_POST["query"]."' AND cat.cat_id=c.cat_id AND c.status=1 order by c.cource_id asc";
  $result = $conn->query($query);
  $output .= '<option value="">Select Cource</option>';
  while($row = $result->fetch_assoc())
  {
   $output .= '<option value="'.$row["cource_id"].'">'.$row["cource_name"].'</option>';
  }
 }
 if($_POST["action"] == "cource")
 {
  //$query = "SELECT city FROM country_state_city WHERE state = '".$_POST["query"]."'";
  $query = "SELECT c.cource_name, s.sub_id, s.sub_name, s.sub_cat FROM subjects s, cources c WHERE c.cource_id='".$_POST["query"]."' AND c.cource_id=s.cource_id AND s.sub_status=1 order by s.sub_cat ASC";
  $result = $conn->query($query);
  $output .= '';
  $cource='';
  while($row = $result->fetch_assoc())
  {
	  $subcat=$row["sub_cat"];
	  $cource=$row["cource_name"];
	  if($subcat=='Compulsory'){
   $output .= '<input type="checkbox" checked name="subject[]" value="'.$row["sub_id"].'" onclick="return false"/>'.$row["sub_name"].' ('.$row["sub_cat"].')</br>';
	  }
	  else{
		  $output .= '<input type="checkbox" name="subject[]" value="'.$row["sub_id"].'">'.$row["sub_name"].' ('.$row["sub_cat"].')</br>';
	  }
  }
 }
 echo "<b>".$cource."</b><br/>";
 echo $output;
 
}
?>