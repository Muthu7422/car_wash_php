<?php

include("../../includes.php");  


 $sbo1="select * from cust_outstanding where cust_name='".strtoupper($_POST['cust_name'])."' order by id desc";
$Esbo1=mysqli_query($conn,$sbo1);
$FEsbo1=mysqli_fetch_array($Esbo1);
$eaa=$FEsbo1['ad_amount'];	
	
	if($ugamount>$out_amt)
	{
	$adamount=$ugamount-$out_amt;
	}
	else
	{
	$adamount=0;
	}

	
	 if($ugamount>$out_amt)
	{
		
		
	echo	$ua="update cust_outstanding set ad_amount=$adamount where id='".$FEsbo1['id']."'";
		$Eua=mysqli_query($conn,$ua); 
		}    
	  
	  
 header("location:a_receipt_f.php");
?>