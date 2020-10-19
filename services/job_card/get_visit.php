<?php
include("../../includes.php");
  	$echeck="select count(id) as nov from  a_final_bill where cvehile='".$_POST['inputs']."'"; 
	$echk=mysqli_query($conn,$echeck);
    $ecount=mysqli_fetch_array($echk); 
    
	echo $ecount['nov'];
      
?>	  


