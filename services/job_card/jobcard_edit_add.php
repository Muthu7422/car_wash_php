<?php
error_reporting(0);
ob_start();
include("../../includes.php");
include("../../redirect.php");

if (isset($_POST['AddPackge'])) 
{
   
	
$det="insert into s_job_card_pdetails set job_card_no='".$_POST['job_card_id']."',package_type='".$_POST['ptype']."',pac_remarks='".$_POST['pk_remarks_1']."',package_amt='".$_POST['pk_amt']."',status='Active',ServiceStatus='Pending'";
$Esr=mysqli_query($conn,$det);  

$D="select * from s_job_card_pdetails where job_card_no='".$_POST['job_card_id']."' and package_type='".$_POST['ptype']."'";
	$Cd=mysqli_query($conn,$D);
	while($Dce=mysqli_fetch_array($Cd))
	{

 $mob12="select * from a_customer_vehicle_details where vehicle_no='".trim($_POST['vehicle_no'])."'";
				     $mobi12=mysqli_query($conn,$mob12);
				     $mobil12=mysqli_fetch_array($mobi12);  
				  
					
				  $mvs="select * from master_vehicle_segment where VehicleSegment='".trim($mobil12['VehicleSegment'])."'";
				  $mvq=mysqli_query($conn,$mvs);
				  $mvf=mysqli_fetch_array($mvq);
				  
		
		        $echeck="select * from m_package where package_name='".$Dce['package_type']."' and v_type='".trim($mvf['Id'])."' and status='Active'";  
                  $echk=mysqli_query($conn,$echeck);
                  $ecount=mysqli_fetch_array($echk); 
		
		
			 $F="select * from m_package_service where package_name='".$Dce['package_type']."' and package_no='".trim($ecount['package_no'])."'"; 
			$Fdf=mysqli_query($conn,$F);
			while($Fde=mysqli_fetch_array($Fdf))
			{
				
	
			
		 	$Csa="insert into s_job_card_package_service_details set JobcradPackageId='".$Dce['id']."',job_card_no='".$_POST['job_card_no']."',JobcardId='".$_POST['job_card_id']."',Service='".$Fde['service']."',PackageName='".$Fde['package_name']."',ServiceStatus='Pending'";
			$Dsxa=mysqli_query($conn,$Csa); 
	
	}
   }








$_SESSION['Note']=$_POST['Note'];
$_SESSION['Note1']=$_POST['Note1'];
$_SESSION['Note2']=$_POST['Note2'];
$_SESSION['Note3']=$_POST['Note3'];
$_SESSION['Note4']=$_POST['Note4'];
$_SESSION['Note5']=$_POST['Note5'];
$_SESSION['Note6']=$_POST['Note6'];
$_SESSION['Note7']=$_POST['Note7'];
$_SESSION['Note8']=$_POST['Note8'];
$_SESSION['Note9']=$_POST['Note9'];
$_SESSION['Note10']=$_POST['Note10'];
$_SESSION['Note11']=$_POST['Note11'];
$_SESSION['Note12']=$_POST['Note12'];
$_SESSION['Note13']=$_POST['Note13'];
$_SESSION['Note14']=$_POST['Note14'];
$_SESSION['Note15']=$_POST['Note15'];

$_SESSION['TypeOfDamage']=$_POST['TypeOfDamage'];
$_SESSION['TypeOfDamage1']=$_POST['TypeOfDamage1'];
$_SESSION['TypeOfDamage2']=$_POST['TypeOfDamage2'];
$_SESSION['TypeOfDamage3']=$_POST['TypeOfDamage3'];
$_SESSION['TypeOfDamage4']=$_POST['TypeOfDamage4'];
$_SESSION['TypeOfDamage5']=$_POST['TypeOfDamage5'];
$_SESSION['TypeOfDamage6']=$_POST['TypeOfDamage6'];
$_SESSION['TypeOfDamage7']=$_POST['TypeOfDamage7'];
$_SESSION['TypeOfDamage8']=$_POST['TypeOfDamage8'];
$_SESSION['TypeOfDamage9']=$_POST['TypeOfDamage9'];
$_SESSION['TypeOfDamage10']=$_POST['TypeOfDamage10'];
$_SESSION['TypeOfDamage11']=$_POST['TypeOfDamage11'];
$_SESSION['TypeOfDamage12']=$_POST['TypeOfDamage12'];
$_SESSION['TypeOfDamage13']=$_POST['TypeOfDamage13'];
$_SESSION['TypeOfDamage14']=$_POST['TypeOfDamage14'];
$_SESSION['TypeOfDamage15']=$_POST['TypeOfDamage15'];
$_SESSION['TotalReference']=$_POST['TotalReference'];


$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no && id=#pack");
}

