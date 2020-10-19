<?php
include("../../includes.php");
error_reporting(0);
$SServiceAmount=0;
$SSpareAmount=0;

$date=date('Y-m-d');
 $p="select * from a_final_bill where FrachiseeId='".$_SESSION['BranchId']."'";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);
$n=mysqli_num_rows($Ep);
$n1=$n+1;
$pn="EN".$n1;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
 
 <script>
function mob(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card').value;


$.ajax({
      type:'post',
        url:'getcmobile.php',// put your real file name 
        data:{inputs},
		dataType: 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("mobile").value=msg[0];
		document.getElementById("address").value=msg[1];
		document.getElementById("vehile_no").value=msg[2];
		document.getElementById("JobcardId").value=msg[3];
       
       }
 });

}
function amt(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card').value;


$.ajax({
      type:'post',
        url:'get_amt.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("service_amt").value=msg;
       
       }
 });

}

function samt(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card').value;


$.ajax({
      type:'post',
        url:'get_samt.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("total_service_amt").value=msg;
       
       }
 });

}


function outstanding(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card').value;


$.ajax({
      type:'post',
        url:'get_outstanding.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("cust_out_amt").value=msg;
       
       }
 });

}	
	function getcolor(val) {
	var job_card = document.getElementById('job_card').value;
	var inv_no = document.getElementById('inv_no').value;
	var bill_date = document.getElementById('bdate').value;
	
	$.ajax({
	type: "POST",
	url: "get_details.php",
	data: {job_card: job_card,inv_no:inv_no,bill_date:bill_date},
	success: function(data){
		$("#cdetails").html(data);
		}
		});
		}	

		
function sumgst()
{
   
	if(document.getElementById("ReceivableAmount").value=="")
	{
		ReceivableAmount=0;
	}
	else
	{
	var ReceivableAmount=parseFloat(document.getElementById("ReceivableAmount").value);
	}
	InvoiceBillAmount=parseFloat(document.getElementById("InvoiceBillAmount").value);
	
	var BalanceAmount=InvoiceBillAmount-ReceivableAmount;
	 document.getElementById("BalanceAmount").value=BalanceAmount.toFixed(2);
}

