<?php
include("../../includes.php");
include("../../redirect.php");

 $dd="delete * from service_cash_memo_details where id='".$_POST['service_cash_memo_no']."'";
 $Edd=mysql_query($dd);
 $rpe="select * from service_cash_memo_details where service_cash_memo_no='".$_REQUEST['service_cash_memo_no']."'"; 
$rpm=mysql_query($rpe);
while($spm=mysql_fetch_array($rpm))
{
//$pos="select * from m_spare where sname='".$spm['sname']."'";
//$rmp=mysql_query($pos);
//$scm=mysql_fetch_array($rmp);
$stock="update item_stock set StockQuantity=StockQuantity + '".$spm['qty']."' where ItemId='".$spm['service_type']."' and FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
$stk=mysql_query($stock);

}

// $tout=$FEsbo1['total_outstanding']+$_POST['balance_amount'];
// Out Standing Start
//$pia="select * from cust_outstanding where service_cash_memo_no='".$_POST['service_cash_memo_no']."' order by id desc";
// $Epia=mysql_query($pia);
// $FEpia=mysql_fetch_array($Epia);
// $PBal=$FEpia['balance_amt'];

// $tia=$_POST['balance_amount'];
// $sbo="select * from cust_outstanding where cust_name='".$_POST['customer_name']."' order by id desc";
// $Esbo=mysql_query($sbo);
// $FEsbo=mysql_fetch_array($Esbo);
// $POa=$FEsbo['total_outstanding'];
// $COa=$POa-$PBal;

//$ttlos=$FEsbo['total_outstanding']+$tia;
//$pi1="insert into cust_outstanding set ad_amount='".$FEsbo['ad_amount']."',tran_amount='0',cust_name='".$_POST['customer_name']."',invoice_amt='$tia',invoice = '".$_POST['inv_no']."',paid_amt='0',p_date='".$_POST['date']."',balance_amt='$tia',total_outstanding='$ttlos'";  
//$Epi1=mysql_query($pi1);
//Outstandung End


$som="update service_cash_memo set service_cash_memo_no='".$_POST['service_cash_memo_no']."',date='".$_POST['date']."',branch_name='".$_POST['branch_name']."',customer_name='".$_POST['customer_name']."',description='".$_POST['description']."',bill_amount='".$_POST['bill_amt']."'";
$soms=mysql_query($som); 
$pcm=$_POST['service_cash_memo_id'];
for($i=1;$i<11;$i++)
{
	if($_POST['amount'.$i]!="")
	{
	echo$pms="update service_cash_memo_details set service_type='".$_POST['service_type'.$i]."',service_amount='".$_POST['service_amount'.$i]."',qty='".$_POST['qty'.$i]."',total_amount='".$_POST['installation_amt'.$i]."'";  exit;
	$Epms=mysql_query($pms); 
	
	if($_POST['id'.$i]=='')
	{
    $pms="insert into service_cash_memo_details set service_cash_memo_no='".$_POST['service_cash_memo_no']."',service_type='".$_POST['service_type'.$i]."',service_amount='".$_POST['service_amount'.$i]."',qty='".$_POST['qty'.$i]."',total_amount='".$_POST['installation_amt'.$i]."'";
	$Epms=mysql_query($pms); 
	}
	$stm="select * from item_stock where ItemId='".$_POST['service_type'.$i]."' and FranchiseeId='".$_SESSION['FranchiseeId']."'";
	$sitm=mysql_query($stm);
	$nr=mysql_num_rows($sitm);
	$Ditm=mysql_fetch_array($nr);

	$sss="update item_stock set StockQuantity= StockQuantity - '".$_POST['qty'.$i]."' where ItemId='".$_POST['service_type'.$i]."' and FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
	$Esss=mysql_query($sss);
	
	 $dd="delete from service_cash_memo_details where qty='0.00'";
	$Edd=mysql_query($dd);
	
	}
}

$service_cash_memo_no=$_POST['service_cash_memo_no'];
header("location:service_cash_memo_receipt.php?service_cash_memo_no=$service_cash_memo_no");
?>