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
				$ss="select * from s_job_card where status='Active' and FranchiseeId='".$_SESSION['BranchId']."' and jcard_status='Close' and id='".$_REQUEST['JobcardId']."'";
				$Ess=mysqli_query($conn,$ss);
				$Fdc=mysqli_fetch_array($Ess);
				
				$cd="select a_customer.cust_name,a_customer.mobile1,a_customer_vehicle_details.vehicle_no,a_customer_vehicle_details.VehicleBrand,a_customer_vehicle_details.VehicleSegment from a_customer inner join a_customer_vehicle_details ON  a_customer.id=a_customer_vehicle_details.cust_no where vehicle_no='".trim($Fdc['vehicle_no'])."'";
				$ds=mysqli_query($conn,$cd);
				$Da=mysqli_fetch_array($ds);
              ?>

<div class="col-sm-12">
<h4>JobCard No: <?php echo $Fdc['job_card_no'];?></h4>
<h4>Customer Name : <?php echo $Da['cust_name'];?> ,Customer Phone No : <?php echo $Da['mobile1'];?> </h4>
<h4>Vehicle No : <?php echo $Da['vehicle_no'];?> ,Vehicle Name : <?php echo $Da['VehicleBrand'];?> ,Vehicle Make : <?php echo $Da['VehicleSegment'];?></h4>
<br/>
<h4>Service Details</h4>
 <table  class="table table-bordered table-striped" width="100%">
<tr>
<thead>
<th>Service Name</th>

</thead>
</tr>

<?php


	$Fc="select * from s_job_card_sdetails where job_card_no='".$Fdc['id']."'";
	$Dsx=mysqli_query($conn,$Fc);
	while($Cs=mysqli_fetch_array($Dsx))
	
	{

?>
<tr>

<td><?php echo $Cs['service_type'];?></td>

	

</tr>
	<?php } ?>
</table>
<h4 class="hidden">Package Details </h4>
 <table  class="table table-bordered table-striped" width="100%" hidden>
<tr>
<thead>
<th>Package Name</th>
<th>Service Name</th>
<th>Service Status</th>
</thead>
</tr>

<?php
	$Fc="select * from s_job_card_pdetails where job_card_no='".$Fdc['id']."'";
	$Dsx=mysqli_query($conn,$Fc);
	while($Cs=mysqli_fetch_array($Dsx))
	{
			$Vd="select * from s_job_card_package_service_details where JobcradPackageId='".$Cs['id']."'";
			$cx=mysqli_query($conn,$Vd);
			while($Cdxs=mysqli_fetch_array($cx))
			{

?>
<tr>
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

?>


</tr>

</table>

<h4 class="hidden">Spare Pick Details </h4>
 <table  class="table table-bordered table-striped" width="100%" hidden>
<tr>
<thead>
<th>Spare Name</th>
<th>Qty</th>
</thead>
</tr>

<?php
	$Fc="select s_spare_prepick.sdate,s_spare_prepick.s_pick_no,s_spare_prepick_details.spare_name,s_spare_prepick_details.qty from s_spare_prepick inner join s_spare_prepick_details ON s_spare_prepick.id=s_spare_prepick_details.s_pick_no where s_spare_prepick.JobcardId='".$Fdc['id']."'";
	$Dsx=mysqli_query($conn,$Fc);
	while($Cs=mysqli_fetch_array($Dsx))
	{
			$Vd="select * from m_spare where sid='".$Cs['spare_name']."'";
			$cx=mysqli_query($conn,$Vd);
			while($Cdxs=mysqli_fetch_array($cx))
			{

?>
<tr>
<td><?php echo $Cdxs['sname'];?></td>
<td><?php echo $Cs['qty'];?></td>

<?php
	}
			
}

?>


</tr>

</table>

<h4 class="hidden">OutSource Details </h4>
 <table  class="table table-bordered table-striped" width="100%" hidden>
<tr>
<thead>
<th>Outsources</th>
<th>Amount</th>
<th>TotalAmount</th>
</thead>
</tr>

<?php
	 $Fc="select * from s_outsources_details where JobcardId='".$Fdc['id']."'"; 
	$Dsx=mysqli_query($conn,$Fc);
	while($Csed=mysqli_fetch_array($Dsx))
	{
		
			$Fddc="select * from m_service_type where id='".$Csed['Outsources']."'";
			$fdcs=mysqli_query($conn,$Fddc);
			$Vds=mysqli_fetch_array($fdcs);
		

?>
<tr>
<td><?php echo $Vds['stype'];?></td>
<td><?php echo $Csed['Amount'];?></td>
<td><?php echo $Csed['TotalAmount'];?></td>

<?php
	}
?>


</tr>

</table>
</div>


</div>
</div>
</div>


</body>
</html>