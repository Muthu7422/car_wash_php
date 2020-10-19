<?php
error_reporting(0);
ob_start();
include("../../includes.php");
include("../../redirect.php");

if (isset($_POST['AddPackge'])) 
{
 $det1="insert into s_job_card_temp set cemail='".$_POST['smail']."',cmodel='".$_POST['CarModel']."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".trim($_POST['smobile'])."',sname='".trim($_POST['sname'])."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active',DiscountAmount='".$_POST['DiscountAmount']."',ReferencedMobileNo='".trim($_POST['ReferencedMobileNo'])."',ReferencedNote='".$_POST['ReferencedNote']."',ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats='".$_POST['FloarMats']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."',ReferedDiscount='".$_POST['ReferedDiscount']."'"; 
$Esr1=mysqli_query($conn,$det1);  
	
	
$det="insert into s_job_card_pdetails_temp set job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',package_type='".$_POST['ptype']."',pac_remarks='".$_POST['pk_remarks_1']."',package_amt='".$_POST['pk_amt']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active'";
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


$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard.php?job_card_no=$job_card_no");
}
if (isset($_POST['AddService']))
{
$det1="insert into s_job_card_temp set cemail='".$_POST['smail']."',cmodel='".$_POST['CarModel']."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active',ReferencedMobileNo='".trim($_POST['ReferencedMobileNo'])."',ReferencedNote='".$_POST['ReferencedNote']."',ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats='".$_POST['FloarMats']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."',ReferedDiscount='".$_POST['ReferedDiscount']."'";
$Esr1=mysqli_query($conn,$det1);   

$det="insert into s_job_card_sdetails_temp set job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',service_type='".$_POST['stype']."',st_amt='".$_POST['st_amt']."',qty='".$_POST['qty']."',remarks='".$_POST['remarks']."',remarks_1='".$_POST['remarks_1']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active'";
$Esr=mysqli_query($conn,$det);  

$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard.php?job_card_no=$job_card_no");
}
if (isset($_POST['AddRecom']))
{
$det1="insert into s_job_card_temp set cemail='".$_POST['smail']."',cmodel='".$_POST['CarModel']."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active',ReferencedMobileNo='".trim($_POST['ReferencedMobileNo'])."',ReferencedNote='".$_POST['ReferencedNote']."',ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats='".$_POST['FloarMats']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."',ReferedDiscount='".$_POST['ReferedDiscount']."'";
$Esr1=mysqli_query($conn,$det1);   

$det="insert into s_job_card_recomdetails_temp set job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',service_type='".$_POST['Rtype']."',st_amt='".$_POST['rst_amt']."',qty='".$_POST['rqty']."',remarks='".$_POST['rremarks']."',remarks_1='".$_POST['rremarks_1']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',RecomDate='".$_POST['RecomDate']."',status='Active'";
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

$det="insert into s_job_card_sdetails_temp set job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',service_type='".$_POST['Rtype']."',st_amt='".$_POST['rst_amt']."',qty='".$_POST['rqty']."',remarks='".$_POST['rremarks']."',remarks_1='".$_POST['rremarks_1']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active'";
$Esr=mysqli_query($conn,$det);


$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard.php?job_card_no=$job_card_no");
}

