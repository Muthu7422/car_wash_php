<?php
//include("../../dbinfoi.php");
session_start();
mysqli_connect("localhost","root","");
mysqli_select_db("garage") or die('Unable to connect');

//$host = 'localhost';
//$dbName = 'garage';
//$dbUser = 'root';
//$dbPassword = '';
//$conn = new mysqli($host,$dbUser,$dbPassword,$dbName) or die('Unable to connect');


$data = json_decode(file_get_contents('php://input'));

$request = $data->btnName;

$sbrand=$data->sbrand;
$sparename=$data->sparename;
$spartno=$data->spartno;
$prate=$data->prate;
$qty=$data->qty;
$invno=$data->invno;
$pdate=$data->pdate;
$supplier_name=$data->suppliername;
$out=$data->outst;
$id = $data->pid;  


$tot=$prate*$qty;


//$studentId = $conn->real_escape_string($data->studentId);
//$studentName = $conn->real_escape_string($data->studentName);  Add Spare
$query="";
//$pm="insert into s_purchase_temp set inv_no='".strtoupper($_POST['inv_no'])."',pdate='".strtoupper($_POST['date'])."',supplier_name='".strtoupper($_POST['supplier_name'])."',outstand='".$_SESSION['os']."',sbrand='".strtoupper($_POST['sbrand'])."',sname='".strtoupper($_POST['spare_name'])."',spart_no='".strtoupper($_POST['spart_no'])."',prate='".strtoupper($_POST['prate'])."',qty='".strtoupper($_POST['qty'])."',total='".$tot."',status='Active'";  
switch ($request)
{
	case 'Add Spare':
	if($qty!='')
	{
echo	$query = "INSERT INTO s_purchase_temp set inv_no='".$invno."',pdate='".$pdate."',supplier_name='".$supplier_name."',outstand='".$_SESSION['os']."', sbrand='".$sbrand."',sname='".$sparename."',spart_no='".$spartno."',prate='".$prate."',qty='".$qty."',total='".$tot."',status='Active'";
	$execute = mysqli_query($conn,$query);
	break;
	}
	case 'Update':
	if($qty!='')
	{
echo	$query = "update s_purchase_temp set inv_no='".$invno."',pdate='".$pdate."',supplier_name='".$supplier_name."',outstand='".$out."', sbrand='".$sbrand."',sname='".$sparename."',spart_no='".$spartno."',prate='".$prate."',qty='".$qty."',total='".$tot."',status='Active' where id='$id'";
	$execute = mysqli_query($conn,$query);
	break;
	}
}
?>