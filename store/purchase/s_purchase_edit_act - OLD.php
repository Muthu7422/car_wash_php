<?php
include("../../includes.php");

$FrachiseeId=$_POST['FranchiseeId'];
if(isset($_POST['product'])!='')
{

$Rpm="insert into s_purchase_details set inv_no='".strtoupper($_POST['inv_no'])."',supplier_name='".$_POST['supplier_name']."',spare_brand='".$_POST['sbrand']."',spare_name='".$_POST['sparename']."',spare_part_no='".$_POST['spart_no']."',unit='".$_POST['unit']."',mrp='".$_POST['prate']."',discount_per='".$_POST['discount_per']."',discount_amt='".$_POST['discount_amt']."',purchase_rate='".$_POST['purchase_rate']."',qty='".$_POST['qty']."',total='".$_POST['total']."',gst='".$_POST['gst']."',gst_amt='".$_POST['gst_amt']."',total_amount='".$_POST['net_amt']."',status='Active'";
$Erp=mysql_query($Rpm);

            $cash_acc="Update account_cash set Amount=Amount+'".$_POST['net_amt']."' where ReferenceNo='".$_POST['inv_no']."' and TransactionFrom='Purchase'"; 
            $acc_insert=mysql_query($cash_acc);  
     

//Stock Update Start----
		$echeck1="select * from item_stock where ItemId='".$_POST['spare_name']."' and FranchiseeId='".$_SESSION['FranchiseeId']."' and Uom='".$_POST['unit']."'"; 
        $echk1=mysql_query($echeck1);
        $ecount1=mysql_fetch_array($echk1); 
		$nr=mysql_num_rows($echk1);	
		if($nr>'0')
		{
			$echecks="Update item_stock set StockQuantity=StockQuantity+'".$_POST['qty']."' where ItemId='".$_POST['spare_name']."' and FranchiseeId='".$_SESSION['FranchiseeId']."' and Uom='".$_POST['unit']."'"; 
			$echks=mysql_query($echecks);
		}
		if($nr=='0')
		{
			$stock="insert into item_stock set FranchiseeId='".$_SESSION['FranchiseeId']."',ItemId='".$_POST['spare_name']."',StockQuantity='".$_POST['qty']."',Uom='".$_POST['unit']."'";
			$stocks=mysql_query($stock); 
		}
		
//Stock Update End----


$inv_no=$_POST['inv_no'];
header("location:s_purchase_edit.php?inv_no=$inv_no");
}









if(isset($_POST['main'])!='')
{
	$tia=$tia+$_POST['net_amt'];
$rpe1="select * from s_purchase where inv_no='".$_POST['inv_no']."'";  
$rpm1=mysql_query($rpe1);
$spm1=mysql_fetch_array($rpm1);

 $rpe="select * from s_purchase_details where inv_no='".$spm1['id']."'"; 
$rpm=mysql_query($rpe);
while($spm=mysql_fetch_array($rpm))
{
 $stock="update item_stock set StockQuantity=StockQuantity - '".$spm['qty']."' where ItemId='".$spm['spare_name']."' and FranchiseeId='".$_SESSION['FranchiseeId']."' and Uom='".$spm['unit']."'"; 
$stk=mysql_query($stock);   
}
	$pm="Update s_purchase set FrachiseeId='".$_SESSION['FranchiseeId']."',pdate='".$_POST['pdate']."',supplier_name='".$_POST['supplier_name']."',outstand='".$_POST['out']."',status='Active',purchase_details='Open',description='".$_POST['description']."'";
    $Epm=mysql_query($pm);
		
			$cash_acc="Update account_cash set Amount='".$_POST['NetAmount']."' where ReferenceNo='".$_POST['inv_no']."' and TransactionFrom='Purchase'"; 
            $acc_insert=mysql_query($cash_acc);  
			
			
	        //$cash_acc="Update a_cash_acc set PurchaseAmount='".$_POST['NetAmount']."',Status='Active' where pinv_no='".$_POST['inv_no']."'"; 
			//$acc_insert=mysql_query($cash_acc); 
			
		
$stand="select * from sup_outstanding where invoice='$inv_no' and cust_name='".$spm1['supplier_name']."'";
$spt=mysql_query($stand);
$rep=mysql_fetch_array($spt);

$stand1="select * from sup_outstanding where cust_name='".$spm1['supplier_name']."' order by id desc";
$spt1=mysql_query($stand1);
$rep1=mysql_fetch_array($spt1);


$out="insert into sup_outstanding set cust_name='".$spm1['supplier_name']."',invoice='".$spm1['inv_no']."',p_date='".$spm1['pdate']."',invoice_amt='".$spm1['total']."',total_outstanding='".$rep1['total_outstanding']."' - '".$spm1['total']."',balance_amt='".$rep['balance_amt']."' - '".$spm1['total']."'"; 
$outp=mysql_query($out); 

//Outstanding Start---->


$sbo="select * from sup_outstanding where cust_name='".$spm1['supplier_name']."' order by id desc";
$Esbo=mysql_query($sbo);
$FEsbo=mysql_fetch_array($Esbo);
	
//$ba=$FEsb['balance_amt'];
//$oa=$FEsbo['total_outstanding'];

$ttlos=$FEsbo['total_outstanding']+$tia;

$pi1="insert into sup_outstanding set ad_amount='".$FEsbo['ad_amount']."',tran_amount='0',cust_name='".$spm1['supplier_name']."',invoice_amt='$tia',invoice = '".strtoupper($_POST['inv_no'])."',paid_amt='0',p_date='".strtoupper($Fpm2['pdate'])."',balance_amt='$tia',total_outstanding='$ttlos'";  
$Epi1=mysql_query($pi1);
//Outstanding End---->


 $stand1="select * from sup_outstanding where cust_name='".$spm1['supplier_name']."' order by id desc"; 
$spt1=mysql_query($stand1);
$rep1=mysql_fetch_array($spt1);

 $purchase="update m_supplier set  opening_balance='".$rep1['total_outstanding']."' where sid='".$rep1['cust_name']."'";  
$pur=mysql_query($purchase);

 $purchase="update s_purchase set  total='$tia' where inv_no='".$_POST['inv_no']."'";  
$pur=mysql_query($purchase);

$pm3="delete from s_purchase_temp where inv_no='".$_POST['inv_no']."'";
$Epm3=mysql_query($pm3);

$pm3="delete from s_purchase_details_temp where inv_no='".$_POST['inv_no']."'";
$Epm3=mysql_query($pm3);

header("location:s_purchase_view.php");
}


?>