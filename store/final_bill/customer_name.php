<?php
include("../../includes.php");

if(!empty($_POST["country_id"])) {
	//$_SESSION['item']=$_POST["country_id"];
 $query ="SELECT * FROM s_job_card WHERE job_card_no = '" . $_POST["country_id"] . "' and status='Active'";  
 $results = mysqli_query($conn,$query);
 
   
?>
<?php

 
 while($list=mysqli_fetch_array($results)) 
 {
 
  $dcm="select * from a_customer where cust_name='".trim($list['sname'])."'"; 
 $edm=mysqli_query($conn,$dcm);
 $emp=mysqli_fetch_array($edm);
	 
?>
 
 
    <option value="<?php echo $emp["id"]; ?>"><?php echo $emp["cust_name"]; ?></option>
<?php
 }
}
?>