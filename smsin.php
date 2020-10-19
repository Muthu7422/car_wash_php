<?php 
$ch = curl_init();
//http://www.apiconnecto.com/API/SMSApiConnector.aspx?UserId=inwaytest&pwd=123456&Message=test from InwayAPI&Contacts=9940707374&SenderId=INWAYH&ServiceName=SMSTRANS&MessageType=1
//http://www.apiconnecto.com/API/SMSApiConnector.aspx?UserId=inwaytest&pwd=123456&Message=testfromAPI&Contacts=9940707374&SenderId=INWAYH&ServiceName=SMSTRANS&MessageType=1
//UserId=inwaytest&pwd=123456&Message=testfromAPI&Contacts=9940707374&SenderId=INWAYH&ServiceName=SMSTRANS&MessageType=1
$userid='inwaytest';
$pwd='123456';
$message="Dear Customer , Thanks for your Business with Shakila Auto Service. Your Vehicle  is ready to Delivery.Invoice Amount is  Please Visit Again ";
$contacts='9940707374';
$senderid="INWAYH";
?>
<a href="http://www.apiconnecto.com/API/SMSApiConnector.aspx?<?php echo "UserId=$userid&pwd=$pwd&Message=$message&Contacts=$contacts&SenderId=$senderid&ServiceName=SMSTRANS&MessageType=1"; ?>" target="_blank">Click</a>