<?php
//session_start();
include("../../includes.php");
include("../../redirect.php"); 
  
	   $echeck="select * from m_supplier where sid='".$_POST['inputs']."'"; 
       $echk=mysqli_query($conn,$echeck);
       $ecount=mysqli_fetch_array($echk); 
      //echo $echeck;
	 $sout=$ecount['opening_balance'];
	 $gst=$ecount['GstNo'];
	 
	 // $_SESSION['os']=$sout;
       echo json_encode(array($sout,$gst));
	  
	  
?>