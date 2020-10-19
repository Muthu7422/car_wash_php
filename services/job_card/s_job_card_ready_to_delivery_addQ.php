<?php
error_reporting(0);
ob_start();
include("../../includes.php");
include("../../redirect.php");

if($_POST['PSms']=='Enable')
{

 $ct="update s_job_card set jcard_status='Ready To Delivery' where id='".$_REQUEST['JobcardId']."'"; 
$Ect=mysqli_query($conn,$ct);

//SMS Service Starts//	 

// http://www.apiconnecto.com/API/SMSApiConnector.aspx?UserId=inwaytest&pwd=123456&Message=testfromAPI&Contacts=9940707374&SenderId=INWAYH&ServiceName=SMSTRANS&MessageType=1

	 $ss="select * from s_job_card where id='".$_REQUEST['JobcardId']."'"; 
	$Ess=mysqli_query($conn,$ss);
	$FEss=mysqli_fetch_array($Ess);
	
	$ss1="select * from a_customer where id='".$FEss['customer_id']."'";
	$Ess1=mysqli_query($conn,$ss1);
	$FEss1=mysqli_fetch_array($Ess1);
	
// $ch = curl_init();
// $ref=$FEss1['refer'];
// $name=$FEss['sname'];
// $vno=$FEss['vehicle_no'];
// $cust=$FEss1['cust_name'];
  // $m=$FEss['smobile'];
//Username: shakilaauto@gmail.com
// $user="shakilaauto@gmail.com:vertex123";
// $receipientno=$m;
// $senderID="TEST SMS";

//$message="Dear ".$ref.".".$name.",Your vehicle with registration number :".$vno."is ready for delivery.";

// SMS content Start //
/* $userid="protouch";
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
curl_close($ch); */

// $userid="protouch";
// $pwd="welcome123";
// $senderid="protch";
// $channel="Trans";
// $DCS="0";
// $flashsms="0";
 // $contacts=$m;
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



$id=$_REQUEST['JobcardId'];

//Feedback Message

// started SMS   //
$ch = curl_init();
$v=$FEss['vehicle_no'];
$a=$pin_fetch['IncludeGst'];
$m=$FEss['smobile'];
$receipientno=$m;
//https://bit.ly/2MsP6ko
//$he='</a>';
//$message="Dear Customer , Thanks for your Business with Protouch.Total Bill Amount Rs.".$a."/-. Please Visit Again.We Expect your Feed Back for Better Service".$hs."For Feedback".$he;
// SMS content Start //
$message="Dear ".$cust.", Thanks for visiting Protouch.Please Click here to rate our services.    http://protouch.vertexsolution.co.in/feedback.php?id=".$id."";
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
$url="http://indiasmstalks.in/API/pushsms.aspx?$content";
$ch = curl_init($url);
curl_exec($ch);
curl_close($ch);
*/
// SMS content END //
//header("location:s_jobcard_view.php");
}else{
	
	 $ct="update s_job_card set jcard_status='Ready To Delivery' where id='".$_REQUEST['JobcardId']."'"; 
$Ect=mysqli_query($conn,$ct);

	header("location:s_jobcard_view.php");
}

?>