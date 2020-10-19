<?php
include("../../dbinfoi.php");

 $pm="insert into s_spare_prepick set pre_pick_no='".strtoupper($_POST['pre_pick_no'])."',date='".$_POST['date']."',job_card_no='".strtoupper($_POST['job_card_no'])."',vehicle_no='".strtoupper($_POST['vehicle_no'])."',mobile='".$_POST['mobile']."',name='".$_POST['name']."',service_type='".$_POST['service_type']."',sdetail='".$_POST['sdetail']."',sbrand='".$_POST['sbrand']."',sname='".$_POST['sname']."',mrp='".$_POST['mrp']."',quantity='".$_POST['quantity']."',tamount='".$_POST['tamount']."'";  
$Epm=mysqli_query($conn,$pm);

 $vs="select * from s_spare_prepick ORDER BY id DESC LIMIT 1";
$Evs=mysqli_query($conn,$vs);
$Fvs=mysqli_fetch_array($Evs);


if($_POST['add']!="")
{
header("location:s_spare_prepick1.php?id=".$Fvs['id']."");
}
else
{
header("location:s_spare_prepick.php");
}

?>