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
    <td width="82" height="32" bgcolor="#2C5288" style="color:white"><strong>S:no </strong></td>
	 <td width="89" bgcolor="#2C5288" style="color:white"><strong>Bill Date</strong></td>
	 <td width="89" bgcolor="#2C5288" style="color:white"><strong>Bill No</strong></td>
	 <td width="89" bgcolor="#2C5288" style="color:white"><strong>Bill Amount</strong></td>
  </tr>
  <?php
  
	$i=0;
 
  
	   $snp="select * from a_final_bill where cmobile='".$_REQUEST['cname']."'"; 
		$Esp=mysql_query($conn,$snp);
		while($Fsp=mysql_fetch_array($Esp))
		{
			$i++;
   ?>
  <tr>
    <td bgcolor="#FFFFFF" align="right"><?php echo $i; ?></td>
	<td bgcolor="#FFFFFF" align="right"><?php echo date("d-m-Y", strtotime($Fsp['bill_date'])); ?></td>
	<td bgcolor="#FFFFFF" align="right"><?php echo $Fsp['inv_no']; ?></td>
	<td bgcolor="#FFFFFF" align="right"><?php echo $Fsp['Total_bill_Amount']; ?></td>
    
	 
	 
  </tr>
  <?php 
		
		}
  ?>
</table>
</body>
</html>
