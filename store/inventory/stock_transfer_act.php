<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);


if(isset($_POST['add'])!='')
{
	
	 $temp="insert into trans_temp set TransferId='".$_POST['TransferId']."',TransferDate='".$_POST['TransferDate']."',from_franchisee='".$_POST['from_franchisee']."',FranchiseeId='".$_POST['FranchiseeId']."',TransferItem='".$_POST['TransferItem']."',mrp='".$_POST['mrp']."',total_qty='".$_POST['total_qty']."',transf_qty='".$_POST['transf_qty']."',disc_perc='".$_POST['disc_perc']."',disc_rate='".$_POST['disc_rate']."',trans_rate='".$_POST['trans_rate']."',UnitId='".$_POST['unit']."'";
	$temp_stock=mysqli_query($conn,$temp); 
	
$TransferId=$_POST['TransferId'];
header("Location:stock_transfer.php?TransferId=$TransferId");
}
if(isset($_POST['final'])!='')
{
	
	$ttemp="select COUNT(id) as id,SUM(trans_rate) as rate from trans_temp where TransferId='".$_POST['TransferId']."'";
$trtemp=mysqli_query($conn,$ttemp); 
$temp=mysqli_fetch_array($trtemp);

 $trans_stock="insert into transfer_main set TransferDate='".$_POST['TransferDate']."',FromFranchiseeId='".$_POST['from_franchisee']."',ToFranchiseeId='".$_POST['FranchiseeId']."',TransferItem='".$temp['id']."',TransferValue='".$temp['rate']."',Status='Active',vendor_id='".$var1['vendor_id']."'";
$tansf=mysqli_query($conn,$trans_stock); 
$tid=mysqli_insert_id($conn);	
	

 $a="select * from trans_temp where TransferId='".$_POST['TransferId']."'";
$b=mysqli_query($conn,$a);
while($temps=mysqli_fetch_array($b)) 
{
	$sub_trans="insert into transfer_sub set TransferId='$tid',ItemId='".$temps['TransferItem']."',ItemMRP='".$temps['mrp']."',Discount='".$temps['disc_rate']."',TransferQuantity='".$temps['transf_qty']."',TotalAmount='".$temps['trans_rate']."'";
$sub_transfer=mysqli_query($conn,$sub_trans); 

		 $echeck1="select * from item_stock where ItemId='".$temps['TransferItem']."' and FranchiseeId='".$temps['FranchiseeId']."'";  
        $echk1=mysqli_query($conn,$echeck1);
        $ecount1=mysqli_fetch_array($echk1); 
		$nr=mysqli_num_rows($echk1);	
		if($nr>'0')
		{
			

             $echecks="Update item_stock set StockQuantity=StockQuantity+'".$temps['transf_qty']."' where ItemId='".$temps['TransferItem']."' and FranchiseeId='".$var['branch_id']."' and vendor_id='".$var1['vendor_id']."'"; 
			$echks=mysqli_query($conn,$echecks);
		}
		if($nr=='0')
		{
			$stock="insert into item_stock set FranchiseeId='".$temps['FranchiseeId']."',ItemId='".$temps['TransferItem']."',StockQuantity='".$temps['transf_qty']."',Uom='".$temps['UnitId']."',franchisee_id='".$var['branch_id']."',vendor_id='".$var1['vendor_id']."'";
			$stocks=mysqli_query($conn,$stock); 
		}
		
		$echeck="Update item_stock set StockQuantity=StockQuantity-'".$temps['transf_qty']."' where ItemId='".$temps['TransferItem']."' and FranchiseeId='".$temps['from_franchisee']."'";  
		$echk=mysqli_query($conn,$echeck);
}

$dlt="delete from trans_temp where TransferId='".$_POST['TransferId']."'";
$dlts=mysqli_query($conn,$dlt);
header("Location:stock_transfer_history.php");
}



?>