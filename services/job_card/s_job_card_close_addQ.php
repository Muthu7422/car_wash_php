<?php
include("../../includes.php");
include("../../redirect.php");


$id=$_REQUEST['JobcardId'];
$pin="select * from s_job_card where id='".$_POST['JobcardId']."'";
$pin_query=mysqli_query($conn,$pin);
$pin_fetch=mysqli_fetch_array($pin_query);

    $ss1="select * from a_customer where id='".$pin_fetch['customer_id']."'";
	$Ess1=mysqli_query($conn,$ss1);
	$FEss1=mysqli_fetch_array($Ess1);


// if($_POST['sms']!='Disable')
// {
$ct="update s_job_card set jcard_status='Close' where id='".$_REQUEST['JobcardId']."'"; 
$Ect=mysqli_query($conn,$ct);

// started SMS   //
//$ch = curl_init();
///$v=$pin_fetch['vehicle_no'];
///$cust=$FEss1['cust_name'];
//$a=$pin_fetch['IncludeGst'];
//$m=$pin_fetch['smobile'];
///$receipientno=$m;
//https://bit.ly/2MsP6ko
//$he='</a>';
//$message="Dear Customer , Thanks for your Business with Protouch.Total Bill Amount Rs.".$a."/-. Please Visit Again.We Expect your Feed Back for Better Service".$hs."For Feedback".$he;
// SMS content Start //
//$message="Dear ".$cust.", Thanks for visiting Protouch.Please Click here to rate our services.  http://protouch.vertexsolution.co.in/feedback.php?id=".$Ect;
/* 
$userid="protouch";
$pwd="welcome123";
$contacts=$m;
$senderid="protch";
$routeid="2";
$Unicode="0";

$content =  'loginID='.rawurlencode($userid). 
                '&password='.rawurlencode($pwd). 
				'&mobile='.rawurlencode($contacts).
				'&text='.rawurlencode($message).
                '&senderid='.rawurlencode($senderid). 
                '&route_id='.rawurlencode($routeid). 
                '&Unicode='.rawurlencode($Unicode);
$url="http://indiasmstalks.com/api/mt/SendSMS?$content";
$ch = curl_init($url);
curl_exec($ch);
curl_close($ch);
 // */
// $userid="protouch";
// $pwd="welcome123";
// $senderid="protch";
// $channel="Trans";
// $DCS="0";
// $flashsms="0";
// $contacts="$m";
// $route="6";
// $content =  'user='.rawurlencode($userid). 
                // '&password='.rawurlencode($pwd). 
				// '&senderid='.rawurlencode($senderid).
				// '&channel='.rawurlencode($channel).
				// '&DCS='.rawurlencode($DCS).
				// '&flashsms='.rawurlencode($flashsms).				
				// '&number='.rawurlencode($contacts).
				// '&text='.rawurlencode($message).                
                // '&route='.rawurlencode($route); 
 // $url="http://indiasmstalks.com/api/mt/SendSMS?$content";
// $ch = curl_init($url);
 // curl_exec($ch);
// curl_close($ch);

// SMS content END //

$job_card_no=$_POST['job_card_no'];
$JobcardId=$_POST['JobcardId'];

header("location:../../store/final_bill/f_bill1.php?job_card_no=$job_card_no&&JobcardId=$JobcardId");
//}
else
{
	
	$ct="update s_job_card set jcard_status='Close' where id='".$_REQUEST['JobcardId']."'"; 
$Ect=mysqli_query($conn,$ct);
	
	$job_card_no=$_POST['job_card_no'];
    $JobcardId=$_POST['JobcardId'];
	
	header("location:../../store/final_bill/f_bill1.php?job_card_no=$job_card_no&&JobcardId=$JobcardId");
//}
?>