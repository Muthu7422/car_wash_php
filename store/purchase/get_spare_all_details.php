<?php
include("../../includes.php");
include("../../redirect.php"); 
  
	   $echeck="select * from m_spare where sid='".$_POST['inputs']."'"; 
       $echk=mysql_query($echeck);
       $ecount=mysql_fetch_array($echk); 
      //echo $echeck;
	   $sno=$ecount['spartno'];
	   $srate=$ecount['smrp'];
	   echo json_encode(array($sno,$srate));
	  
	  //echo $ecount['spartno'];
      
?>