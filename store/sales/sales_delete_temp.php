<?php
include("../../includes.php");
include("../../redirect.php");


$ct="delete from sales_invoice_details_temp where id='".$_REQUEST['id']."'";
$Ect=mysqli_query($conn,$ct);

header("location:sales_invoice.php?m=5");
?>