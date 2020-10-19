<?php
session_start();
error_reporting(0);
//https://www.webslesson.info/2018/08/create-dynamic-pdf-send-as-attachment-with-email-in-php.html
//index.php




mysqli_connect("","tidi","!dkmh~lq-g_n");
 mysqli_select_db("tidi"); 
 
 // $conn = mysqli_connect("localhost","root","") or die("cannot connect"); 
// mysqli_select_db($conn, "taiba") or die("cannot select DB");


$message = '';

//$connect = new PDO("mysqli:host=localhost;dbname=protouch", "root", "");
$connect = new PDO("mysqli:host=localhost;dbname=tidi", "tidi","!dkmh~lq-g_n");
//$connect = new PDO("mysqli:host=localhost;dbname=vdplus", "vdplus", "q8(Y2E~[-xd[");

$supname='';
$supemail='';



function fetch_customer_data($connect)
{
	$i=0;
	
	
	
$date=date('d/m/Y');
 $s="select * from sales_invoice where inv_no='".$_REQUEST['inv_no']."'"; 
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

 $cus="select * from a_customer where id='".$Fs['cname']."'";
$spm=mysqli_query($conn,$cus);
$epm=mysqli_fetch_array($spm);

$supname=$epm["cust_name"];
$supemail=$epm["email"];
$_SESSION['cust_name']=$supname;
$_SESSION['email']=$supemail;
	
	
$output.='<tr>
<td  align="LEFT" colspan="5"style="font-size:18px">Customer Name  : <B>'.$epm['cust_name'].'</B><BR/>
  Mobile No: <B>'.$epm['mobile1'].'</B><BR/>
  Address : <B>'.$epm['addr'].'</B><BR/>
  Email :<B>'.$_SESSION['email'].'</B><BR/>
  
<td  boalign="LEFT" colspan="2" ><span style="font-size:18px">Date : <b>'.date("d-m-Y", strtotime($Fs['sdate'])).'</b></span><br/>
  Invoice No: <b>'.$Fs['inv_no'].'</b><br/>
 </tr>'; 

$pq="select * from sales_invoice_details where inv_no='".$_REQUEST['inv_no']."'";
$rs=mysqli_query($conn,$pq);
$n=mysqli_num_rows($rs);
if($n>0)
{
  
$output.='
  
<tr align="left">
<td colspan="2"></td>
<td align="left" colspan="10" style=" height:20px" ><span style="font-size:20px">INVOICE DETAILS</span></td>
</tr>
<tr align="left">
<td ></td>
<td ><b>S:No</b></td>
<td><b>Spare Name</b></td>
<td ><b>MRP</b></td>
<td><b>Qty</b></td>
<td><b>Amount</b></td>
<td><b>Gst Amount</b></td>
<td><b>Total Amount</b></td>
</tr>';
 $gt1="select * from sales_invoice_details where inv_no='".$_REQUEST['inv_no']."'"; 
$Egt1=mysqli_query($conn,$gt1);
while($Fs1=mysqli_fetch_array($Egt1))
{


		 $sdm="select *from m_spare where sid='".$Fs1['spare_name']."'"; 
			$scm=mysqli_query($conn,$sdm);
			while($dcm=mysqli_fetch_array($scm))
			{
			
			

$i++;

$output.='<tr>
<td ></td>
<td >'.$i.'</td>
<td >'.$dcm['sname'].'</td>
<td  >'.$Fs1['mrp'].'</td>
<td >'.$Fs1['qty'].'</td>
<td >'.$Fs1['total'].'</td>
<td >'.$Fs1['tax_amt'].'</td>
<td >'.$Fs1['total_amount'].'</td>
</tr>';
 
}
}
}
$gt1="select * from sales_invoice where inv_no='".$_REQUEST['inv_no']."'"; 
$Egt1=mysqli_query($conn,$gt1);
$Fs1=mysqli_fetch_array($Egt1);



$output.=
'<tr>
<td colspan="5"></td>
<td  align="right" colspan="2" height="30px"><b>BILL AMOUNT :</b> &nbsp;&nbsp;</td>
<td align="left" colspan="1">&nbsp;&nbsp;<b>'.$Fs1['ActualSellingPrice'].'</b></td>
</tr>';

$output.=
'<tr height="30px">
     <td align="center" colspan="8"><strong>Thank You For Your Business</strong></td>
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
	$s1="select * from sales_invoice where inv_no='".$_REQUEST['inv_no']."'"; 
    $Es1=mysqli_query($conn,$s1);
    $Fs1=mysqli_fetch_array($Es1);
	
	$s11="select * from a_customer where id='".$Fs1['cname']."'"; 
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
			echo fetch_customer_data($connect);
			?>			
		</div>
		<br />
		<br />
	</body>
</html>





