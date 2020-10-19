<?php
include("../../includes.php");
include("../../redirect.php");
  
	  $echeck="select * from sup_outstanding where cust_name='".$_POST['inputs']."' order by id desc";  
       $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
     // echo $echeck;
	   echo $ecount['total_outstanding'];
      
?>	  