if (isset($_POST['SubmitJobCard']))
{
			$nm1="select * from a_customer where mobile1='".trim($_POST['ReferencedMobileNo'])."'";
			$abc1=mysql_query($nm1);
			$CustomerId=mysql_fetch_array($abc1);
	
	
 $in="insert into s_job_card set gst='".$_POST['gst']."',IncludeGst='".$_POST['total_amt_agst']."',ServiceAdvisor='".$_POST['ServiceAdvisor']."',ServiceAdditionalInfo='".$_POST['ServiceAdditionalInfo']."',TechnicianName='".$_POST['TechnicianName']."',DeliveryDate='".$_POST['delivery_date']."',DeliveryTime='".$_POST['delivery_time']."',PaidAmount='".$_POST['paying_advance_amount']."',BalanceAmount='".$_POST['balance_amount']."',Remarks='".$_POST['remarks_1']."',ParticularInstructions='".$_POST['customer_instructions']."',description='".$_POST['description']."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',fuel='".$_POST['fuel']."',follow='".$_POST['follow']."',total_amt='".$_POST['total_amt']."',status='Active',jcard_status='Open',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',payment_mode='".$_POST['payment_mode']."',AccountNo='".$_POST['AccountNo']."',ChequeNumber='".$_POST['ChequeNumber']."',LedgerId='".$_POST['LedgerId']."',BankId='".$_POST['BankId']."',DiscountAmount='".$_POST['DiscountAmount']."',DiscountPercentage='".$_POST['DiscountPercentage']."',ReferencedBy='".trim($_POST['ReferencedBy'])."',ReferencedMobileNo='".$CustomerId['id']."',ReferencedNote='".$_POST['ReferencedNote']."'"; 
$Ein=mysqli_query($conn,$in); 
$rno=mysqli_insert_id($conn);

if($_POST['payment_mode']=="Cash")
{
$cash_acc="insert into account_cash set TransactionDate='".$_POST['jdate']."',LedgerGroup='33',TransactionType='Credit',Amount='".$_POST['paying_advance_amount']."',ReferenceNo='".$_POST['job_card_no']."',TransactionFrom='s_job_card',Remarks='Service Advance',LedgerId='".$_POST['CLI']."'";
$acc_insert=mysqli_query($conn,$cash_acc); 	
}

 if($_POST['payment_mode']!='Cash')
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$_POST['jdate']."',LedgerGroup='33',TransactionType='Credit',Amount='".$_POST['paying_advance_amount']."',ReferenceNo='".$_POST['job_card_no']."',TransactionFrom='s_job_card',Remarks='Service Advance',BankId='".$_POST['BankId']."',LedgerId='".$_POST['CLI']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }

				$names="select * from s_job_card_pdetails_temp where job_card_no='".$_POST['job_card_no']."'";
				$ns=mysqli_query($conn,$names);
				while($jcd=mysqli_fetch_array($ns))
				{
				$det="insert into s_job_card_pdetails set job_card_no='$rno',package_type='".$jcd['package_type']."',package_amt='".$jcd['package_amt']."',pac_remarks='".$jcd['pac_remarks']."',status='Active',ServiceStatus='Pending'";
				$Fd=mysqli_query($conn,$det);
				}
				$names1="select * from s_job_card_sdetails_temp where job_card_no='".$_POST['job_card_no']."'";
				$ns1=mysqli_query($conn,$names1);
				while($jcd1=mysqli_fetch_array($ns1))
				{
				$det1="insert into s_job_card_sdetails set job_card_no='$rno',service_type='".$jcd1['service_type']."',st_amt='".$jcd1['st_amt']."',qty='".$jcd1['qty']."',remarks='".$jcd1['remarks']."',remarks_1='".$jcd1['remarks_1']."',status='Active',ServiceStatus='Pending'";
				$Fd1=mysqli_query($conn,$det1);
				}

				$names1="select * from s_job_card_recomdetails_temp where job_card_no='".$_POST['job_card_no']."'";
				$ns1=mysqli_query($conn,$names1);
				while($jcd1=mysqli_fetch_array($ns1))
				{
				$det1="insert into s_job_card_recomdetails set job_card_no='$rno',service_type='".$jcd1['service_type']."',st_amt='".$jcd1['st_amt']."',qty='".$jcd1['qty']."',remarks='".$jcd1['remarks']."',remarks_1='".$jcd1['remarks_1']."',status='Active',ServiceStatus='Pending',RecomDate='".$jcd1['RecomDate']."',customerId='".$_POST['sname']."'";
				$Fd1=mysqli_query($conn,$det1);
				}
				
				$names1="select * from s_job_card_damge_temp where job_card_no='".$_POST['job_card_no']."'";
				$ns1=mysqli_query($conn,$names1);
				while($jcd1=mysqli_fetch_array($ns1))
				{
				$det1="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$jcd1['VehiclePartName']."',TypeOfDamage='".$jcd1['TypeOfDamage']."',Note='".$jcd1['Note']."'";
				$Fd1=mysqli_query($conn,$det1);
				}
				
	$D="select * from s_job_card_pdetails where job_card_no='$rno'";
	$Cd=mysqli_query($conn,$D);
	while($Dce=mysqli_fetch_array($Cd))
	{
  
                    $mob12="select * from a_customer_vehicle_details where vehicle_no='".trim($_POST['vehicle_no'])."'";
				     $mobi12=mysql_query($mob12);
				     $mobil12=mysql_fetch_array($mobi12);  
				  
					
				  $mvs="select * from master_vehicle_segment where VehicleSegment='".trim($mobil12['VehicleSegment'])."'";
				  $mvq=mysql_query($mvs);
				  $mvf=mysql_fetch_array($mvq);
				  
		
		        $echeck="select * from m_package where package_name='".$Dce['package_type']."' and v_type='".trim($mvf['Id'])."' and status='Active'";  
                  $echk=mysql_query($echeck);
                  $ecount=mysql_fetch_array($echk); 
		
		
			 $F="select * from m_package_service where package_name='".$Dce['package_type']."' and package_no='".trim($ecount['package_no'])."'"; 
			$Fdf=mysqli_query($conn,$F);
			while($Fde=mysqli_fetch_array($Fdf))
			{
			
		 	$Csa="insert into s_job_card_package_service_details set JobcradPackageId='".$Dce['id']."',job_card_no='".$_POST['job_card_no']."',JobcardId='$rno',Service='".$Fde['service']."',PackageName='".$Fde['package_name']."',ServiceStatus='Pending'";
			$Dsxa=mysqli_query($conn,$Csa); 
	}	
	}
				
				$emp="select * from a_customer where cust_name='".trim($_POST['sname'])."'";
				$pme=mysqli_query($conn,$emp);
				$epm=mysqli_fetch_array($pme);
				
