<?php
error_reporting(0);
ob_start();
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var2=mysqli_fetch_array($absc);  


 $see1="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
$absc1=mysqli_query($conn,$see1);
$var1=mysqli_fetch_array($absc1);


$det="insert into s_job_card_recomdetails_temp set session_id='".session_id()."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',service_type='".$_POST['Rtype']."',st_amt='".$_POST['rst_amt']."',qty='".$_POST['rqty']."',remarks='".$_POST['rremarks']."',remarks_1='".$_POST['rremarks_1']."',FranchiseeId='".$_SESSION['BranchId']."',UserId='".$_SESSION['UserId']."',RecomDate='".$_POST['RecomDate']."',status='Active'";
$Esr=mysqli_query($conn,$det);  

/* if (isset($_POST['AddService']))
{
$det1="insert into s_job_card_temp set session_id='".session_id()."',cvisit='".$_POST['cvisit']."',cemail='".$_POST['smail']."',cmodel='".$_POST['CarModel']."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active',ReferencedMobileNo='".trim($_POST['ReferencedMobileNo'])."',ReferencedNote='".$_POST['ReferencedNote']."',ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats1='".$_POST['FloarMats1']."',FloarMats2='".$_POST['FloarMats2']."',FloarMats3='".$_POST['FloarMats3']."',FloarMats4='".$_POST['FloarMats4']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."',ReferedDiscount='".$_POST['ReferedDiscount']."',InteriorOne='".$_POST['InteriorOne']."',InteriorTwo='".$_POST['InteriorTwo']."',ExteriorOne='".$_POST['ExteriorOne']."',ExteriorTwo='".$_POST['ExteriorTwo']."',ExteriorThree='".$_POST['ExteriorThree']."'";
$Esr1=mysqli_query($conn,$det1);

$det="insert into s_job_card_sdetails_temp set session_id='".session_id()."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',service_type='".$_POST['stype']."',st_amt='".$_POST['st_amt']."',qty='".$_POST['qty']."',remarks='".$_POST['remarks']."',remarks_1='".$_POST['remarks_1']."',FranchiseeId='".$_SESSION['FranchiseeId']."',UserId='".$_SESSION['UserId']."',status='Active'";
$Esr=mysqli_query($conn,$det);  

$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard.php?job_card_no=$job_card_no");
} */
if (isset($_POST['AddRecom']))
{
$det1="insert into s_job_card_temp set session_id='".session_id()."',cvisit='".$_POST['cvisit']."',cemail='".$_POST['smail']."',cmodel='".$_POST['CarModel']."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',FranchiseeId='".$_SESSION['BranchId']."',UserId='".$_SESSION['UserId']."',status='Active',ReferencedMobileNo='".trim($_POST['ReferencedMobileNo'])."',ReferencedNote='".$_POST['ReferencedNote']."',ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats1='".$_POST['FloarMats1']."',FloarMats2='".$_POST['FloarMats2']."',FloarMats3='".$_POST['FloarMats3']."',FloarMats4='".$_POST['FloarMats4']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."',ReferedDiscount='".$_POST['ReferedDiscount']."',InteriorOne='".$_POST['InteriorOne']."',InteriorTwo='".$_POST['InteriorTwo']."',ExteriorOne='".$_POST['ExteriorOne']."',ExteriorTwo='".$_POST['ExteriorTwo']."',ExteriorThree='".$_POST['ExteriorThree']."'";
$Esr1=mysqli_query($conn,$det1);

 // $det="insert into s_job_card_recomdetails_temp set session_id='".session_id()."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',service_type='".$_POST['Rtype']."',st_amt='".$_POST['rst_amt']."',qty='".$_POST['rqty']."',remarks='".$_POST['rremarks']."',remarks_1='".$_POST['rremarks_1']."',FranchiseeId='".$_SESSION['BranchId']."',UserId='".$_SESSION['UserId']."',RecomDate='".$_POST['RecomDate']."',status='Active'";
// $Esr=mysqli_query($conn,$det);  


$det="insert into s_job_card_sdetails_temp set session_id='".session_id()."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',service_type='".$_POST['Rtype']."',st_amt='".$_POST['rst_amt']."',qty='".$_POST['rqty']."',remarks='".$_POST['rremarks']."',remarks_1='".$_POST['rremarks_1']."',FranchiseeId='".$_SESSION['BranchId']."',UserId='".$_SESSION['UserId']."',status='Active'";
$Esr=mysqli_query($conn,$det);


$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard.php?job_card_no=$job_card_no && id=#recom");
}


