<?php 
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");


/*$q="select * from customer_old_data where Id>'1113'";
$Eq = mysqli_query($q);
while($FEq=mysqli_fetch_array($Eq))
{
	$d=explode('.', $FEq['ServiceDate']);
echo $cd="20".$d[2]."-".$d[1]."-".$d[0];
echo "<br/>";

$uq="update customer_old_data set ServiceDate1='$cd' where Id='".$FEq['Id']."'";
$Euq = mysqli_query($uq);
}*/

$q="select * from customer_old_data where Id<'1114'";
$Eq = mysqli_query($conn,$q);
while($FEq=mysqli_fetch_array($Eq))
{
	$d=explode('-', $FEq['ServiceDate']);
echo $cd=$d[2]."-".$d[1]."-".$d[0];
echo "<br/>";

$uq="update customer_old_data set ServiceDate1='$cd' where Id='".$FEq['Id']."'";
$Euq = mysqli_query($conn,$uq);
}

?>