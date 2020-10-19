<?php
$date=date('d/m/Y');
include("../../includes.php");
include("../../redirect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Service Details of This Customer </title>
</head>

<body>

<h3 style="color:#CA202B" align="center" hidden> Year  : 2018</h3>
<table  align="center" cellspacing="1" bgcolor="#2C5288" width="100%" hidden>
  <tr>
    <td width="82" height="32" bgcolor="#2C5288" align="center" style="color:white"><strong>S:no </strong></td>
	 <td width="89" bgcolor="#2C5288" align="center" style="color:white"><strong>Service Date</strong></td>
	 <td width="89" bgcolor="#2C5288" align="center" style="color:white"><strong>Vehicle No</strong></td>
	 <td width="100" bgcolor="#2C5288" align="center" style="color:white"><strong>Service Name</strong></td>
  </tr>
  <?php 
  $i=0;
  $sn="select * from customer_old_data where CustomerMobile='".$_REQUEST['cname']."' order by ServiceDate"; 
  $Esn=mysqli_query($conn,$sn);
  while($Fsn=mysqli_fetch_array($Esn))
  {
	  $i++;
   ?>
  <tr>
    <td bgcolor="#FFFFFF" align="center"><?php echo $i; ?></td>
	<td bgcolor="#FFFFFF" align="center"><?php echo date("d-m-Y", strtotime($Fsn['ServiceDate'])); ?></td>
	<td bgcolor="#FFFFFF" align="center"><?php echo $Fsn['VehicleNumber']; ?></td>
	<td bgcolor="#FFFFFF" align="center"><?php echo $Fsn['ServiceName']; ?></td>
  </tr>
  <?php
  }
  ?>
</table>
<br>
<hr>
<h3 style="color:#CA202B" align="center" > Customer Previous Service Details</h3>
<table  align="center" cellspacing="1" bgcolor="#2C5288" width="100%">
  <tr>
    <td  height="32" bgcolor="#2C5288" style="color:white"><strong>S:no </strong></td>
	 <td  bgcolor="#2C5288" style="color:white"><strong>Service Date</strong></td>
	 <td  bgcolor="#2C5288" style="color:white"><strong>Vehicle No</strong></td>
	 <td bgcolor="#2C5288" style="color:white"><strong>Service Name</strong></td>
	 <td bgcolor="#2C5288" style="color:white"><strong>Bill Amount</strong></td>
	  
  </tr>
  <?php
  
	$i=0;
 
  
	   $snp="select * from a_final_bill where cname='".$_SESSION['customer_id']."'"; 
		$Esp=mysqli_query($conn,$snp);
		while($Fsp=mysqli_fetch_array($Esp))
		{
			$job="select * from s_job_card where job_card_no='".$Fsp['job_card_no']."'";
			$jobq=mysqli_query($conn,$job);
			$jobf=mysqli_fetch_array($jobq);
			
			$service="select * from s_job_card_sdetails where job_card_no='".$jobf['id']."'";
			$serviceq=mysqli_query($conn,$service);
			$servicef=mysqli_fetch_array($serviceq);
			
			$package="select * from s_job_card_pdetails where job_card_no='".$jobf['id']."'";
			$packageq=mysqli_query($conn,$package);
			$packagef=mysqli_fetch_array($packageq);
			
			
			$i++;
   ?>
  <tr>
    <td bgcolor="#FFFFFF" align="right"><?php echo $i; ?></td>
	<td bgcolor="#FFFFFF" align="right"><?php echo date("d-m-Y", strtotime($Fsp['bill_date'])); ?></td>
	<td bgcolor="#FFFFFF" align="right"><?php echo $Fsp['cvehile']; ?></td>
	<td bgcolor="#FFFFFF" align="right"><?php echo $servicef['service_type']; ?></td>
	
	
	<td bgcolor="#FFFFFF" align="right"><?php echo $Fsp['Total_bill_Amount']; ?></td>
	
    
	 
	 
  </tr>
  <?php 
		
		}
  ?>
</table>

</body>
</html>