if (isset($_POST['Addspare']))
{
/* Accessories add Start*/
 $det12="insert into s_job_card_temp set session_id='".session_id()."',cvisit='".$_POST['cvisit']."',cemail='".$_POST['smail']."',cmodel='".$_POST['CarModel']."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',FranchiseeId='".$_SESSION['BranchId']."',UserId='".$_SESSION['UserId']."',status='Active',ReferencedMobileNo='".trim($_POST['ReferencedMobileNo'])."',ReferencedNote='".$_POST['ReferencedNote']."',ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats1='".$_POST['FloarMats1']."',FloarMats2='".$_POST['FloarMats2']."',FloarMats3='".$_POST['FloarMats3']."',FloarMats4='".$_POST['FloarMats4']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."',ReferedDiscount='".$_POST['ReferedDiscount']."',InteriorOne='".$_POST['InteriorOne']."',InteriorTwo='".$_POST['InteriorTwo']."',ExteriorOne='".$_POST['ExteriorOne']."',ExteriorTwo='".$_POST['ExteriorTwo']."',ExteriorThree='".$_POST['ExteriorThree']."'";
$Esr12=mysqli_query($conn,$det12);

 $acc="insert into s_jobcard_accessories set session_id='".session_id()."',job_card_no='".trim($_POST['job_card_no'])."',sname='".$_POST['Atype']."',smrp='".$_POST['smrp']."',FranchiseeId='".$_SESSION['BranchId']."',UserId='".$_SESSION['UserId']."',status='Active'";
$acc1=mysqli_query($conn,$acc); 

 
 $acc3="insert into s_jobcard_accesories_main set job_card_no='".$_POST['job_card_no']."',sname='".$_POST['Atype']."',smrp='".$_POST['smrp']."'";
$acc4=mysqli_query($conn,$acc3);  

/*Accessories Add end*/
$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard.php?job_card_no=$job_card_no && id=#recom1");
}


















