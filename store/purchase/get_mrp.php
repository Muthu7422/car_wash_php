<?php
include("../../includes.php");
include("../../redirect.php");   
  
	   $echeck="select * from m_spare where sid='".$_POST['inputs']."' and status='Active'"; 
       $echk=mysql_query($echeck);
       $ecount=mysql_fetch_array($echk); 
      
	   $ecount['smrp'];
      
?>	  


