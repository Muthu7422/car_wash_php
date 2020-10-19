<?php
include("../../includes.php");
include("../../redirect.php");

 $cs="select * from m_labour where labour='".$_POST['labour']."' AND amt='".$_POST['amt']."'";
$Ecs=mysqli_query($conn,$cs);
 $nr=mysqli_num_rows($Ecs);
if($nr<'1')
{
$in="insert into  m_labour set labour='".$_POST['labour']."',amt='".$_POST['amt']."',status='Active'";
$Ein=mysqli_query($conn,$in);

header("location:m_labour.php?msg=Data Saved Successfully!");
}
else
{
header("location:m_labour.php?msg=Data Already Exist");	
}
?>