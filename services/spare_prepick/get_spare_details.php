<?php
include("../../includes.php");
include("../../redirect.php");   
  
       $_POST['inputs'];
	   $ip=explode("/",$_POST['inputs']);
	
	   $echeck="select * from m_spare where sid='".trim(end($ip))."' and status='Active'"; 
       $echk=mysql_query($echeck);
       $ecount=mysql_fetch_array($echk);

       $tamnt=number_format(($ecount['smrp']-(100/(100+$ecount['TaxRate']))*$ecount['smrp']),2);   
     // $BankId= $ecount['Id'];
	 // $Ledger=$ecount['LedgerId']; 
      echo json_encode(array($ecount['sid'],$ecount['sname'],$ecount['spartno'],$ecount['hsn'],$ecount['TaxRate'],$ecount['rate'],$ecount['smrp'],$tamnt,$ecount['mrp']));
      
?>	  