/**************Main Table Insert Query started*******************/
if (isset($_POST['SubmitJobCard']))
{
            $see="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
			$absc=mysqli_query($conn,$see);
			$var=mysqli_fetch_array($absc);
			$Seion=$var['franchisee_id'];	
			
			


$ps="select * from job_card_no where id='1'";
$Eps=mysqli_query($conn,$ps);
$Fps=mysqli_fetch_array($Eps);

   $pn=$Seion."-".$Fps['jcn'];   

  $jcs="select job_card_no from s_job_card where job_card_no='".$_POST['job_card_no']."'"; 
$jcsq=mysqli_query($conn,$jcs);
$jcsf=mysqli_fetch_array($jcsq);   
 $jcsr=mysqli_num_rows($jcsq);

/*
if($jcsr > 0)
{
	 $upj="update job_card_no set jcn=jcn+1 where id='1'"; 
    $upw=mysqli_query($conn,$upj);
	
	   $p="select * from job_card_no where id='1'";
       $Ep=mysqli_query($p);
       $Fp=mysqli_fetch_array($Ep); 
	   
	   $jcno=$Seion."-".$Fp['jcn'];
}
else
{
$jcno=$_POST['job_card_no'];

//Update Jno
$upj="update job_card_no set jcn=jcn+1 where id='1'"; 
$upw=mysqli_query($conn,$upj);
//


}*/

 $p="select * from job_card_no where id='1'";
       $Ep=mysqli_query($conn,$p);
       $Fp=mysqli_fetch_array($Ep); 
	   
	   $jcno=$Seion."-".$Fp['jcn'];

$upj="update job_card_no set jcn=jcn+1 where branch_id='".$_SESSION['BranchId']."'"; 
$upw=mysqli_query($conn,$upj);


//echo $jcno;
//exit();	



			$nm1="select * from a_customer where mobile1='".trim($_POST['ReferencedMobileNo'])."'";
			$abc1=mysqli_query($conn,$nm1);
			$CustomerId=mysqli_fetch_array($abc1);
	
	
$in="insert into s_job_card set ReferralDiscount='".$_POST['ReferralStatus']."',financial_year='".$_SESSION['FinancialYear']."',gst='".$_POST['gst']."',gst_amt='".$_POST['gst_amt']."',IncludeGst='".$_POST['total_amt_agst']."',ServiceAdvisor='".$_POST['ServiceAdvisor']."',ServiceAdditionalInfo='".$_POST['ServiceAdditionalInfo']."',TechnicianName='".$_POST['TechnicianName']."',DeliveryDate='".$_POST['delivery_date']."',DeliveryTime='".$_POST['delivery_time']."',PaidAmount='".$_POST['paying_advance_amount']."',BalanceAmount='".$_POST['balance_amount']."',Remarks='".$_POST['remarks_1']."',ParticularInstructions='".$_POST['customer_instructions']."',description='".$_POST['description']."',job_card_no='".$jcno."',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".trim($_POST['smobile'])."',sname='".trim($_POST['sname'])."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',fuel='".$_POST['fuel']."',follow='".$_POST['follow']."',total_amt='".$_POST['total_amt']."',status='Active',jcard_status='Open',FranchiseeId='".$var2['branch_id']."',vendor_id='".$var1['vendor_id']."',UserId='".$_SESSION['UserId']."',payment_mode='".$_POST['payment_mode']."',AccountNo='".$_POST['AccountNo']."',ChequeNumber='".$_POST['ChequeNumber']."',LedgerId='".$_POST['LedgerId']."',BankId='".$_POST['BankId']."',DiscountAmount='".$_POST['DiscountAmount']."',DiscountPercentage='".$_POST['DiscountPercentage']."',ReferencedBy='".trim($_POST['ReferencedBy'])."',ReferencedMobileNo='".$CustomerId['id']."',ReferencedNote='".$_POST['ReferencedNote']."',acc_t_amt='".$_POST['acc_t_amt']."'"; 
$Ein=mysqli_query($conn,$in); 
$rno=mysqli_insert_id($conn); 

if($_POST['payment_mode']=="Cash")
{
$cash_acc="insert into account_cash set TransactionDate='".$_POST['jdate']."',LedgerGroup='33',TransactionType='Credit',Amount='".$_POST['paying_advance_amount']."',ReferenceNo='".$jcno."',TransactionFrom='s_job_card',Remarks='Service Advance',LedgerId='".$_POST['CLI']."',franchisee_id='".$var2['branch_id']."',vendor_id='".$var1['vendor_id']."'";
$acc_insert=mysqli_query($conn,$cash_acc); 	
}

 if($_POST['payment_mode']=='Bank')
	   {
	      $cash_acc="insert into account_bank set TransactionDate='".$_POST['jdate']."',LedgerGroup='33',TransactionType='Credit',Amount='".$_POST['paying_advance_amount']."',ReferenceNo='".$jcno."',TransactionFrom='s_job_card',Remarks='Service Advance',BankId='".$_POST['BankId']."',LedgerId='".$_POST['CLI']."',franchisee_id='".$var2['branch_id']."',vendor_id='".$var1['vendor_id']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
       }

				$names="select * from s_job_card_pdetails_temp where session_id='".session_id()."'";
				$ns=mysqli_query($conn,$names);
				while($jcd=mysqli_fetch_array($ns))
				{
				$det="insert into s_job_card_pdetails set job_card_no='$rno',package_type='".$jcd['package_type']."',package_amt='".$jcd['package_amt']."',pac_remarks='".$jcd['pac_remarks']."',status='Active',ServiceStatus='Pending'";
				$Fd=mysqli_query($conn,$det);
				}
				$names1="select * from s_job_card_sdetails_temp where session_id='".session_id()."'";
				$ns1=mysqli_query($conn,$names1);
				while($jcd1=mysqli_fetch_array($ns1))
				{
				$det1="insert into s_job_card_sdetails set jdate='".$_POST['jdate']."',job_card_no='$rno',service_type='".$jcd1['service_type']."',st_amt='".$jcd1['st_amt']."',qty='".$jcd1['qty']."',remarks='".$jcd1['remarks']."',remarks_1='".$jcd1['remarks_1']."',status='Active',ServiceStatus='Pending'";
				$Fd1=mysqli_query($conn,$det1);
				}

				$names1="select * from s_job_card_recomdetails_temp where session_id='".session_id()."'";
				$ns1=mysqli_query($conn,$names1);
				while($jcd1=mysqli_fetch_array($ns1))
				{
				$det1="insert into s_job_card_recomdetails set job_card_no='$rno',service_type='".$jcd1['service_type']."',st_amt='".$jcd1['st_amt']."',qty='".$jcd1['qty']."',remarks='".$jcd1['remarks']."',remarks_1='".$jcd1['remarks_1']."',status='Active',ServiceStatus='Pending',RecomDate='".$jcd1['RecomDate']."',customerId='".$_POST['snamec']."'";
				$Fd1=mysqli_query($conn,$det1);
				}
				
				$names1="select * from s_job_card_damge_temp where session_id='".session_id()."'";
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
			
		 	$Csa="insert into s_job_card_package_service_details set JobcradPackageId='".$Dce['id']."',job_card_no='".$jcno."',JobcardId='$rno',Service='".$Fde['service']."',PackageName='".$Fde['package_name']."',ServiceStatus='Pending'";
			$Dsxa=mysqli_query($conn,$Csa); 
	}	
	}
				
				$emp="select * from a_customer where mobile1='".trim($_POST['smobile'])."'";
				$pme=mysqli_query($conn,$emp);
				$epm=mysqli_fetch_array($pme);
				
