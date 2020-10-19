<?php 
$ch = curl_init();

//$v="tn342122";
//$a="350";
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
$message="Dear Customer , Thanks for your Business with Shakila Auto Service. Your Vehicle is ready to Delivery.Invoice Amount is Rs Please Visit Again ";
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
		
		echo $content;exit();
		
		
		$ch = curl_init('http://www.apiconnecto.com/API/SMSApiConnector.aspx?'); 
        curl_setopt($ch, CURLOPT_POST, true); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $buffer = curl_exec ($ch); 
		
		if(empty ($buffer))
		{ echo " buffer is empty "; }
		else
		{ echo $buffer; }
        curl_close ($ch);
?>
