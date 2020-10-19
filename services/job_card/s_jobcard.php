<?php
error_reporting(0);
session_start();
include("../../includes.php");
include("../../redirect.php");

// session_id();

            $see="select * from m_vendor where vendor_id='".$_SESSION['VendorId']."'"; 
			$absc=mysqli_query($conn,$see);
			$var=mysqli_fetch_array($absc);
			$Seion=$var['franchisee_id'];			 
		
/*$p="select * from s_job_card where FranchiseeId='".$_SESSION['FranchiseeId']."'";
$Ep=mysqli_query($p);
$Fp=mysqli_fetch_array($conn,$Ep);
$n=mysqli_num_rows($Ep);
$n1=$n+2;
$pn=$Seion."-".$n1;*/
//Get JNo


  $p="select * from job_card_no where branch_id='".$_SESSION['BranchId']."'";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);

$pn=$Seion."-".$Fp['jcn'];
//--------------------------------


$abc="select * from a_customer";
$abcd=mysqli_query($conn,$abc);
$mobile1="[";
while($ac=mysqli_fetch_array($abcd))
{
	$mobile1.="'".$ac['mobile1']."',";
}
 $mobile1.="'']";

if(isset($_REQUEST['temp'])!='')
{
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
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
  <style>
div.ex3 {
   border: 1px solid black;
  outline-style: solid;
  outline-color: black;
  outline-width: thin;
}
</style>
<script>
function tabE(obj,e){ 
   var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
   if(e.keyCode==13){ 
     var ele = document.forms[0].elements; 
     for(var i=0;i<ele.length;i++){ 
       var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
       if(obj==ele[i]){ele[q].focus();break} 
     } 
  return false; 
   } 
  } 
function regno(){ 
    var qty = 0;
    var inputs = document.getElementById('vno').value;
$.ajax({
      type:'post',
        url:'get1.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("vehicle_model").value=msg;
       
       }
 });

}

function regno(){ 
    var qty = 0;
    var inputs = document.getElementById('vno').value;


$.ajax({
      type:'post',
        url:'get1.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("sname").value=msg;
       
       }
 });

}

function fnCarModel(){ 
    var inputs = document.getElementById('vno').value;

$.ajax({
      type:'post',
        url:'get_vehicle_model.php',
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("CarModel").value=msg;
       
       }
 });

}

function fnVisit(){ 
    var inputs = document.getElementById('vno').value;

$.ajax({
      type:'post',
        url:'get_visit.php',
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("cvisit").value= parseFloat(msg)+1;
       
       }
 });

}

function getlist(){
	
    var inputs = document.getElementById('vno').value;
//alert("edfgjd"+inputs);
	$.ajax({
	type: "POST",
	
	url: "spare_name.php",
	
	data:{inputs:inputs},
	success: function(data){
		$("#Rtype").html(data);
		}
		});
}

function mod(){ 
    var qty = 0;
    var inputs = document.getElementById('vno').value;


$.ajax({
      type:'post',
        url:'get2.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("smobile").value=msg;
       
       }
 });

}

function mob(){ 
    var qty = 0;
    var inputs = document.getElementById('vno').value;


$.ajax({
      type:'post',
        url:'getcmobile.php',// put your real file name 
        data:{inputs},
		 dataType: 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("smobile").value=msg[1];
		document.getElementById("sname").value=msg[0];
		document.getElementById("saddress").value=msg[2];
       
       }
 });

}


function getamount(){ 
    var qty = 0;
    var inputs = document.getElementById('stype').value;
	var inputs1 = document.getElementById('smobile').value;


$.ajax({
      type:'post',
        url:'get_amount.php',// put your real file name 
        data: {inputs: inputs,inputs1: inputs1},
        success:function(msg){
              // your message will come here.  
        document.getElementById("st_amt").value=msg;
       
       }
 });

}


function getmrp(){
	
	
    var inputs = document.getElementById('Atype').value;
$.ajax({
      type:'post',
        url:'get_mrp.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("smrp").value=msg;
        }
 });

}


function getramount(){ 
    var qty = 0;
    var inputs = document.getElementById('Rtype').value;
	var inputs1 = document.getElementById('vno').value;
	var inputs2 = document.getElementById('sname').value;


$.ajax({
      type:'post',
        url:'get_amount.php',// put your real file name 
        data:{inputs:inputs, inputs1:inputs1, inputs2:inputs2},
        success:function(msg){
              // your message will come here.  
        document.getElementById("rst_amt").value=msg;
       
       }
 });

}



function getcustname(){ 
    var qty = 0;
    var inputs = document.getElementById('ReferencedMobileNo').value;

	if(inputs=='')
	{
		document.getElementById("ReferedDiscount").value=0;
	}
else{	
$.ajax({
       type:'post',
        url:'get_customername.php',// put your real file name 
        data:{inputs},
		 dataType: 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("ReferencedBy").value=msg[0];
		document.getElementById("ReferedDiscount").value=msg[1];
		document.getElementById("DiscountAmount").value=msg[2];
		 
       
       }
	  
	  
 });
}
}
function getpackageamt(){ 
    var qty = 0;
    var inputs = document.getElementById('ptype').value;
	var inputs1 = document.getElementById('smobile').value;
	var inputs2 = document.getElementById('sname').value;


$.ajax({
      type:'post',
        url:'get_pac_amt.php',// put your real file name 
        data:{inputs:inputs, inputs1:inputs1, inputs2:inputs2},
        success:function(msg){
              // your message will come here.  
        document.getElementById("pk_amt").value=msg;
  
       }
 });

}

function sumgst()
{
    var total_amount= parseFloat(document.getElementById("total_amt").value); 
	if(document.getElementById("gst").value=='')
	{
		var gst=0;
	}
	else
	{
		 var gst=parseFloat(document.getElementById("gst").value);
	}
	if(document.getElementById("DiscountAmount").value=='')
	{
		DiscountAmount=0;
	}
	else
	{
	var DiscountAmount= parseFloat(document.getElementById("DiscountAmount").value);
	}
	var gst=(gst/100)*total_amount;
	var including_gst=total_amount+gst;
	var DiscountPercentage=100*DiscountAmount/including_gst;
	var totalvalue=including_gst-DiscountAmount
	document.getElementById("gst_amt").value=gst.toFixed(2);
	document.getElementById("total_amt_agst").value=including_gst.toFixed(2);
	document.getElementById("DiscountPercentage").value=DiscountPercentage.toFixed(2);
	document.getElementById("totalvalue").value=totalvalue.toFixed(2);
	document.getElementById("balance_amount").value=totalvalue.toFixed(2);
}

function fnBalance()  
{
    var value1= parseInt(document.getElementById("total_amt_agst").value);
	if(document.getElementById("paying_advance_amount").value=='')
	{
    var value2=0;
	}
	else
	{
	var value2=parseInt(document.getElementById("paying_advance_amount").value);	
	}
	var sum=value1-value2;
    document.getElementById("balance_amount").value=sum;
}

function getreferral()
{
	var a=0;
	var b=0;
	var c = document.getElementById("ReferrerDiscount").value;
	if(document.getElementById("ReferralStatus").value=='Yes')
	{
	document.getElementById("DiscountAmount").value = c;
	}
	if(document.getElementById("ReferralStatus").value=='No')
	{
		document.getElementById("DiscountAmount").value =0;
	}
}
function isNumberKey(evt, element) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57) && !(charCode == 46 || charCode == 8))
    return false;
  else {
    var len = $(element).val().length;
    var index = $(element).val().indexOf('.');
    if (index > 0 && charCode == 46) {
      return false;
    }
    if (index > 0) {
      var CharAfterdot = (len + 1) - index;
      if (CharAfterdot > 3) {
        return false;
      }
    }

  }
  return true;
}
function getcolor(val) {
	var paying_advance = document.getElementById('paying_advance').value;
	
	$.ajax({
	type: "POST",
	url: "get_payment_details.php",
	data: {paying_advance: paying_advance},
	success: function(data){
		$("#cdetails").html(data);
		}
		});
		}	

		function myFunction($val) {
    window.open("show_items_list_pp.php?cname="+$val,"_blank","toolbar=no,top=200,left=500,width=700px,height=300,addressbar=no");
	
	
}
function myFunction1($val) {
    window.open("show_customer_visit_old_list_pp.php?cname="+$val,"_blank","toolbar=no,top=200,left=500,width=700px,height=600,addressbar=no");
	
	
}
</script> 