$iinv="insert into s_job_card_inventory set JobCardId='$rno',ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats1='".$_POST['FloarMats1']."',FloarMats2='".$_POST['FloarMats2']."',FloarMats3='".$_POST['FloarMats3']."',FloarMats4='".$_POST['FloarMats4']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."'";
$Eiinv=mysqli_query($conn,$iinv); 

//Start Insert the Damage Details
$dxs="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName']."',TypeOfDamage='".$_SESSION['TypeOfDamage']."',Note='".$_SESSION['Note']."'";
$sa=mysqli_query($conn,$dxs);

$dxs1="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName1']."',TypeOfDamage='".$_SESSION['TypeOfDamage1']."',Note='".$_SESSION['Note1']."'";
$sa1=mysqli_query($conn,$dxs1);

$dxs2="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName2']."',TypeOfDamage='".$_SESSION['TypeOfDamage2']."',Note='".$_SESSION['Note2']."'";
$sa2=mysqli_query($conn,$dxs2);

$dxs3="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName3']."',TypeOfDamage='".$_SESSION['TypeOfDamage3']."',Note='".$_SESSION['Note3']."'";
$sa3=mysqli_query($conn,$dxs3);

$dxs4="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName4']."',TypeOfDamage='".$_SESSION['TypeOfDamage4']."',Note='".$_SESSION['Note4']."'";
$sa4=mysqli_query($conn,$dxs4);

$dxs5="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName5']."',TypeOfDamage='".$_SESSION['TypeOfDamage5']."',Note='".$_SESSION['Note5']."'";
$sa5=mysqli_query($conn,$dxs5);

$dxs6="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName6']."',TypeOfDamage='".$_SESSION['TypeOfDamage6']."',Note='".$_SESSION['Note6']."'";
$sa6=mysqli_query($conn,$dxs6);

$dxs7="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName7']."',TypeOfDamage='".$_SESSION['TypeOfDamage7']."',Note='".$_SESSION['Note7']."'";
$sa7=mysqli_query($conn,$dxs7);

$dxs8="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName8']."',TypeOfDamage='".$_SESSION['TypeOfDamage8']."',Note='".$_SESSION['Note8']."'";
$sa8=mysqli_query($conn,$dxs8);

$dxs9="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName9']."',TypeOfDamage='".$_SESSION['TypeOfDamage9']."',Note='".$_SESSION['Note9']."'";
$sa9=mysqli_query($conn,$dxs9);

$dxs10="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName10']."',TypeOfDamage='".$_SESSION['TypeOfDamage10']."',Note='".$_SESSION['Note10']."'";
$sa10=mysqli_query($conn,$dxs10);

$dxs11="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName11']."',TypeOfDamage='".$_SESSION['TypeOfDamage11']."',Note='".$_SESSION['Note11']."'";
$sa11=mysqli_query($conn,$dxs11);

$dxs12="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName12']."',TypeOfDamage='".$_SESSION['TypeOfDamage12']."',Note='".$_SESSION['Note12']."'";
$sa12=mysqli_query($conn,$dxs12);

$dxs11="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName13']."',TypeOfDamage='".$_SESSION['TypeOfDamage13']."',Note='".$_SESSION['Note13']."'";
$sa11=mysqli_query($conn,$dxs11);

$dxs11="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName14']."',TypeOfDamage='".$_SESSION['TypeOfDamage14']."',Note='".$_SESSION['Note14']."'";
$sa11=mysqli_query($conn,$dxs11);

$dxs11="insert into s_job_card_damge set job_card_no='$rno',VehiclePartName='".$_POST['VehiclePartName15']."',TypeOfDamage='".$_SESSION['TypeOfDamage15']."',Note='".$_SESSION['Note15']."'";
$sa11=mysqli_query($conn,$dxs11);
	
