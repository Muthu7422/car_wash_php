<?php
include("../../includes.php");
  
			$Spm="select * from a_customer where id='".$_POST['inputs']."'";
			$Sdm=mysqli_query($conn,$Spm);
			$Sqm=mysqli_fetch_array($Sdm);
			$out=$Sqm['cus_out_amt'];
			$lid=$Sqm['LedgerId'];
			echo json_encode(array($lid,$out));

?>	  