$iinv="insert into s_job_card_inventory set JobCardId='$rno',ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats='".$_POST['FloarMats']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."'";
$Eiinv=mysqli_query($conn,$iinv); 

//Start Insert the Damage Details
$dxs="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName']."',TypeOfDamage='".$_SESSION['TypeOfDamage']."',Note='".$_SESSION['Note']."'";
$sa=mysql_query($dxs);

$dxs1="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName1']."',TypeOfDamage='".$_SESSION['TypeOfDamage1']."',Note='".$_SESSION['Note1']."'";
$sa1=mysql_query($dxs1);

$dxs2="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName2']."',TypeOfDamage='".$_SESSION['TypeOfDamage2']."',Note='".$_SESSION['Note2']."'";
$sa2=mysql_query($dxs2);

$dxs3="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName3']."',TypeOfDamage='".$_SESSION['TypeOfDamage3']."',Note='".$_SESSION['Note3']."'";
$sa3=mysql_query($dxs3);

$dxs4="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName4']."',TypeOfDamage='".$_SESSION['TypeOfDamage4']."',Note='".$_SESSION['Note4']."'";
$sa4=mysql_query($dxs4);

$dxs5="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName5']."',TypeOfDamage='".$_SESSION['TypeOfDamage5']."',Note='".$_SESSION['Note5']."'";
$sa5=mysql_query($dxs5);

$dxs6="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName6']."',TypeOfDamage='".$_SESSION['TypeOfDamage6']."',Note='".$_SESSION['Note6']."'";
$sa6=mysql_query($dxs6);

$dxs7="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName7']."',TypeOfDamage='".$_SESSION['TypeOfDamage7']."',Note='".$_SESSION['Note7']."'";
$sa7=mysql_query($dxs7);

$dxs8="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName8']."',TypeOfDamage='".$_SESSION['TypeOfDamage8']."',Note='".$_SESSION['Note8']."'";
$sa8=mysql_query($dxs8);

$dxs9="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName9']."',TypeOfDamage='".$_SESSION['TypeOfDamage9']."',Note='".$_SESSION['Note9']."'";
$sa9=mysql_query($dxs9);

$dxs10="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName10']."',TypeOfDamage='".$_SESSION['TypeOfDamage10']."',Note='".$_SESSION['Note10']."'";
$sa10=mysql_query($dxs10);

$dxs11="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName11']."',TypeOfDamage='".$_SESSION['TypeOfDamage11']."',Note='".$_SESSION['Note11']."'";
$sa11=mysql_query($dxs11);
	
//End Insert Damage Details
	
$ups="update s_job_card set customer_id='".$epm['id']."' where job_card_no='".$_POST['job_card_no']."'"; 
$upw=mysqli_query($conn,$ups);
				
$del="DELETE FROM s_job_card_temp WHERE job_card_no='".$_POST['job_card_no']."'";
$spm=mysqli_query($conn,$del);

$dels="DELETE FROM s_job_card_pdetails_temp WHERE job_card_no='".$_POST['job_card_no']."'";
$spms=mysqli_query($conn,$dels);

$del2="DELETE FROM s_job_card_sdetails_temp WHERE job_card_no='".$_POST['job_card_no']."'";
$spm2=mysqli_query($conn,$del2);

$del2="DELETE FROM s_job_card_damge_temp WHERE job_card_no='".$_POST['job_card_no']."'";
$spm2=mysqli_query($conn,$del2);

$del2="DELETE FROM s_job_card_recomdetails_temp WHERE job_card_no='".$_POST['job_card_no']."'";
$spm2=mysqli_query($conn,$del2);

$dexx="DELETE FROM s_job_card_damge WHERE Note='' and job_card_no='$rno'";
$spmsc=mysqli_query($conn,$dexx);

