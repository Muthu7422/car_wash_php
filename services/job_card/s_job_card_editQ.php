<?php
error_reporting(0);
ob_start();
include("../../includes.php");
include("../../redirect.php");




if(isset($_POST['AddDamage']))
{
$det1="insert into s_job_card_damge set job_card_no='".$_POST['job_card_id']."',VehiclePartName='".$_POST['VehiclePartName']."',TypeOfDamage='".$_POST['TypeOfDamage']."',Note='".$_POST['Note']."'";
$Fd1=mysqli_query($conn,$det1);
$iinv="UPDATE s_job_card_inventory set ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats='".$_POST['FloarMats']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."' WHERE JobCardId='".$_POST['job_card_id']."'";
$Eiinv=mysqli_query($conn,$iinv); 
$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no");
}








if (isset($_POST['AddService']))
{
$det="insert into s_job_card_sdetails set job_card_no='".$_POST['job_card_id']."',service_type='".$_POST['stype']."',st_amt='".$_POST['st_amt']."',qty='".$_POST['qty']."',ServiceStatus='Pending',status='Active'";
$Esr=mysqli_query($conn,$det); 

$iinv="UPDATE s_job_card_inventory set ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats='".$_POST['FloarMats']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."' WHERE JobCardId='".$_POST['job_card_id']."'";
$Eiinv=mysqli_query($conn,$iinv); 
$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no");
}







if (isset($_POST['AddRecom']))
{
$det="insert into s_job_card_recomdetails set job_card_no='".$_POST['job_card_id']."',service_type='".$_POST['Rtype']."',st_amt='".$_POST['rst_amt']."',qty='".$_POST['rqty']."',ServiceStatus='Pending',status='Active'";
$Esr=mysqli_query($conn,$det); 

$iinv="UPDATE s_job_card_inventory set ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats='".$_POST['FloarMats']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."' WHERE JobCardId='".$_POST['job_card_id']."'";
$Eiinv=mysqli_query($conn,$iinv); 

$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no");
}














if (isset($_POST['AddPackage']))
{
	            $det="insert into s_job_card_pdetails set job_card_no='".$_POST['job_card_id']."',package_type='".$_POST['ptype']."',package_amt='".$_POST['pk_amt']."',status='Active',ServiceStatus='Pending'";
				$Fd=mysqli_query($conn,$det);
				
                   $mob12="select * from a_customer_vehicle_details where vehicle_no='".trim($_POST['vehicle_no'])."'";
				     $mobi12=mysqli_query($conn,$mob12);
				     $mobil12=mysqli_fetch_array($mobi12);  
				  
					
				   $mvs="select * from master_vehicle_segment where VehicleSegment='".trim($mobil12['VehicleSegment'])."'";
				  $mvq=mysqli_query($conn,$mvs);
				  $mvf=mysqli_fetch_array($mvq); 
				  
		
		        $echeck="select * from m_package where package_name='".$_POST['ptype']."' and v_type='".trim($mvf['Id'])."' and status='Active'";  
                  $echk=mysqli_query($conn,$echeck);
                  $ecount=mysqli_fetch_array($echk); 
		
		
			  $F="select * from m_package_service where package_name='".$_POST['ptype']."' and package_no='".trim($ecount['package_no'])."'"; 
			$Fdf=mysqli_query($conn,$F);
			while($Fde=mysqli_fetch_array($Fdf)) 
			{
			
		 	 $Csa="insert into s_job_card_package_service_details set JobcradPackageId='".$Fde['id']."',job_card_no='".$_POST['job_card_no']."',JobcardId='".$_POST['job_card_id']."',Service='".$Fde['service']."',PackageName='".$Fde['package_name']."',ServiceStatus='Pending'";
			$Dsxa=mysqli_query($conn,$Csa); 
	}	
	
	$iinv="UPDATE s_job_card_inventory set ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats='".$_POST['FloarMats']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."' WHERE JobCardId='".$_POST['job_card_id']."'";
$Eiinv=mysqli_query($conn,$iinv); 

$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no");
}













