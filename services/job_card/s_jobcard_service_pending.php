<?php
error_reporting(0);
session_start();
include("../../includes.php");
include("../../redirect.php");

$see="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'"; 
			$absc=mysqli_query($conn,$see);
			$var=mysqli_fetch_array($absc);
			$Seion=$var['franchisee_id'];			 
		
$p="select * from s_job_card where FranchiseeId='".$_SESSION['FranchiseeId']."'";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);
$n=mysqli_num_rows($Ep);
$n1=$n+1;
$pn=$Seion."JCN".$n1;
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


$.ajax({
      type:'post',
        url:'get_amount.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("st_amt").value=msg;
       
       }
 });

}

function getpackageamt(){ 
    var qty = 0;
    var inputs = document.getElementById('ptype').value;


$.ajax({
      type:'post',
        url:'get_pac_amt.php',// put your real file name 
        data:{inputs},
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
	document.getElementById("total_amt_agst").value=including_gst.toFixed(2);
	document.getElementById("DiscountPercentage").value=DiscountPercentage.toFixed(2);
	document.getElementById("totalvalue").value=totalvalue.toFixed(2);
	document.getElementById("balance_amount").value=totalvalue.toFixed(2);
	
	
	
}

function fnBalance()  
{
    var value1= parseInt(document.getElementById("totalvalue").value);
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
       Pending  Services Details
        <small></small>
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
    <form role="form" method="post" action="s_job_card_editQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
			<?php  
            //$nm="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";
			$nm="select * from s_job_card where id='".$_REQUEST['JobcardId']."'";
			$abc=mysqli_query($conn,$nm);
			$temp=mysqli_fetch_array($abc);
			
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
			$mob="select * from a_customer where mobile1='".$_POST['smobile']."'";
			$mobi=mysqli_query($conn,$mob);
			$mobil=mysqli_fetch_array($mobi);
		
			$mob1="select * from a_customer_vehicle_details where cust_no='".$mobil['id']."'";
			$mobi1=mysqli_query($conn,$mob1);
			$mobil1=mysqli_fetch_array($mobi1); 
	}
	else
	{
	$mob1="select * from a_customer_vehicle_details where vehicle_no='".$_POST['vehicle']."'";
	$mobi1=mysqli_query($conn,$mob1);
	$mobil1=mysqli_fetch_array($mobi1); 
		
	$mob="select * from a_customer where id='".$mobil1['cust_no']."'";
	$mobi=mysqli_query($conn,$mob);
	$mobil=mysqli_fetch_array($mobi);
	}

	
			?>
             <div class="box-body hidden">
			
			    <div class="form-group col-sm-4">
			   <label for="catname">Job Card Number</label>
				 <input type="text" class="form-control" name="job_card_no" id="job_card_no" value="<?php echo $ps; ?>" required readonly="true">
                 <input type="hidden" class="form-control" name="job_card_id" id="job_card_id" value="<?php echo $temp['id']; ?>" required readonly="true">
				</div>
				 <div class="form-group col-sm-4">
			   <label for="catname">Date</label>
			      <input type="datetime" class="form-control" name="jdate" id="jdate"  value="<?php echo $temp['jdate']; ?>" onKeyPress="return tabE(this,event)" readonly required>
				</div>
										 
				 <div class="form-group col-sm-4">
			     <label for="catname">Customer Name</label>
			     <input type="text" class="form-control" name="sname"  id="sname"  value="<?php echo $temp['sname'];?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
				 </div>
				 
							 
				 <div class="form-group col-sm-4">
			    <label for="catname">Customer Address</label>
			     <input type="txt" class="form-control" name="saddress" id="saddress"  placeholder="Address" value="<?php echo $temp['saddress'];?> <?php echo $mobil['addr'];?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
                    </div>
                
				<div class="form-group col-sm-4">
			     <label for="catname">Customer Mobile</label>
			     <input type="text" class="form-control" name="smobile" value="<?php echo $temp['smobile'];?>" id="smobile" onKeyPress="return tabE(this,event)"  placeholder=" Mobile No" readonly="true">
                 </div>
				<div class="form-group col-sm-4">
			     <label for="catname">Customer EMail</label>
			     <input type="text" class="form-control" id="smail" name="smail" value="<?php echo $temp['cemail'];?> <?php echo $mobil['email'];?>"  onKeyPress="return tabE(this,event)"  placeholder=" Mobile No" readonly="true">
                 </div>	
				 
				<div class="form-group col-sm-4">
			    <label for="catname">Registration No</label>
                <select class="form-control" name="vehicle_no"  id="vno"  onChange="fnCarModel()"  required>
			    <option value="<?php echo $temp['vehicle_no'];?>"><?php echo $temp['vehicle_no'];?></option>
				</select>
                </div>
				<?php 
				$scm="select * from a_customer_vehicle_details where vehicle_no='".$temp['vehicle_no']."'";
				$Escm=mysqli_query($conn,$scm);
				$FEscm=mysqli_fetch_array($Escm);
				?>
				<div class="form-group col-sm-4">
			     <label for="catname">Car Model</label>
			     <input type="text" class="form-control" id="CarModel" name="CarModel"  onKeyPress="return tabE(this,event)" value="<?php echo $FEscm['vehicle_name'];?>"  placeholder=" Mobile No" readonly="true">
                 </div>
								 
				<div class="form-group col-sm-4">
			    <label for="catname">KMS Driven</label>
			    <input type="text" class="form-control" name="kms" id="kms"  placeholder="KMS Driven" value="<?php echo $temp['kms'];?>" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div></div>
				  <div class="box-body ex3">
				<h2>Package Details </h2>
			    <div class="form-group col-sm-6 hidden">
			    <label for="catname">Package Type</label>
                <select class="form-control" id="ptype" name="ptype" autofocus="autofocus" onKeyPress="return tabE(this,event)" onChange="getpackageamt()">
				<option value="">--Select Package--</option>
				  <?php 
				  $ssc="select * from m_package where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['package_name']; ?>"><?php echo $FEssc['package_name']; ?></option>
				  <?php } ?>
				  </select>
            	</div>
				
				<div class="form-group col-sm-4 hidden">
			    <label for="catname">Package Amount</label>
                  <input type="txt" class="form-control" name="pk_amt" id="pk_amt"  placeholder="Service Amount" onKeyPress="return tabE(this,event)" readonly="true">
                </div>

				<div class="form-group col-sm-6 hidden">
			    <label for="catname">Repair Advice / action Taken</label>
                   <textarea class="form-control" name="pk_remarks_1" id="pk_remarks_1"  placeholder="Repair Advice / action Taken"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
                </div>
				 <div class="form-group col-sm-2 pull-right hidden">
			   <label for="catname"></label>
             
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" id="AddPackage" name="AddPackage" style="background-color:#37B8F8; color:#000000" value="Add Package"  class="form-control " >
            
				  </div>
				<div class="form-group col-sm-12">
				<table width="100%" border="1"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				  <th style="height:40px;"> S.No </th>
                  <th style="width:400px"> Package</th>
				   <th style="width:100px"> Package Amount</th>
				   <th> Remarks</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$i=0;
			   $s="select * from s_job_card_pdetails where job_card_no='".$temp['id']."'";
				$Es=mysqli_query($conn,$s);
				while($FEs=mysqli_fetch_array($Es))
				{
					$i++;
				?>
                <tr>
				 <td style="height:40px"><?php echo $i;  ?></td>
                 <td><?php echo $FEs['package_type'];  ?></td>
				 <td><?php echo $FEs['package_amt'];  ?></td>
				 <td><?php echo $FEs['pac_remarks'];  ?></td>
                </tr>
				<?php 
				}
				?>
                </tbody>
                </table>
				<h2>Include Service </h2>
					<table border="1" width="50%"  style="background-color:#F0F8FF" id="serv">
                <thead>
                <tr>
				   <th style="height:40px;text-align:center"> S.No </th>
                   <th style="text-align:center"> Package Name </th>
				   <th style="text-align:center">  Service  </th>
				   <th style="text-align:center">Service Status</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$i=0;
				$s="select * from s_job_card_package_service_details where JobcardId='".$temp['id']."'";
				$Es=mysqli_query($conn,$s);
				while($FEs=mysqli_fetch_array($Es))
				{
				$i++;
				?>
                <tr style="text-align:center">
				  <td style="height:40px;padding-left:5px"><?php echo $i;  ?></td>
                  <td style="padding-left:5px"> <?php echo $FEs['PackageName'];  ?></td>
				  <td style="padding-left:5px"><?php echo $FEs['Service'];  ?></td>
				  <?php
				  if($FEs['ServiceStatus']=='Pending')
				  {
				  ?>
				  <td><?php echo $FEs['ServiceStatus'];  ?><a href="s_job_card_editQ.php?ServiceStatus=Package&sid=<?php echo $FEs['id']; ?>&job_card_no=<?php echo $_REQUEST['job_card_no']; ?>&JobcardId=<?php echo $_REQUEST['JobcardId']; ?>"  class="btn-box-tool"><i class="fa fa-car" style="font-size:18px;color:red"></i></a></td>
				  <?php 
				  }
				  else
				  {
				 ?>
				  <td><?php echo $FEs['ServiceStatus'];  ?></td>
				 <?php 
				}
				 ?>
                </tr>
				<?php 
				}
				 ?>
                </tbody>
                </table>
				* To Change The Status Please Click <i class="fa fa-car" style="font-size:18px;color:red"></i>
				</div>
				
				</div><br/>
				
				 <div class="box-body ex3" id="services">
				<h2>Service Details </h2>
			   <div class="form-group col-sm-6 hidden">
			   <label for="catname">Service Type</label>
                <select class="form-control" id="stype" name="stype" onKeyPress="return tabE(this,event)" onChange="getamount()">
				<option value="">--Select Service--</option>
				  <?php 
				  $ssc="select * from m_service_type where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['stype']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
                 </div>
				 <div class="form-group col-sm-4 hidden">
    		   <label for="catname">Service Amount</label> 
                <input type="txt" class="form-control" name="st_amt" id="st_amt"  placeholder="Service Amount" onKeyPress="return tabE(this,event)"  readonly="true">
				</div>
				 <div class="form-group col-sm-2 hidden">
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
				
					 <div class="form-group col-sm-2 pull-right hidden">
			   <label for="catname"></label>
             
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" id="AddService" name="AddService" style="background-color:#37B8F8; color:#000000" value="Add Service"  class="form-control " >
            
				  </div>
				<div class="form-group col-sm-12">
					<table border="1" width="100%"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				   <th style="height:40px;text-align:center"> S.No </th>
                   <th style="text-align:center"> Service </th>
				   <th style="text-align:center"> Service Amount </th>
				   <th style="text-align:center"> Qty </th>
				   <th style="text-align:center">Service Status</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$i=0;
				$s="select * from s_job_card_sdetails where job_card_no='".$temp['id']."'";
				$Es=mysqli_query($conn,$s);
				while($FEs=mysqli_fetch_array($Es))
				{
				$i++;
				?>
                <tr style="text-align:center">
				  <td style="height:40px;padding-left:5px"><?php echo $i;  ?></td>
                  <td style="padding-left:5px"> <?php echo $FEs['service_type'];  ?></td>
				  <td style="padding-left:5px"><?php echo $FEs['st_amt'];  ?></td>
				  <td style="padding-left:5px"><?php echo $FEs['qty'];  ?></td>
				  <?php
				  if($FEs['ServiceStatus']=='Pending')
				  {
				  ?>
				  <td><?php echo $FEs['ServiceStatus'];  ?><a href="s_job_card_editQ.php?ServiceStatus=Service&sid=<?php echo $FEs['id']; ?>&job_card_no=<?php echo $_REQUEST['job_card_no']; ?>&JobcardId=<?php echo $_REQUEST['JobcardId']; ?>"  class="btn-box-tool"><i class="fa fa-car" style="font-size:18px;color:red"></i></a></td>
				  <?php 
				  }
				  else
				  {
				 ?>
				  <td><?php echo $FEs['ServiceStatus'];  ?></td>
				 <?php 
				}
				 ?>
                </tr>
				<?php 
				}
				 ?>
                </tbody>
                </table>
				* To Change The Status Please Click <i class="fa fa-car" style="font-size:18px;color:red"></i>
				</div>
				</div>
				<br/>
				 <div class="box-body ex3 hidden">
				<h2>Recommended services  Details </h2>
			 <div class="form-group col-sm-6">
			   <label for="catname">Service Type</label>
                <select class="form-control" id="Rtype" name="Rtype" onKeyPress="return tabE(this,event)" onChange="getramount()">
				<option value="">--Select Service--</option>
				  <?php 
				  $ssc="select * from m_service_type where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['stype']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
                 </div>
				 <div class="form-group col-sm-4">
			   <label for="catname">Service Amount</label> 
                  <input type="txt" class="form-control" name="rst_amt" id="rst_amt"  placeholder="Service Amount" onKeyPress="return tabE(this,event)"  readonly="true">

				</div>
				 <div class="form-group col-sm-2">
			   <label for="catname">Qty</label>
           
			    <input type="txt" class="form-control" name="rqty" id="rqty" value="1"  placeholder="Qty" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                </div>
				
				<div class="hidden">
			    <label for="catname">Customer Special Request / comments</label>
				<textarea  class="form-control" name="rremarks" id="rremarks"  placeholder="Customer Special Request / comments"   onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
				<div class="hidden">
			    <label for="catname">Repair Advice / action Taken</label>
                <textarea class="form-control" name="rremarks_1" id="rremarks_1"  placeholder="Repair Advice / action Taken"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
				
					 <div class="form-group col-sm-2 pull-right">
			   <label for="catname"></label>
             
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" name="AddRecom" id="AddRecom" style="background-color:#37B8F8; color:#000000" value="Add Service"  class="form-control " >
            
				  </div>
				<div class="form-group col-sm-12">
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
				$s="select * from s_job_card_recomdetails where job_card_no='".$temp['id']."'";
				$Es=mysqli_query($conn,$s);
				while($FEs=mysqli_fetch_array($Es))
				{
					$i++;
					
				?>
                <tr>
				  <td style="height:40px;padding-left:5px"><?php echo $i;  ?></td>
                  <td style="padding-left:5px"> <?php echo $FEs['service_type'];  ?></td>
				  <td style="padding-left:5px"><?php echo $FEs['st_amt'];  ?></td>
				  <td style="padding-left:5px"><?php echo $FEs['qty'];  ?></td>
				  <td><a href="recomservice_temp_delete.php?id=<?php echo $FEs['id']; ?> && job_card_no=<?php echo $FEs['job_card_no']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                </tr>
				<?php 
				
				}
				 ?>
                  </tbody>
                
              </table>
			  * To Change The Status Please Click <i class="fa fa-car" style="font-size:18px;color:red"></i>
					</div>
				</div>
				 </div>
				 <br/>
				<?php
								
			 	$pw="select IFNULL(sum(package_amt),0) as package_amt from s_job_card_pdetails where job_card_no='".$temp['id']."'";
				$pse=mysqli_query($conn,$pw);
				$samt=mysqli_fetch_array($pse);
				
				$pw1="select IFNULL(sum(st_amt),0) as st_amt from s_job_card_sdetails where job_card_no='".$temp['id']."'";
				$pse1=mysqli_query($conn,$pw1);
				$samt1=mysqli_fetch_array($pse1);
				
				$pw2="select IFNULL(sum(st_amt),0) as st_amt from s_job_card_recomdetails where job_card_no='".$temp['id']."'";
				$pse2=mysqli_query($conn,$pw2);
				$samt2=mysqli_fetch_array($pse2);
				
				$total=$samt['package_amt']+$samt1['st_amt']+$samt2['st_amt'];
				?>
				
                
				<!-- Panel Start -->
				<?php 
				$sinv="select * from s_job_card_inventory where JobCardId='".$temp['id']."'";
				$Esinv=mysqli_query($conn,$sinv);
				$FEsinv=mysqli_fetch_array($Esinv);
				
				?>
				<div class="panel panel-primary hidden"> 
				<div class="panel-heading"><h3>Inventory </h3></div>
				<div class="panel-body">
				<div class="row">
				<div class="form-group col-sm-6">
			    <input type="checkbox" id="ServiceBooklet" name="ServiceBooklet" value="1"  <?php if($FEsinv['ServiceBooklet']=='1') { ?> checked="true" <?php } ?> > Service Booklet
				</div>
				<div class="form-group col-sm-6">
			    <input type="checkbox" name="Speakers" id="Speakers" value="1" <?php if($FEsinv['Speakers']=='1') { ?> checked="true" <?php } ?> >Speakers
				</div>
				</div>
				
				<div class="row">
				<div class="form-group col-sm-6">
			    <input type="checkbox" id="SpareWheel" name="SpareWheel" value="1" <?php if($FEsinv['SpareWheel']=='1') { ?> checked="true" <?php } ?> > Spare Wheel
				</div>
				<div class="form-group col-sm-6">
			    <input type="checkbox" id="Tweeters" name="Tweeters" value="1" <?php if($FEsinv['Tweeters']=='1') { ?> checked="true" <?php } ?> > Tweeters
				</div>
				</div>
				
				<div class="row">
				<div class="form-group col-sm-6">
			    <input type="checkbox" id="Jack" name="Jack" value="1" <?php if($FEsinv['Jack']=='1') { ?> checked="true" <?php } ?> > Jack
				</div>
				<div class="form-group col-sm-6">
			    <input type="checkbox" id="Clock" name="Clock" value="1" <?php if($FEsinv['Clock']=='1') { ?> checked="true" <?php } ?> > Clock
				</div>
				</div>
				
				<div class="row">
				<div class="form-group col-sm-6">
			    <input type="checkbox" id="ToolKit" name="ToolKit" value="1" <?php if($FEsinv['ToolKit']=='1') { ?> checked="true" <?php } ?> > ToolKit
				</div>
				</div>
				
				<div class="row">
				
			    
				<div class="form-group col-sm-3">
			    <input type="checkbox" id="MirrorsRH" name="MirrorsRH" value="1" <?php if($FEsinv['MirrorsRH']=='1') { ?> checked="true" <?php } ?> > MirrorsRH
				</div>
				<div class="form-group col-sm-3">
			    <input type="checkbox" id="MirrorsLH" name="MirrorsLH" value="1" <?php if($FEsinv['MirrorsLH']=='1') { ?> checked="true" <?php } ?> > MirrorsLH
				</div>
				<div class="form-group col-sm-3">
			    <input type="checkbox" id="MirrorsInner" name="MirrorsInner" value="1" <?php if($FEsinv['MirrorsInner']=='1') { ?> checked="true" <?php } ?> > MirrorsInner
				</div>
				
				
				</div>
				
				<div class="row">
				<div class="form-group col-sm-6">
			    <input type="checkbox" id="MudFlaps" name="MudFlaps" value="1" <?php if($FEsinv['MudFlaps']=='1') { ?> checked="true" <?php } ?> > Mud Flaps
				</div>
				<div class="form-group col-sm-6">
			    <input type="checkbox" id="KeyChain" name="KeyChain" value="1" <?php if($FEsinv['KeyChain']=='1') { ?> checked="true" <?php } ?> > Key Chain
				</div>
				</div>
				
				<div class="row">
				<div class="form-group col-sm-6">
			    <input type="checkbox" id="WheelCaps" name="WheelCaps" value="1" <?php if($FEsinv['WheelCaps']=='1') { ?> checked="true" <?php } ?> > Wheel Caps
				</div>
				<div class="form-group col-sm-6">
			    <input type="checkbox" id="Battery" name="Battery" value="1" <?php if($FEsinv['Battery']=='1') { ?> checked="true" <?php } ?> > Battery
				</div>
				</div>
				
				<div class="row">
				
				<div class="form-group col-sm-2">
			    Tyre
				</div>
			   	<div class="form-group col-sm-2">
			    <input type="checkbox" id="TyreT1" name="TyreT1" value="1" <?php if($FEsinv['T1']=='1') { ?> checked="true" <?php } ?> > T1
				</div>
				<div class="form-group col-sm-2">
			    <input type="checkbox" id="TyreT2" name="TyreT2" value="1" <?php if($FEsinv['T2']=='1') { ?> checked="true" <?php } ?> > T2
				</div>
				<div class="form-group col-sm-2">
			    <input type="checkbox" id="TyreT3" name="TyreT3" value="1" <?php if($FEsinv['T3']=='1') { ?> checked="true" <?php } ?> > T3
				</div>
				<div class="form-group col-sm-2">
			    <input type="checkbox" id="TyreT4" name="TyreT4" value="1" <?php if($FEsinv['T4']=='1') { ?> checked="true" <?php } ?> > T4
				</div>
				<div class="form-group col-sm-2">
			    <input type="checkbox" id="TyreT5" name="TyreT5" value="1" <?php if($FEsinv['T5']=='1') { ?> checked="true" <?php } ?> > T5
				</div>
				
				
				</div>
				
				<div class="row">
				
			    <div class="form-group col-sm-2">
			    MAT
				</div>
				<div class="form-group col-sm-2">
			    <input type="checkbox" id="MatF1" name="MatF1" value="1" <?php if($FEsinv['MatF1']=='1') { ?> checked="true" <?php } ?> > F1
				</div>
				<div class="form-group col-sm-2">
			    <input type="checkbox" id="MatF2" name="MatF2" value="1" <?php if($FEsinv['MatF2']=='1') { ?> checked="true" <?php } ?> > F2
				</div>
				<div class="form-group col-sm-2">
			    <input type="checkbox" id="MatR1" name="MatR1" value="1" <?php if($FEsinv['MatR1']=='1') { ?> checked="true" <?php } ?> > R1
				</div>
				<div class="form-group col-sm-2">
			    <input type="checkbox" id="MatR2" name="MatR2" value="1" <?php if($FEsinv['MatR2']=='1') { ?> checked="true" <?php } ?> > R2
				</div>
				<div class="form-group col-sm-2">
			    <input type="checkbox" id="MatR3" name="MatR3" value="1" <?php if($FEsinv['MatR3']=='1') { ?> checked="true" <?php } ?> > R3
				</div>
				<div class="form-group col-sm-2">
			    <input type="checkbox" id="MatR4" name="MatR4" value="1" <?php if($FEsinv['MatR4']=='1') { ?> checked="true" <?php } ?> > R4
				</div>
				<div class="form-group col-sm-2">
			    <input type="checkbox" id="MatD" name="MatD" value="1" <?php if($FEsinv['MatD']=='1') { ?> checked="true" <?php } ?> > D
				</div>
				
				
				</div>
				<div class="row">
				<div class="form-group col-sm-6">
			    <input type="checkbox" id="Stereo" name="Stereo"  value="1" <?php if($FEsinv['Stereo']=='1') { ?> checked="true" <?php } ?> > Stereo
				</div>
				</div>
				
				
				</div>
				</div> 
				<!-- Panel End -->
	
	<?php 
	$cd="select * from s_job_card where id='".$temp['id']."'";
	$cds=mysqli_query($conn,$cd);
	$xsa=mysqli_fetch_array($cds);
	
	
	?>
             	 <div class="box-body hidden">			
				<div class="form-group col-sm-4">
			    <label for="catname">Total Service Amount</label>
                <input type="txt" class="form-control" name="total_amt" id="total_amt"  value="<?php echo $total; ?>" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				
				<div class="form-group col-sm-4">
			     <label for="Branch">GST</label>
              <select type="text" class="form-control" name="gst" id="gst" onChange="sumgst();" placeholder="GST"> 
			 <option value="">---Select GST---</option>
			  <?php 
			  $ab="select * from m_gst where status='Active'";
			  $abc=mysqli_query($conn,$ab);
			  while($abcd=mysqli_fetch_array($abc))
			  {
			  ?>
			  <option value="<?php echo $abcd['gst'];?>"><?php echo $abcd['gst'];?></option>
			  <?php
			  }
			  ?>
			  </select>
				</div>
				
				<div class="form-group col-sm-4">
			    <label for="catname"> Service Amount After GST</label>
                <input type="txt" class="form-control" name="total_amt_agst" id="total_amt_agst"  value="<?php echo $total; ?>" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>

				<div class="form-group col-sm-4">
			    <label for="catname">Discount Amount (In Rupees)</label>
                <input type="txt" class="form-control" name="DiscountAmount" id="DiscountAmount"  value="0" onKeyPress="return tabE(this,event)" OnKeyUp="sumgst();" style="text-transform:uppercase">
				</div>
				
			
				<div class="form-group col-sm-4">
			    <label for="catname"> Discount % </label>
                <input type="txt" class="form-control" name="DiscountPercentage" id="DiscountPercentage"  value="0" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				<div class="form-group col-sm-4 hidden">
			    <label for="catname"> Discount % </label>
                <input type="txt" class="form-control" name="totalvalue" id="totalvalue"  value="0" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
								
				<div class="form-group col-sm-4">
			    <label for="catname">Advance Amount</label>
                <select type="txt" class="form-control" name="paying_advance" id="paying_advance" onKeyPress="return tabE(this,event)" onChange="getcolor(this.value)">
				<option value="">-Select The Value-</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
				</select>
				</div>
				<div  id="cdetails" name="cdetails" >
				</div>
				
				
				<div class="form-group col-sm-4">
			    <label for="catname">Balance Amount</label>
                <input type="txt" class="form-control" name="balance_amount" id="balance_amount"   readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly="true">
				</div>
				
				<div class="form-group col-sm-4">
			    <label for="catname">Delivery Date</label>
                <input type="date" class="form-control" name="delivery_date" id="delivery_date" value="<?php echo $total; ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				
				<div class="form-group col-sm-4">
			    <label for="catname">Delivery Time</label>
                <input type="time" class="form-control" name="delivery_time" id="delivery_time"  value="<?php echo $total; ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>
				<br>
				<br>
				<div class="form-group col-sm-4">
			    <label for="catname">Remarks / Observations / Damages if any </label>
                <textarea class="form-control" name="remarks_1" id="remarks_1"  placeholder="Remarks / Observations / Damages if any"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
				
				<div class="form-group col-sm-4">
			    <label for="catname">Particular Instructions by Guest if any</label>
				<textarea  class="form-control" name="customer_instructions" id="customer_instructions"  placeholder="Particular Instructions by Guest if any"   onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
				
				<div class="form-group col-sm-4">
			    <label for="catname">Description</label>
				<textarea  class="form-control" name="description" id="description"  placeholder="Description"   onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
						
              	<div class="form-group col-sm-4">
			    <label for="catname">Fuel Level</label>
                <select type="txt" class="form-control" name="fuel" id="fuel"  placeholder="Fuel Level" value="0" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				<option value="">--Select Fuel Level--</option>
				<option>E</option>
				<option>1/4</option>
				<option>1/2</option>
				<option>3/4</option>
				<option>F</option>
				</select>
            	</div>
				</div>
					 <div class="box-body hidden">			
			    <div class="form-group  col-sm-4">
			    <label for="catname">Service Advisor</label>
			    <select type="txt" class="form-control" name="ServiceAdvisor" id="ServiceAdvisor">
				  <option value="">--Select Service--</option>
				  <?php 
				  $ssc="select * from h_employee where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['ename']; ?></option>
				  <?php } ?>
				 
				</select>
                </div>
				   <div class="form-group  col-sm-4">
			    <label for="catname">Technician Name</label>
			    <select type="txt" class="form-control" name="TechnicianName" id="TechnicianName">
				  <option value="">--Select Service--</option>
				  <?php 
				  $ssc="select * from h_employee where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['ename']; ?></option>
				  <?php } ?>
				 
				</select>
                </div> </div>
					<div class="box-body hidden">	
				<div class="form-group col-sm-6">
			    <label for="catname">Customer Service Additional information</label>
                <textarea type="time" class="form-control" name="ServiceAdditionalInfo" id="ServiceAdditionalInfo"  onKeyPress="return tabE(this,event)" rows="5" cols="100" style="text-transform:uppercase"></textarea>
				</div></div>
				<div class="form-group pull-right hidden">
			    <label for="catname" class="col-sm-3 control-label"></label>
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" id="AddJobCard" name="AddJobCard" placeholder="Add" onClick="return confirm('Are You sure Want to Edit?');" style="background-color:#37B8F8;color:#000000" value="Edit Job Card"  class="form-control" >
            	</div>
				</div>
				
			</div>
			
          <!-- /.box -->
       
	    <div class="box-footer">
                
                   
         </div> </div>
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