function SesAmount(){ 
    var qty = 0;
    var inputs = 0;


$.ajax({
      type:'post',
        url:'GetServiceAmount.php',// put your real file name  ,
        data:{inputs},
		dataType: 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("total_service_amt").value=msg[1];
		document.getElementById("total_samt").value=msg[1];
		       
       }
 });

}
function get_bankid(){ 
    var qty = 0;
    var inputs = document.getElementById('AccountNo').value;

   $.ajax({
      type:'post',
        url:'get_bankdetails.php',// put your real file name //data: {inputs: inputs,pno: pno,pdate:pdate},
       data:{inputs},
		//data:{inputs},
		dataType    : 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("BankId").value=msg[0];
		document.getElementById("LedgerId").value=msg[1];
       
       }
 });

}
</script>
<script>
	function getce(val) {
	var mrp = parseInt(document.getElementById("esce").value);
	var quantity =  parseInt(document.getElementById("elce").value);
	 var hra = parseInt( mrp + quantity );
	 document.getElementById("tce").value = hra; 
	 }
	 
	 
	 
	function customer_name(val) {
	$.ajax({
	type: "POST",
	url: "customer_name.php",
	data:'country_id='+val,
	success: function(data){
		$("#cname").html(data);
		}
		});
		}
		
		
		function getcolor1(val) {
	var PaymentMode = document.getElementById('PaymentMode').value;
	
	$.ajax({
	type: "POST",
	url: "get_payment_details.php",
	data: {PaymentMode: PaymentMode},
	success: function(data){
		$("#cdetails").html(data);
		}
		});
		}	
	
	 
  </script>
  <script>
  	function customer_lid(val) {
	$.ajax({
	type: "POST",
	url: "customer_ledger_id.php",
	data:'country_id='+val,
	success: function(data){
	$("#CLI").html(data);
	}
	});
	}
	
		function get_account(val) {
	$.ajax({
	type: "POST",
	url: "acc_details.php",
	data:'country_id='+val,
	success: function(data){
		$("#AccountNo").html(data);
		}
		});
		}	
  </script>
  

 
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!--header Starts-->
  <?php include("../../header.php"); ?>
  <!--Header End -->
  <!-- Left side column. contains the logo and sidebar -->
   <?php include("../../leftbar.php"); ?>
 <!-- Side Bar End -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#ECF0F5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Job card Close Bill
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="f_bill_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  <?php
			   // $Es="select * from financial_year where id='".$_SESSION['FinancialYear']."'"; 
                // $Eps=mysqli_query($conn,$Es);
               // $duplicate=mysqli_fetch_array($Eps);
			  
			  $inv=$_SESSION['VendorId']."-".$n1;
			// $ss="select * from s_job_card where status='Active' and FranchiseeId='".$_SESSION['FranchiseeId']."' and jcard_status='Close' and job_card_no='".$_REQUEST['job_card_no']."'";
             $ss="select * from s_job_card where status='Active' and FranchiseeId='".$_SESSION['BranchId']."' and job_card_no='".$_REQUEST['job_card_no']."'";
			 $Ess=mysqli_query($conn,$ss);
             $FEss=mysqli_fetch_array($Ess);
			 
			 $Spm="select * from a_customer where mobile1='".trim($FEss['smobile'])."'";
			$Sdm=mysqli_query($conn,$Spm);
			$Sqm=mysqli_fetch_array($Sdm);
			
			$dcm="select * from a_customer where mobile1='".trim($FEss['smobile'])."'"; 
            $edm=mysqli_query($conn,$dcm);
            $emp=mysqli_fetch_array($edm);
			  
			  ?>
			  	  <?php 
			 $p="select * from job_card_no where id='1' ";
             $Ep=mysqli_query($conn,$p);
             $Fp=mysqli_fetch_array($Ep);
             $pn=$Fp['rv'];
			  $rv=$pn+1;
			 

			 $Ajon=$pn; 

			  ?>
			  
				<div class="form-group col-sm-4">
                  <label for="Branch">Bill Date</label>
                  <input type="date" class="form-control" name="bdate" id="bdate" value="<?php echo $date; ?>" required>
				  <input type="hidden" class="form-control" name="tno" id="tno" value="<?php echo rand(); ?>">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Invoice No</label>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $inv; ?>" placeholder="Invoice No" readonly="true">
                    <input type="hidden" class="form-control" name="Voucher_Id" id="Voucher_Id" value="<?php echo $Ajon; ?>"  readonly="true">
                    </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Job Card No</label>
                  <select type="text" class="form-control" name="job_card" id="job_card" autofocus="focus"  placeholder="Vehicle Number" onChange="getcolor(this.value);mob();amt();outstanding();customer_name(this.value);customer_lid(this.value)" required>
				 <option value="<?php echo $_REQUEST['job_card_no'];?>"><?php echo $_REQUEST['job_card_no'];?></option>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <select type="text" class="form-control" name="cname" id="cname"  placeholder="Customer Name"  readonly="true" required>
				  <option value="<?php echo trim($Sqm['id']);?>"><?php echo trim($FEss['sname']);?></option>
				  </select>
                </div>
				
					<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Customer LEDGER ID</label>
				  <select type="text" class="form-control" name="CLI" id="CLI" value="<?php echo $emp["LedgerId"]; ?>">
				  </select>
                  
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile"  value="<?php echo trim($FEss['smobile']);?>" placeholder=" Mobile" >
				  <input type="hidden" class="form-control" name="JobcardId" id="JobcardId" value="<?php echo $FEss['id'];?>" placeholder=" Mobile" >
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Address</label>
                  <input type="text" class="form-control" name="address" id="address"  value="<?php echo trim($FEss['saddress']);?>" placeholder="Customer Address" readonly="true">
                </div>	
                   <div class="form-group col-sm-4">
                  <label for="Branch">Customer Vehicle No</label>
                  <input type="text" class="form-control" name="vehile_no" id="vehile_no"  value="<?php echo trim($FEss['vehicle_no']);?>" placeholder="Vehile No" readonly="true">
                </div>	
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Customer Outstanding Amount</label>
                  <input type="text" class="form-control" name="cust_out_amt" id="cust_out_amt"  value="<?php echo $Sqm['cus_out_amt'];?>" placeholder="Customer Outstanding Amount" readonly="true">
                </div>	
                      <div class="form-group col-sm-4">
                  <label for="Branch">Remarks</label>
                  <input type="text" class="form-control" name="remarks" id="remarks"  placeholder="Remarks">
                </div>		
                <div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
                  <select class="form-control" name="LedgerGroup" id="LedgerGroup">
				  <?php
				  $lg="select * from m_ledger_group where id='24'";
				  $lgr=mysqli_query($conn,$lg);
				  while($lgroup=mysqli_fetch_array($lgr))
				  {
				  ?>
				 
				  <option value="<?php echo $lgroup['id'];?>"><?php echo $lgroup['ledger_group'];?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>						
            </div>
			
			
			
			
			
              <!-- /.box-body -->
         
		  
  <?php
		  
		  if($_REQUEST['job_card_no']!='')
		  {
		  ?>
		  
		  <?php
include("../../includes.php");
 
// $echeck="select * from m_item_master where barcode='".$_POST['qty']."' and status='Active'"; p_purchase
$_SESSION['TotalSpareAmount']="0.00";
$_SESSION['TotalServiceAmount']="0.00";
$_SESSION['TotalPackageAmount']="0.00";
$_SESSION['TotalOutAmount']="0.00";
$_SESSION['TotalRecomAmount']="0.00";


$job_card_no=$_REQUEST['job_card_no'];
$inv_no=$inv;
$bill_date=$FEss['jdate'];

$Dtemp="delete from a_final_bill_spare_temp where inv_no='$inv_no'";
$EDtemp=mysqli_query($conn,$Dtemp);

?>

 
<div class="box-body">
			
			<?php
			$dx="select * from s_job_card_pdetails where job_card_no='".$_REQUEST['JobcardId']."'";
			$sz=mysqli_query($conn,$dx);
			$dxz=mysqli_num_rows($sz);
			
			?>
			<?php
			
			if($dxz==1)
			{
			?>
			
	<div class="form-group col-sm-12">
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Package Details</b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="">S:No</th>
                <th style="">Package Name </th>
				<th style="">Package Amount</th>
				<th style="">Remarks</th>
			    </tr>
				<?php
				 $names1="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'"; 
				$ns1=mysqli_query($conn,$names1);
				$jcd1=mysqli_fetch_array($ns1);
	
				$ct="select * from s_job_card_pdetails where job_card_no='".$jcd1['id']."'";
				$Ect=mysqli_query($conn,$ct);
				$n=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
				$i++;
				?>
                <tr>
                <td style="padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style=""><input name="<?php echo "package_name".$i; ?>" id="<?php echo "package_name".$i; ?>" value="<?php echo $Fct['package_type']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "package_amount".$i; ?>" id="<?php echo "package_amount".$i; ?>" value="<?php echo $Fct['package_amt']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "remarks".$i; ?>" id="<?php echo "remarks".$i; ?>" value="<?php echo $Fct['pac_remarks']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
                </tr>
				<?php
			 	$_SESSION['TotalPackageAmount']=$_SESSION['TotalPackageAmount']+$Fct['package_amt']; 
				  }
				?>
                 </thead>
              </table>
          	
            <!-- /.box-body -->
			</div>
      </div>
	  <?php
			}
			?>
			
			
	    <div class="form-group col-sm-12 hidden">
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Used Item Details - Package</b></h4>
            <!-- /.box-header -->
             <table border="1" width="950" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="width: 30px">S:No</th>
                <th style="width: 110px">Package Item Name</th>
				<th style="width: 110px">Amount </th>
				<th style="width: 110px">Qty</th>
				<th style="width: 110px">Total</th>
			    </tr>
				
				<?php
				$i=0;
			 	$ct1="select * from s_job_card_pdetails where job_card_no='".$jcd1['id']."'"; 
				$Ect1=mysqli_query($conn,$ct1);
				while($Fct1=mysqli_fetch_array($Ect1))
				{
					
						
				 	$pack="select * from m_package where package_name='".$Fct1['package_type']."'"; 
					$packs=mysqli_query($conn,$pack);
					while($packa1=mysqli_fetch_array($packs))
					{
						
					$names1="select * from m_package_service where package_no='".$packa1['package_no']."'";
					$ns1=mysqli_query($conn,$names1);
					while($jcd2=mysqli_fetch_array($ns1))
					{						
					
					$abc="select * from m_service_type where stype='".$jcd2['service']."'";
					$abcd=mysqli_query($conn,$abc);
					while($abcd1=mysqli_fetch_array($abcd))
					{
					
					$pq="select * from m_service_type_details where service_type='".$abcd1['id']."'";
					$pqr=mysqli_query($conn,$pq);
					while($pqrs=mysqli_fetch_array($pqr))
					{
					
					$xy="select * from m_spare where sid='".$pqrs['spare_name']."'";
					$xyz=mysqli_query($conn,$xy);
					while($xyza=mysqli_fetch_array($xyz))
					
				{
				$i++;	
				?>
                <tr>
                <td style="width: 30px;padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style="width: 80px"><input name="<?php echo "scategory".$i; ?>" id="<?php echo "scategory".$i; ?>" value="<?php echo $xyza['sname'] ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "sbrand".$i; ?>" id="<?php echo "sbrand".$i; ?>" value="<?php echo $xyza['smrp'] ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "sname".$i; ?>" id="<?php echo "sname".$i; ?>" value="<?php echo $pqrs['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
   				<td style="width: 80px"><input name="<?php echo "sname".$i; ?>" id="<?php echo "sname".$i; ?>" value="<?php echo $TotalPackage=$pqrs['qty']*$xyza['smrp']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>

				</tr>
				<?php
			        
					$Stemp="insert into a_final_bill_spare_temp set amount='".$xyza['smrp']."',SpareFrom='Package',bill_date='$bill_date',inv_no='$inv_no',job_card_no='$job_card_no',sname='".$xyza['sid']."',qty='".$pqrs['qty']."'";
					$EStemp=mysqli_query($conn,$Stemp);
					}
					}
					}
					}
				}
				}
				?>
                 </thead>
              </table>
          	
            <!-- /.box-body -->
			</div>
      </div> 
	  <?php
			$dx1="select * from s_job_card_sdetails where job_card_no='".$_REQUEST['JobcardId']."'";
			$sz1=mysqli_query($conn,$dx1);
			$dxz1=mysqli_num_rows($sz1);
			
			?>
			<?php
			
			if($dxz1!=0)
			{
			?>
	<div class="form-group col-sm-12">
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Service Details</b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="">S:No</th>
                <th style="">Service Name </th>
				<th style="">Service Amount</th>
				<th style="">Qty</th>
				<th style="">Remarks</th>
				<th style="">Total</th>
			    </tr>
				
				<?php
				
				$names1="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";
				$ns1=mysqli_query($conn,$names1);
				$jcd1=mysqli_fetch_array($ns1);
				
				
				$ct="select * from s_job_card_sdetails where job_card_no='".$jcd1['id']."'";
				$Ect=mysqli_query($conn,$ct);
				$n=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
				$i++;
				?>
                <tr>
                <td style="padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style=""><input name="<?php echo "scategory".$i; ?>" id="<?php echo "scategory".$i; ?>" value="<?php echo $Fct['service_type']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "sbrand".$i; ?>" id="<?php echo "sbrand".$i; ?>" value="<?php echo $Fct['st_amt']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "sname".$i; ?>" id="<?php echo "sname".$i; ?>" value="<?php echo $Fct['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "sqty".$i; ?>" id="<?php echo "sqty".$i; ?>" value="<?php echo $Fct['remarks']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "smrp".$i; ?>" id="<?php echo "smrp".$i; ?>" value="<?php echo $TotalService=$Fct['st_amt']*$Fct['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
                </tr>
				<?php
				$_SESSION['TotalServiceAmount']=$_SESSION['TotalServiceAmount']+$TotalService;
				  }
				?>
                 </thead>
              </table>
          	
            <!-- /.box-body -->
			</div>
      </div>
	  <?php
			}
			?>
			 <?php
			$dx2="select * from s_job_card_recomdetails where job_card_no='".$_REQUEST['JobcardId']."'";
			$sz2=mysqli_query($conn,$dx2);
			$dxz2=mysqli_num_rows($sz2);
			
			?>
			<?php
			
			if($dxz2!=0)
			{
			?>
	  	<div class="form-group col-sm-12" hidden>
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Recommended Service Details</b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="">S:No</th>
                <th style="">Service Name </th>
				<th style="">Service Amount</th>
				<th style="">Qty</th>
				<th style="">Remarks</th>
				<th style="">Total</th>
			    </tr>
				
				<?php
			 	$ct1="select * from s_job_card_recomdetails where job_card_no='".$jcd1['id']."'"; 
				$Ect1=mysqli_query($conn,$ct1);
				$i=0;
				while($Fct1=mysqli_fetch_array($Ect1))
				{
					 $mob13="select * from s_job_card where id='".$jcd1['id']."'";
				     $mobi13=mysqli_query($conn,$mob13);
				     $mobil13=mysqli_fetch_array($mobi13);  
					 
					 $mob12="select * from a_customer_vehicle_details where vehicle_no='".trim($mobil13['vehicle_no'])."'";
				     $mobi12=mysqli_query($conn,$mob12);
				     $mobil12=mysqli_fetch_array($mobi12); 
				  
					
				  $mvs="select * from master_vehicle_segment where VehicleSegment='".trim($mobil12['VehicleSegment'])."'";
				  $mvq=mysqli_query($conn,$mvs);
				  $mvf=mysqli_fetch_array($mvq);  
				  
				  
				   $abc="select * from m_service_type where stype='".$Fct1['service_type']."' and status='Active' and v_type='".trim($mvf['Id'])."'";	
					$abcd=mysqli_query($conn,$abc);
					while($abcd1=mysqli_fetch_array($abcd))
					{
					$pq="select * from m_service_type_details where service_type='".$abcd1['id']."'";
					$pqr=mysqli_query($conn,$pq);
					while($pqrs=mysqli_fetch_array($pqr))
					{
					$xy="select * from m_spare where sid='".$pqrs['spare_name']."'";
					$xyz=mysqli_query($conn,$xy);
					while($xyza=mysqli_fetch_array($xyz))
				{  $i++;
				?>
                <tr>
                <td style="padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style=""><input name="<?php echo "scategory".$i; ?>" id="<?php echo "scategory".$i; ?>" value="<?php echo $Fct1['service_type']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "sbrand".$i; ?>" id="<?php echo "sbrand".$i; ?>" value="<?php echo $Fct1['st_amt']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "sname".$i; ?>" id="<?php echo "sname".$i; ?>" value="<?php echo $Fct1['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "sqty".$i; ?>" id="<?php echo "sqty".$i; ?>" value="<?php echo $Fct1['remarks']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "smrp".$i; ?>" id="<?php echo "smrp".$i; ?>" value="<?php echo $TotalRecomService=$Fct1['st_amt']*$Fct1['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
                </tr>
				<?php
				$_SESSION['TotalRecomAmount']=$_SESSION['TotalRecomAmount']+$TotalRecomService;
				
				 $Stemp="insert into a_final_bill_spare_temp set amount='".$xyza['smrp']."',SpareFrom='RecommendedService',bill_date='$bill_date',inv_no='$inv_no',job_card_no='$job_card_no',sname='".$pqrs['spare_name']."',qty='".$pqrs['qty']."'";
					$EStemp=mysqli_query($conn,$Stemp);	
				}
					}
					}
				
				  
				  
				  }
				?>
                 </thead>
              </table>
          	
            <!-- /.box-body -->
			</div>
      </div>
   <?php
			}
			?>
	   <div class="form-group col-sm-12 hidden">
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Used Item Details - service</b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="">S:No</th>
                <th style="">Service Item Name</th>
				<th style="">Amount </th>
				<th style="">Qty</th>
				<th style="">Total</th>
			    </tr>
				<?php
			 	$ct1="select * from s_job_card_sdetails where job_card_no='".$jcd1['id']."'"; 
				$Ect1=mysqli_query($conn,$ct1);
				$i=0;
				while($Fct1=mysqli_fetch_array($Ect1))
				{
						
					$abc="select * from m_service_type where stype='".$Fct1['service_type']."'";
					$abcd=mysqli_query($conn,$abc);
					while($abcd1=mysqli_fetch_array($abcd))
					{
					$pq="select * from m_service_type_details where service_type='".$abcd1['id']."'";
					$pqr=mysqli_query($conn,$pq);
					while($pqrs=mysqli_fetch_array($pqr))
					{
					$xy="select * from m_spare where sid='".$pqrs['spare_name']."'";
					$xyz=mysqli_query($conn,$xy);
					while($xyza=mysqli_fetch_array($xyz))
				{  $i++;
				?>
                <tr>
                <td style="width: 30px;padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style="width: 80px"><input name="<?php echo "scategory".$i; ?>" id="<?php echo "scategory".$i; ?>" value="<?php echo $xyza['sname']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "sbrand".$i; ?>" id="<?php echo "sbrand".$i; ?>" value="<?php echo $xyza['smrp']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style="width: 80px"><input name="<?php echo "sname".$i; ?>" id="<?php echo "sname".$i; ?>" value="<?php echo $pqrs['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
   				<td style="width: 80px"><input name="<?php echo "sname".$i; ?>" id="<?php echo "sname".$i; ?>" value="<?php echo $TotalSpare=$xyza['smrp']*$pqrs['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>

				</tr>
				<?php
                    $Stemp="insert into a_final_bill_spare_temp set amount='".$xyza['smrp']."',SpareFrom='Service',bill_date='$bill_date',inv_no='$inv_no',job_card_no='$job_card_no',sname='".$pqrs['spare_name']."',qty='".$pqrs['qty']."'";
					$EStemp=mysqli_query($conn,$Stemp);				
					}
					}
				}
				}
				?>
                 </thead>
              </table>
          	<!-- /.box-body -->
			</div>
      </div> 
		
		<?php
			$dx3="select * from s_spare_prepick where JobcardId='".$_REQUEST['JobcardId']."'";
			$sz3=mysqli_query($conn,$dx3);
			$dxz3=mysqli_num_rows($sz3);
			
			?>
			<?php
			
			if($dxz3!=0)
			{
			?>
		<div class="form-group col-sm-12">
		<!-- Spare Pick Start -->
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Spares Pick Details</b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="">S:No</th>
                <th style="">Spare Name</th>
				<th style="">Amount </th>
				<th style="">Qty</th>
				<th style="">Total</th>
			    </tr>
				<?php
			  	$ct1="select * from s_spare_prepick where JobcardId='".$jcd1['id']."'";  
				$Ect1=mysqli_query($conn,$ct1);
				$npp=mysqli_num_rows($Ect1);
				if($npp>'0')
				{
				$Fct1=mysqli_fetch_array($Ect1);				
					$i=0;
					$abc="select * from s_spare_prepick_details where s_pick_no='".$Fct1['id']."'";
					$abcd=mysqli_query($conn,$abc);
					while($abcd1=mysqli_fetch_array($abcd))
					{
						$SPPName="select sname from m_spare where sid='".$abcd1['spare_name']."'";
						$ESPPName=mysqli_query($conn,$SPPName);
						$FESPPName=mysqli_fetch_array($ESPPName);
					$i++;
					
					$tmrp=number_format(($abcd1['mrp']-(($abcd1['TaxRate']/(100+$abcd1['TaxRate']))*$abcd1['mrp'])),2);
				?>
                <tr>
                <td style="padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style=""><input name="<?php echo "sparename".$i; ?>" id="<?php echo "sparename".$i; ?>" value="<?php echo $FESPPName['sname']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "mrp".$i; ?>" id="<?php echo "mrp".$i; ?>" value="<?php echo $abcd1['mrp']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "qty".$i; ?>" id="<?php echo "qty".$i; ?>" value="<?php echo $abcd1['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "total".$i; ?>" id="<?php echo "total".$i; ?>" value="<?php echo $TotalPrepick=$abcd1['mrp']*$abcd1['qty']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
                </tr>
				<?php					
				$_SESSION['TotalServiceAmount']=$_SESSION['TotalServiceAmount'];	
				$_SESSION['TotalSpareAmount']=$_SESSION['TotalSpareAmount']+$TotalPrepick;
				
				//$Stemp="insert into a_final_bill_spare_temp set amount='".$abcd1['mrp']."',SpareFrom='SparePick',bill_date='$bill_date',inv_no='$inv_no',job_card_no='$job_card_no',sname='".$abcd1['spare_name']."',qty='".$abcd1['qty']."'";
				//$EStemp=mysqli_query($Stemp);
								
				}
				}
				//global $SServiceAmount;
//global $SSpareAmount;
				//$SServiceAmount=$_SESSION['TotalServiceAmount'];
				//$SSpareAmount=$_SESSION['TotalSpareAmount'];
				//echo $_SESSION['TotalServiceAmount'];
				//echo $_SESSION['TotalSpareAmount'];
				?>
                 </thead>
              </table>
          	<!-- /.box-body -->
			</div>
      </div> 
	  <?php
			}
			?>
			<?php
			$dx4="select * from s_outsources where JobcardId='".$_REQUEST['JobcardId']."'";
			$sz4=mysqli_query($conn,$dx4);
			$dxz4=mysqli_num_rows($sz4);
			
			?>
			<?php
			
			if($dxz4!=0)
			{
			?>
	  <div class="form-group col-sm-12">
		<!-- Spare Pick Start -->
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Painter charge</b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" >
			  <thead>
                <tr style="align:center">
                <th style="">S:No</th>
                <th style="">Task Name</th>
				<th style="">Amount </th>
				<th style="">Tax</th>
				<th style="">Total</th>
			    </tr>
				<?php				
					 $Fc="select * from s_outsources_details where JobcardId='".$jcd1['id']."'"; 
					$Dsx=mysqli_query($conn,$Fc);
					while($Csed=mysqli_fetch_array($Dsx))
					{
		
						$Fddc="select * from m_service_type where id='".$Csed['Outsources']."'";
						$fdcs=mysqli_query($conn,$Fddc);
						while($Vds=mysqli_fetch_array($fdcs))
						{
							$R="select * from m_service_type_details where service_type='".$Vds['id']."'";
							$Ds=mysqli_query($conn,$R);
							while($Rds=mysqli_fetch_array($Ds))
							{
								$A="select * from m_spare where sid='".$Rds['spare_name']."'";
								$AA=mysqli_query($conn,$A);
								while($Asw=mysqli_fetch_array($AA))
								{
						
					$i++;
					
				?>
                <tr>
                <td style="padding-left:5px"><?php echo "   ".$i; ?></td>
				<td style=""><input name="<?php echo "sparename".$i; ?>" id="<?php echo "sparename".$i; ?>" value="<?php echo $Vds['stype']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "mrp".$i; ?>" id="<?php echo "mrp".$i; ?>" value="<?php echo $Csed['Amount']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "qty".$i; ?>" id="<?php echo "qty".$i; ?>" value="<?php echo $Csed['Tax']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
				<td style=""><input name="<?php echo "total".$i; ?>" id="<?php echo "total".$i; ?>" value="<?php echo $Csed['TotalAmount']; ?>"onKeyPress="return tabE(this,event)" class="form-control" readonly='ture'> </td>
                </tr>
				<?php					
				//$_SESSION['TotalServiceAmount']=$_SESSION['TotalServiceAmount'];	
				$_SESSION['TotalOutAmount']=$_SESSION['TotalOutAmount']+$Csed['TotalAmount'];
				
				$Stemp="insert into a_final_bill_spare_temp set amount='".$Csed['TotalAmount']."',SpareFrom='Outsource',bill_date='$bill_date',inv_no='$inv_no',job_card_no='$job_card_no',sname='".$Asw['sid']."',qty='0.00'";
				$EStemp=mysqli_query($conn,$Stemp);
								
								}
							}
						}
					}
				
				//global $SServiceAmount;
//global $SSpareAmount;
				//$SServiceAmount=$_SESSION['TotalServiceAmount'];
				//$SSpareAmount=$_SESSION['TotalSpareAmount'];
				//echo $_SESSION['TotalServiceAmount'];
				//echo $_SESSION['TotalSpareAmount'];
				?>
                 </thead>
              </table>
          	<!-- /.box-body -->
			</div>
      </div> 
	   <?php
			}
			?>
		<!-- Spare Pick End -->
		
		<!-- Offer Start -->
		<div class="form-group col-sm-12 hidden">
			<div style="padding-right:250px" >
            <h4 class="box-title"><b>Available Offers Details</b></h4>
            <!-- /.box-header -->
             <table class="table table-bordered" >
			  <thead>
                <tr>
                <th>S:No</th>
                <th>Package Name</th>
				<th>Package Period</th>
				<th>Offer Amount</th>
				<th>Balance</th>
			    </tr>
				<?php
				$i=0;
				$echeck="select  * from s_add_package where VehicleId='".$jcd1['vehicle_no']."'";
				$echk=mysqli_query($conn,$echeck);
				while($ecount=mysqli_fetch_array($echk)) 
				{
				$i++;
				
				$sp="select * from m_package where id='".$ecount['PackageId']."'";
				$Esp=mysqli_query($conn,$sp);
				$FEsp=mysqli_fetch_array($Esp);
				
				
				?>
                <tr>
                <td><?php echo "   ".$i; ?></td>
				<td><?php echo $FEsp['package_name']; ?></td>
				<td><?php echo $ecount['StartDate']." To ".$ecount['EndDate']; ?></td>
				<td><?php echo $FEsp['amount']; ?></td>
				<td><?php echo $ecount['AvailableAmount']; ?></td>
				</tr>
				<?php
				//$_SESSION['TotalServiceAmount']=$_SESSION['TotalServiceAmount']+$ecount['package_amt'];
				  }
				?>
                 </thead>
              </table>
          	<input type="hidden" class="form-control" id="tc" name="tc"  value="<?php echo $tnc; ?>" >
            <!-- /.box-body -->
			</div>
        </div> 
		<!-- Offer End -->
		
		
		<?php 
		$ds="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";
		$cx=mysqli_query($conn,$ds);
		$sz=mysqli_fetch_array($cx);
		?>
	
				 <div class="box-body">		
				<div class="form-group col-sm-4">
                  <label for="party">Total Service Amount </label>
				  <input type="text" class="form-control" name="ServiceAmount" id="ServiceAmount" value="<?php echo $sz['total_amt']; ?>" onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
				<div class="form-group col-sm-4">
			     <label for="Branch">GST</label>
              <select type="text" class="form-control" name="gst" id="gst" onChange="sumgst();"  placeholder="GST"> 
			  <option value="<?php echo $sz['gst'];?>"><?php echo $sz['gst'];?></option>
			  </select>
				</div>
				
				<div class="form-group col-sm-4">
                  <label for="party">GST Amount </label>
				  <input type="text" class="form-control" name="gst_amt" id="gst_amt" value="<?php echo $sz['gst_amt']; ?>" onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			   
			   
				<div class="form-group col-sm-4">
			    <label for="catname"> Service Amount After GST</label>
                <input type="txt" class="form-control" name="ServiceAmountAfterGst" id="ServiceAmountAfterGst"  value="<?php echo $sz['IncludeGst'];?>" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				<div class="form-group col-sm-4">
			    <label for="catname">Discount Amount(<?php echo $sz['DiscountPercentage'];?> %) </label>
                <input type="txt" class="form-control" name="DiscountAmount" id="DiscountAmount" value="<?php echo $sz['DiscountAmount'];?>" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				<div class="form-group col-sm-4">
			    <label for="catname">Paid Advance Amount </label>
                <input type="txt" class="form-control" name="PaidAdvanceAmount" id="PaidAdvanceAmount" value="<?php echo $sz['PaidAmount'];?>" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				<div class="form-group col-sm-4">
			    <label for="catname">Total Service Balance Amount </label>
                <input type="txt" class="form-control" name="ServiceBalanceAmount" id="ServiceBalanceAmount" value="<?php echo $sz['BalanceAmount'];?>" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				 </div>
				  <div class="box-body">	
			   	<div class="form-group col-sm-4">
                  <label for="party">Spare Amount(Include Tax)</label>
				  <input type="text" class="form-control" name="TotalSpareAmount" id="TotalSpareAmount" value="<?php echo $_SESSION['TotalSpareAmount']; ?>"   onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
			    <div class="form-group col-sm-4">
                  <label for="party">Painting Charge For Customer</label>
				  <input type="text" class="form-control" name="TotalPaintingAmount" id="TotalPaintingAmount" value="<?php echo $_SESSION['TotalOutAmount']; ?>"  Readonly  onKeyPress="return tabE(this,event)">
               </div>
			    <?php $billAmount=$sz['BalanceAmount']+$_SESSION['TotalSpareAmount']+$_SESSION['TotalOutAmount']; ?>
			    <div class="form-group col-sm-4">
                  <label for="party" style="background-color:#B3BFC2">Bill Amount</label>
				  <input type="text" class="form-control" name="InvoiceBillAmount" id="InvoiceBillAmount" style="background-color:#B3BFC2" value="<?php echo $billAmount; ?>" onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)">
               </div>  
			   
			   	   <div class="form-group col-sm-4">
                  <label for="party">Advance Paid</label>
		                <select type="txt" class="form-control" name="PaymentMode" id="PaymentMode" onKeyPress="return tabE(this,event)" onChange="getcolor1(this.value)">
				<option value="No" selected>No</option>
				<option value="Yes">Yes</option>
				
				</select>
               </div> 
			   
			   
	<div  id="cdetails" name="cdetails" >
				</div>	
			   
			   <div class="form-group col-sm-4">
                  <label for="party">Paid Amount</label>
				  <input type="text" class="form-control" name="ReceivableAmount" id="ReceivableAmount"  onKeyUp="sumgst();"  onKeyPress="return tabE(this,event)" required>
               </div>
			   <div class="form-group col-sm-4">
                  <label for="party">Balance Amount</label>
				  <input type="text" class="form-control" name="BalanceAmount" id="BalanceAmount"  onKeyUp="sumgst();" readonly  onKeyPress="return tabE(this,event)">
               </div>
					</div>
		
		   </div>
                 
				 <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit The Invoice</button>
                </div>   
        
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  <?php
		  }
		  else
		  {
		  ?>
		<div  id="cdetails" name="cdetails" >
		</div>
		  <?php
		   }
		   ?>
          <!-- /.box -->
        </div>
		</div>
				
				
				
		
    </form>
	</section>
    <!-- /.content -->
</div>

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
