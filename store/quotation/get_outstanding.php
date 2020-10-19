<?php
//session_start();
include("../../includes.php");
include("../../redirect.php"); 
  
	   $echeck="select * from cust_outstanding where id='".$_POST['inputs']."'"; 
       $echk=mysqli_query($conn,$echeck);
       $ecount=mysqli_fetch_array($echk); 
      //echo $echeck;
	 $sout=$ecount['total_outstanding'];
	  $lid=$ecount['LedgerId'];
	   $GstNo=$ecount['GstNo'];
	 // $_SESSION['os']=$sout;
       echo json_encode(array($sout,$lid,$GstNo));
	  
	  
?>