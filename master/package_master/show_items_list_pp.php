<?php
$date=date('d/m/Y');
include("../../includes.php");
include("../../redirect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Item List</title>
</head>

<body>
<table  align="center" cellspacing="1" bgcolor="#FF6633">
  <tr>
    <td width="82" height="32" bgcolor="#FF6633"><strong>S:no </strong></td>
	 <td width="89" bgcolor="#FF6633"><strong>Item Name</strong></td>
  </tr>
  <?php
  
	$i=0;
   $sn="select * from m_service_type where stype='".$_REQUEST['iname']."' AND status='Active' order by id desc"; 
  $Esn=mysqli_query($conn,$sn);
  $Fsn=mysqli_fetch_array($Esn);
  
	   $snp="select * from m_service_type_details where service_type='".$Fsn['id']."' AND status='Active' order by id desc";
		$Esp=mysqli_query($conn,$snp);
		while($Fsp=mysqli_fetch_array($Esp))
		{
			$i++;
			
			$dcm="select * from m_spare where sid='".$Fsp['spare_name']."'";
			$pcm=mysqli_query($conn,$dcm);
			$ecm=mysqli_fetch_array($pcm);
   ?>
  <tr>
    <td bgcolor="#FFFFFF" align="right"><?php echo $i; ?></td>
	<td bgcolor="#FFFFFF" align="right"><?php echo $ecm['sname']; ?></td>
    
	 
	 
  </tr>
  <?php 
		
		}
  ?>
</table>
</body>
</html>
