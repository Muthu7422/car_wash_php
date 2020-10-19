<?php
include("../../includes.php");

if(!empty($_POST["country_id"])) {
	//$_SESSION['item']=$_POST["country_id"];
 $query ="SELECT * FROM m_service_type WHERE v_type = '" . $_POST["country_id"] . "' and status='Active'";  
 $results = mysqli_query($conn,$query);
 
   
?>
 <option>--Select Service--</option>
<?php


 while($list=mysqli_fetch_array($results)) 
 {
 /***
  $dcm="select * from a_customer where cust_name='".trim($list['sname'])."'"; 
 $edm=mysqli_query($dcm);
 $emp=mysqli_fetch_array($edm);
 ***/
	 
?>
 

    <option value="<?php echo $list["stype"]; ?>"><?php echo $list["stype"]; ?></option>
<?php
 }
}
?>