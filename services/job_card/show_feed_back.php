<?php
$date=date('d/m/Y');
include("../../includes.php");
include("../../redirect.php");

$jcn=$_REQUEST['jcn'];
$s="SELECT q1,q2,q3,q4,q5,q6,q7,RecommendUs FROM `s_job_card` WHERE job_card_no='$jcn'";
$Es=mysqli_query($s);
$FEs=mysqli_fetch_array($Es);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Feed Back Details  of Job Card - <?php echo $jcn; ?></title>
</head>

<body>
<table  align="center" cellspacing="1" bgcolor="#2C5288" width="100%">
  <tr>
   	 <td width="89" bgcolor="#2C5288" align="left" style="color:white"><strong>1. How would you rate our customer friendliness?</strong> 
	 <?php 
	 if($FEs['q1']=='2.00')
	 {
		 echo "* * * * * ";
	 }
	 else  if($FEs['q1']=='1.60')
	 {
		 echo "* * * * ";
	 }
	 else  if($FEs['q1']=='1.20')
	 {
		 echo "* * *  ";
	 }
	 else  if($FEs['q1']=='0.80')
	 {
		 echo "* *  ";
	 }
	
	 else  if($FEs['q1']=='0.40')
	 {
		 echo "* ";
	 }
	?>
	 
	 </td>
  </tr>  
  <tr>
   	 <td width="89" bgcolor="#2C5288" align="left" style="color:white"><strong>2. Kindly rate the exterior cleanliness of your car?</strong> 
	<?php 
	 if($FEs['q2']=='2.00')
	 {
		 echo "* * * * * ";
	 }
	 else  if($FEs['q2']=='1.60')
	 {
		 echo "* * * * ";
	 }
	 else  if($FEs['q2']=='1.20')
	 {
		 echo "* * *  ";
	 }
	 else  if($FEs['q2']=='0.80')
	 {
		 echo "* *  ";
	 }
	
	 else  if($FEs['q2']=='0.40')
	 {
		 echo "* ";
	 }
	?>
	 </td>
  </tr> 
  <tr>
   	 <td width="89" bgcolor="#2C5288" align="left" style="color:white"><strong>3. If service provided, kindly rate the interior cleanliness of your car </strong>
	 <?php 
	 if($FEs['q3']=='2.00')
	 {
		 echo "* * * * * ";
	 }
	 else  if($FEs['q3']=='1.60')
	 {
		 echo "* * * * ";
	 }
	 else  if($FEs['q3']=='1.20')
	 {
		 echo "* * *  ";
	 }
	 else  if($FEs['q3']=='0.80')
	 {
		 echo "* *  ";
	 }
	
	 else  if($FEs['q3']=='0.40')
	 {
		 echo "* ";
	 }
	?>
	 </td>
  </tr> 
  <tr>
   	 <td width="89" bgcolor="#2C5288" align="left" style="color:white"><strong>4. If car detailing was provided, kindly rate the quality of the service </strong>
	 <?php 
	 if($FEs['q4']=='2.00')
	 {
		 echo "* * * * * ";
	 }
	 else  if($FEs['q4']=='1.60')
	 {
		 echo "* * * * ";
	 }
	 else  if($FEs['q4']=='1.20')
	 {
		 echo "* * *  ";
	 }
	 else  if($FEs['q4']=='0.80')
	 {
		 echo "* *  ";
	 }
	
	 else  if($FEs['q4']=='0.40')
	 {
		 echo "* ";
	 }
	?>
	 </td>
  </tr> 
  <tr>
   	 <td width="89" bgcolor="#2C5288" align="left" style="color:white"><strong>5. Kindly rate the cleanliness of our facilities </strong>
	 <?php 
	 if($FEs['q5']=='2.00')
	 {
		 echo "* * * * * ";
	 }
	 else  if($FEs['q5']=='1.60')
	 {
		 echo "* * * * ";
	 }
	 else  if($FEs['q5']=='1.20')
	 {
		 echo "* * *  ";
	 }
	 else  if($FEs['q5']=='0.80')
	 {
		 echo "* *  ";
	 }
	
	 else  if($FEs['q5']=='0.40')
	 {
		 echo "* ";
	 }
	?>
	 </td>
  </tr> 
  <tr>
   	 <td width="89" bgcolor="#2C5288" align="left" style="color:white"><strong>6. How would you rate the quality of vacuuming?</strong>
	 <?php 
	 if($FEs['q6']=='2.00')
	 {
		 echo "* * * * * ";
	 }
	 else  if($FEs['q6']=='1.60')
	 {
		 echo "* * * * ";
	 }
	 else  if($FEs['q6']=='1.20')
	 {
		 echo "* * *  ";
	 }
	 else  if($FEs['q6']=='0.80')
	 {
		 echo "* *  ";
	 }
	
	 else  if($FEs['q6']=='0.40')
	 {
		 echo "* ";
	 }
	?>
	 </td>
  </tr> 
   <tr>
   	 <td width="89" bgcolor="#2C5288" align="left" style="color:white"><strong>7. Overall, how would you rate the services provided to you?</strong>
	 <?php 
	 if($FEs['q7']=='2.00')
	 {
		 echo "* * * * * ";
	 }
	 else  if($FEs['q7']=='1.60')
	 {
		 echo "* * * * ";
	 }
	 else  if($FEs['q7']=='1.20')
	 {
		 echo "* * *  ";
	 }
	 else  if($FEs['q7']=='0.80')
	 {
		 echo "* *  ";
	 }
	
	 else  if($FEs['q7']=='0.40')
	 {
		 echo "* ";
	 }
	?>
	 </td>
  </tr> 
  <tr>
   	 <td width="89" bgcolor="#2C5288" align="left" style="color:white"><strong>8. Would you recommend us to your friends & family?</strong>  <?php echo $FEs['RecommendUs']; ?></td>
  </tr> 
</table>
</body>
</html>
