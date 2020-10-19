<?php
session_start();
//https://www.webslesson.info/2018/08/create-dynamic-pdf-send-as-attachment-with-email-in-php.html
//index.php


//mysql_connect("localhost","root","");
//mysql_select_db("protouch"); 

$conn = mysqli_connect("", "vprotouch", "JxT]@MQd[F(H") or die("cannot connect"); 
mysqli_select_db($conn, "vprotouch") or die("cannot select DB");
//mysql_connect("198.71.227.89","vertex","vertex123");
//mysql_select_db("vprotouch");

//mysql_connect("localhost","vdplus","q8(Y2E~[-xd[");
//mysql_select_db("vdplus");

$message = '';

//$connect = new PDO("mysql:host=localhost;dbname=protouch", "root", "");
$connect = new PDO("mysql:host=localhost;dbname=vprotouch", "vprotouch", "JxT]@MQd[F(H");
//$connect = new PDO("mysql:host=localhost;dbname=vdplus", "vdplus", "q8(Y2E~[-xd[");

$supname='';
$supemail='';



function fetch_customer_data($connect)
{
	$i=0;
	
	
	
$date=date('d/m/Y');
 $s="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'"; 
$Es=mysql_query($s);
$Fs=mysql_fetch_array($Es);
$n=mysql_num_rows($Es);
$ino=$n;

//  $spm="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";
 $spm="select * from m_franchisee where id='5'";
$Scm=mysql_query($spm);
$Frp1=mysql_fetch_array($Scm);


 $pr1="select * from m_company where cus_name='".$_SESSION['company']."'";  
$Epr1=mysql_query($pr1);
$Fpr1=mysql_fetch_array($Epr1);


$output='<div class="table-responsive">
<table class="table table-striped ">

<tr>
<td align="center" colspan="5" ><span style="font-size:28px"><B>'.$Frp1['franchisee_name'].'</B></span><BR/>'.$Frp1['address'].',<BR/>'.$Frp1['gst_no'].',<BR/>'.$Frp1['cen_manager'].'<BR/>'.$Frp1['con_number'].'<BR/></td>
</tr>';

$cus="select * from a_customer where mobile1='".$Fs['cmobile']."'";
$spm=mysql_query($cus);
$epm=mysql_fetch_array($spm);

$supname=$epm["cust_name"];
$supemail=$epm["email"];
$_SESSION['supname']=$supname;
$_SESSION['supemail']=$supemail;
	
	
$output.='<tr>
<td  align="LEFT" colspan="3"style="font-size:18px">Customer Name  : <B>'.$epm['cust_name'].'</B><BR/>
  Mobile No: <B>'.$Fs['cmobile'].'</B><BR/>
  Address : <B>'.$Fs['caddrs'].'</B><BR/>
  Email :<B>'.$_SESSION['supemail'].'</B><BR/>
  Payment Mode: <B>'.$Fs['ptype'].'</B></td>
<td  boalign="LEFT" colspan="2" ><span style="font-size:18px">Date : <b>'.date("d-m-Y", strtotime($Fs['bill_date'])).'</b></span><br/>
  Invoice No: <b>'.$Fs['inv_no'].'</b><br/>
  Job Card No: <b>'.$Fs['job_card_no'].'</b><br/></td>
</tr>'; 
$na="select * from a_customer_vehicle_details where cust_no='".$Fs['cmobile']."'";  
$nam=mysql_query($na);
$vehile=mysql_fetch_array($nam);

$output.='<tr height="15px">
   <td align="center" colspan="5"><strong>VEHICLE SERVICE DETAILS </strong></td>
 </tr>';
  $gt1="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'"; 
$Egt1=mysql_query($gt1);
$Fs1=mysql_fetch_array($Egt1);

			$cus="select * from a_customer_vehicle_details where vehicle_no='".$Fs1['cvehile']."'";
			$spm=mysql_query($cus);
			$epm=mysql_fetch_array($spm);
			
			$c="select * from master_vehicle where Id='".$epm['VehicleModel']."'";
			$sx=mysql_query($c);
			$as=mysql_fetch_array($sx);
			
			$output.='<tr>

<td>Vehicle No</td>
<td>Vehicle Model</td>
<td>Vehicle Brand</td>
<td>Vehicle Segment</td>
<td>Vehicle Type</td>
</tr>
<tr>
<td>'.$epm['vehicle_no'].'</td>
<td>'.$as['VehicleModel'].'</td>
<td>'.$epm['VehicleBrand'].'</td>
<td>'.$epm['VehicleSegment'].'</td>
<td>'.$epm['VehicleType'].'</td>
</tr>';
$pq="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='Package'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
if($n>0)
{
 
 $output.= '
<tr align="center">
<td colspan=""></td>
<td align="center" colspan="3" style=" height:20px" ><span style="font-size:20px">PACKAGE DETAILS</span></td>
</tr>  
  
<tr align="center">
<td colspan=""></td>
<td ><b>S:No</b></td>
<td><b>Package Name</b></td>
<td><b>Amount</b></td>
</tr>';




$tr=0;
$qt=0;
$dt=0;
$trs=0;
 $gt1="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='Package'"; 
$Egt1=mysql_query($gt1);
$Fs1=mysql_fetch_array($Egt1);


			$sdm="select *from s_job_card where job_card_no='".$Fs1['job_card_no']."'"; 
			$scm=mysql_query($sdm);
			while($dcm=mysql_fetch_array($scm))
			{
			$sdm1="select *from s_job_card_pdetails where job_card_no='".$dcm['id']."'"; 
			$scm1=mysql_query($sdm1);
			while($dcm1=mysql_fetch_array($scm1))
			{


$i++;

$output.='<tr>
<td colspan=""></td>
<td   align="center">'.$i.'</td>
<td align="center">'.$dcm1['package_type'].'</td>
<td  align="center">'.$dcm1['package_amt'].'</td>
</tr>';
 
}
}
}

  $pq="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='Service'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
if($n>0)
{
 $output.=
  '
  
<tr align="center">
<td colspan=""></td>
<td align="center" colspan="3" style=" height:20px" ><span style="font-size:20px">SERVICE DETAILS</span></td>
</tr>
<tr align="center">
<td colspan=""></td>
<td ><b>S:No</b></td>
<td ><b>Service  Name</b></td>
<td ><b>Amount</b></td>
</tr>';

$gt1="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='Service'"; 
$Egt1=mysql_query($gt1);
$Fs1=mysql_fetch_array($Egt1);


			$sdm="select *from s_job_card where job_card_no='".$Fs1['job_card_no']."'"; 
			$scm=mysql_query($sdm);
			while($dcm=mysql_fetch_array($scm))
			{
			
			$sdm1="select *from s_job_card_sdetails where job_card_no='".$dcm['id']."'"; 
			$scm1=mysql_query($sdm1);
			while($dcm1=mysql_fetch_array($scm1))
			{


$i++;

$output.='<tr align="center">
<td colspan=""></td>
<td align="center">'.$i.'</td>
<td >'.$dcm1['service_type'].'</td>
<td  align="center">'.$dcm1['st_amt'].'</td>
</tr>';
 
}
}
}

$pq="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='SparePick'";
$rs=mysql_query($pq);
$n=mysql_num_rows($rs);
if($n>0)
{
  
$output.='
  
<tr align="center">
<td colspan="2"></td>
<td align="center" colspan="3" style=" height:20px" ><span style="font-size:20px">SPARE DETAILS</span></td>
</tr>
<tr align="center">
<td colspan="2"></td>
<td ><b>S:No</b></td>
<td ><b>Spare  Name</b></td>
<td ><b>Amount</b></td>
</tr>';

$gt1="select * from a_final_bill_spare_details where inv_no='".$_REQUEST['inv_no']."' and SpareFrom='SparePick'"; 
$Egt1=mysql_query($gt1);
while($Fs1=mysql_fetch_array($Egt1))
{


			$sdm="select *from m_spare where sid='".$Fs1['sname']."'"; 
			$scm=mysql_query($sdm);
			while($dcm=mysql_fetch_array($scm))
			{
			
			

$i++;

$output.='<tr>
<td colspan="2"></td>
<td align="center">'.$i.'</td>
<td >'.$dcm['sname'].'</td>
<td   align="center">'.$dcm['smrp'].'</td>
</tr>';
 
}
}
}
$gt1="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'"; 
$Egt1=mysql_query($gt1);
$Fs1=mysql_fetch_array($Egt1);

$tax_amt=$Fs1['TotalServiceAmount']*$Fs1['gst']/100;
$total_tax_amt=$Fs1['TotalServiceAmount']+$tax_amt;






$ro=$Fs1['paid_amt']+$Fs1['from_off_amt'];
$bal=$Fs1['bill_amt']-$ro;
$output.=
'<tr>
<td colspan="2"></td>
<td  align="right" colspan="2" height="30px"><b>TOTAL SERVICE AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="1">&nbsp;&nbsp;<b>'.$Fs1['TotalServiceAmount'].'</b></td>
</tr>';
$output.=
'<tr>
<td colspan="2"></td>
<td  align="right" colspan="2" height="30px"><b>TAX (18%) :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="1">&nbsp;&nbsp;<b>'.$Fs1['gst'].'</b></td>
</tr>';
$output.=
'<tr>
<td colspan="2"></td>
<td  align="right" colspan="2" height="30px"><b>TOTAL SERVICE AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="1">&nbsp;&nbsp;<b>'.$total_tax_amt.'</b></td>
</tr>';
$output.=
'<tr>
<td colspan="2"></td>
<td  align="right" colspan="2" height="30px"><b>DISCOUNT AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="1">&nbsp;&nbsp;<b>'.$Fs1['discount'].'</b></td>
</tr>';
$output.=
'<tr>
<td colspan="2"></td>
<td  align="right" colspan="2" height="30px"><b>BILL AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="1">&nbsp;&nbsp;<b>'.$Fs1['Total_bill_Amount'].'</b></td>
</tr>';
$output.=
'<tr>
<td colspan="2"></td>
<td  align="right" colspan="2" height="30px"><b>RECEIVED AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="1">&nbsp;&nbsp;<b>'.$Fs1['rec_amt'].'.00</b></td>
</tr>';
$output.=
'<tr>
<td colspan="2"></td>
<td  align="right" colspan="2" height="30px"><b>BALANCE AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="1">&nbsp;&nbsp;<b>'.$Fs1['bal_amt'].'</b></td>
</tr>';

$output.=
'<tr height="30px">
     <td align="center" colspan="5"><strong>Thank You For Your Business</strong></td>
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
	$html_code .= fetch_customer_data($connect);
	$pdf = new Pdf();
	$pdf->load_html($html_code);
	$pdf->render();
	$file = $pdf->output();
	file_put_contents($file_name, $file);
	//file_put_contents($file_name, $file);
	$_SESSION['afile']=$file_name;
	$s1="select * from a_final_bill where inv_no='".$_REQUEST['inv_no']."'"; 
    $Es1=mysql_query($s1);
    $Fs1=mysql_fetch_array($Es1);
	
	$s11="select * from a_customer where mobile1='".$Fs1['cmobile']."'"; 
    $Es11=mysql_query($s11);
    $Fs11=mysql_fetch_array($Es11);
	
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
			echo fetch_customer_data($connect);
			?>			
		</div>
		<br />
		<br />
	</body>
</html>