//End Insert Damage Details

// start insert images//
$target_dir = "image/";
$target_file = $target_dir . basename($_FILES["VImage1"]["name"]);
$extension = pathinfo($_FILES["VImage1"]["name"], PATHINFO_EXTENSION);
$nname = mt_rand();
$upath=$target_dir . $nname.".".$extension;
$iupath=$nname.".".$extension;
move_uploaded_file($_FILES["VImage1"]["tmp_name"], $upath);

$target_dir1 = "image/";
$target_file1 = $target_dir1 . basename($_FILES["VImage2"]["name"]);
$extension1 = pathinfo($_FILES["VImage2"]["name"], PATHINFO_EXTENSION);
$nname1 = mt_rand();
$upath1=$target_dir1 . $nname1.".".$extension1;
$iupath1=$nname1.".".$extension1;
move_uploaded_file($_FILES["VImage2"]["tmp_name"], $upath1);

$target_dir2 = "image/";
$target_file2 = $target_dir1 . basename($_FILES["VImage3"]["name"]);
$extension2 = pathinfo($_FILES["VImage3"]["name"], PATHINFO_EXTENSION);
$nname2 = mt_rand();
$upath2=$target_dir2 . $nname2.".".$extension2;
$iupath2=$nname2.".".$extension2;
move_uploaded_file($_FILES["VImage3"]["tmp_name"], $upath2);

$target_dir3 = "image/";
$target_file3 = $target_dir1 . basename($_FILES["VImage4"]["name"]);
$extension3 = pathinfo($_FILES["VImage4"]["name"], PATHINFO_EXTENSION);
$nname3 = mt_rand();
$upath3=$target_dir3 . $nname3.".".$extension3;
$iupath3=$nname3.".".$extension3;
move_uploaded_file($_FILES["VImage4"]["tmp_name"], $upath3);

$target_dir4 = "image/";
$target_file4 = $target_dir1 . basename($_FILES["VImage5"]["name"]);
$extension4 = pathinfo($_FILES["VImage5"]["name"], PATHINFO_EXTENSION);
$nname4 = mt_rand();
$upath4=$target_dir4 . $nname4.".".$extension4;
$iupath4=$nname4.".".$extension4;
move_uploaded_file($_FILES["VImage5"]["tmp_name"], $upath4);

$target_dir5 = "image/";
$target_file5 = $target_dir1 . basename($_FILES["VImage6"]["name"]);
$extension5 = pathinfo($_FILES["VImage6"]["name"], PATHINFO_EXTENSION);
$nname5 = mt_rand();
$upath5=$target_dir5 . $nname5.".".$extension5;
$iupath5=$nname5.".".$extension5;
move_uploaded_file($_FILES["VImage6"]["tmp_name"], $upath5);

$target_dir6 = "image/";
$target_file6 = $target_dir1 . basename($_FILES["VImage7"]["name"]);
$extension6 = pathinfo($_FILES["VImage7"]["name"], PATHINFO_EXTENSION);
$nname6 = mt_rand();
$upath6=$target_dir6 . $nname6.".".$extension6;
$iupath6=$nname6.".".$extension6;
move_uploaded_file($_FILES["VImage7"]["tmp_name"], $upath6);



$target_dir7 = "image/";
$target_file7 = $target_dir1 . basename($_FILES["VImage8"]["name"]);
$extension7 = pathinfo($_FILES["VImage8"]["name"], PATHINFO_EXTENSION);
$nname7 = mt_rand();
$upath7=$target_dir7 . $nname7.".".$extension7;
$iupath7=$nname7.".".$extension7;
move_uploaded_file($_FILES["VImage8"]["tmp_name"], $upath7);


$target_dir8 = "image/";
$target_file8 = $target_dir1 . basename($_FILES["VImage9"]["name"]);
$extension8 = pathinfo($_FILES["VImage9"]["name"], PATHINFO_EXTENSION);
$nname8 = mt_rand();
$upath8=$target_dir8 . $nname8.".".$extension8;
$iupath8=$nname8.".".$extension8;
move_uploaded_file($_FILES["VImage9"]["tmp_name"], $upath8);

$target_dir9 = "image/";
$target_file9 = $target_dir1 . basename($_FILES["VImage10"]["name"]);
$extension9 = pathinfo($_FILES["VImage10"]["name"], PATHINFO_EXTENSION);
$nname9 = mt_rand();
$upath9=$target_dir9 . $nname9.".".$extension9;
$iupath9=$nname9.".".$extension9;
move_uploaded_file($_FILES["VImage10"]["tmp_name"], $upath9);


