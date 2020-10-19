<?php
session_start();
//https://www.webslesson.info/2018/08/create-dynamic-pdf-send-as-attachment-with-email-in-php.html
//index.php
mysql_connect("","service_station","Yx6L0!rnBGvG");
mysql_select_db("service_station"); 

//mysql_connect("localhost","root","");
//mysql_select_db("servicestation"); 

$message = '';

//$connect = new PDO("mysql:host=localhost;dbname=servicestation", "root", "");
$connect = new PDO("mysql:host=;dbname=service_station","service_station", "Yx6L0!rnBGvG");

$supname='';
$supemail='';



function fetch_customer_data($connect)
{
	
	$sc="select * from m_franchisee order by id";
	$Esc=mysql_query($sc);
	$FEsc=mysql_fetch_array($Esc);
	
	$id=$_REQUEST['iid'];
	$spo="select * from s_purchase_order where id='$id'";
	$Espo=mysql_query($spo);
	$FEspo=mysql_fetch_array($Espo);
	
	$query = "SELECT * FROM s_purchase_order_details where inv_no='".$FEspo['id']."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	
	$cus="select * from m_supplier where sid='".$FEspo['supplier_name']."'";
	$spm=mysql_query($cus);
	$Fs=mysql_fetch_array($spm);
	
	$supname=$Fs["sname"];
	$supemail=$Fs["semail"];
	$_SESSION['supname']=$supname;
	$_SESSION['supemail']=$supemail;
	
	
	$output = '
	
	<div class="table-responsive">
		<table class="table table-striped ">
	<tr>
	<td  align="center" colspan="5" ><B>Purchase Order Details</B><BR/></td>
	</tr>
	
	<tr>
	<td  align="LEFT" colspan="3" ><B>'.$FEsc["franchisee_name"].' </B><BR/>
	<B>'.$FEsc["address"].'</B><BR/>
	<B>'.$FEsc["con_number"].'</B><BR/>
	<B> GSTN: '.$FEsc["gst_no"].'</B><BR/>
	</td >
	<td align="right" colspan="2"> Date : <B>'.$FEspo["pdate"].'</B><BR/>
	Purchase Order No. <B>'.$FEspo["inv_no"].'</B><BR/>
	</td>
	</tr>
	
	
	<tr>
	<td  align="LEFT" colspan="5" >Supplier Name :<B>'.$supname.' </B><BR/>
	Mobile No: <B>'.$Fs["smobile1"].'</B><BR/>
	Address : <B>'.$Fs["saddress"].'</B><BR/>
	City: <B>'.$Fs["scity"].'</B><BR/>
	State: <B>'.$Fs["sstate"].'</B><BR/>
	Email: <B>'.$supemail.'</B>
	</td >
	
	</tr>
	
	<tr >
	<td  align="center" colspan="5" ><B>Product Details</B><BR/></td>
	</tr>	
		
			<tr align="center">
				<th>S.No</th>
				<th>Spare Part No. </th>
				<th>Spare Name</th>
				<th>Unit</th>
				<th>Qty</th>
				
			</tr>
	';
	$i=0;
	foreach($result as $row)
	{
		
		$ss="select * from m_spare where sid='".$row["spare_name"]."'";
		$Ess=mysql_query($ss);
		$FEss=mysql_fetch_array($Ess);
		
		
		$i++;
		$output .= '
			<tr>
				<td>'.$i.'</td>
				<td>'.$FEss["spartno"].'</td>
				<td>'.$FEss["sname"].'</td>
				<td>'.$row["unit"].'</td>
				<td>'.$row["qty"].'</td>
			</tr>
		';
	}
	$output .= '
		</table>
	</div>
	';
	return $output;
}

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
	$mail->Subject = 'Purchase Order  from Auto Detailerz';			//Sets the Subject of the message
	$mail->Body = 'Hi,Please Find Purchase Order details in attached PDF File.';				//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<label class="text-success">Purchase Order Details has been send successfully...</label>';
	}
	unlink($file_name);*/
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Purchase Order Details</title>
		<script src="jquery.min.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css" />
		<script src="bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h3 align="center">Purchase Order Details</h3>
			<br />
			<form method="post">
				<input type="submit" name="action" class="btn btn-danger" value="Send PDF " /><?php echo $message; ?>
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