</head>
<body class="hold-transition skin-blue sidebar-mini" style="overflow: scroll;">
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
        Job Card
        <small>Services</small>

      </h1>
     </section>
     <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
              This  <strong>Job Card Details Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-warning">
               Service <b>Deleted</b> Successfully from this Job Crd!  <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?></div>
   <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_job_card_addQ.php" autocomplete="off" enctype="multipart/form-data">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
			<?php
			
            $nm="select * from s_job_card_temp where session_id='".session_id()."' order by id desc";
			$abc=mysqli_query($conn,$nm);
			$temp=mysqli_fetch_array($abc);
			
			 
			 $aa="select * from a_customer where cust_name='".trim($temp['sname'])."' and mobile1='".trim($temp['smobile'])."'";
			$bb=mysqli_query($conn,$aa);
			$cc=mysqli_fetch_array($bb); 
			
			if($_REQUEST['job_card_no']!="")
			{
			$ps=$_REQUEST['job_card_no'];
			}
			else
			{
			 $ps=$pn; 
			}
	if($_POST['jobtype']=='mobile')
	{
			$mob="select * from a_customer where mobile1='".$_POST['smobile']."' OR mobile2='".$_POST['smobile']."'";
			$mobi=mysqli_query($conn,$mob);
			$mobil=mysqli_fetch_array($mobi);
		
			$mob1="select * from a_customer_vehicle_details where cust_no='".$mobil['id']."'";
			$mobi1=mysqli_query($conn,$mob1);
			$mobil1=mysqli_fetch_array($mobi1); 
			
			$_SESSION['customer_id']=$mobil['id'];
			
	}
	
		if($_POST['jobtype']=='mobile2')
	{
			$mob="select * from a_customer where mobile2='".$_POST['mobile2']."'";
			$mobi=mysqli_query($conn,$mob);
			$mobil=mysqli_fetch_array($mobi);
		
			$mob1="select * from a_customer_vehicle_details where cust_no='".$mobil['id']."'";
			$mobi1=mysqli_query($conn,$mob1);
			$mobil1=mysqli_fetch_array($mobi1); 
			
			$_SESSION['customer_id']=$mobil['id'];
			
	}
	
	if($_POST['jobtype']=='vehicle')
	{
	$mob1="select * from a_customer_vehicle_details where vehicle_no='".$_POST['vehicle']."'";
	$mobi1=mysqli_query($conn,$mob1);
	$mobil1=mysqli_fetch_array($mobi1); 
		
	$mob="select * from a_customer where id='".$mobil1['cust_no']."'";
	$mobi=mysqli_query($conn,$mob);
	$mobil=mysqli_fetch_array($mobi);
	
	$_SESSION['customer_id']=$mobil1['cust_no'];
	
	}
	if($_POST['jobtype']=='customer')
	{
	$mob="select * from a_customer where cust_name='".$_POST['customer']."'";
			$mobi=mysqli_query($conn,$mob);
			$mobil=mysqli_fetch_array($mobi);
		
			$mob1="select * from a_customer_vehicle_details where cust_no='".$mobil['id']."'";
			$mobi1=mysqli_query($conn,$mob1);
			$mobil1=mysqli_fetch_array($mobi1);

    $_SESSION['customer_id']=$mobil['id'];			
	}
	if($_REQUEST['mobile1']!='')
	{
		
			 $mob="select * from a_customer where mobile1='".$_REQUEST['mobile1']."'";
			$mobi=mysqli_query($conn,$mob);
			$mobil=mysqli_fetch_array($mobi);
		
			$mob1="select * from a_customer_vehicle_details where cust_no='".$mobil['id']."'";
			$mobi1=mysqli_query($conn,$mob1);
			$mobil1=mysqli_fetch_array($mobi1);

            $_SESSION['customer_id']=$mobil['id'];
			
	}
			?>
			
			
			
			

				<?php 
				$i=0;
			if($_POST['jobtype']=='mobile')
	{
			  $d="select * from a_final_bill where trim(cmobile)='".$_POST['smobile']."' order by id DESC LIMIT 3"; 
	}
	if($_POST['jobtype']=='vehicle')
	{
			 $d="select * from a_final_bill where trim(cvehile)='".$_POST['vehicle']."' order by id DESC LIMIT 3"; 
	}
	if($_POST['jobtype']=='customer')
	{
			 $d="select * from a_final_bill where trim(cname)='".$mobil['id']."' order by id DESC LIMIT 3"; 
	}
			$cd=mysqli_query($conn,$d);
			$xs=mysqli_fetch_array($cd);
			?>
            
				
				<?php 
				
				 $ds="select * from a_customer where id='".$_SESSION['customer_id']."'"; 
				$sa=mysqli_query($conn,$ds);
				$dz=mysqli_fetch_array($sa);
				
			$ds1="select * from a_customer_vehicle_details where cust_no='".$dz['id']."'"; 
				$sa1=mysqli_query($conn,$ds1);
				$dz1=mysqli_fetch_array($sa1);
				
				?>
				  <div class="box-body">
				   <div class="form-group col-sm-3">
				 <input type="button" class="form-control" name="service"  id="service" value="View <?php echo $dz['cust_name'];  ?> Previous Bill" onClick="myFunction('<?php echo $dz1['vehicle_no'];  ?>');" class="form-control">
			  </div> 
			  
			  <div class="col-sm-5" style=" border-style: solid;" hidden>
			 <?php
			 if($temp['smobile']!=='')
			 {
				 $mobilef=$mobil['mobile1'];
			 
			 }
			  if($mobil['mobile1']=='')
			  {
				 $mobilef=$temp['smobile'];
			  }
			 
			 $fbill="select COUNT(id) as visit from a_final_bill where cmobile='".$mobilef."'";
			 $fbillq=mysqli_query($conn,$fbill);
			 $fbillf=mysqli_fetch_array($fbillq);
			 ?>
			 <div class="col-sm-8" style="color:red" hidden>
			 <h5  ><b> TOTAL VISIT OF <?php echo $dz['cust_name'];  ?> :</b></h5>
                </div>
               <div class="col-sm-1"style="color:red" hidden>
			   <h5><b><?php echo $fbillf['visit'];?></b></h5>
			   </div>
			  </div>
					<div class="form-group col-sm-3 hidden">
				 <input type="button" class="form-control" name="CustomerVisit"  id="CustomerVisit" value="View 2018 Old Data" onClick="myFunction1('<?php echo $dz['mobile1'];  ?>');" class="form-control">
			  </div> 
			  </div>
			              <div class="box-body">
						<h3>Customer Previous Recommended services Details</h3>
                <div class="form-group col-sm-12">
				<div>
                <table id="" class="table table-bordered table-striped" width="60%">
                <thead>
                <tr>
				<th>Sl No</th>
				<th>Job Card No</th>
				<th>Date</th>
                <th>Service</th>
				
                </tr>
                </thead>
                <tbody>
					<?php
					
				$ss="select * from s_job_card_recomdetails where status='Active' and customerId='".$_SESSION['customer_id']."' order by id limit 3";
				$Ess=mysqli_query($conn,$ss); 
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$sjobcard="select * from s_job_card where (id='".$FEss['job_card_no']."') OR (job_card_no='".$FEss['job_card_no']."')";
					$Esjobcard=mysqli_query($conn,$sjobcard);
					$Fsjobcard=mysqli_fetch_array($Esjobcard);
					$i++;
				?>
                <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $Fsjobcard['job_card_no']; ?></td>
				<td><?php echo $displaydate=date("d-m-Y", strtotime($FEss['RecomDate']));?></td>
				<td><?php echo $FEss['service_type'];?></td>
				<?php
				}
				?>
                  
                </tr>
				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
             <div class="box-body">
			<hr>
			    <div class="form-group col-sm-4">
			   <label for="catname">Job Card Number</label>
				 <input type="text" class="form-control" name="job_card_no" id="job_card_no" value="<?php echo $ps; ?>" required readonly="true">
              
				</div>
				 <div class="form-group col-sm-4">
			   <label for="catname">Date</label>
			   <input type="date" class="form-control" name="jdate" id="jdate" value="<?php echo date("Y-m-d"); ?>"  onKeyPress="return tabE(this,event)" required>
			    </div>
										 
				 <div class="form-group col-sm-4">
			     <label for="catname">Customer Name *</label>
			     <input type="text" class="form-control" name="sname"  id="sname"  value="<?php echo $temp['sname'];?> <?php echo $mobil['cust_name'];?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true" required>
			     <input type="hidden" class="form-control" name="snamec"  id="snamec"  value="<?php echo $temp['sname'];?> <?php echo $mobil['id'];?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true" required>
				 </div>
				 
				  <div class="form-group col-sm-4 hidden">
			     <label for="catname">Customer Ledger Id</label>
			     <input type="text" class="form-control" name="CLI"  id="CLI"  value="<?php echo $cc['LedgerId'];?><?php echo $mobil['LedgerId'];?>" placeholder="Customer Ledger Id" onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
				 </div>
				 
							 
				 <div class="form-group col-sm-4" hidden>
			    <label for="catname">Customer Address</label>
			     <input type="txt" class="form-control" name="saddress" id="saddress"  placeholder="Address" value="<?php echo $temp['saddress'];?> <?php echo $mobil['addr'];?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
                    </div>
                
				<div class="form-group col-sm-4">
			     <label for="catname">Customer Mobile *</label>
				     <input type="text" class="form-control" name="smobile" value="<?php echo $temp['smobile'];?> <?php echo $mobil['mobile1'];?>" id="smobile" onKeyPress="return tabE(this,event)"  placeholder=" Mobile No" readonly="true">

                 </div>
				<div class="form-group col-sm-4">
			     <label for="catname">Customer EMail</label>
			     <input type="text" class="form-control" id="smail" name="smail" value="<?php echo $temp['cemail'];?> <?php echo $mobil['email'];?>"  onKeyPress="return tabE(this,event)"  placeholder=" Mobile No" readonly="true">
                 </div>	
				 
				
				
				<div class="form-group col-sm-4">
			    <label for="catname">Registration No * </label>
                <select class="form-control" name="vehicle_no"  id="vno"  onChange="fnCarModel();fnVisit();getlist(this.value);"  required>
			    <option value="<?php echo $temp['vehicle_no'];?>"><?php echo $temp['vehicle_no'];?></option>
				<?php 
				$mob1="select * from a_customer_vehicle_details where cust_no='".$mobil['id']."'";
				$mobi1=mysqli_query($conn,$mob1);
				while($mobil1=mysqli_fetch_array($mobi1))
				{
				?>	
				<option value="<?php echo $mobil1['vehicle_no'];?>"><?php echo $mobil1['vehicle_no'];?></option>
				<?php
				}
				?>
				</select>
                </div>
				
				<div class="form-group col-sm-4">
			     <label for="catname">Vehicle Model</label>
			     <input type="text" class="form-control" id="CarModel" name="CarModel"  onKeyPress="return tabE(this,event)" value="<?php echo $temp['cmodel'];?>"  placeholder="Vehicle Model" readonly="true">
                 </div> 
				 
				<div class="form-group col-sm-4">
			    <label for="catname">KMS Driven</label>
			    <input type="txt" class="form-control" name="kms" id="kms"  placeholder="KMS Driven" value="<?php echo $temp['kms'];?>" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
					<div class="form-group col-sm-4">
			    <label for="catname">Fuel Level *</label>
                <select type="txt" class="form-control" name="fuel" id="fuel"  placeholder="Fuel Level" value="0" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" >
				<option value="">--Select Fuel Level--</option>
				<option>E</option>
				<option>1/4</option>
				<option>1/2</option>
				<option>3/4</option>
				<option>F</option>
				</select>
            	</div>
				
				 <?php
				  $echeck="select count(id) as nov from  a_final_bill where cvehile='".$mobil1['vehicle_no']."'"; 
	              $echk=mysqli_query($conn,$echeck);
                  $ecount=mysqli_fetch_array($echk);				  
				  /* $novisit=$ecount['nov']+1; */
                 ?>				
				<div class="form-group col-sm-4">
			      <label for="catname">No of Visit</label>
			      <input type="txt" class="form-control" name="cvisit" id="cvisit"  placeholder="No of Visit" value="<?php echo $temp['cvisit'];?> <?php echo $ecount['nov']; ?>" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly="true">
				</div>
				
				</div>
				
				<?php
				if($mobil['id']!='')
				{
				
				$rfs="select * from s_job_card where customer_id='".$mobil['id']."'";
				$rfq=mysqli_query($conn,$rfs);
				$rff=mysqli_fetch_array($rfq);
				$ln=mysqli_num_rows($rfq);
				}
				
				else
				{
					
			    $emp1="select * from a_customer where cust_name='".trim($temp['sname'])."'";
				$pme1=mysqli_query($conn,$emp1);
				$epm1=mysqli_fetch_array($pme1);
				
				
				
				$rfs="select * from s_job_card where customer_id='".$epm1['id']."'";
				$rfq=mysqli_query($conn,$rfs);
				$rff=mysqli_fetch_array($rfq);
				$ln=mysqli_num_rows($rfq);
				}
				
                if($ln<'1')
				{
					 
					    $custse1="select * from a_customer where mobile1='".trim($temp['ReferencedMobileNo'])."'";
			            $custfetch1=mysqli_query($conn,$custse1);
			            $cust1=mysqli_fetch_array($custfetch1);  
						?>
				
				
				 <div class="box-body ex3">
				 <h2>Customer Reference Scheme </h2>
					 <div class="form-group col-sm-4">
			          <label for="catname">Referenced Mobile No</label>
                      <input type="number" class="form-control" name="ReferencedMobileNo" id="ReferencedMobileNo" onblur ="getcustname();" value="<?php echo trim($temp['ReferencedMobileNo']);?>"  placeholder="Referenced Mobile No" onKeyPress="return tabE(this,event)">
					  </div>
					  
					  <div class="form-group col-sm-4">
			          <label for="catname">Referenced By</label>
					 
                       <input type="txt" class="form-control" name="ReferencedBy" id="ReferencedBy"  value="<?php echo $cust1['cust_name'];?>" placeholder="Name" onKeyPress="return tabE(this,event)">
                        </div>
						
					   <div class="form-group col-sm-4">
			          <label for="catname">Note : </label>
                      <textarea type="txt" class="form-control" name="ReferencedNote"  id="ReferencedNote"  placeholder="Referenced Note" onKeyPress="return tabE(this,event)"><?php echo $temp['ReferencedNote'];?></textarea>
                      </div>
				      </div>
					  <?php
				}
				?>
				 <br>
				 <!-- Panel Start -->
				 <div class="box-body">
				<div class="panel panel-primary"> 
				<div class="panel-heading"><h3>Inventory </h3></div>
				<div class="panel-body">
				<?php
				 $sinv="select * from s_job_card_temp where session_id='".session_id()."' order by id desc limit 1";
				 $Esinv=mysqli_query($conn,$sinv);
				 $FEsinv=mysqli_fetch_array($Esinv);
				?>

          <div class="row">				
             <div class="form-group col-sm-3">
			  <label><input type="checkbox" id="Idol" name="Idol" value="1" <?php if($FEsinv['Idol']=='1') { ?> checked="true" <?php } ?>> Idol</label>
			 </div>

             <div class="form-group col-sm-3">
			  <label><input type="checkbox" id="WheelCaps" name="WheelCaps" value="1" <?php if($FEsinv['WheelCaps']=='1') { ?> checked="true" <?php } ?>> Wheel Caps</label>
			 </div>
			 
             <div class="form-group col-sm-3">
			  <label><input type="checkbox" id="ToolKit" name="ToolKit" value="1" <?php if($FEsinv['ToolKit']=='1') { ?> checked="true" <?php } ?>> Tool Kit</label>
			 </div>
			  
             <div class="form-group col-sm-3" >
			  <label><input type="checkbox" id="FloarMats" name="FloarMats1" value="1" <?php if($FEsinv['FloarMats1']=='1') { ?> checked="true" <?php } ?>> Floar Mats</label>
			 </div>			  
          </div>
			 			
          <div class="row">
			 <div class="form-group col-sm-3">
			  <label><input type="checkbox" name="StereoSpeakers" id="StereoSpeakers" value="1" <?php if($FEsinv['StereoSpeakers']=='1') { ?> checked="true" <?php } ?>> JStereo Speakers</label>
			 </div>
			 
             <div class="form-group col-sm-3">
			  <label><input type="checkbox" id="MudFlaps" name="MudFlaps" value="1" <?php if($FEsinv['MudFlaps']=='1') { ?> checked="true" <?php } ?>> Mud Flaps</label>
			 </div>
			 
             <div class="form-group col-sm-3">
			  <label><input type="checkbox" id="SafetyTriangle" name="SafetyTriangle" value="1"  <?php if($FEsinv['SafetyTriangle']=='1') { ?> checked="true" <?php } ?>> Safety Triangle</label>
			 </div>

             <div class="form-group col-sm-3">
			  <label><input type="checkbox" id="AirFreshner" name="AirFreshner" value="1" <?php if($FEsinv['AirFreshner']=='1') { ?> checked="true" <?php } ?>> Air Freshner</label>
             </div>			 
          </div>
 
          <div class="row">
             <div class="form-group col-sm-3">
			  <label><input type="checkbox" id="WiperBlades" name="WiperBlades" value="1" <?php if($FEsinv['WiperBlades']=='1') { ?> checked="true" <?php } ?>> Wiper Blades</label>
			 </div>
			 
             <div class="form-group col-sm-3">
			  <label><input type="checkbox" id="SpareWheel" name="SpareWheel" value="1" <?php if($FEsinv['SpareWheel']=='1') { ?> checked="true" <?php } ?>> Spare Wheel</label>
			 </div>
			 
             <div class="form-group col-sm-3">
			  <label><input type="checkbox" id="Jack" name="Jack" value="1" <?php if($FEsinv['Jack']=='1') { ?> checked="true" <?php } ?>> Jack</label>
			 </div>
		   </div>
			  
		    </div>
		  </div>
		</div> 
	 <!-- Panel End -->															
								
				 <!-- Panel Start Two-->
		<div class="box-body" hidden>		
		 <div class="panel panel-primary"> 
			<div class="panel-heading"><h3>Recommended Services Details</h3></div>
			 <div class="panel-body">	
             <h3>Interior </h3>					 
             <div class="row">            	 
			  <div class="form-group col-sm-3">			 
			    <label><input type="checkbox" id="InteriorOne" name="InteriorOne" value="1" <?php if($FEsinv['InteriorOne']=='1') { ?> checked="true" <?php } ?>> Interior- foam interior cleaning</label>
			  </div>
			  
              <div class="form-group col-sm-3">
			    <label><input type="checkbox" id="InteriorTwo" name="InteriorTwo" value="1" <?php if($FEsinv['InteriorTwo']=='1') { ?> checked="true" <?php } ?>> Interior- AC disinfection treatment</label>
			  </div>
			  
             <div class="form-group col-sm-3">
			   <label><input type="checkbox" name="ExteriorOne" id="ExteriorOne" value="1" <?php if($FEsinv['ExteriorOne']=='1') { ?> checked="true" <?php } ?>> Interior- restoration polish</label>
			 </div>			  
			 </div>
			  
            <h3>Exterior </h3>					  
            <div class="row">			 			 
             <div class="form-group col-sm-3">
			  <label><input type="checkbox" id="ExteriorTwo" name="ExteriorTwo" value="1" <?php if($FEsinv['ExteriorTwo']=='1') { ?> checked="true" <?php } ?>> Exterior- polymer coating</label>
			 </div>
			 
             <div class="form-group col-sm-3">
			  <label><input type="checkbox" id="ExteriorThree" name="ExteriorThree" value="1" <?php if($FEsinv['ExteriorThree']=='1') { ?> checked="true" <?php } ?>> Exterior- Sun films</label>
			 </div>
            </div>
			
		  </div>
	  </div>
	</div> 
				<!-- Panel End Two-->
				
				
				
					 <div class="box-body ex3" hidden>
				 <h3>Type Of Vehicle Damages </h3>				 
				 <div class="col-sm-6" >			 
				 <div class="row">
					 <div class="form-group col-sm-4">
			          <label for="catname">Vehicle Part</label>
                      <input type="text" class="form-control" name="VehiclePartName" id="VehiclePartName" value="Bonnet"  readonly onKeyPress="return tabE(this,event)">
					  </div>
					  <div class="form-group col-sm-3">
			          <label for="catname"> Damage</label>
                       <select type="txt" class="form-control" name="TypeOfDamage" id="TypeOfDamage"  placeholder="Name" onKeyPress="return tabE(this,event)">
					   <?php
					   if($_SESSION['TypeOfDamage']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
			          <label for="catname">Note : </label>
                      <input type="txt" class="form-control" name="Note" id="Note" value="<?php echo $_SESSION['Note']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					  </div>
					  
					  
					  
					    <div class="row">
					  	<div class="form-group col-sm-4">
                      <input type="text" class="form-control" name="VehiclePartName1" id="VehiclePartName1" value="Front Glass"  readonly onKeyPress="return tabE(this,event)">
					  </div>
					 	<div class="form-group col-sm-3">
                       <select type="txt" class="form-control" name="TypeOfDamage1" id="TypeOfDamage1"  placeholder="Name" onKeyPress="return tabE(this,event)">
					  <?php
					   if($_SESSION['TypeOfDamage1']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage1']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage1']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
                      <input type="txt" class="form-control" name="Note1" id="Note1" value="<?php echo $_SESSION['Note1']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					   </div>
					  
					  
					  <div class="row">
						<div class="form-group col-sm-4">
                      <input type="text" class="form-control" name="VehiclePartName2" id="VehiclePartName2" value="Front Bumper"  readonly onKeyPress="return tabE(this,event)">
					  </div>
					 	  <div class="form-group col-sm-3">
                       <select type="txt" class="form-control" name="TypeOfDamage2" id="TypeOfDamage2"  placeholder="Name" onKeyPress="return tabE(this,event)">
					   <?php
					   if($_SESSION['TypeOfDamage2']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage2']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage2']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
                      <input type="txt" class="form-control" name="Note2" id="Note2" value="<?php echo $_SESSION['Note2']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					  </div>
					  
					  
					    <div class="row">
						<div class="form-group col-sm-4">
                      <input type="text" class="form-control" name="VehiclePartName3" id="VehiclePartName3" value="Left Front Fender"  readonly onKeyPress="return tabE(this,event)">
					  </div>
					 	  <div class="form-group col-sm-3">
                       <select type="txt" class="form-control" name="TypeOfDamage3" id="TypeOfDamage3"  placeholder="Name" onKeyPress="return tabE(this,event)">
					   <?php
					   if($_SESSION['TypeOfDamage3']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage3']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage3']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
                      <input type="txt" class="form-control" name="Note3" id="Note3" value="<?php echo $_SESSION['Note3']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					  </div>
					  
					  
					  
					  
					  <div class="row">
					  	<div class="form-group col-sm-4">
                      <input type="text" class="form-control" name="VehiclePartName4" id="VehiclePartName4" value="Left front Door"  readonly onKeyPress="return tabE(this,event)">
					  </div>
							<div class="form-group col-sm-3">
                       <select type="txt" class="form-control" name="TypeOfDamage4" id="TypeOfDamage4"  placeholder="Name" onKeyPress="return tabE(this,event)">
					   <?php
					   if($_SESSION['TypeOfDamage4']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage4']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage4']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
                      <input type="txt" class="form-control" name="Note4" id="Note4" value="<?php echo $_SESSION['Note4']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					   </div>
					  
					  
					  
					    <div class="row">
					  	<div class="form-group col-sm-4">
                      <input type="text" class="form-control" name="VehiclePartName5" id="VehiclePartName5" value="Left side view mirror"  readonly onKeyPress="return tabE(this,event)">
					  </div>
					 	<div class="form-group col-sm-3">
                       <select type="txt" class="form-control" name="TypeOfDamage5" id="TypeOfDamage5"  placeholder="Name" onKeyPress="return tabE(this,event)">
					  <?php
					   if($_SESSION['TypeOfDamage5']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage5']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage5']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
                      <input type="txt" class="form-control" name="Note5" id="Note5" value="<?php echo $_SESSION['Note5']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					   </div>
					   
					   
					   
					    <div class="row">
					  	<div class="form-group col-sm-4">
						  
                      <input type="text" class="form-control" name="VehiclePartName6" id="VehiclePartName6" value="Left rear door"  readonly onKeyPress="return tabE(this,event)">
					  </div>
						<div class="form-group col-sm-3">
						
                       <select type="txt" class="form-control" name="TypeOfDamage6" id="TypeOfDamage6"  placeholder="Name" onKeyPress="return tabE(this,event)">
					    <?php
					   if($_SESSION['TypeOfDamage6']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage6']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage6']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
					  
                      <input type="txt" class="form-control" name="Note6" id="Note6" value="<?php echo $_SESSION['Note6']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					   </div>
					   
					   <div class="row">
						<div class="form-group col-sm-4">
                      <input type="text" class="form-control" name="VehiclePartName7" id="VehiclePartName7" value="Left Quarter Panel"  readonly onKeyPress="return tabE(this,event)">
					  </div>
					 	  <div class="form-group col-sm-3">
                       <select type="txt" class="form-control" name="TypeOfDamage7" id="TypeOfDamage7"  placeholder="Name" onKeyPress="return tabE(this,event)">
					   <?php
					   if($_SESSION['TypeOfDamage7']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage7']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage7']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
                      <input type="txt" class="form-control" name="Note7" id="Note7" value="<?php echo $_SESSION['Note7']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					  </div>
					    </div>
					   <div class="col-sm-6">
					   <div class="row">
					  	<div class="form-group col-sm-4">
						<label for="catname">Vehicle Part</label>
                      <input type="text" class="form-control" name="VehiclePartName8" id="VehiclePartName8" value="Rear Bumper"  readonly onKeyPress="return tabE(this,event)">
					  </div>
						<div class="form-group col-sm-3">
						<label for="catname"> Damage</label>
                       <select type="txt" class="form-control" name="TypeOfDamage8" id="TypeOfDamage8"  placeholder="Name" onKeyPress="return tabE(this,event)">
					   <?php
					   if($_SESSION['TypeOfDamage8']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage8']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage8']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
					    <label for="catname">Note : </label>
                      <input type="txt" class="form-control" name="Note8" id="Note8" value="<?php echo $_SESSION['Note8']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					  </div>
					
					  
					   <div class="row">
					  	<div class="form-group col-sm-4">
						
                      <input type="text" class="form-control" name="VehiclePartName9" id="VehiclePartName9" value="Dickey"  readonly onKeyPress="return tabE(this,event)">
					  </div>
						<div class="form-group col-sm-3">
						
                       <select type="txt" class="form-control" name="TypeOfDamage9" id="TypeOfDamage9"  placeholder="Name" onKeyPress="return tabE(this,event)">
					  <?php
					   if($_SESSION['TypeOfDamage9']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage9']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage9']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
					   
                      <input type="txt" class="form-control" name="Note9" id="Note9" value="<?php echo $_SESSION['Note9']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					  </div>

					  <div class="row">
					  	<div class="form-group col-sm-4">
						
                      <input type="text" class="form-control" name="VehiclePartName10" id="VehiclePartName10" value="Rear Glass"  readonly onKeyPress="return tabE(this,event)">
					  </div>
						<div class="form-group col-sm-3">
                       <select type="txt" class="form-control" name="TypeOfDamage10" id="TypeOfDamage10"  placeholder="Name" onKeyPress="return tabE(this,event)">
					  <?php
					   if($_SESSION['TypeOfDamage10']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage10']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage10']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
					   
                     
                      <input type="txt" class="form-control" name="Note10" id="Note10" value="<?php echo $_SESSION['Note10']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					   </div>
					  
					  <div class="row">
						<div class="form-group col-sm-4">
                      <input type="text" class="form-control" name="VehiclePartName11" id="VehiclePartName11" value="Right Quarter Panel"  readonly onKeyPress="return tabE(this,event)">
					  </div>
					 	  <div class="form-group col-sm-3">
                       <select type="txt" class="form-control" name="TypeOfDamage11" id="TypeOfDamage11"  placeholder="Name" onKeyPress="return tabE(this,event)">
					   <?php
					   if($_SESSION['TypeOfDamage11']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage11']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage11']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
                      <input type="txt" class="form-control" name="Note11" id="Note11" value="<?php echo $_SESSION['Note11']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					  </div>
					  
					  	   <div class="row">
					  	<div class="form-group col-sm-4">
                      <input type="text" class="form-control" name="VehiclePartName12" id="VehiclePartName12" value="Right Rear Door"  readonly onKeyPress="return tabE(this,event)">
					  </div>
						<div class="form-group col-sm-3">
                       <select type="txt" class="form-control" name="TypeOfDamage12" id="TypeOfDamage12"  placeholder="Name" onKeyPress="return tabE(this,event)">
					    <?php
					   if($_SESSION['TypeOfDamage12']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage12']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage12']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
                      <input type="txt" class="form-control" name="Note12" id="Note12" value="<?php echo $_SESSION['Note12']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					   </div>
					   
					   
					   <div class="row">
					  	<div class="form-group col-sm-4">
                      <input type="text" class="form-control" name="VehiclePartName13" id="VehiclePartName13" value="Right Front door"  readonly onKeyPress="return tabE(this,event)">
					  </div>
						<div class="form-group col-sm-3">
                       <select type="txt" class="form-control" name="TypeOfDamage13" id="TypeOfDamage13"  placeholder="Name" onKeyPress="return tabE(this,event)">
					     <?php
					   if($_SESSION['TypeOfDamage13']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage13']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage13']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
                      <input type="txt" class="form-control" name="Note13" id="Note13" value="<?php echo $_SESSION['Note13']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					   </div>
					   
					     <div class="row">
					  	<div class="form-group col-sm-4">
                      <input type="text" class="form-control" name="VehiclePartName14" id="VehiclePartName14" value="Front side view mirror"  readonly onKeyPress="return tabE(this,event)">
					  </div>
					 	<div class="form-group col-sm-3">
                       <select type="txt" class="form-control" name="TypeOfDamage14" id="TypeOfDamage14"  placeholder="Name" onKeyPress="return tabE(this,event)">
					    <?php
					   if($_SESSION['TypeOfDamage14']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage14']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage14']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
                      <input type="txt" class="form-control" name="Note14" id="Note14" value="<?php echo $_SESSION['Note14']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					   </div>
					   
					   
					   
					   
					   
					   <div class="row">
						<div class="form-group col-sm-4">
                      <input type="text" class="form-control" name="VehiclePartName15" id="VehiclePartName15" value="Right Front Fender"  readonly onKeyPress="return tabE(this,event)">
					  </div>
					 	  <div class="form-group col-sm-3">
                       <select type="txt" class="form-control" name="TypeOfDamage15" id="TypeOfDamage15"  placeholder="Name" onKeyPress="return tabE(this,event)">
					   <?php
					   if($_SESSION['TypeOfDamage15']!='')
					   {
					   ?>
					   <option value="<?php echo $_SESSION['TypeOfDamage15']; ?>" selected="true"><?php echo $_SESSION['TypeOfDamage15']; ?></option>
					   <?php
					   }
					   ?>
					    <option value="Nill">Nill</option>
					   <option value="Dent">Dent</option>
					   <option value="Scratch">Scratch</option>
					   <option value="Dent and Scratch">Dent and Scratch</option>
					   </select>
                        </div>
					   <div class="form-group col-sm-5">
                      <input type="txt" class="form-control" name="Note15" id="Note15" value="<?php echo $_SESSION['Note15']; ?>"  placeholder="Note" onKeyPress="return tabE(this,event)">
                      </div>
					  </div>
					   
					  </div>
				      </div>				  								
				 
			 <div class="box-body ex3" id="pack" hidden>
			  <h2>Package Details </h2>
			    <div class="form-group col-sm-6">
			    <label for="catname">Package Type</label>
                <select class="form-control" id="ptype" name="ptype"  onKeyPress="return tabE(this,event)" onChange="getpackageamt()">
				<option value="">--Select Package--</option>
				  <?php 
				  
				   if($mobil['id']!='')
				  {
				  $mob12="select * from a_customer_vehicle_details where cust_no='".trim($mobil['id'])."'";
				  $mobi12=mysqli_query($conn,$mob12);
				  $mobil12=mysqli_fetch_array($mobi12);
				  }
				  else
				  {
					 $mob12="select * from a_customer_vehicle_details where vehicle_no='".trim($temp['vehicle_no'])."'";
				     $mobi12=mysqli_query($conn,$mob12);
				     $mobil12=mysqli_fetch_array($mobi12);  
				  }
					
				  $mvs="select * from master_vehicle_segment where VehicleSegment='".trim($mobil12['VehicleSegment'])."'";
				  $mvq=mysqli_query($conn,$mvs);
				  $mvf=mysqli_fetch_array($mvq);
				  
				  $vtype=trim($mvf['Id']); 
				  
				  $ssc="select * from m_package where status='Active' and v_type='$vtype'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['package_name']; ?>"><?php echo $FEssc['package_name']; ?></option>
				  <?php } ?>
				  </select>
               
				</div>
				
				
				 <div class="form-group col-sm-3">
			   <label for="catname">Package Amount</label>

                  <input type="txt" class="form-control" name="pk_amt" id="pk_amt"  placeholder="Service Amount"  onKeyPress="return isNumberKey(event,this)" >
                </div>

				<div class="form-group col-sm-6 hidden">
			   <label for="catname">Repair Advice / action Taken</label>
                   <textarea class="form-control" name="pk_remarks_1" id="pk_remarks_1"  placeholder="Repair Advice / action Taken"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
                 </div>
					 <div class="form-group col-sm-2">
			   <label for="catname"></label>
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" name="AddPackge" id="AddPackge"  style="background-color:#37B8F8; color:#000000" value="Add Package"   class="form-control" >
                </div>
	
					
				<div class="form-group col-sm-8">
				<div>
					<table border="1" width="100%"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				  <th style="height:40px;padding-left:5px;text-align:left"> S.No </th>
                  <th style="padding-left:5px;text-align:left"> Package</th>
				   <th style="padding-right:5px;text-align:right"> Package Amount</th>
				   
                  <th style="padding-right:5px;text-align:right"> Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$i=0;
				$s="select * from s_job_card_pdetails_temp where session_id='".session_id()."' and FranchiseeId='".$_SESSION['FranchiseeId']."' and status='Active'";
				$Es=mysqli_query($conn,$s);				
				while($FEs=mysqli_fetch_array($Es))
				{
					$i++;
				?>
                <tr>
				  <td style="height:40px;padding-left:5px;text-align:left"><?php echo $i;  ?></td>
                  <td style="padding-left:5px;text-align:left"><?php echo $FEs['package_type'];  ?></td>
				    <td style="padding-right:5px;text-align:right"><?php echo $FEs['package_amt'];  ?></td>
					
					
				 
				   <td style="padding-right:5px;text-align:center"><a href="package_temp_delete.php?id=<?php echo $FEs['id']; ?> && job_card_no=<?php echo $FEs['job_card_no']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                </tr>
				<?php } ?>
			
                  </tbody>
                
              </table>
					</div>
				</div>
			</div>