if (isset($_POST['AddRecom']))
{


                   $ssc31="select * from m_service_type where id='".$_POST['Rtype']."'"; 
				  $Essc31=mysqli_query($conn,$ssc31);
				  $FEssc31=mysqli_fetch_array($Essc31); 

$det="insert into s_job_card_recomdetails set job_card_no='".$_POST['job_card_id']."',service_type='".$_POST['Rtype']."',st_amt='".$_POST['rst_amt']."',qty='".$_POST['rqty']."',remarks='".$_POST['rremarks']."',remarks_1='".$_POST['rremarks_1']."',RecomDate='".$_POST['RecomDate']."',status='Active',ServiceStatus='Pending',customerId='".$_POST['sname']."'";
$Esr=mysqli_query($conn,$det);  

$_SESSION['Note']=$_POST['Note'];
$_SESSION['Note1']=$_POST['Note1'];
$_SESSION['Note2']=$_POST['Note2'];
$_SESSION['Note3']=$_POST['Note3'];
$_SESSION['Note4']=$_POST['Note4'];
$_SESSION['Note5']=$_POST['Note5'];
$_SESSION['Note6']=$_POST['Note6'];
$_SESSION['Note7']=$_POST['Note7'];
$_SESSION['Note8']=$_POST['Note8'];
$_SESSION['Note9']=$_POST['Note9'];
$_SESSION['Note10']=$_POST['Note10'];
$_SESSION['Note11']=$_POST['Note11'];
$_SESSION['Note12']=$_POST['Note12'];
$_SESSION['Note13']=$_POST['Note13'];
$_SESSION['Note14']=$_POST['Note14'];
$_SESSION['Note15']=$_POST['Note15'];

$_SESSION['TypeOfDamage']=$_POST['TypeOfDamage'];
$_SESSION['TypeOfDamage1']=$_POST['TypeOfDamage1'];
$_SESSION['TypeOfDamage2']=$_POST['TypeOfDamage2'];
$_SESSION['TypeOfDamage3']=$_POST['TypeOfDamage3'];
$_SESSION['TypeOfDamage4']=$_POST['TypeOfDamage4'];
$_SESSION['TypeOfDamage5']=$_POST['TypeOfDamage5'];
$_SESSION['TypeOfDamage6']=$_POST['TypeOfDamage6'];
$_SESSION['TypeOfDamage7']=$_POST['TypeOfDamage7'];
$_SESSION['TypeOfDamage8']=$_POST['TypeOfDamage8'];
$_SESSION['TypeOfDamage9']=$_POST['TypeOfDamage9'];
$_SESSION['TypeOfDamage10']=$_POST['TypeOfDamage10'];
$_SESSION['TypeOfDamage11']=$_POST['TypeOfDamage11'];
$_SESSION['TypeOfDamage12']=$_POST['TypeOfDamage12'];
$_SESSION['TypeOfDamage13']=$_POST['TypeOfDamage13'];
$_SESSION['TypeOfDamage14']=$_POST['TypeOfDamage14'];
$_SESSION['TypeOfDamage15']=$_POST['TypeOfDamage15'];


                $emp="select * from a_customer where cust_name='".trim($_POST['sname'])."'";
				$pme=mysqli_query($conn,$emp);
				$epm=mysqli_fetch_array($pme);
				
$det="insert into s_job_card_sdetails set jdate='".$_POST['jdate']."',job_card_no='".$_POST['job_card_id']."',service_type='".$_POST['Rtype']."',st_amt='".$_POST['rst_amt']."',qty='".$_POST['rqty']."',remarks='".$_POST['rremarks']."',remarks_1='".$_POST['rremarks_1']."',status='Active',ServiceStatus='Pending'";
$Esr=mysqli_query($conn,$det);


$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no && id=#recom");
}

