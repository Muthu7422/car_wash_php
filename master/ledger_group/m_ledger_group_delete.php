<?php
include("../../dbinfoi.php");

$id=$_REQUEST['id'];
$ct="delete from m_ledger_group  WHERE id='$id'";
$Ect=mysqli_query($conn,$ct);
header("Location: m_ledger_group_view.php?d=Ledger Group Sucessfully");
?>