<br/>


		 <div class="box-body ex3" id="recom1" hidden>
				<h2>Accessories Details </h2>
			 <div class="form-group col-sm-6">
			   <label for="catname">Accessories Type</label>
			    <select class="form-control" id="Atype" name="Atype" onKeyPress="return tabE(this,event)" onChange="getmrp()" >
				<option value="">--Select Accessories--</option>
				  <?php 
                  $ssc1="select * from item_stock where StockQuantity>0 ";
				  $Essc1=mysqli_query($conn,$ssc1);
				  while($FEssc1=mysqli_fetch_array($Essc1))
				  {
					  $mob123="select * from m_spare where sid='".$FEssc1['ItemId']."'";
				     $mobi123=mysqli_query($conn,$mob123);
				     $mobil123=mysqli_fetch_array($mobi123); 
					  
				  ?>
				  <option value="<?php echo $FEssc1['Id']; ?>"><?php echo $mobil123['sname']; ?></option>
				  <?php } ?>
				  </select>
			   </div>
			   <div class="form-group col-sm-3">
			   <label for="catname">Spare Amount</label> 
               <input type="txt" class="form-control" name="smrp" id="smrp"  placeholder="Spare Amount"  onKeyPress="return isNumberKey(event,this)" >
			   </div>
			   
			      <div class="form-group col-sm-2 pull-right">
			   <label for="catname"></label>            
               <label for="Branch">&nbsp;</label>
               <input type="Submit" placeholder="Add" name="Addspare" id="Addspare" style="background-color:#37B8F8; color:#000000" value="Add Spare"  class="form-control " >
            
				  </div>
			   </div>
			   
			
		
			   
			   
			   <div class="box-body ex3" id="serv" hidden>
				<h2>Details </h2>
				<div class="form-group col-sm-8">
				<div>
				<table border="1" width="100%"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				   <th style="height:40px;text-align:center"> S.No </th>
                   <th style="text-align:center"> Spare Name </th>
				   <th style="text-align:center"> Spare Amount </th>
				   <th style="text-align:center"> Action</th>
                </tr>
                </thead>
                <tbody>

				<?php 
				$i=0;
				 $s1="select * from s_jobcard_accessories where session_id='".session_id()."' and FranchiseeId='".$_SESSION['FranchiseeId']."' and status='Active'";
				$Es1=mysqli_query($conn,$s1);
				while($FEs1=mysqli_fetch_array($Es1))
				{
					
						  $mob1234="select * from m_spare where sid='".$FEs1['sname']."'";
				     $mobi1234=mysqli_query($conn,$mob1234);
				     $mobil1234=mysqli_fetch_array($mobi1234); 
					$i++;

$acc_t_amt=$acc_t_amt+$FEs1['smrp'];
					
				?>
                <tr>
				  <td style="padding:15px;text-align:left"><?php echo $i;  ?></td>
                  <td style="padding-left:5px;text-align:left"> <?php echo $mobil1234['sname'];  ?></td>
				  <td style="padding-right:5px;text-align:right"><?php echo $FEs1['smrp'];  ?></td>	
				  <td style="padding-right:5px;text-align:center"><a href="acc_delete_temp.php?id=<?php echo $FEs1['id']; ?> && job_card_no=<?php echo $FEs1['job_card_no']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
				  
                </tr>
				<?php 				
				}
				 ?>
                  </tbody>          
              </table>
				</div>
				</div>
	
	
	   <div class="form-group col-sm-3">
			   <label for="catname">Spare Total Amount</label> 

               <input type="txt" class="form-control" name="acc_t_amt" id="acc_t_amt" value="<?php echo $acc_t_amt; ?>"  placeholder="Spare Total Amount"  onKeyPress="return isNumberKey(event,this)" >
			   </div>
	
	
				 </div>
			   
