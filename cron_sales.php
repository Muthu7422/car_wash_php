<?php 
include("includes.php");
$time=date("h:i a");
$date=date("Y-m-d");
$ddate=date("d-m-Y");
$m="8610555170";

$sjc="SELECT count(id) as jc FROM `s_job_card` where jdate='$date' AND status='Active'";
$Esjc=mysqli_query($conn,$sjc);
$FEsjc=mysqli_fetch_array($Esjc);
$tjc=$FEsjc['jc'];
//echo "</br>";
$ss="SELECT ifnull(sum(IncludeGst),0) as sales FROM `s_job_card` where jdate='$date' AND status='Active'";
$Ess=mysqli_query($conn,$ss);
$FEss=mysqli_fetch_array($Ess);
$tsales=$FEss['sales'];
//echo "</br>";

$sspare="SELECT ifnull(sum(total_amount),0) as sales FROM `sales_invoice_details` where sdate='$date' AND bill_status='Open'";
$Esspare=mysqli_query($conn,$sspare);
$FEsspare=mysqli_fetch_array($Esspare);
$tsspare=$FEsspare['sales'];
//echo "</br>";

 $message="Today ".$ddate." Until ".$time."  Total Job Cards - ".$tjc." Total Service Sales Rs.".$tsales." Total Counter Sales Rs.".$tsspare." "; 

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
// public_html/protouch.vertexsolution.co.in/
?>