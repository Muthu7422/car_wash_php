<?php
include("dbinfo.php");     
  
	   $echeck="select sum(total) as tot from s_purchase where supplier_name='".$_POST['inputs']."' and status='Active'"; 
       $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
		
		$echeck1="select * from m_supplier where sid='".$_POST['inputs']."' and status='Active'"; 
       $echk1=mysqli_query($conn,$echeck1);
        $ecount1=mysqli_fetch_array($echk1); 
      
	   $tot= $ecount['tot'];
	   $sname=$ecount1['LedgerId'];
      echo json_encode(array($tot,$sname));
?>	  


