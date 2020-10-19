<?php
include("../../includes.php");
include("../../redirect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
   <script>
function printDiv(divName) {

 var printContents = document.getElementById(divName).innerHTML;
 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}
</script>
</head>
<body>
<div id="print-content">
<div class="container">
<div class="row">
<h4>Inventory Report Details on : <?php echo date("d-m-Y",strtotime($_POST['from']));?></h4>
<div class="col-sm-12">
 <table  class="table table-bordered table-striped" width="100%">
<tr>
<thead>
<th>Date</th>
<th>Transaction Type</th>
<th>Transaction No</th>
<th>Supplier Name</th>
<th>Item Name</th>
<th>Opening Stock</th>
<th>Qty</th>
<th>Rate</th>
<th>FIFO Cost</th>
<th>Qty In Hand</th>
<th>Asset Value</th>
</thead>
</tr>

<?php
//------purchase-------//
$datet=$_POST['from'];
//$datey=date('Y-m-d',strtotime("-1 days"));
//$date = $_POST['from'];
//$datey = date('Y-m-d', strtotime($date.' - 1 days'));

$prada="select * from s_purchase_details where pdate='$datet' and qty!='0' and purchase_details='Open'";
$prqda=mysqli_query($conn,$prada);
while($prfda=mysqli_fetch_array($prqda))
{

$pra="select * from s_purchase where FranchiseeId='".$_SESSION['BranchId']."' and id='".$prfda['inv_no']."' and purchase_details='Open'";
$prq=mysqli_query($conn,$pra);
$prf=mysqli_fetch_array($prq);


 $dem="select * from m_supplier where sid='".$prf['supplier_name']."'";
 $rmp=mysqli_query($conn,$dem);
 $rcm=mysqli_fetch_array($rmp);
 
 $spare="select * from m_spare where sid='".$prfda['spare_name']."'";
$spareqry=mysqli_query($conn,$spare);
$sparefetch=mysqli_fetch_array($spareqry);

$stock="select * from item_stock where FranchiseeId='".$_SESSION['BranchId']."' and ItemId='".$prfda['spare_name']."'";
$stockq=mysqli_query($conn,$stock);
$stockf=mysqli_fetch_array($stockq);


$qtyselect="select SUM(qty) AS PQTY from s_purchase_details where spare_name='".$prfda['spare_name']."' and pdate < '$datet' and purchase_details='Open'";
$qtyquery=mysqli_query($conn,$qtyselect);
$qtyfetch=mysqli_fetch_array($qtyquery);

?>
<tr>
<td><?php echo date("d-m-Y",strtotime($prf['pdate']));?></td>
<td>Purchase</td>
<td><?php echo $prf['inv_no'];?></td>
<td><?php echo $rcm['sname'];?></td>
<td><?php echo $sparefetch['sname'];?></td>
<?php
if($qtyfetch['PQTY']!='')
{
?>
<TD><?php echo $qtyfetch['PQTY']; ?></TD>
<?php
}
else
{
?>
<TD>0</TD>
<?php
}
?>

<td><?php echo $prfda['qty'];?></td>
<td><?php echo $prfda['mrp'];?></td>
<td><?php echo $prfda['qty']*$prfda['mrp'];?></td>
<td><?php echo $stockf['StockQuantity'];?></td>
<td><?php echo $prfda['mrp']*$stockf['StockQuantity'];?></td>
</tr>
<?php
}
//--------Sales---------//
$datet=$_POST['from'];



 $prada="select * from sales_invoice_details where sdate='$datet' and qty!='0' and bill_status='Open'";
$prqda=mysqli_query($conn,$prada);
while($prfda=mysqli_fetch_array($prqda))
{

$pra="select * from sales_invoice where FranchiseeId='".$_SESSION['BranchId']."' and inv_no='".$prfda['inv_no']."' and bill_status='Open'";
$prq=mysqli_query($conn,$pra);
$prf=mysqli_fetch_array($prq);


 $dem="select * from a_customer where id='".$prf['cname']."'";
 $rmp=mysqli_query($conn,$dem);
 $rcm=mysqli_fetch_array($rmp);
 
 $spare="select * from m_spare where sid='".$prfda['spare_name']."'";
$spareqry=mysqli_query($conn,$spare);
$sparefetch=mysqli_fetch_array($spareqry);

$stock="select * from item_stock where FranchiseeId='".$_SESSION['BranchId']."' and ItemId='".$prfda['spare_name']."'";
$stockq=mysqli_query($conn,$stock);
$stockf=mysqli_fetch_array($stockq);

$qtyselect="select SUM(qty) AS SQTY from sales_invoice_details where spare_name='".$prfda['spare_name']."' and sdate <'$datet' and bill_status='Open'";
$qtyquery=mysqli_query($conn,$qtyselect);
$qtyfetch=mysqli_fetch_array($qtyquery);


?>
<tr>
<td><?php echo date("d-m-Y",strtotime($prf['sdate']));?></td>
<td>Invoice</td>
<td><?php echo $prf['inv_no'];?></td>
<td><?php echo $rcm['cust_name'];?></td>
<td><?php echo $sparefetch['sname'];?></td>
<?php
if($qtyfetch['SQTY']!='')
{
?>
<TD><?php echo $qtyfetch['SQTY']; ?></TD>
<?php
}
else
{
?>
<TD>0</TD>
<?php
}
?>
<td><?php echo $prfda['qty'];?></td>
<td><?php echo $prfda['mrp'];?></td>
<td><?php echo $prfda['qty']*$prfda['mrp'];?></td>
<td><?php echo $stockf['StockQuantity'];?></td>
<td><?php echo $prfda['mrp']*$stockf['StockQuantity'];?></td>
</tr>
<?php
}

?>
</table>
</div>
</div>
</div>
</div>


</body>
</html>