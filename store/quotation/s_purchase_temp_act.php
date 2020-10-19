<?php
include("../../dbinfoi.php");



$pm1="select * from s_purchase_temp where inv_no='".$_POST['invno']."'";
$Epm1=mysqli_query($conn,$pm1);
while($Fpm1=mysqli_fetch_array($Epm1))
{

 $pm2="insert into s_purchase set inv_no='".strtoupper($Fpm1['inv_no'])."',pdate='".strtoupper($Fpm1['pdate'])."',supplier_name='".strtoupper($Fpm1['supplier_name'])."',outstand='".strtoupper($Fpm1['outstand'])."',sbrand='".strtoupper($Fpm1['sbrand'])."',sname='".strtoupper($Fpm1['sname'])."',spart_no='".strtoupper($Fpm1['spart_no'])."',prate='".strtoupper($Fpm1['prate'])."',qty='".strtoupper($Fpm1['qty'])."',total='".$Fpm1['total']."',status='Active'";
$Epm2=mysqli_query($conn,$pm2);

}

$pm3="delete from s_purchase_temp where inv_no='".$_POST['invno']."'";
$Epm3=mysqli_query($conn,$pm3);

header("location:s_purchase_ang.php");
?>