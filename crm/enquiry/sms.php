<?php 

$ch = curl_init();

$v="tn342122";
$a="350";
$m=$_POST["CustomerMobile1"];
//Username: shakilaauto@gmail.com

$user="shakilaauto@gmail.com:vertex123";
$receipientno=$m;
$senderID="TEST SMS";
$msgtxt=$_POST["Description"];

//$msgtxt="Dear Customer , Thanks for your Business with Shakila Auto Service. Your Vehicle ".$v." is ready to Delivery.Invoice Amount is Rs.".$a."/-. Please Visit Again ";
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
header("location:enquiry.php");
?>