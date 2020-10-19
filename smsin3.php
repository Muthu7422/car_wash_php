<?php 
//$ch = curl_init();
$v="TN57AX0784";
$a="350";
$m="9940707374";

$id=7;
$hs='<a href="http://sivakasi.autoray.in/feedback.php?id='.$id.'">';
$hs2='>';
$he='</a>';
$url='http://sivakasi.autoray.in/feedback.php?id='.$id;
//https://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=96rK6IjksVy&MobileNo=919940707374&SenderID=AUTORY&Message=test%20asmotors&ServiceName=INTERNATIONAL
// $message="Dear Customer , Thanks for your Business with Protouch.Please Visit Again.We Expect your Feed Back for Better Service".$hs." For Feedback".$he;
$id=7;
$message="Dear Customer , Thanks for your Business with Protouch.Please Click for Rateus. http://sivakasi.autoray.in/feedback.php?id=".$id;

$m="91".$m;
$apikey="96rK6IjksVy";
$mobileno=$m;
$senderid="AUTORY";
$servicename="INTERNATIONAL";
//https://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?APIKEY=96rK6IjksVy&MobileNo=919940707374&SenderID=AUTORY&Message=test%20asmotors&ServiceName=INTERNATIONAL
$content =  'APIKEY='.rawurlencode($apikey). 
                '&MobileNo='.rawurlencode($mobileno). 
				'&SenderID='.rawurlencode($senderid).
				'&Message='.rawurlencode($message).
                '&ServiceName='.rawurlencode($servicename); 
                
$url="https://smsapi.24x7sms.com/api_2.0/SendSMS.aspx?$content";
$ch = curl_init($url);
curl_exec($ch);
curl_close($ch);
header("location:index.php");
?>
