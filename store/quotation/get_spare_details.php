<?php
include("../../includes.php");
include("../../redirect.php");   
  
       $_POST['inputs'];
	   $ip=explode("/",$_POST['inputs']);
	
	   $echeck="select * from m_spare where sid='".trim(end($ip))."' and status='Active'"; 
       $echk=mysqli_query($conn,$echeck);
       $ecount=mysqli_fetch_array($echk);
	   
	   $echeck1="select * from m_unit_master where id='".$ecount['units']."' and status='Active'"; 
       $echk1=mysqli_query($conn,$echeck1);
       $ecount1=mysqli_fetch_array($echk1);

		   $echeck2="select * from m_spare_brand where sid='".$ecount['sbrand']."' and status='Active'"; 
           $echk2=mysqli_query($conn,$echeck2);
       $ecount2=mysqli_fetch_array($echk2);
	   
       $tamnt=number_format(($ecount['smrp']-(100/(100+$ecount['TaxRate']))*$ecount['smrp']),2);   
     // $BankId= $ecount['Id'];
	 // $Ledger=$ecount['LedgerId']; 
      echo json_encode(array($ecount['sid'],$ecount['sname'],$ecount['spartno'],$ecount['hsn_code'],$ecount['TaxRate'],$ecount['smrp'],$tamnt,$ecount1['u_name'],$ecount2['sbrand'],$ecount['sbrand'],$ecount['units']));
      
?>	  


