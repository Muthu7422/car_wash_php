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
<?php
$Fc="select * from h_employee where id='".$_POST['Name']."'";
	$Dsx=mysqli_query($conn,$Fc);
	$Cs=mysqli_fetch_array($Dsx);

?>
<?php
if($_POST['ChooseTheOption']=='Technician')
{
?>
<div class="col-sm-12">
<h4>Service Technician Report Details on ;  From :<?php echo date("d-m-Y",strtoTime($_POST['from']));?> - To : <?php echo date("d-m-Y",strtoTime($_POST['to']));?> </h4>
<h4>Technician Name : <?php echo $Cs['ename'];?></h4>
<h4>Phone No : <?php echo $Cs['emobile'];?></h4>
<br/>
<h4>Jobcard Details</h4>
 <table  class="table table-bordered table-striped" width="100%">
<tr>
<thead>
<th>S:No</th>
<th>Jobcard Date</th>
<th>Jobcard  No</th>
<th>Vehicle No</th>
<th>Total Amount</th>
<th>Commission Amount</th>
</thead>
</tr>

<?php
$i=0;
$prada="select s_job_card.job_card_no,s_job_card.jdate,s_job_card.vehicle_no,s_job_card.TechnicianName,a_final_bill.bill_date,a_final_bill.inv_no,a_final_bill.Total_bill_Amount from  a_final_bill INNER JOIN s_job_card On s_job_card.id=a_final_bill.JobcardId where s_job_card.jdate between '".$_POST['from']."' and '".$_POST['to']."' and s_job_card.TechnicianName='".$_POST['Name']."' and s_job_card.FranchiseeId='".$_SESSION['FranchiseeId']."'"; 
$prqda=mysqli_query($conn,$prada);
while($prfda=mysqli_fetch_array($prqda))
{	


$a=3000;
$ab=10000;
$abc=30000;
$abcd=60000;

$x=$a<$ab;
$xy=$ab<$abc;
//$xyz=$abc<$abcd;

$main=$prfda['Total_bill_Amount'];
	
$i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo date("d-m-Y",strtotime($prfda['jdate']));?></td>
<td><?php echo $prfda['job_card_no'];?></td>
<td><?php echo $prfda['vehicle_no'];?></td>
<td><?php echo $prfda['Total_bill_Amount'];?></td>


<td><?php 
if($main<=(3000<10000))
{
	echo 50; 
}
if($prfda['Total_bill_Amount']<=10000)
{
	echo 100; 
}
if($prfda['Total_bill_Amount']==(30000<=60000))
{
	echo 200; 
}
if($prfda['Total_bill_Amount']<=60000)
{
	echo 600; 
}
?></td>

<?php
	}

?>


</tr>

</table>
<h4 hidden>Package Details </h4>
 <table  class="table table-bordered table-striped" width="100%" hidden>
<tr>
<thead>
<th>Date</th>
<th>Jobcard  No</th>
<th>Vehicle No</th>
<th>Package Name</th>
<th>Service Name</th>
<th>Service Status</th>
</thead>
</tr>

<?php

$prada="select * from s_job_card where jdate between '".$_POST['from']."' and '".$_POST['to']."' and  TechnicianName='".$_POST['Name']."'";
$prqda=mysqli_query($conn,$prada);
while($prfda=mysqli_fetch_array($prqda))
{
	$Fc="select * from s_job_card_pdetails where job_card_no='".$prfda['id']."'";
	$Dsx=mysqli_query($conn,$Fc);
	while($Cs=mysqli_fetch_array($Dsx))
	{
			$Vd="select * from s_job_card_package_service_details where JobcradPackageId='".$Cs['id']."'";
			$cx=mysqli_query($conn,$Vd);
			while($Cdxs=mysqli_fetch_array($cx))
			{

?>
<tr>
<td><?php echo date("d-m-Y",strtotime($prfda['jdate']));?></td>
<td><?php echo $prfda['job_card_no'];?></td>
<td><?php echo $prfda['vehicle_no'];?></td>
<td><?php echo $Cs['package_type'];?></td>
<td><?php echo $Cdxs['Service'];?></td>
<?php 
if($Cdxs['ServiceStatus']=='Pending')
{
?>
<td bgcolor="#EEC5BB"><?php echo $Cdxs['ServiceStatus'];?></td>
<?php
}
else
{
?>
<td><?php echo $Cdxs['ServiceStatus'];?></td>
<?php
	}
			}
}
}
?>


</tr>

</table>
<h4>Service Details</h4>
 <table  class="table table-bordered table-striped" width="100%">
<tr>
<thead>
<th>Date</th>
<th>Jobcard  No</th>
<th>Vehicle No</th>
<th>Service Name</th>
<th>Service Status</th>
</thead>
</tr>

<?php

$prada="select * from s_job_card where jdate between '".$_POST['from']."' and '".$_POST['to']."' and  TechnicianName='".$_POST['Name']."'";
$prqda=mysqli_query($conn,$prada);
while($prfda=mysqli_fetch_array($prqda))
{
	$Fc="select * from s_job_card_sdetails where job_card_no='".$prfda['id']."'";
	$Dsx=mysqli_query($conn,$Fc);
	$Cs=mysqli_fetch_array($Dsx);
	
	

?>
<tr>
<td><?php echo date("d-m-Y",strtotime($prfda['jdate']));?></td>
<td><?php echo $prfda['job_card_no'];?></td>
<td><?php echo $prfda['vehicle_no'];?></td>
<td><?php echo $Cs['service_type'];?></td>
<?php 
if($Cs['ServiceStatus']=='Pending')
{
?>
<td bgcolor="#EEC5BB"><?php echo $Cs['ServiceStatus'];?></td>
<?php
}
else
{
?>
<td><?php echo $Cs['ServiceStatus'];?></td>
<?php
}
}
?>


</tr>

</table>
</div>
<?php
}
?>
<?php
if($_POST['ChooseTheOption']=='Advisor')
{
?>
<div class="col-sm-12">
<h4>Service Advisor Report Details on ;  From :<?php echo $_POST['from'];?> - To : <?php echo $_POST['to'];?> </h4>
<h4>Advisor Name : <?php echo $Cs['ename'];?></h4>
<h4>Phone No : <?php echo $Cs['emobile'];?></h4>
<br/>
<h4>Package Details </h4>
 <table  class="table table-bordered table-striped" width="100%">
<tr>
<thead>
<th>Date</th>
<th>Jobcard  No</th>
<th>Vehicle No</th>
<th>Package Name</th>
<th>Service Name</th>
<th>Service Status</th>
</thead>
</tr>

<?php

$prada="select * from s_job_card where jdate between '".$_POST['from']."' and '".$_POST['to']."' and  ServiceAdvisor='".$_POST['Name']."'";
$prqda=mysqli_query($conn,$prada);
while($prfda=mysqli_fetch_array($prqda))
{
	$Fc="select * from s_job_card_pdetails where job_card_no='".$prfda['id']."'";
	$Dsx=mysqli_query($conn,$Fc);
	while($Cs=mysqli_fetch_array($Dsx))
	{
			$Vd="select * from s_job_card_package_service_details where JobcradPackageId='".$Cs['id']."'";
			$cx=mysqli_query($conn,$Vd);
			while($Cdxs=mysqli_fetch_array($cx))
			{

?>
<tr>
<td><?php echo date("d-m-Y",strtotime($prfda['jdate']));?></td>
<td><?php echo $prfda['job_card_no'];?></td>
<td><?php echo $prfda['vehicle_no'];?></td>
<td><?php echo $Cs['package_type'];?></td>
<td><?php echo $Cdxs['Service'];?></td>
<?php 
if($Cdxs['ServiceStatus']=='Pending')
{
?>
<td bgcolor="#EEC5BB"><?php echo $Cdxs['ServiceStatus'];?></td>
<?php
}
else
{
?>
<td><?php echo $Cdxs['ServiceStatus'];?></td>
<?php
	}
			}
}
}
?>


</tr>

</table>
<h4>Service Details</h4>
 <table  class="table table-bordered table-striped" width="100%">
<tr>
<thead>
<th>Date</th>
<th>Jobcard  No</th>
<th>Vehicle No</th>
<th>Service Name</th>
<th>Service Status</th>
</thead>
</tr>
<?php

$prada="select * from s_job_card where jdate between '".$_POST['from']."' and '".$_POST['to']."' and  ServiceAdvisor='".$_POST['Name']."'";
$prqda=mysqli_query($conn,$prada);
while($prfda=mysqli_fetch_array($prqda))
{
	$Fc="select * from s_job_card_sdetails where job_card_no='".$prfda['id']."'";
	$Dsx=mysqli_query($conn,$Fc);
	$Cs=mysqli_fetch_array($Dsx);
	
	

?>
<tr>
<td><?php echo date("d-m-Y",strtotime($prfda['jdate']));?></td>
<td><?php echo $prfda['job_card_no'];?></td>
<td><?php echo $prfda['vehicle_no'];?></td>
<td><?php echo $Cs['service_type'];?></td>
<?php 
if($Cs['ServiceStatus']=='Pending')
{
?>
<td bgcolor="#EEC5BB"><?php echo $Cs['ServiceStatus'];?></td>
<?php
}
else
{
?>
<td><?php echo $Cs['ServiceStatus'];?></td>
<?php
}
}
?>


</tr>

</table>
</div>
<?php
}
?>
</div>
</div>
</div>


</body>
</html>