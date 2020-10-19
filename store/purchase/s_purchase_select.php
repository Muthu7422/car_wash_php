<?php
include("../../dbinfoi.php");

$data[]="";
 $query = 'SELECT * FROM s_purchase_temp';
$rs = mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($rs)){
	$data[]=$row;
}

print json_encode($data);
?>