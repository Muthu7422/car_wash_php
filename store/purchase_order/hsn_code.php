<?php
//session_start();
include("../../includes.php");

if(!empty($_POST["country_id"])) {
	//$_SESSION['item']=$_POST["country_id"];
 $query ="SELECT * FROM m_spare WHERE sid = '" . $_POST["country_id"] . "' and status='Active'";
 $results = mysqli_query($conn,$query);
 
   
?>
<?php

 
 while($list=mysqli_fetch_array($results)) {
 
 
	 
?>
 
    <option value="<?php echo $list["hsn_code"]; ?>"><?php echo $list["hsn_code"]; ?></option>
<?php
 }
}


?>