if($_REQUEST['act']=='Del')
{
$det="delete from s_job_card_sdetails where id='".$_REQUEST['sid']."'";
$Esr=mysqli_query($conn,$det); 
$iinv="UPDATE s_job_card_inventory set ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats='".$_POST['FloarMats']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."' WHERE JobCardId='".$_POST['job_card_id']."'";
$Eiinv=mysqli_query($conn,$iinv); 
$job_card_no=$_REQUEST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no");
}












if($_REQUEST['act']=='Del1')
{
$det="delete from s_job_card_pdetails where id='".$_REQUEST['sid']."'";
$Esr=mysqli_query($conn,$det); 

$Rfds="delete from s_job_card_package_service_details where JobcradPackageId='".$_REQUEST['sid']."'";
$Cds=mysqli_query($conn,$Rfds);
$iinv="UPDATE s_job_card_inventory set ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats='".$_POST['FloarMats']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."' WHERE JobCardId='".$_POST['job_card_id']."'";
$Eiinv=mysqli_query($conn,$iinv); 
$job_card_no=$_REQUEST['job_card_no'];
header("location:s_jobcard_edit.php?job_card_no=$job_card_no");
}








if (isset($_POST['AddJobCard']))
{

$in="update s_job_card set ServiceAdvisor='".$_POST['ServiceAdvisor']."',financial_year='2019-2020',ServiceAdditionalInfo='".$_POST['ServiceAdditionalInfo']."',TechnicianName='".$_POST['TechnicianName']."',DeliveryDate='".$_POST['delivery_date']."',DeliveryTime='".$_POST['delivery_time']."',PaidAmount='".$_POST['paying_advance_amount']."',BalanceAmount='".$_POST['balance_amount']."',Remarks='".$_POST['remarks_1']."',ParticularInstructions='".$_POST['customer_instructions']."',job_card_no='".$_POST['job_card_no']."',jdate='".$_POST['jdate']."',vehicle_no='".$_POST['vehicle_no']."',smobile='".$_POST['smobile']."',sname='".$_POST['sname']."',saddress='".$_POST['saddress']."',kms='".$_POST['kms']."',fuel='".$_POST['fuel']."',follow='".$_POST['follow']."',total_amt='".$_POST['total_amt']."' where id='".$_POST['job_card_id']."'"; 
$Ein=mysqli_query($conn,$in);

if($_POST['payment_mode']=="Cash")
{
	$accash="select * from  account_cash WHERE ReferenceNo='".$_POST['job_card_no']."'"; 
	$cashq=mysqli_query($conn,$accash);
	$cashf=mysqli_fetch_array($cashq);
	
	if($cashf['ReferenceNo'] == $_POST['job_card_no'])
	{
	   
        $cash_acc="update account_cash set TransactionDate='".$_POST['jdate']."',LedgerGroup='33',TransactionType='Credit',Amount='".$_POST['paying_advance_amount']."' where ReferenceNo='".$_POST['job_card_no']."'";
       $acc_insert=mysqli_query($conn,$cash_acc); 	
	}
	else
	{
		$cash_acc="insert into account_cash set TransactionDate='".$_POST['jdate']."',LedgerGroup='33',TransactionType='Credit',Amount='".$_POST['paying_advance_amount']."',ReferenceNo='".$_POST['job_card_no']."',TransactionFrom='s_job_card',Remarks='Service Advance',LedgerId='".$_POST['CLI']."'";
          $acc_insert=mysqli_query($conn,$cash_acc); 	
		  
		 
	}
}
if($_POST['payment_mode']!="Cash")
{
	
	$acbank="select * from  account_bank where ReferenceNo='".$_POST['job_card_no']."'"; 
	$acbankq=mysqli_query($conn,$acbank);
	$acbankf=mysqli_fetch_array($acbankq);
	
	if($acbankf['ReferenceNo'] == $_POST['job_card_no'])
	{
	      $cash_acc="update  account_bank set TransactionDate='".$_POST['jdate']."',LedgerGroup='33',TransactionType='Credit',Amount='".$_POST['paying_advance_amount']."' where ReferenceNo='".$_POST['job_card_no']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
     }
	
	else
	{
		
	      $cash_acc="insert into account_bank set TransactionDate='".$_POST['jdate']."',LedgerGroup='33',TransactionType='Credit',Amount='".$_POST['paying_advance_amount']."',ReferenceNo='".$_POST['job_card_no']."',TransactionFrom='s_job_card',Remarks='Service Advance',BankId='".$_POST['BankId']."',LedgerId='".$_POST['CLI']."'";
	      $acc_insert=mysqli_query($conn,$cash_acc); 
		  
		 
    
	}
}


				
		/*$names1="select * from s_job_card_sdetails_temp where job_card_no='".$_POST['job_card_no']."'";
		$ns1=mysqli_query($names1);
		while($jcd1=mysqli_fetch_array($ns1))
		{
		$det1="insert into s_job_card_sdetails set job_card_no='$rno',service_type='".$jcd1['service_type']."',st_amt='".$jcd1['st_amt']."',qty='".$jcd1['qty']."',remarks='".$jcd1['remarks']."',remarks_1='".$jcd1['remarks_1']."',status='Active'";
		$Fd1=mysqli_query($det1);
		}*/
				
$iinv="UPDATE s_job_card_inventory set ServiceBook='".$_POST['ServiceBook']."',Idol='".$_POST['Idol']."',WheelCaps='".$_POST['WheelCaps']."',ToolKit='".$_POST['ToolKit']."',StereoSpeakers='".$_POST['StereoSpeakers']."',FloarMats='".$_POST['FloarMats']."',MudFlaps='".$_POST['MudFlaps']."',SafetyTriangle='".$_POST['SafetyTriangle']."',AirFreshner='".$_POST['AirFreshner']."',WiperBlades='".$_POST['WiperBlades']."',SpareWheel='".$_POST['SpareWheel']."',Jack='".$_POST['Jack']."' WHERE JobCardId='".$_POST['job_card_id']."'";
$Eiinv=mysqli_query($conn,$iinv); 

$job_card_no=$_POST['job_card_no'];
header("location:s_jobcard_receipt.php?job_card_no=$job_card_no");
}











