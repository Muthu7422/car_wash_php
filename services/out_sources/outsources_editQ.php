<?php
include("../../includes.php");
include("../../redirect.php");

if(isset($_POST['AddSources']))
{
$pm="insert into s_outsources_details set OutsourcesId='".$_POST['OutsourcesId']."',Outsources='".$_POST['Outsources']."',Amount='".$_POST['Amount']."',Tax='".$_POST['Tax']."',TaxTotalAmount='".$_POST['TaxTotalAmount']."',TotalAmount='".$_POST['TotalAmount']."',JobcardId='".$_POST['JobcardId']."'";  
$Epm=mysqli_query($conn,$pm);
$job_card_no=$_POST['job_card_no'];
$JobcardId=$_POST['JobcardId'];
$OutsourcesId=$_POST['OutsourcesId'];
header("location:out_sources_edit.php?job_card_no=$job_card_no&&JobcardId=$JobcardId&&OutsourcesId=$OutsourcesId");
}
if($_REQUEST['Act']=='Del')
{
$det="delete from s_outsources_details where Id='".$_REQUEST['Id']."'";
$Esr=mysqli_query($conn,$det); 
$JobcardId=$_REQUEST['JobcardId'];
$job_card_no=$_REQUEST['job_card_no'];
$OutsourcesId=$_REQUEST['OutsourcesId'];
header("location:out_sources_edit.php?job_card_no=$job_card_no&&JobcardId=$JobcardId&&OutsourcesId=$OutsourcesId");
}
if(isset($_POST['Finish']))
{
	
 	$Rd="update  s_outsources set OutsourcesDate='".$_POST['OutsourcesDate']."',Note='".$_POST['Note']."',PainterName='".$_POST['PainterName']."' where Id='".$_POST['OutsourcesId']."'"; 
	$Fr=mysqli_query($conn,$Rd);

header("location:out_sources_view.php");
}
?>