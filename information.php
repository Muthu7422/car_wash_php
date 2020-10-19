<?php
include("includes.php");
//include("redirect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Information</title>
</head>
<body class="">
<div class="wrapper"> 
    <section class="content container-fluid">
	 <?php
	 
	 //SMS Service Starts//	 
	   $ss="select * from s_job_card where job_card_no='F1-1'";
		$Ess=mysql_query($ss); 
		$FEss=mysql_fetch_array($Ess);
	
$ch = curl_init();

$v=$FEss['sname'];
$a=$FEss['vehicle_no'];
$b=$FEss['IncludeGst'];
$c=$FEss['DeliveryDate'];
$d=$FEss['DeliveryTime'];
$e=(rand(1000,10000));
$m="8344721963";
//Username: shakilaauto@gmail.com
$user="shakilaauto@gmail.com:vertex123";
$receipientno=$m;
$senderID="TEST SMS";

$msgtxt="Dear Customer".$v." ,your Vehicle Number is ".$a."is under the service and delivered on ".$c." time ".$d.".Invoice Amount is Rs.".$b."/-. Please share this ".$e." secret pin number if You are only satisified with our service. Please Visit Again ";
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
$buffer = curl_exec($ch);

if(empty ($buffer))
{ echo " buffer is empty "; }
else
{ echo $buffer; }
curl_close($ch); 

//SMS Service End//

?>

<?php
	 
	 //SMS Service Starts//	 
	   $ss="select * from s_job_card where job_card_no='F1-1'";
		$Ess=mysql_query($ss);
		$FEss=mysql_fetch_array($Ess);
	
$ch = curl_init();

$name=$FEss['sname'];
$vno=$FEss['vehicle_no'];
$m="8344721963";
//Username: shakilaauto@gmail.com
$user="shakilaauto@gmail.com:vertex123";
$receipientno=$m;
$senderID="TEST SMS";

$msgtxt="Dear Customer".$name." ,your Vehicle Number is ".$vno."is ready for delivery. Thanks for your support. Please Visit Again ";
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
$buffer = curl_exec($ch);

if(empty ($buffer))
{ echo " buffer is empty "; }
else
{ echo $buffer; }
curl_close($ch); 

//SMS Service End//

?>
</section>
</div>
</body>
</html>