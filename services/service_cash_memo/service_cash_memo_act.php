<?php
include("../../includes.php");
include("../../redirect.php");

 $som="insert into service_cash_memo set service_cash_memo_no='".$_POST['service_cash_memo_no']."',date='".$_POST['date']."',branch_name='".$_POST['branch_name']."',customer_name='".$_POST['customer_name']."',description='".$_POST['description']."',bill_amount='".$_POST['bill_amt']."'";
 $soms=mysql_query($som); 
 $pcm=mysql_insert_id();

for($i=1;$i<11;$i++)
{
	if($_POST['service_amount'.$i]!="")
{
	
$pms="insert into service_cash_memo_details set service_cash_memo_no='".$_POST['service_cash_memo_no']."',service_type='".$_POST['service_type'.$i]."',service_amount='".$_POST['service_amount'.$i]."',qty='".$_POST['qty'.$i]."',total_amount='".$_POST['installation_amt'.$i]."',service_cash_memo_id='$pcm'";
 $Epms=mysql_query($pms); 


$stm="select * from m_service_type where ItemId='".$_POST['service_type'.$i]."' and FranchiseeId='".$_SESSION['FranchiseeId']."'";
$sitm=mysql_query($stm);
$nr=mysql_num_rows($sitm);
$Ditm=mysql_fetch_array($nr);

 $sss="update m_service_type set StockQuantity= StockQuantity-'".$_POST['qty'.$i]."'where ItemId='".$_POST['service_type'.$i]."'and FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
 $Esss=mysql_query($sss);

$service_cash_memo_no=$_POST['service_cash_memo_no'];
header("location:service_cash_memo_receipt.php?service_cash_memo_no=$service_cash_memo_no");
}
}
?>