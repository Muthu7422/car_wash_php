<?php 
// $content =  'loginID='.rawurlencode($userid). 
                // '&password='.rawurlencode($pwd). 
				// '&mobile='.rawurlencode($contacts).
				// '&text='.rawurlencode($message).
                // '&senderid='.rawurlencode($senderid). 
                // '&route_id='.rawurlencode($routeid). 
                // '&Unicode='.rawurlencode($Unicode);
//echo $url="http://indiasmstalks.in/API/pushsms.aspx?$content";

//channel=Trans&DCS=0&flashsms=0&number=9566969517&text=test%20message&route=6
//http://indiasmstalks.com/api/mt/SendSMS?user=protouch&password=welcome123&senderid=Protch&channel=Trans&DCS=0&flashsms=0&number=9566969517&text=test%20message&route=6

$message="Dear kumaresan k The Invoiced bill amount is Rs Your secret pin is  Please provide us the secret pin while taking delivery only if you are satisfied with our workmanship. Have a nice time shopping at prozonemall !";
$userid="protouch";
$pwd="welcome123";
$senderid="protch";
$channel="Trans";
$DCS="0";
$flashsms="0";
$contacts='9940707374';
$route="9";
$content =  'user='.rawurlencode($userid). 
                '&password='.rawurlencode($pwd). 
				'&senderid='.rawurlencode($senderid).
				'&channel='.rawurlencode($channel).
				'&DCS='.rawurlencode($DCS).
				'&flashsms='.rawurlencode($flashsms).				
				'&number='.rawurlencode($contacts).
				'&text='.rawurlencode($message).                
                '&route='.rawurlencode($route); 
$url="http://indiasmstalks.com/api/mt/SendSMS?$content";
$ch = curl_init($url);
echo curl_exec($ch);
curl_close($ch);
//header("location:login.php?m=sms sent !");

?>