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
<table  align="center" cellspacing="1" bgcolor="#2C5288">
  <tr>
    <td height="32" bgcolor="#2C5288" align="center"><strong>S:no </strong></td>
	 <td bgcolor="#2C5288" align="center"><strong>Service Date</strong></td>
	 <td bgcolor="#2C5288" align="center"><strong>Vehicle No</strong></td>
	 <td bgcolor="#2C5288" align="center"><strong>Service Name</strong></td>
  </tr>
  <?php 
  $i=0;
  $sn="select * from customer_old_data where CustomerMobile='".$_REQUEST['cname']."'"; 
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
</body>
</html>
