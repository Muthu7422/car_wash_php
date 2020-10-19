<?php 
//$ch = curl_init();

$v="tn342122";
$a="350";
$m="9940707374";
//Username: shakilaauto@gmail.com
//http://www.apiconnecto.com/API/SMSApiConnector.aspx?UserId=inwaytest&pwd=123456&Message=testfromAPI&Contacts=9940707374&SenderId=INWAYH&ServiceName=SMSTRANS&MessageType=1
//UserId=inwaytest&pwd=123456&Message=testfromAPI&Contacts=9940707374&SenderId=INWAYH&ServiceName=SMSTRANS&MessageType=1
//$userid="inwaytest";
//$pwd="123456";
//$message="Dear Customer , Thanks for your Business with Shakila Auto Service. Your Vehicle ".$v." is ready to Delivery.Invoice Amount is Rs.".$a."/-. Please Visit Again ";
//$contacts=$m;
//$senderId="INWAYH";


//

$userid="inwaytest";
$pwd="123456";
//$message="Dear Customer , Thanks for your Business with Protouch. Your Vehicle is ready to Delivery.Invoice Amount is Rs Please Visit Again ";
$message="Dear Customer , Thanks for your Business with Protouch. Your Vehicle ".$v." is ready to Delivery.Invoice Amount is Rs.".$a."/-. Please Visit Again ";
$contacts=$m;
$senderid="INWAYH";
$servicename="SMSTRANS";
$messagetype="1";



$content =  'UserId='.rawurlencode($userid). 
                '&pwd='.rawurlencode($pwd). 
				'&Message='.rawurlencode($message).
				'&Contacts='.rawurlencode($contacts).
                '&SenderId='.rawurlencode($senderid). 
                '&ServiceName='.rawurlencode($servicename). 
                '&MessageType='.rawurlencode($messagetype);
		
		//echo $content;exit();
		
		
		
//$url="http://www.apiconnecto.com/API/SMSApiConnector.aspx?UserId=inwaytest&pwd=123456&Message=kumaresanKaliappan&Contacts=9940707374&SenderId=INWAYH&ServiceName=SMSTRANS&MessageType=1";
$url="http://www.apiconnecto.com/API/SMSApiConnector.aspx?$content";
$ch = curl_init($url);
curl_exec($ch);
//print_r(curl_getinfo($ch));
curl_close($ch);
//header("location:index.php");
?>