$_SESSION['Note']='';
$_SESSION['Note1']='';
$_SESSION['Note2']='';
$_SESSION['Note3']='';
$_SESSION['Note4']='';
$_SESSION['Note5']='';
$_SESSION['Note6']='';
$_SESSION['Note7']='';
$_SESSION['Note8']='';
$_SESSION['Note9']='';
$_SESSION['Note10']='';
$_SESSION['Note11']='';

$_SESSION['TypeOfDamage']='';
$_SESSION['TypeOfDamage1']='';
$_SESSION['TypeOfDamage2']='';
$_SESSION['TypeOfDamage3']='';
$_SESSION['TypeOfDamage4']='';
$_SESSION['TypeOfDamage5']='';
$_SESSION['TypeOfDamage6']='';
$_SESSION['TypeOfDamage7']='';
$_SESSION['TypeOfDamage8']='';
$_SESSION['TypeOfDamage9']='';
$_SESSION['TypeOfDamage10']='';
$_SESSION['TypeOfDamage11']='';


$job_card_no=$_POST['job_card_no'];



//SMS Service Starts//	 
	$ss="select * from s_job_card where job_card_no='$job_card_no'";
	$Ess=mysql_query($ss);
	$FEss=mysql_fetch_array($Ess);
	
$ch = curl_init();

$v=$FEss['sname'];
$a=$FEss['vehicle_no'];
$b=$FEss['IncludeGst'];
$c=$FEss['DeliveryDate'];
$d=$FEss['DeliveryTime'];
$e=rand(1000,10000);
$m=$FEss['smobile'];
//$m="9698079706";
//Username: shakilaauto@gmail.com

$message="Dear Customer".$v." ,your Vehicle ".$a."is under the service,It is Scheduled to deliver on ".$c."  ".$d.".Invoice Amount is Rs.".$b."/-. Please share this ".$e." secret pin number if You are only satisfied with our service.Thanks";
// SMS content Start //
$userid="vertex";
$pwd="ver123";
$contacts=$m;
$senderid="VRTAPP";
$servicename="SMSTRANS";
$messagetype="1";

$content =  'UserId='.rawurlencode($userid). 
                '&pwd='.rawurlencode($pwd). 
				'&Message='.rawurlencode($message).
				'&Contacts='.rawurlencode($contacts).
                '&SenderId='.rawurlencode($senderid). 
                '&ServiceName='.rawurlencode($servicename). 
                '&MessageType='.rawurlencode($messagetype);
$url="http://www.apiconnecto.com/API/SMSApiConnector.aspx?$content";
$ch = curl_init($url);
curl_exec($ch);
curl_close($ch);
// SMS content END //

/*
$user="shakilaauto@gmail.com:vertex123";
$receipientno=$m;
$senderID="TEST SMS";
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
$buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{ echo $buffer; }
curl_close($ch); */





$us="update s_job_card set SecretPin='$e' where job_card_no='$job_card_no'";
$Eus=mysql_query($us);
//SMS Service End//


header("location:s_jobcard_receipt.php?job_card_no=$job_card_no");
}	
if (isset($_POST['FinishCheckList']))
{
$iinv="insert into s_job_card_check_list set JobCardId='".$_POST['JobcardId']."',DashBoardFull='".$_POST['DashBoardFull']."',DoorPads='".$_POST['DoorPads']."',Top='".$_POST['Top']."',ACGrill='".$_POST['ACGrill']."',DoorPadTray='".$_POST['DoorPadTray']."',FloarMats='".$_POST['FloarMats']."',MicSystem='".$_POST['MicSystem']."',PowerWindowSwitchRear='".$_POST['PowerWindowSwitchRear']."',PowerWindowSwitchFront='".$_POST['PowerWindowSwitchFront']."',Steering='".$_POST['Steering']."',HeadRest='".$_POST['HeadRest']."',Floor='".$_POST['Floor']."',GearKnobArea='".$_POST['GearKnobArea']."',Seats='".$_POST['Seats']."',Dickey='".$_POST['Dickey']."',Bonnet='".$_POST['Bonnet']."',SideMirrors='".$_POST['SideMirrors']."',Tiers='".$_POST['Tiers']."',DoorsTop='".$_POST['DoorsTop']."',DoorInsideArea='".$_POST['DoorInsideArea']."',AlloyWheels='".$_POST['AlloyWheels']."',Bumpers='".$_POST['Bumpers']."',WindscreenDoorGlassesRearGlass='".$_POST['WindscreenDoorGlassesRearGlass']."'";
$Eiinv=mysqli_query($conn,$iinv); 

$JobcardId=$_POST['JobcardId'];
header("location:s_job_card_ready_to_delivery_addQ.php?JobcardId=$JobcardId");
}

?>