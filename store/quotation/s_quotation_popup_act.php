<?php
include("../../includes.php");


if(isset($_POST['PopUp']))
{

    $Rpm="update s_quotation_details_temp set discount='".$_POST['discount_per']."',discount_amt='".$_POST['discount_amt']."',qty='".$_POST['qty']."',total='".$_POST['total']."',gst_amt='".$_POST['gst_amt']."',TotalGstPer='".$_POST['gst']."',net_amount='".$_POST['net_amt']."' where id='".$_POST['pid']."'";
     $Erp=mysqli_query($conn,$Rpm);

$q_no=$_POST['q_no'];
header("location:s_quotation.php?q_no=$q_no");
}
