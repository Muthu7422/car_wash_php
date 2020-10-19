<?php
include("../../includes.php");
include("../../redirect.php");

if(isset($_POST['AddSources']))
{
$pm="insert into s_outsources_temp set JobcardId='".$_POST['JobcardId']."',Outsources='".$_POST['Outsources']."',Amount='".$_POST['Amount']."',Tax='".$_POST['Tax']."',TaxTotalAmount='".$_POST['TaxTotalAmount']."',TotalAmount='".$_POST['TotalAmount']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."'";  
$Epm=mysqli_query($conn,$pm);
$job_card_no=$_POST['job_card_no'];
$JobcardId=$_POST['JobcardId'];
header("location:out_sources.php?job_card_no=$job_card_no&&JobcardId=$JobcardId");
}
if($_REQUEST['Act']=='Del')
{
$det="delete from s_outsources_temp where Id='".$_REQUEST['Id']."'";
$Esr=mysqli_query($conn,$det); 
$JobcardId=$_REQUEST['JobcardId'];
$job_card_no=$_REQUEST['job_card_no'];
header("location:out_sources.php?job_card_no=$job_card_no&&JobcardId=$JobcardId");
}
if(isset($_POST['Finish']))
{
$pm="insert into s_outsources set JobcardId='".$_POST['JobcardId']."',job_card_no='".$_POST['job_card_no']."',OutsourcesDate='".$_POST['OutsourcesDate']."',Note='".$_POST['Note']."',PainterName='".$_POST['PainterName']."',FranchiseeId='".$_SESSION['FranchiseeId']."'";  
$Epm=mysqli_query($conn,$pm);
$id=mysqli_insert_id($conn);
		
		$O="select * from s_outsources_temp where JobcardId='".$_POST['JobcardId']."'";
		$Op=mysqli_query($conn,$O);
		while($opa=mysqli_fetch_array($Op))
		{
$pm1="insert into s_outsources_details set OutsourcesId='$id',JobcardId='".$_POST['JobcardId']."',Outsources='".$opa['Outsources']."',Amount='".$opa['Amount']."',Tax='".$opa['Tax']."',TaxTotalAmount='".$opa['TaxTotalAmount']."',TotalAmount='".$opa['TotalAmount']."'";  
$Epm1=mysqli_query($conn,$pm1);
		}
		
$Del="delete from s_outsources_temp where JobcardId='".$_POST['JobcardId']."'";
$Deas=mysqli_query($conn,$Del);

header("location:out_sources_view.php");
}
?>