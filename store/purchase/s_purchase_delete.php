<?php
include("../../dbinfo.php");

$data = json_decode(file_get_contents('php://input'));
$id = $data->id;

$query = 'DELETE FROM s_purchase_temp WHERE id ='.$id;
mysqli_query($conn,$query);
?>