if (isset($_POST['SubmitJobCard']))
{
			$nm1="select * from a_customer where mobile1='".trim($_POST['ReferencedMobileNo'])."'";
			$abc1=mysqli_query($conn,$nm1);
			$CustomerId=mysqli_fetch_array($abc1);
	
	
 $in="Update s_job_card set ReferralDiscount='".$_POST['ReferralStatus']."',gst='".$_POST['gst']."',IncludeGst='".$_POST['total_amt_agst']."',ServiceAdvisor='".$_POST['ServiceAdvisor']."',ServiceAdditionalInfo='".$_POST['ServiceAdditionalInfo']."',TechnicianName='".$_POST['TechnicianName']."',DeliveryDate='".$_POST['delivery_date']."',DeliveryTime='".$_POST['delivery_time']."',PaidAmount='".$_POST['paying_advance_amount']."',BalanceAmount='".$_POST['balance_amount']."',Remarks='".$_POST['remarks_1']."',ParticularInstructions='".$_POST['customer_instructions']."',description='".$_POST['description']."',job_card_no='".$_POST['job_card_no']."',kms='".$_POST['kms']."',fuel='".$_POST['fuel']."',follow='".$_POST['follow']."',total_amt='".$_POST['total_amt']."',payment_mode='".$_POST['payment_mode']."',AccountNo='".$_POST['AccountNo']."',ChequeNumber='".$_POST['ChequeNumber']."',LedgerId='".$_POST['LedgerId']."',BankId='".$_POST['BankId']."',DiscountAmount='".$_POST['DiscountAmount']."',DiscountPercentage='".$_POST['DiscountPercentage']."',vehicle_no='".$_POST['vehicle_no']."' where id='".$_POST['job_card_id']."'"; 
$Ein=mysqli_query($conn,$in); 
$rno=mysqli_insert_id($conn);

if($_POST['payment_mode']=="Cash")
{	
$del="delete from account_bank where ReferenceNo='".$_POST['job_card_no']."'";
$delq=mysqli_query($conn,$del);

$pm="select * from account_cash where ReferenceNo='".$_POST['job_card_no']."'";
$pms=mysqli_query($conn,$pm);
$pmf=mysqli_num_rows($pms);
if($pmf < '1')
{
	 $cash_acc="insert into account_cash set TransactionDate='".$_POST['jdate']."',LedgerGroup='33',TransactionType='Credit',Amount='".$_POST['paying_advance_amount']."',ReferenceNo='".$_POST['job_card_no']."',TransactionFrom='s_job_card',Remarks='Service Advance',LedgerId='".$_POST['CLI']."'"; 
    $acc_insert=mysqli_query($conn,$cash_acc); 	
}
else
{
$cash_acc="update account_cash set Amount='".$_POST['paying_advance_amount']."' where ReferenceNo='".$_POST['job_card_no']."'";
$acc_insert=mysqli_query($conn,$cash_acc); 
}	
}

 if($_POST['payment_mode']!='Cash')
	   {
		   
		   $del="delete from account_cash where ReferenceNo='".$_POST['job_card_no']."'";
           $delq=mysqli_query($conn,$del);
		   
		   $pm1="select * from account_bank where ReferenceNo='".$_POST['job_card_no']."'";
          $pms1=mysqli_query($conn,$pm1);
          $pmf1=mysqli_num_rows($pms1);
          if($pmf1 < '1')
		  {
			  $cash_acc="insert into account_bank set TransactionDate='".$_POST['jdate']."',LedgerGroup='33',TransactionType='Credit',Amount='".$_POST['paying_advance_amount']."',ReferenceNo='".$_POST['job_card_no']."',TransactionFrom='s_job_card',Remarks='Service Advance',BankId='".$_POST['BankId']."',LedgerId='".$_POST['CLI']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
		  }
		  else
		  {
			  $cash_acc="update account_bank set Amount='".$_POST['paying_advance_amount']."' where ReferenceNo='".$_POST['job_card_no']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
		  }
       }


	$iinv="insert into s_job_card_inventory set JobCardId='".$_POST['job_card_id']."',ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats1='".$_POST['FloarMats1']."',FloarMats2='".$_POST['FloarMats2']."',FloarMats3='".$_POST['FloarMats3']."',FloarMats4='".$_POST['FloarMats4']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."'";
$Eiinv=mysqli_query($conn,$iinv); 			
				
	$_SESSION['Note']=$_POST['Note'];
$_SESSION['Note1']=$_POST['Note1'];
$_SESSION['Note2']=$_POST['Note2'];
$_SESSION['Note3']=$_POST['Note3'];
$_SESSION['Note4']=$_POST['Note4'];
$_SESSION['Note5']=$_POST['Note5'];
$_SESSION['Note6']=$_POST['Note6'];
$_SESSION['Note7']=$_POST['Note7'];
$_SESSION['Note8']=$_POST['Note8'];
$_SESSION['Note9']=$_POST['Note9'];
$_SESSION['Note10']=$_POST['Note10'];
$_SESSION['Note11']=$_POST['Note11'];
$_SESSION['Note12']=$_POST['Note12'];
$_SESSION['Note13']=$_POST['Note13'];
$_SESSION['Note14']=$_POST['Note14'];
$_SESSION['Note15']=$_POST['Note15'];

$_SESSION['TypeOfDamage']=$_POST['TypeOfDamage'];
$_SESSION['TypeOfDamage1']=$_POST['TypeOfDamage1'];
$_SESSION['TypeOfDamage2']=$_POST['TypeOfDamage2'];
$_SESSION['TypeOfDamage3']=$_POST['TypeOfDamage3'];
$_SESSION['TypeOfDamage4']=$_POST['TypeOfDamage4'];
$_SESSION['TypeOfDamage5']=$_POST['TypeOfDamage5'];
$_SESSION['TypeOfDamage6']=$_POST['TypeOfDamage6'];
$_SESSION['TypeOfDamage7']=$_POST['TypeOfDamage7'];
$_SESSION['TypeOfDamage8']=$_POST['TypeOfDamage8'];
$_SESSION['TypeOfDamage9']=$_POST['TypeOfDamage9'];
$_SESSION['TypeOfDamage10']=$_POST['TypeOfDamage10'];
$_SESSION['TypeOfDamage11']=$_POST['TypeOfDamage11'];
$_SESSION['TypeOfDamage12']=$_POST['TypeOfDamage12'];
$_SESSION['TypeOfDamage13']=$_POST['TypeOfDamage13'];
$_SESSION['TypeOfDamage14']=$_POST['TypeOfDamage14'];
$_SESSION['TypeOfDamage15']=$_POST['TypeOfDamage15'];
$_SESSION['TotalReference']=$_POST['TotalReference'];			


//Start Insert the Damage Details



if($_SESSION['TypeOfDamage']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage']."'";
$damq=mysqli_query($conn,$dam);

$dxs="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName']."',TypeOfDamage='".$_SESSION['TypeOfDamage']."',Note='".$_SESSION['Note']."'";
$sa=mysqli_query($conn,$dxs);
}
if($_SESSION['TypeOfDamage1']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage1']."'";
$damq=mysqli_query($conn,$dam);

$dxs1="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName1']."',TypeOfDamage='".$_SESSION['TypeOfDamage1']."',Note='".$_SESSION['Note1']."'";
$sa1=mysqli_query($conn,$dxs1);
}
if($_SESSION['TypeOfDamage2']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage2']."'";
$damq=mysqli_query($conn,$dam);

$dxs2="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName2']."',TypeOfDamage='".$_SESSION['TypeOfDamage2']."',Note='".$_SESSION['Note2']."'";
$sa2=mysqli_query($conn,$dxs2);
}
if($_SESSION['TypeOfDamage3']!='Nill')
{

$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage3']."'";
$damq=mysqli_query($conn,$dam);

$dxs3="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName3']."',TypeOfDamage='".$_SESSION['TypeOfDamage3']."',Note='".$_SESSION['Note3']."'";
$sa3=mysqli_query($conn,$dxs3);
}
if($_SESSION['TypeOfDamage4']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage4']."'";
$damq=mysqli_query($conn,$dam);

$dxs4="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName4']."',TypeOfDamage='".$_SESSION['TypeOfDamage4']."',Note='".$_SESSION['Note4']."'";
$sa4=mysqli_query($conn,$dxs4);
}
if($_SESSION['TypeOfDamage5']!='Nill')
{
	
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage5']."'";
$damq=mysqli_query($conn,$dam);

$dxs5="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName5']."',TypeOfDamage='".$_SESSION['TypeOfDamage5']."',Note='".$_SESSION['Note5']."'";
$sa5=mysqli_query($conn,$dxs5);
}
if($_SESSION['TypeOfDamage6']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage6']."'";
$damq=mysqli_query($conn,$dam);

$dxs6="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName6']."',TypeOfDamage='".$_SESSION['TypeOfDamage6']."',Note='".$_SESSION['Note6']."'";
$sa6=mysqli_query($conn,$dxs6);
}
if($_SESSION['TypeOfDamage7']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage7']."'";
$damq=mysqli_query($conn,$dam);

$dxs7="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName7']."',TypeOfDamage='".$_SESSION['TypeOfDamage7']."',Note='".$_SESSION['Note7']."'";
$sa7=mysqli_query($conn,$dxs7);
}
if($_SESSION['TypeOfDamage8']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage8']."'";
$damq=mysqli_query($conn,$dam);

$dxs8="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName8']."',TypeOfDamage='".$_SESSION['TypeOfDamage8']."',Note='".$_SESSION['Note8']."'";
$sa8=mysqli_query($conn,$dxs8);
}
if($_SESSION['TypeOfDamage9']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage9']."'";
$damq=mysqli_query($conn,$dam);

$dxs9="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName9']."',TypeOfDamage='".$_SESSION['TypeOfDamage9']."',Note='".$_SESSION['Note9']."'";
$sa9=mysqli_query($conn,$dxs9);
}
if($_SESSION['TypeOfDamage10']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage10']."'";
$damq=mysqli_query($conn,$dam);

$dxs10="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName10']."',TypeOfDamage='".$_SESSION['TypeOfDamage10']."',Note='".$_SESSION['Note10']."'";
$sa10=mysqli_query($conn,$dxs10);
}
if($_SESSION['TypeOfDamage11']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage11']."'";
$damq=mysqli_query($conn,$dam);

$dxs11="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName11']."',TypeOfDamage='".$_SESSION['TypeOfDamage11']."',Note='".$_SESSION['Note11']."'";
$sa11=mysqli_query($conn,$dxs11);
}
if($_SESSION['TypeOfDamage12']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage12']."'";
$damq=mysqli_query($conn,$dam);

$dxs12="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName12']."',TypeOfDamage='".$_SESSION['TypeOfDamage12']."',Note='".$_SESSION['Note12']."'";
$sa12=mysqli_query($conn,$dxs12);
}
if($_SESSION['TypeOfDamage13']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage13']."'";
$damq=mysqli_query($conn,$dam);

$dxs13="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName13']."',TypeOfDamage='".$_SESSION['TypeOfDamage13']."',Note='".$_SESSION['Note13']."'";
$sa13=mysqli_query($conn,$dxs13);
}
if($_SESSION['TypeOfDamage14']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage14']."'";
$damq=mysqli_query($conn,$dam);

$dxs14="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName14']."',TypeOfDamage='".$_SESSION['TypeOfDamage14']."',Note='".$_SESSION['Note14']."'";
$sa14=mysqli_query($conn,$dxs14);
}
if($_SESSION['TypeOfDamage15']!='Nill')
{
$dam="delete from s_job_card_damge where job_card_no='".$_POST['job_card_id']."' and TypeOfDamage='".$_SESSION['TypeOfDamage15']."'";
$damq=mysqli_query($conn,$dam);

$dxs15="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName15']."',TypeOfDamage='".$_SESSION['TypeOfDamage15']."',Note='".$_SESSION['Note15']."'";
$sa15=mysqli_query($conn,$dxs15);
}
	
//End Insert Damage Details
	
header("location:s_jobcard_view.php");
}

?>