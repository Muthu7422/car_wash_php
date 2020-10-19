<?php
include("../../includes.php");    
  
	     $echeck="select * from a_customer where mobile1='".$_POST['inputs']."' and status='Active' and FrachiseeId='".$_SESSION['BranchId']."'";  
         $echk=mysqli_query($conn,$echeck);
         $ecount=mysqli_fetch_array($echk); 
		
		$d="select * from reference_scheme";
		$ds=mysqli_query($conn,$d);
		$dsz=mysqli_fetch_array($ds);
		
      $total=$ecount['cust_name'];
	  $dicount=$dsz['ReferenceAmount'];
	  $dicount1=$dsz['ReferenceAmount'];
	  
      
	   echo json_encode(array($total, $dicount,$dicount1));
?>	  