$jci="insert into s_jobcard_images set JobCardId='$rno'";
$jciq=mysqli_query($conn,$jci);
$idi=mysqli_insert_id($conn);

if(basename($_FILES["VImage1"]["name"]!=""))
{
$gm1="update s_jobcard_images set VImage1='$iupath' where Id='$idi'"; 
$Egm1=mysqli_query($conn,$gm1);
}
if(basename($_FILES["VImage2"]["name"]!=""))
{
$gm1="update s_jobcard_images set VImage2='$iupath1' where Id='$idi'"; 
$Egm1=mysqli_query($conn,$gm1);
}
if(basename($_FILES["VImage3"]["name"]!=""))
{
$gm1="update s_jobcard_images set VImage3='$iupath2' where Id='$idi'"; 
$Egm1=mysqli_query($conn,$gm1);
}

if(basename($_FILES["VImage4"]["name"]!=""))
{
$gm1="update s_jobcard_images set VImage4='$iupath3' where Id='$idi'"; 
$Egm1=mysqli_query($conn,$gm1);
}
if(basename($_FILES["VImage5"]["name"]!=""))
{
$gm1="update s_jobcard_images set VImage5='$iupath4' where Id='$idi'"; 
$Egm1=mysqli_query($conn,$gm1);
}

if(basename($_FILES["VImage6"]["name"]!=""))
{
$gm1="update s_jobcard_images set VImage6='$iupath5' where Id='$idi'"; 
$Egm1=mysqli_query($conn,$gm1);
}
if(basename($_FILES["VImage7"]["name"]!=""))
{
$gm1="update s_jobcard_images set VImage7='$iupath6' where Id='$idi'"; 
$Egm1=mysqli_query($conn,$gm1);
}

if(basename($_FILES["VImage8"]["name"]!=""))
{
$gm1="update s_jobcard_images set VImage8='$iupath7' where Id='$idi'"; 
$Egm1=mysqli_query($conn,$gm1);
}

if(basename($_FILES["VImage9"]["name"]!=""))
{
$gm1="update s_jobcard_images set VImage9='$iupath8' where Id='$idi'"; 
$Egm1=mysqli_query($conn,$gm1);
}
if(basename($_FILES["VImage10"]["name"]!=""))
{
$gm1="update s_jobcard_images set VImage10='$iupath9' where Id='$idi'"; 
$Egm1=mysqli_query($conn,$gm1);
}


//end insert images//
	
$ups="update s_job_card set customer_id='".$epm['id']."' where job_card_no='".$jcno."'"; 
$upw=mysqli_query($conn,$ups);


$del="DELETE FROM s_job_card_temp WHERE session_id='".session_id()."'";
$spm=mysqli_query($conn,$del);

$dels="DELETE FROM s_job_card_pdetails_temp WHERE session_id='".session_id()."'";
$spms=mysqli_query($conn,$dels);

$del2="DELETE FROM s_job_card_sdetails_temp WHERE session_id='".session_id()."'";
$spm2=mysqli_query($conn,$del2);

$del2="DELETE FROM s_job_card_damge_temp WHERE session_id='".session_id()."'";
$spm2=mysqli_query($conn,$del2);

$del2="DELETE FROM s_job_card_recomdetails_temp WHERE session_id='".session_id()."'";
$spm2=mysqli_query($conn,$del2);

$del23="DELETE FROM s_jobcard_accessories WHERE session_id='".session_id()."'";
$spm23=mysqli_query($conn,$del23);

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
$_SESSION['Note12']='';
$_SESSION['Note13']='';
$_SESSION['Note14']='';
$_SESSION['Note15']='';

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
$_SESSION['TypeOfDamage12']='';
$_SESSION['TypeOfDamage13']='';
$_SESSION['TypeOfDamage14']='';
$_SESSION['TypeOfDamage15']='';

$job_card_no=$jcno;



//SMS Service Starts//	 
  $ss="select smobile,sname,vehicle_no,BalanceAmount,DeliveryDate,DeliveryTime from s_job_card where job_card_no='$job_card_no'";
	$Ess=mysqli_query($conn,$ss);
	$FEss=mysqli_fetch_array($Ess);
	
 $ss1="select * from a_customer where id='".$FEss['customer_id']."'";
	$Ess1=mysqli_query($conn,$ss1);
	$FEss1=mysqli_fetch_array($Ess1);
	