</div>

				 <div class="box-body ex3" id="recom">
				<h2>Services Details </h2>
			 <div class="form-group col-sm-6">
			   <label for="catname">Service Type</label>
                <select class="form-control" id="Rtype" name="Rtype" onKeyPress="return tabE(this,event)" onChange="getramount()">
				<option value="">--Select Service--</option>
				<?php 
				 $mob12="select * from a_customer_vehicle_details where vehicle_no='".trim($temp['vehicle_no'])."'";
				     $mobi12=mysqli_query($conn,$mob12);
				     $mobil12=mysqli_fetch_array($mobi12);  
					 
				  $mvs="select * from master_vehicle_segment where VehicleSegment='".trim($mobil12['VehicleSegment'])."'";
				  $mvq=mysqli_query($conn,$mvs);
				  $mvf=mysqli_fetch_array($mvq);
				   $vtype=trim($mvf['Id']); 
				  
				  
				  $ssc="select * from m_service_type where status='Active' and v_type='$vtype' and franchisee_id='".$_SESSION['BranchId']."' and vendor_id='".$_SESSION['VendorId']."' order by id";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['stype']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
                 </div>
				 <div class="form-group col-sm-3">
			   <label for="catname">Service Amount</label> 
                  <input type="txt" class="form-control" name="rst_amt" id="rst_amt"  placeholder="Service Amount"  onKeyPress="return isNumberKey(event,this)" >

				</div>
				<div class="form-group col-sm-4 hidden">
			   <label for="catname">Date</label>
			      <input type="date" class="form-control" name="RecomDate" id="RecomDate" onKeyPress="return tabE(this,event)" >
				</div>
				 <div class="form-group col-sm-2 hidden">
			   <label for="catname">Qty</label>
           
			    <input type="txt" class="form-control" name="rqty" id="rqty" value="1"  placeholder="Qty" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                </div>
				
							
					 <div class="form-group col-sm-2 pull-right">
			   <label for="catname"></label>
             
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" name="AddRecom" id="AddRecom" style="background-color:#37B8F8; color:#000000" value="Add Service"  class="form-control " >
            
				  </div>
				<div class="form-group col-sm-8 hidden">
				<div>
					<table border="1" width="100%"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				   <th style="height:40px;text-align:center"> S.No </th>
                   <th style="text-align:center"> Service </th>
				   <th style="text-align:center"> Service Amount </th>
				   <th style="text-align:center"> Qty </th>				  
				   <th style="text-align:center"> Action </th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$i=0;
				 $s="select * from s_job_card_recomdetails_temp where session_id='".session_id()."' and FranchiseeId='".$_SESSION['FranchiseeId']."' and status='Active'";
				$Es=mysqli_query($conn,$s);
				while($FEs=mysqli_fetch_array($Es))
				{
					$i++;
					
				?>
                <tr>
				  <td style="height:40px;padding-left:5px"><?php echo $i;  ?></td>
                  <td style="padding-left:5px"> <?php echo $FEs['service_type'];  ?></td>
				  <td style="padding-right:5px;text-align:right"><?php echo $FEs['st_amt'];  ?></td>
				  <td style="padding-right:5px;text-align:right"><?php echo $FEs['qty'];  ?></td>
				 
				  <td><a href="recomservice_temp_delete.php?id=<?php echo $FEs['id']; ?> && job_card_no=<?php echo $FEs['job_card_no']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                </tr>
				<?php 
				
				}
				 ?>
                  </tbody>
                
              </table>
					</div>
				</div>
				 </div>

                 <br>
						
				 <div class="box-body ex3" id="serv">
				<h2>Details </h2>
			 <div class="hidden">
			   <label for="catname">Service Type</label>
                <select class="form-control" id="stype" name="stype" onKeyPress="return tabE(this,event)" onChange="getamount()">
				<option value="">--Select Service--</option>
				  <?php 
				  if($mobil['id']!='')
				  {
				   $mob12="select * from a_customer_vehicle_details where cust_no='".trim($mobil['id'])."'";
				$mobi12=mysqli_query($conn,$mob12);
				$mobil12=mysqli_fetch_array($mobi12);
				  }
				  else
				  {
					 $mob12="select * from a_customer_vehicle_details where vehicle_no='".trim($temp['vehicle_no'])."'";
				     $mobi12=mysqli_query($conn,$mob12);
				     $mobil12=mysqli_fetch_array($mobi12);  
				  }
					
				  $mvs="select * from master_vehicle_segment where VehicleSegment='".trim($mobil12['VehicleSegment'])."'";
				  $mvq=mysqli_query($conn,$mvs);
				  $mvf=mysqli_fetch_array($mvq);
				  
				  $ssc="select * from m_service_type where status='Active' and v_type='".trim($mvf['Id'])."' and franchisee_id='".$_SESSION['BranchId']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['stype']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
                 </div>
				 <div class="hidden">
			   <label for="catname">Service Amount</label> 
                  <input type="txt" class="form-control" name="st_amt" id="st_amt"  placeholder="Service Amount"  onKeyPress="return isNumberKey(event,this)"  readonly="true">

				</div>
				 <div class="hidden">
			   <label for="catname">Qty</label>
           
			    <input type="txt" class="form-control" name="qty" id="qty" value="1"  placeholder="Qty" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                </div>
				
				<div class="hidden">
			    <label for="catname">Customer Special Request / comments</label>
				<textarea  class="form-control" name="remarks" id="remarks"  placeholder="Customer Special Request / comments"   onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
				<div class="hidden">
			    <label for="catname">Repair Advice / action Taken</label>
                <textarea class="form-control" name="remarks_1" id="remarks_1"  placeholder="Repair Advice / action Taken"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
				
					 <div class="hidden">
			   <label for="catname"></label>
             
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" name="AddService" id="AddService" style="background-color:#37B8F8; color:#000000" value="Add Service"  class="form-control " >
            
				  </div>
				<div class="form-group col-sm-8">
				<div>
					<table border="1" width="100%"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				   <th style="height:40px;text-align:center"> S.No </th>
                   <th style="text-align:center"> Service </th>
				   <th style="text-align:center"> Service Amount </th>
				   <th style="text-align:center"> Qty </th>
				   <th style="text-align:center"> Delete </th>

				      <th style="text-align:center"> Later  </th>
                </tr>
                </thead>
                <tbody>
				
				 
				<?php 
				$i=0;
				$s="select * from s_job_card_sdetails_temp where session_id='".session_id()."' and FranchiseeId='".$_SESSION['BranchId']."' and status='Active'";
				$Es=mysqli_query($conn,$s);
				while($FEs=mysqli_fetch_array($Es))
				{
					$i++;
					
				?>
                <tr>
				  <td style="padding:15px;text-align:left"><?php echo $i;  ?></td>
                  <td style="padding-left:5px;text-align:left"> <?php echo $FEs['service_type'];  ?></td>
				  <td style="padding-right:5px;text-align:right"><?php echo $FEs['st_amt'];  ?></td>
				  <td style="padding-right:5px;text-align:right"><?php echo $FEs['qty'];  ?></td>				 
				  <td style="padding-right:5px;text-align:center"><a href="s_jobcard_service_delete_temp.php?id=<?php echo $FEs['id']; ?> && job_card_no=<?php echo $FEs['job_card_no']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>				 
				 
                  <td style="padding-right:5px;text-align:right"><a href="rec_date_from_service.php?id=<?php echo $FEs['id']; ?> && job_card_no=<?php echo $FEs['job_card_no']; ?> && mobile=<?php echo $temp['smobile'];?> " class="btn-box-tool"><b>Later</b></a></td>
                </tr>
				<?php 
				
				}
				 ?>
                  </tbody>
                
              </table>
					</div>
				</div>
				<?php
				$ps="select IFNULL(sum(package_amt),0) as package_amt from s_job_card_pdetails_temp where session_id='".session_id()."' and FranchiseeId='".$_SESSION['BranchId']."' and UserId='".$_SESSION['UserId']."' and status='Active'";
				$psb=mysqli_query($conn,$ps);
				$pamt=mysqli_fetch_array($psb);
				
				$pw="select IFNULL(sum(st_amt),0) as st_amt from s_job_card_sdetails_temp where session_id='".session_id()."' and FranchiseeId='".$_SESSION['BranchId']."' and UserId='".$_SESSION['UserId']."' and status='Active'";
				$pse=mysqli_query($conn,$pw);
				$samt=mysqli_fetch_array($pse);
				
				$total=$pamt['package_amt']+$samt['st_amt'];
				?>
				 </div>
				 <br/>
                	
				<?php
				$ps="select IFNULL(sum(package_amt),0) as package_amt from s_job_card_pdetails_temp where session_id='".session_id()."' and FranchiseeId='".$_SESSION['BranchId']."' and UserId='".$_SESSION['UserId']."' and status='Active'";
				$psb=mysqli_query($conn,$ps);
				$pamt=mysqli_fetch_array($psb);
				
				$pw="select IFNULL(sum(st_amt),0) as st_amt from s_job_card_sdetails_temp where session_id='".session_id()."' and FranchiseeId='".$_SESSION['BranchId']."' and UserId='".$_SESSION['UserId']."' and status='Active'";
				$pse=mysqli_query($conn,$pw);
				$samt=mysqli_fetch_array($pse);

				$pw1="select IFNULL(sum(st_amt),0) as st_amt from s_job_card_recomdetails_temp where session_id='".session_id()."' and FranchiseeId='".$_SESSION['BranchId']."' and UserId='".$_SESSION['UserId']."' and status='Active'";
				$pse1=mysqli_query($conn,$pw1);
				$samt1=mysqli_fetch_array($pse1);
				
				$total=$pamt['package_amt']+$samt['st_amt'];
				?>
				
			
				
				
				<div class="box-body">		
					<?php
					
				if($mobil['id']!='')
				{
				$rfs1="select * from s_job_card where customer_id='".$mobil['id']."'";
				$rfq1=mysqli_query($conn,$rfs1);
				$rff1=mysqli_fetch_array($rfq1);
				$ln1=mysqli_num_rows($rfq1);
				}
				else
				{
				$emp="select * from a_customer where cust_name='".trim($temp['sname'])."'";
				$pme=mysqli_query($conn,$emp);
				$epm=mysqli_fetch_array($pme);
				
				$rfs1="select * from s_job_card where customer_id='".$epm['id']."'";
				$rfq1=mysqli_query($conn,$rfs1);
				$rff1=mysqli_fetch_array($rfq1);
				$ln1=mysqli_num_rows($rfq1);

				}
                if($ln1<'1')
				{
				?>
				<div class="form-group col-sm-4">
			    <label for="catname">Referral Discount Amount</label>
                <input type="txt" class="form-control" name="ReferedDiscount" id="ReferedDiscount"  value="<?php echo $temp['ReferedDiscount'];?>" readonly onKeyPress="return tabE(this,event)" placeholder="ReferedDiscount" style="text-transform:uppercase">
				</div>
				
				
				<?php
				}
				else
				{
				?>
				
				
				<div class="form-group col-sm-3">
			    <label for="catname">Total No Of Referral</label>
				<?php
				if($mobil['cust_name']!='')
				{
				$jcr="select COUNT(id) as ids from s_job_card where ReferencedBy='".trim($mobil['cust_name'])."'";
				$jcrs=mysqli_query($conn,$jcr);
				$jcrsf=mysqli_fetch_array($jcrs);
				}
				else
				{
				$jcr="select COUNT(id) as ids from s_job_card where ReferencedBy='".TRIM($temp['sname'])."'";
				$jcrs=mysqli_query($conn,$jcr);
				$jcrsf=mysqli_fetch_array($jcrs);		
				}
				?>
                <input type="txt" class="form-control" name="TotalReferencedScheme" id="TotalReference"  value="<?php echo $jcrsf['ids'];?>" readonly placeholder="Total Reference" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				<div class="form-group col-sm-3">
				<?php
				if($mobil['cust_name']!='')
				{
				 $jcr1="select COUNT(id) as discountNo from s_job_card where ReferencedBy='".trim($mobil['cust_name'])."' and DiscountAmount!='0.00'";
				$jcrs1=mysqli_query($conn,$jcr1);
				$jcrsf1=mysqli_fetch_array($jcrs1);
				
				$jcrr12="select COUNT(id) as discountNo from s_job_card where customer_id='".trim($mobil['id'])."' and ReferralDiscount='Yes'";
				$jcrsr12=mysqli_query($conn,$jcrr12);
				$jcrsfr12=mysqli_fetch_array($jcrsr12);
				}
				else
				{
					 $ds1="select * from a_customer where mobile1='".TRIM($temp['smobile'])."'"; 
				   $sa1=mysqli_query($conn,$ds1);
				   $dz1=mysqli_fetch_array($sa1);
				   
				$jcrr12="select COUNT(id) as discountNo from s_job_card where customer_id='".TRIM($dz1['id'])."' and ReferralDiscount='Yes'";
				$jcrsr12=mysqli_query($conn,$jcrr12);
				$jcrsfr12=mysqli_fetch_array($jcrsr12);		
				}
				?>
			    <label for="catname">No Of Discount / Referral Used</label>
                <input type="txt" class="form-control" name="NoOfReferenceUsed" id="NoOfReferenceUsed"  value="<?php echo $jcrsfr12['discountNo'];?>" readonly onKeyPress="return tabE(this,event)" placeholder="No Of Reference Used" style="text-transform:uppercase">
				</div>
				
				<?php
				}
				if($mobil['cust_name']!='')
				{
				$jcrr="select COUNT(id) as ids from s_job_card where ReferencedBy='".trim($mobil['cust_name'])."'";
				$jcrsr=mysqli_query($conn,$jcrr);
				$jcrsfr=mysqli_fetch_array($jcrsr);
				}
				else
				{
				$jcrr="select COUNT(id) as ids from s_job_card where ReferencedBy='".TRIM($temp['sname'])."' ";
				$jcrsr=mysqli_query($conn,$jcrr);
				$jcrsfr=mysqli_fetch_array($jcrsr);		
				}
				
				if($mobil['cust_name']!='')
				{
				$jcrr1="select COUNT(id) as discountNo from s_job_card where customer_id='".trim($mobil['id'])."' and ReferralDiscount='Yes'";
				$jcrsr1=mysqli_query($conn,$jcrr1);
				$jcrsfr1=mysqli_fetch_array($jcrsr1);
				

				}
				else
				{
					
					
					$ds1="select * from a_customer where mobile1='".TRIM($temp['smobile'])."'"; 
				   $sa1=mysqli_query($conn,$ds1);
				   $dz1=mysqli_fetch_array($sa1);
				   
				   
				$jcrr1="select COUNT(id) as discountNo from s_job_card where customer_id='".trim($dz1['id'])."' and ReferralDiscount='Yes'";
				$jcrsr1=mysqli_query($conn,$jcrr1);
				$jcrsfr1=mysqli_fetch_array($jcrsr1);		
				}
				
				if($jcrsfr['ids']!=$jcrsfr1['discountNo'])
				{
					$rra="select * from referrer_scheme where status='Active'";
					$rraq=mysqli_query($conn,$rra);
					$rraf=mysqli_fetch_array($rraq);
				?>
				<div class="form-group col-sm-3">
			    <label for="catname">Referrer Discount Amount</label>
                <input type="txt" class="form-control" name="ReferrerDiscount" id="ReferrerDiscount"  value="<?php echo $rraf['ReferenceAmount'];?>" readonly onKeyPress="return tabE(this,event)" placeholder="Referrer Discount" style="text-transform:uppercase">
				</div>
				<div class="form-group col-sm-3">
				 <label for="catname">Use Referral Discount? </label>
				 <select name="ReferralStatus" id="ReferralStatus" class="form-control" onChange="getreferral();">
				  <option value="No">No</option>
				  <option value="Yes">Yes</option>
				   </select>
				</div>
				
				<?php
				}
				?>
				
				
				
				
				</div>

                	 <div class="box-body">			
				
				<div class="form-group col-sm-4">
			    <label for="catname">Delivery Date</label>
                <input type="date" class="form-control" name="delivery_date" id="delivery_date" value="<?php echo date("Y-m-d"); ?>"  onKeyPress="return tabE(this,event)">
				</div>
				
				<div class="form-group col-sm-4">
			    <label for="catname">Delivery Time *</label>
                <input type="time" class="form-control" name="delivery_time" id="delivery_time"  value="<?php echo $total; ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				
				<div class="form-group col-sm-4">
			    <label for="catname">Remarks / Observations / Damages if any </label>
                <textarea class="form-control" name="remarks_1" id="remarks_1"  placeholder="Remarks / Observations / Damages if any"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
				
				<div class="form-group col-sm-4">
			    <label for="catname">Special Instructions</label>
				<textarea  class="form-control" name="customer_instructions" id="customer_instructions"  placeholder="Special Instructions"   onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
				
				<div class="form-group col-sm-4 hidden">
			    <label for="catname">Description</label>
				<input  class="form-control" name="description" id="description"  placeholder="Description"   onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
						
              
					 <div class="box-body">		
			    <div class="form-group  col-sm-4">
			    <label for="catname">Service Advisor *</label>
			    <select type="txt" class="form-control" name="ServiceAdvisor" id="ServiceAdvisor">
				  <option value="">--Select Service--</option>
				  <?php 
				  $ssc="select * from h_employee where status='Active' and edesign='1'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['ename']; ?></option>
				  <?php } ?>
				 
				</select>
                </div>
				   <div class="form-group  col-sm-4" hidden>
			    <label for="catname">Technician Name</label>
			    <select type="txt" class="form-control" name="TechnicianName" id="TechnicianName">
				  <option value="">--Select Service--</option>
				  <?php 
				  $ssc="select * from h_employee where status='Active' and edesign='2'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['ename']; ?></option>
				  <?php } ?>
				 
				</select>
                </div> </div>
				</div>
					<div class="box-body" hidden>	
				<div class="form-group col-sm-12">
			    <label for="catname">Customer Service Additional information</label>
                <textarea type="time" class="form-control" name="ServiceAdditionalInfo" id="ServiceAdditionalInfo"  onKeyPress="return tabE(this,event)" rows="3" cols="100" style="text-transform:uppercase"></textarea>
				</div>
				</div>
				
				 
				 <br>
				 
				 <!----photo updation-------->
           <div class="box-body">	
              <div class="form-group col-sm-4">
			   <label for="catname">Photo 1 *</label>
			      <input type="file" class="form-control" name="VImage1" id="VImage1" onKeyPress="return tabE(this,event)">
				</div>
				
              <div class="form-group col-sm-4">
			   <label for="catname">Photo 2 *</label>
			      <input type="file" class="form-control" name="VImage2" id="VImage2" onKeyPress="return tabE(this,event)">
				</div>
				
              <div class="form-group col-sm-4">
			   <label for="catname">Photo 3 *</label>
			      <input type="file" class="form-control" name="VImage3" id="VImage3" onKeyPress="return tabE(this,event)" >
			  </div>
				
              <div class="form-group col-sm-4">
			   <label for="catname">Photo 4 *</label>
			      <input type="file" class="form-control" name="VImage4" id="VImage4" onKeyPress="return tabE(this,event)" >
			  </div>
				
              <div class="form-group col-sm-4">
			   <label for="catname">Photo 5</label>
			      <input type="file" class="form-control" name="VImage5" id="VImage5" onKeyPress="return tabE(this,event)" >
				</div>
				
              <div class="form-group col-sm-4">
			   <label for="catname">Photo 6</label>
			      <input type="file" class="form-control" name="VImage6" id="VImage6" onKeyPress="return tabE(this,event)" >
				</div>
				<div class="form-group col-sm-4">
			   <label for="catname">Photo 7</label>
			      <input type="file" class="form-control" name="VImage7" id="VImage7" onKeyPress="return tabE(this,event)" >
				</div>
				<div class="form-group col-sm-4">
			   <label for="catname">Photo 8</label>
			      <input type="file" class="form-control" name="VImage8" id="VImage8" onKeyPress="return tabE(this,event)" >
				</div>
				<div class="form-group col-sm-4">
			   <label for="catname">Photo 9</label>
			      <input type="file" class="form-control" name="VImage9" id="VImage9" onKeyPress="return tabE(this,event)" >
				</div>
				<div class="form-group col-sm-4">
			   <label for="catname">Photo 10</label>
			      <input type="file" class="form-control" name="VImage10" id="VImage10" onKeyPress="return tabE(this,event)" >
				</div>
				</div>
				<!----photo updation-------->
				
				<div>
				<div class="form-group col-sm-4">
			    <label for="catname">Total Service Amount</label>
                <input type="txt" class="form-control" name="total_amt" id="total_amt"  value="<?php echo $total; ?>"  onKeyPress="return isNumberKey(this, event);" style="text-transform:uppercase">
				</div>
				
				<div class="form-group col-sm-4" >
			     <label for="Branch">GST %</label>
              <select type="text" class="form-control" name="gst" id="gst" onChange="sumgst();" placeholder="GST"> 
			<option>--Select The GST--</option>
			  <?php 
			  $ab="select * from m_gst where status='Active'";
			  $abc=mysqli_query($conn,$ab);
			  while($abcd1=mysqli_fetch_array($abc))
			  {
			  ?>
			  <option value="<?php echo $abcd1['gst'];?>"><?php echo $abcd1['gst'];?></option>
			  <?php
			  }
			  ?>
			  </select>
				</div>
				<?php 
				//number_format($number, 2, '.', '');
				$newgst=number_format((($total*($_POST['gst']/100))+$total), 2, '.', '');
			
				?>
				
			
				
				<div class="form-group col-sm-4" >
			    <label for="catname"> Service Amount After GST</label>
                <input type="txt" class="form-control" name="total_amt_agst" id="total_amt_agst"  value="<?php echo $newgst; ?>"  onKeyPress="return isNumberKey(this, event);" style="text-transform:uppercase">
				</div>
				
				<?php 	$gst_amt=number_format(($newgst-$total),2,'.','');?>
				
					<div class="form-group col-sm-4" >
			    <label for="catname">GST Amount</label>
                <input type="txt" class="form-control" name="gst_amt" id="gst_amt"  value="<?php  ?>"  onKeyPress="return isNumberKey(this, event);" style="text-transform:uppercase">
				</div>

				<div class="form-group col-sm-4">
			    <label for="catname">Discount Amount (In Rupees)</label>
                <input type="txt" class="form-control" name="DiscountAmount" id="DiscountAmount"  value="<?php echo $temp['ReferedDiscount'];?>"   onKeyPress="return tabE(this,event)" OnKeyUp="sumgst();" style="text-transform:uppercase">
				</div>
				
			
				<div class="form-group col-sm-4">
			    <label for="catname"> Discount % </label>
                <input type="txt" class="form-control" name="DiscountPercentage" id="DiscountPercentage"  value="0" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				<div class="form-group col-sm-4 ">
			    <label for="catname"> Discount Amount</label>
                <input type="txt" class="form-control" name="totalvalue" id="totalvalue"  value="0" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
								
				<div class="form-group col-sm-4" >
			    <label for="catname">Advance Amount</label>
                <select type="txt" class="form-control" name="paying_advance" id="paying_advance" onKeyPress="return tabE(this,event)" onChange="getcolor(this.value)">
				<option value="No" selected>No</option>
				<option value="Yes">Yes</option>
				
				</select>
				</div>
				<div  id="cdetails" name="cdetails" >
				</div>
				
				
			   <div class="form-group col-sm-3">
			   <label for="catname">Spare Total Amount</label> 
               <input type="txt" class="form-control" name="acc_t_amt" id="acc_t_amt" value="<?php echo $acc_t_amt; ?>"  placeholder="Spare Total Amount"  onKeyPress="return isNumberKey(event,this)" >
			   </div>
				
				<div class="form-group col-sm-4" >
			    <label for="catname">Balance Amount</label>
                <input type="txt" class="form-control" name="balance_amount" id="balance_amount" value="<?php echo $newgst+$acc_t_amt; ?>"   readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly="true">
				</div>
				
				</div>

         <!-----Pho Updation End------->



				<div class="form-group pull-right">
			    <label for="catname" class="col-sm-3 control-label"></label>
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" name="SubmitJobCard" id="SubmitJobCard" style="background-color:#37B8F8;color:#000000" value="Submit Job Card"  class="form-control" >
            	</div>
				</div>
				
			</div>
			
          <!-- /.box -->
       
	    <div class="box-footer">
                
                   
         </div> </div>
    </form>
	</section>
    <!-- /.content -->
	
	<!-- Customer History -->
	 <section class="content container-fluid hidden">
       
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			   <h3>
     Customer Bill History
      </h3>
						<?php 
						$customer_id=$cc['id'];
						$ssc="select * from a_customer where id='$customer_id'";
						$Essc=mysqli_query($conn,$ssc);
						$FEssc=mysqli_fetch_array($Essc);
						?>
                <div class="form-group col-sm-12">
				<div style="padding-left:170px" >
               <table border="1" width="650" align="left" >
                <thead>
                <tr>
				  <th>Sl No</th>
				   <th>Customer Name</th>
				    <th>Date</th>
                  <th>Bill No</th>
				  <th>Bill Amount</th>
                </tr>
                </thead>
                <tbody>
					<?php
			  	$ss="select * from a_final_bill where cname='$customer_id' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEssc['cust_name'];?></td>
				  <td><?php echo date('d-m-Y',strtotime($FEss['bill_date']));?></td>
				  <td><?php echo $FEss['inv_no'];?></td>
				  <td><?php echo $FEss['bill_amt'];?></td>
				  <?php
				  }
				  ?>
                  
                </tr>
				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
			
			   <div class="box-body">
			   <h3>
     Customer Package History
      </h3>
                <div class="form-group col-sm-12">
				<div style="padding-left:170px" >
               <table border="1" width="650" align="left" >
                <thead>
                <tr>
				  <th>Sl No</th>
				   <th>Customer Name</th>
				    <th>Date</th>
                  <th>Bill No</th>
				  <th>Package Details</th>
                </tr>
                </thead>
                <tbody>
					<?php
			  	$ss="select * from a_final_bill where cname='$customer_id' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				$FEss=mysqli_fetch_array($Ess);
				
					
					$dec="select * from s_job_card where customer_id='$customer_id'";
					$esc=mysqli_query($conn,$dec);
					while($sce=mysqli_fetch_array($esc))
					{
					
					$dec1="select * from s_job_card_pdetails where job_card_no='".$sce['id']."'";
					$esc1=mysqli_query($conn,$dec1);
					while($sce1=mysqli_fetch_array($esc1))
					{
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEssc['cust_name'];?></td>
				  <td><?php echo date('d-m-Y',strtotime($FEss['bill_date']));?></td>
				  <td><?php echo $FEss['inv_no'];?></td>
				  <td><?php echo $sce1['package_type'];?></td>
				  <?php
				   }
				 }				
				  ?>
                  
                </tr>
				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
			
			   <div class="box-body">
			   <h3>
     Customer Service History
      </h3>
                <div class="form-group col-sm-12">
				<div style="padding-left:170px" >
               <table border="1" width="650" align="left" >
                <thead>
                <tr>
				  <th>Sl No</th>
				   <th>Customer Name</th>
				    <th>Date</th>
                  <th>Bill No</th>
				  <th>Service Details</th>
                </tr>
                </thead>
                <tbody>
					<?php
			  	$ss="select * from a_final_bill where cname='$customer_id' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				$FEss=mysqli_fetch_array($Ess);
				
					
					$dec="select * from s_job_card where customer_id='$customer_id'";
					$esc=mysqli_query($conn,$dec);
					while($sce=mysqli_fetch_array($esc))
					{
					
					$dec1="select * from s_job_card_sdetails where job_card_no='".$sce['id']."'";
					$esc1=mysqli_query($conn,$dec1);
					while($sce1=mysqli_fetch_array($esc1))
					{
					
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEssc['cust_name'];?></td>
				  <td><?php echo date('d-m-Y',strtotime($FEss['bill_date']));?></td>
				  <td><?php echo $FEss['inv_no'];?></td>
				  <td><?php echo $sce1['service_type'];?></td>
				  <?php
				   }
				 }				
				?>
                  
                </tr>
				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
			
			   <div class="box-body">
			   <h3>
     Customer Amount Pending Details
      </h3>
                <div class="form-group col-sm-12">
				<div style="padding-left:170px" >
               <table border="1" width="650" align="left" >
                <thead>
                <tr>
				  <th>Sl No</th>
				   <th>Customer Name</th>
				    <th>Date</th>
                  <th>Bill No</th>
				  <th>Bill Amount</th>
				   <th>Payable Amount</th>
				    <th>Balance Amount</th>
				   
                </tr>
                </thead>
                <tbody>
					<?php
			 	$ss="select * from a_final_bill where cname='$customer_id'"; 
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				
				{
				$i++;
			    $Dec="select * from cust_outstanding where invoice='".$FEss['inv_no']."' order by id desc";
				$Edc=mysqli_query($conn,$Dec);
				$Wsx=mysqli_fetch_array($Edc);
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEssc['cust_name'];?></td>
				  <td><?php echo date('d-m-Y',strtotime($Wsx['p_date']));?></td>
				  <td><?php echo $Wsx['invoice'];?></td>
				  <td><?php echo $Wsx['invoice_amt'];?></td>
				  <td><?php echo $Wsx['tran_amount'];?></td>
				  <td><?php echo $Wsx['balance_amt'];?></td>
				<?php } ?>				
                </tr>
				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
			   <div class="box-body">
			   <h3>
                 Customer Payment Mode Details
               </h3>
                <div class="form-group col-sm-12">
				<div style="padding-left:170px" >
               <table border="1" width="650" align="left" >
                <thead>
                <tr>
				  <th>Sl No</th>
				  <th>Customer Name</th>
				  <th>Date</th>
                  <th>Bill No</th>
				  <th>Bill Amount</th>
				  <th>Payment Mode</th>
                </tr>
                </thead>
                <tbody>
				<?php
			  	$ss="select * from a_final_bill where cname='$customer_id' and FrachiseeId='".$_SESSION['FranchiseeId']."'";
				$Ess=mysqli_query($ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
				 $i++;
				?>
                <tr>
                   <td><?php echo $i;?></td>
                   <td><?php echo $FEssc['cust_name'];?></td>
				   <td><?php echo date('d-m-Y',strtotime($FEss['bill_date']));?></td>
				   <td><?php echo $FEss['inv_no'];?></td>
				   <td><?php echo $FEss['bill_amt'];?></td>
				   <td><?php echo $FEss['ptype'];?></td>
				<?php } ?>				 
                </tr>
				
                </tbody>
              </table>
			  </div>
                </div>				
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
         </div>	      
        </div>

	</section>
	<!--/.Customer History -->
	
	
</div>


<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/


countries = <?php echo $mobile1; ?>;


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("ReferencedMobileNo"), countries);



</script>
  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>

</body>
</html>
