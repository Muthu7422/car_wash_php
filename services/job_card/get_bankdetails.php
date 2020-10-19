<?php
include("../../includes.php");
include("../../redirect.php");
  
	    $echeck="select * from a_bank_acc where Id='".$_POST['inputs']."' and Status='Active'"; 
        $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 

      
	   $BankId= $ecount['Id'];
	   $Ledger=$ecount['LedgerId']; 
       echo json_encode(array($BankId,$Ledger));
?>	  