// $ch = curl_init();
// $ref=$FEss1['refer'];
// $v=$FEss['sname'];
// $a=$FEss['vehicle_no'];
// $b=$FEss['BalanceAmount'];
// $c=$FEss['DeliveryDate'];
// $d=$FEss['DeliveryTime'];
// $e=rand(1000,10000);
//$mob=$FEss['smobile'];
 // $mob=$FEss['smobile'];

//$m="9698079706";
//Username: shakilaauto@gmail.com

//$message="Dear ".$ref.".".$v.", It's time to pamper your vehicle ".$a.". The Scheduled Delivery time is ".$c."  ".$d.". The Invoiced bill amount is Rs.".$b."/-. Your secret pin is ".$e.". Please provide us the secret pin while taking delivery only if you are satisfied with our workmanship. Have a nice time shopping at prozonemall !";

/* $userid="protouch";
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
$url="http://indiasmstalks.com/api/mt/SendSMS?$content";
$ch = curl_init($url);
curl_exec($ch);
curl_close($ch); */
// $message="Dear".$ref.".".$v.",It's time to pamper your vehicle:".$a.".The Scheduled Delivery time is ".$c." ".$d.". The Invoiced bill amount is Rs.".$b."/-. Have a nice time shopping at prozonemall !";

// $userid="protouch";
// $pwd="welcome123";
// $senderid="protch";
// $channel="Trans";
// $DCS="0";
// $flashsms="0";
// $contacts="$mob";
// $route="6";
// $content =  'user='.rawurlencode($userid). 
                // '&password='.rawurlencode($pwd). 
				// '&senderid='.rawurlencode($senderid).
				// '&channel='.rawurlencode($channel).
				// '&DCS='.rawurlencode($DCS).
				// '&flashsms='.rawurlencode($flashsms).				
				// '&number='.rawurlencode($contacts).
				// '&text='.rawurlencode($message).                
                // '&route='.rawurlencode($route); 
 // $url="http://indiasmstalks.com/api/mt/SendSMS?$content";
// $ch = curl_init($url);
 // curl_exec($ch);
// curl_close($ch);

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
$Eus=mysqli_query($conn,$us);

//SMS Service End//

$jc="select * from s_job_card where job_card_no='$job_card_no'";
$jcq=mysqli_query($conn,$jc);
$jcf=mysqli_fetch_array($jcq);
$id=$jcf['id'];
header("location:s_jobcard_view.php?job_card_no=$job_card_no & id=$id");
}	

