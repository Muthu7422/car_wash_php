<?php
include("../../includes.php");
  
	    $echeck="select * from s_job_card where job_card_no='".$_POST['inputs']."'"; 
       $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk);
			
			$Spm="select * from a_customer where cust_name='".trim($ecount['sname'])."'";
			$Sdm=mysqli_query($conn,$Spm);
			$Sqm=mysqli_fetch_array($Sdm);

		echo $Sqm['cus_out_amt'];
?>	  


