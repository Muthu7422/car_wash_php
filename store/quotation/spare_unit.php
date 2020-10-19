<?php
session_start();
include("../../includes.php");

if(!empty($_POST["country_id"])) {
	//$_SESSION['item']=$_POST["country_id"];
 $query ="SELECT * FROM m_spare WHERE sid = '" . $_POST["country_id"] . "' and status='Active'";
 $results = mysqli_query($conn,$query);
 
   
?>
<?php

 
 while($list=mysqli_fetch_array($results)) 
 {
 
					$ssc="select * from m_unit_master where status='Active' and id='".$list["units"]."'";
				  $Essc=mysqli_query($conn,$ssc);
				  $FEssc=mysqli_fetch_array($Essc);
	 
?>
 
    <option value="<?php echo $FEssc["id"]; ?>"><?php echo $FEssc["u_name"]; ?></option>
<?php
 }
}


?>