<?php
$id="4";
$message="Dear Customer , Thanks for your ".'<a href="http://protouch.vertexsolution.co.in/feedback.php">'."retre".'</a>'."/-. Please Visit Again.We Expect your Feed Back for Better Service";
$userid="vertex";
$pwd="ver123";
$contacts="9940707374";
$senderid="VRTAPP";
$servicename="SMSTRANS";
$messagetype="1";

$content =  'UserId='.rawurlencode($userid). 
                '&pwd='.rawurlencode($pwd). 
				'&Message='.rawurlencode($message).
				'&Contacts='.rawurlencode($contacts).
                '&SenderId='.rawurlencode($senderid). 
                '&ServiceName='.rawurlencode($servicename). 
                '&MessageType='.rawurlencode($messagetype);
$url="http://www.apiconnecto.com/API/SMSApiConnector.aspx?$content";
$ch = curl_init($url);
curl_exec($ch);
curl_close($ch);
?>