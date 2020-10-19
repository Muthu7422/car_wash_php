<?php
include("../../includes.php");
include("../../redirect.php");   
  
	   $echeck="select * from m_service_type where id='".$_POST['inputs']."' and status='Active'"; 
       $echk=mysql_query($echeck);
       $ecount=mysql_fetch_array($echk); 
      
	   echo $ecount['installation_amt'];
      
?>	  


