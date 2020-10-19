<?php
session_start();
include("../../includes.php");

if(!empty($_POST["country_id"])) {
	//$_SESSION['item']=$_POST["country_id"];
 $query ="SELECT * FROM m_spare_brand WHERE supplier = '" . $_POST["country_id"] . "' and status='Active'"; 
 $results = mysqli_query($conn,$query);
 
   
?>
  <option value="">Select Spare</option>
<?php

 
 while($list=mysqli_fetch_array($results)) {
 
 $dcm="select * from m_spare_brand where sid='".$list['sid']."' ";
 $edm=mysqli_query($conn,$dcm);
 $emp=mysqli_fetch_array($edm);
	 
?>
 
 
    <option value="<?php echo $list["sid"]; ?>"><?php echo $emp["sbrand"]; ?></option>
<?php
 }
}


?>