if($_REQUEST['ServiceStatus']=='Service')
{
	$JobcardId=$_REQUEST['JobcardId'];
$det="update s_job_card_sdetails set ServiceStatus='Completed' where id='".$_REQUEST['sid']."'";
$Esr=mysqli_query($conn,$det); 
$job_card_no=$_REQUEST['job_card_no'];
header("location:s_jobcard_service_pending.php?job_card_no=$job_card_no&JobcardId=$JobcardId&id=#services&");
}
if($_REQUEST['ServiceStatus']=='Recom')
{
	$JobcardId=$_REQUEST['JobcardId'];
$det="update s_job_card_recomdetails set ServiceStatus='Completed' where id='".$_REQUEST['sid']."'";
$Esr=mysqli_query($conn,$det); 
$job_card_no=$_REQUEST['job_card_no'];
header("location:s_jobcard_service_pending.php?job_card_no=$job_card_no&JobcardId=$JobcardId");
}
if($_REQUEST['ServiceStatus']=='Package')
{
	$JobcardId=$_REQUEST['JobcardId'];
$det="update s_job_card_package_service_details set ServiceStatus='Completed' where id='".$_REQUEST['sid']."'";
$Esr=mysqli_query($conn,$det); 
$job_card_no=$_REQUEST['job_card_no'];
header("location:s_jobcard_service_pending.php?job_card_no=$job_card_no&JobcardId=$JobcardId&id=#serv&");
}
		
?>