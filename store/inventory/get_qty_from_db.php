<?php
include("../../includes.php");
include("../../redirect.php");   
  
	   $echeck="select IFNULL(StockQuantity,0) as StockQuantity from item_stock where ItemId='".$_POST['inputs']."' and FranchiseeId='".$_POST['inputs2']."'"; 
       $echk=mysqli_query($conn,$echeck);
        $ecount=mysqli_fetch_array($echk); 
      if($ecount['StockQuantity']=='')
	  {
		  echo '0';
	  }
	  else
	  {
	   echo $ecount['StockQuantity'];
	  }
      
?>	  


