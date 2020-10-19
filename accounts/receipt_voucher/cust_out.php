<?php
include("../../dbinfoi.php"); 
include("../../includes.php");
include("../../redirect.php");   
  
	     $echeck="select sum(balance_amt) as totao_outstanding_amount from cust_outstanding where cust_name='".$_POST['inputs']."' order by id desc"; 
       $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
      
	   echo $ecount['totao_outstanding_amount'];
      
?>	  