if (isset($_POST['FinishCheckList']))
{
	
	//echo $fsg=$_POST['PSms']=='Enable';
if($_POST['PSms']=='Enable'){

  $ct="update s_job_card set jcard_status='Ready To Delivery' where id='".$_REQUEST['JobcardId']."'"; 
$Ect=mysqli_query($conn,$ct);

$iinv="insert into s_job_card_check_list set JobCardId='".$_POST['JobcardId']."',DashBoardFull='".$_POST['DashBoardFull']."',DoorPads='".$_POST['DoorPads']."',Top='".$_POST['Top']."',ACGrill='".$_POST['ACGrill']."',DoorPadTray='".$_POST['DoorPadTray']."',FloarMats='".$_POST['FloarMats']."',MicSystem='".$_POST['MicSystem']."',PowerWindowSwitchRear='".$_POST['PowerWindowSwitchRear']."',PowerWindowSwitchFront='".$_POST['PowerWindowSwitchFront']."',Steering='".$_POST['Steering']."',HeadRest='".$_POST['HeadRest']."',Floor='".$_POST['Floor']."',GearKnobArea='".$_POST['GearKnobArea']."',Seats='".$_POST['Seats']."',Dickey='".$_POST['Dickey']."',Bonnet='".$_POST['Bonnet']."',SideMirrors='".$_POST['SideMirrors']."',Tiers='".$_POST['Tiers']."',DoorsTop='".$_POST['DoorsTop']."',DoorInsideArea='".$_POST['DoorInsideArea']."',AlloyWheels='".$_POST['AlloyWheels']."',Bumpers='".$_POST['Bumpers']."',WindscreenDoorGlassesRearGlass='".$_POST['WindscreenDoorGlassesRearGlass']."'";
$Eiinv=mysqli_query($conn,$iinv);

//SMS Service Starts//	 

// http://www.apiconnecto.com/API/SMSApiConnector.aspx?UserId=inwaytest&pwd=123456&Message=testfromAPI&Contacts=9940707374&SenderId=INWAYH&ServiceName=SMSTRANS&MessageType=1

	 // $ss="select * from s_job_card where id='".$_REQUEST['JobcardId']."'"; 
	// $Ess=mysqli_query($conn,$ss);
	// $FEss=mysqli_fetch_array($Ess);
	
	// $ss1="select * from a_customer where id='".$FEss['customer_id']."'";
	// $Ess1=mysqli_query($conn,$ss1);
	// $FEss1=mysqli_fetch_array($Ess1);
	
// $ch = curl_init();
// $ref=$FEss1['refer'];
// $name=$FEss['sname'];
// $vno=$FEss['vehicle_no'];
// $cust=$FEss1['cust_name'];
  // $m=$FEss['smobile'];
//Username: shakilaauto@gmail.com
// $user="shakilaauto@gmail.com:vertex123";
// $receipientno=$m;
// $senderID="TEST SMS";

// $message="Dear".$ref.".".$name.",Your vehicle with registration number :".$vno."is ready for delivery.";

//SMS content Start //
// $userid="protouch";
// $pwd="welcome123";
// $senderid="protch";
// $channel="Trans";
// $DCS="0";
// $flashsms="0";
 // $contacts=$m;
// $route="6";
 // $content =  'user='.rawurlencode($userid). 
                // '&password='.rawurlencode($pwd). 
				// '&senderid='.rawurlencode($senderid).
				// '&channel='.rawurlencode($channel).
				// '&DCS='.rawurlencode($DCS).
				// '&flashsms='.rawurlencode($flashsms).				
				// '&number='.rawurlencode($contacts).
				// '&text='.rawurlencode($message).                
                // '&route='.rawurlencode($route); 
 // $url="http://indiasmstalks.com/api/mt/SendSMS?$content";
// $ch = curl_init($url);
 // curl_exec($ch);
// curl_close($ch);
// SMS content END //



$id=$_REQUEST['JobcardId'];

//Feedback Message

// started SMS   //
// $ch = curl_init();
// $v=$FEss['vehicle_no'];
// $a=$pin_fetch['IncludeGst'];
// $m=$FEss['smobile'];
// $receipientno=$m;
//https://bit.ly/2MsP6ko
//$he='</a>';
//$message="Dear Customer , Thanks for your Business with Protouch.Total Bill Amount Rs.".$a."/-. Please Visit Again.We Expect your Feed Back for Better Service".$hs."For Feedback".$he;
// SMS content Start //
//$message="Dear ".$cust.",Thanks for visiting Protouch.Please Click here to rate our services.http://protouch.vertexsolution.co.in/feedback.php?id=".$id."";


// SMS content END //
header("location:s_jobcard_view.php");
	}
	else
	{
		
$iinv="insert into s_job_card_check_list set JobCardId='".$_POST['JobcardId']."',DashBoardFull='".$_POST['DashBoardFull']."',DoorPads='".$_POST['DoorPads']."',Top='".$_POST['Top']."',ACGrill='".$_POST['ACGrill']."',DoorPadTray='".$_POST['DoorPadTray']."',FloarMats='".$_POST['FloarMats']."',MicSystem='".$_POST['MicSystem']."',PowerWindowSwitchRear='".$_POST['PowerWindowSwitchRear']."',PowerWindowSwitchFront='".$_POST['PowerWindowSwitchFront']."',Steering='".$_POST['Steering']."',HeadRest='".$_POST['HeadRest']."',Floor='".$_POST['Floor']."',GearKnobArea='".$_POST['GearKnobArea']."',Seats='".$_POST['Seats']."',Dickey='".$_POST['Dickey']."',Bonnet='".$_POST['Bonnet']."',SideMirrors='".$_POST['SideMirrors']."',Tiers='".$_POST['Tiers']."',DoorsTop='".$_POST['DoorsTop']."',DoorInsideArea='".$_POST['DoorInsideArea']."',AlloyWheels='".$_POST['AlloyWheels']."',Bumpers='".$_POST['Bumpers']."',WindscreenDoorGlassesRearGlass='".$_POST['WindscreenDoorGlassesRearGlass']."'";
$Eiinv=mysqli_query($conn,$iinv);

 $ct="update s_job_card set jcard_status='Ready To Delivery' where id='".$_REQUEST['JobcardId']."'"; 
$Ect=mysqli_query($conn,$ct);

$JobcardId=$_POST['JobcardId'];
header("location:s_jobcard_view.php");
}
}




?>