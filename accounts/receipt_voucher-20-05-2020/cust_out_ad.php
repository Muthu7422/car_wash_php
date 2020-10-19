<?php
include("../../dbinfoi.php");    
  
	   $echeck="select * from cust_outstanding where cust_name='".$_POST['inputs']."' order by id desc"; 
       $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
      
	   echo $ecount['ad_amount'];
      
?>	  


