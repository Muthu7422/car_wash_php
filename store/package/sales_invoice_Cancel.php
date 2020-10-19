<?php
include("../../includes.php");
include("../../redirect.php");

$inv_no=$_REQUEST['inv_no'];

 $rpe="select * from sales_invoice_details where inv_no='$inv_no'"; 
$rpm=mysqli_query($conn,$rpe);
while($spm=mysqli_fetch_array($rpm))
{
	
//$pos="select * from m_spare where sname='".$spm['sname']."'";
//$rmp=mysqli_query($pos);
//$scm=mysqli_fetch_array($rmp);

 $stock="update item_stock set StockQuantity=StockQuantity + '".$spm['qty']."' where ItemId='".$spm['spare_name']."'"; 
$stk=mysqli_query($conn,$stock);

 
}

			$bill="update sales_invoice set  bill_status='Close' where inv_no='$inv_no'"; 
			$bille=mysqli_query($conn,$bill);


				$ps="select * from sales_invoice where inv_no='$inv_no'";
				$psb=mysqli_query($conn,$ps);
				$pamt=mysqli_fetch_array($psb);


//$rpe1="select * from a_customer where cust_name='".$pamt['cname']."'"; 
//$rpm1=mysqli_query($rpe1);
//$spm1=mysqli_fetch_array($rpm1);

if($pamt['ptype']!='cash')
{

$stand="select * from cust_outstanding where invoice='$inv_no' and cust_name='".$pamt['cname']."'";
$spt=mysqli_query($conn,$stand);
$rep=mysqli_fetch_array($spt);

$stand1="select * from cust_outstanding where cust_name='".$pamt['cname']."' order by id desc";
$spt1=mysqli_query($conn,$stand1);
$rep1=mysqli_fetch_array($spt1);


  $out="insert into cust_outstanding set cust_name='".$pamt['cname']."',invoice='".$pamt['inv_no']."',p_date='".$pamt['sdate']."',invoice_amt='".$pamt['bill_amt']."',total_outstanding='".$rep1['total_outstanding']."' - '".$pamt['bal_amt']."',balance_amt='".$rep['balance_amt']."' - '".$pamt['bal_amt']."'"; 
$outp=mysqli_query($conn,$out); 
}

header("Location:f_bill_view.php");

?>