 <?php
$date=date('d/m/Y');
include("../../includes.php");
include("../../redirect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Recommended Service Details of This Customer </title>
</head>

<body>
<table  align="center" cellspacing="1" bgcolor="#FF6633">
  <tr>
    <td width="82" height="32" bgcolor="#FF6633"><strong>S:no </strong></td>
	 <td width="89" bgcolor="#FF6633"><strong>Date</strong></td>
	 <td width="89" bgcolor="#FF6633"><strong>Service Name</strong></td>
	 <td width="89" bgcolor="#FF6633"><strong>Service Amount</strong></td>
  </tr>
  <?php
    $rcn="Kumaresan";
	$sm="9698079706";
	$i=0;
 echo  $sn="select * from a_customer where cust_name='$rcn' AND status='Active' order by id desc"; 
  $Esn=mysqli_query($conn,$sn);
  $Fsn=mysqli_fetch_array($Esn);
  
	//echo  $snp="select * from s_job_card where sname='".$Fsn['id']."'";
	echo $snp="select * from s_job_card where smobile='$sm'";
		$Esp=mysqli_query($conn,$snp);
		while($Fsp=mysqli_fetch_array($Esp))
		{
			$da="select * from s_job_card_recomdetails where job_card_no='".$Fsp['id']."'";
			$sc-mysqli_query($conn,$da);
			$fa=mysqli_fetch_array($sc);
			$i++;
   ?>
  <tr>
    <td bgcolor="#FFFFFF" align="right"><?php echo $i; ?></td>
	<td bgcolor="#FFFFFF" align="right"><?php echo $fa['RecomDate']; ?></td>
	<td bgcolor="#FFFFFF" align="right"><?php echo $fa['service_type']; ?></td>
	<td bgcolor="#FFFFFF" align="right"><?php echo $fa['st_amt']; ?></td>
    
	 
	 
  </tr>
  <?php 
		
		}
  ?>
</table>
</body>
</html>
