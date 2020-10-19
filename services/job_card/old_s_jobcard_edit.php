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

function sum()
{
    var value1= parseInt(document.getElementById("service_amt").value);
    var value2=parseInt(document.getElementById("gst").value);
	var value3=parseInt(document.getElementById("discount").value);
	var cgst=(value2/100)*value1;
    var sum=value1+cgst-value3;
    document.getElementById("total_amount").value=sum;

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
    <form role="form" method="post" action="s_job_card_edit_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
			<?php
		$dcm="select * from s_job_card where job_card_no='".$_REQUEST['job_card_no']."'";
		$prs=mysqli_query($conn,$dcm);
		$sdm=mysqli_fetch_array($prs); 
			?>
             <div class="box-body">
			
			    <div class="form-group col-sm-4">
			   <label for="catname">Job Card Number</label>
				 <input type="text" class="form-control" name="job_card_no" id="job_card_no" value="<?php echo $sdm['job_card_no']; ?>" required readonly="true">
              
				</div>
				 <div class="form-group col-sm-4">
			   <label for="catname">Date</label>
			      <input type="datetime" class="form-control" name="jdate" id="jdate"  value="<?php echo $sdm['jdate']; ?>" onKeyPress="return tabE(this,event)" readonly required>
				</div>
				 <div class="form-group col-sm-4">
			   <label for="catname">Vehicle Number</label>
                 <select class="form-control js-example-basic-single" name="vehicle_no"  id="vno"   onKeyPress="return tabE(this,event)" required>
				 <option value="<?php echo $sdm['vehicle_no'];?>"><?php echo $sdm['vehicle_no'];?></option>
				  </select>
                </div>
				 <div class="form-group col-sm-4">
			   <label for="catname">Customer Mobile</label>
			 <input type="text" class="form-control" name="smobile" value="<?php echo $sdm['smobile']; ?>" id="smobile" onKeyPress="return tabE(this,event)"  placeholder=" Mobile No" readonly="true">
                </div>
				 <div class="form-group col-sm-4">
			   <label for="catname">Customer Name</label>
			    <input type="text" class="form-control" name="sname"  id="sname"  value="<?php echo $sdm['sname'];?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
				</div>
				 <div class="form-group col-sm-4">
			   <label for="catname">Customer Address</label>
			     <input type="txt" class="form-control" name="saddress" id="saddress"  placeholder="Address" value="<?php echo $sdm['saddress'];?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
                    </div>

				 <div class="form-group col-sm-4">
			   <label for="catname">KMS Driven</label>
			     <input type="txt" class="form-control" name="kms" id="kms"  placeholder="KMS Driven" value="<?php echo $sdm['kms'];?>" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div></div>
				
				 <div class="box-body">
				<h2>Package Details </h2>
			 <div class="form-group col-sm-6">
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
				
				
				 <div class="form-group col-sm-4">
			   <label for="catname">Package Amount</label>

                  <input type="txt" class="form-control" name="pk_amt" id="pk_amt"  placeholder="Service Amount" onKeyPress="return tabE(this,event)" readonly="true">
                </div>

				<div class="form-group col-sm-6">
			   <label for="catname">Repair Advice / action Taken</label>
                   <textarea class="form-control" name="pk_remarks_1" id="pk_remarks_1"  placeholder="Repair Advice / action Taken"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
                 </div>
					 <div class="form-group col-sm-2">
			   <label for="catname"></label>
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" style="background-color:#37B8F8; color:#000000" value="Add Package"   class="form-control" >
                </div>
				</div>
					 <div class="box-body">
				<div class="form-group col-sm-12">
				<div>
					<table border="1" width="100%"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				  <th style="height:40px">S.No</th>
                  <th style="width:400px">Package</th>
				   <th style="width:100px">Package Amount</th>
				   <th>Remarks</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$i=0;
				 $s="select * from s_job_card_pdetails where job_card_no='".$sdm['id']."' and status='Active'";
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
					
				 
				   <td><a href="package_edit_delete .php?id=<?php echo $FEs['id']; ?> && job_card_no=<?php echo $FEs['job_card_no']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                </tr>
				<?php 
				}
				
				 ?>
                  </tbody>
                
              </table>
					</div>
				</div>
						
            </div>
				
				
				 <div class="box-body">
				<h2>Service Details </h2>
			 <div class="form-group col-sm-6">
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
				 <div class="form-group col-sm-4">
			   <label for="catname">Service Amount</label> 
                  <input type="txt" class="form-control" name="st_amt" id="st_amt"  placeholder="Service Amount" onKeyPress="return tabE(this,event)"  readonly="true">

				</div>
				 <div class="form-group col-sm-2">
			   <label for="catname">Qty</label>
           
			    <input type="txt" class="form-control" name="qty" id="qty" value="1"  placeholder="Qty" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                </div>
				 <div class="form-group col-sm-4">
			   <label for="catname">Customer Special Request / comments</label>
				<textarea  class="form-control" name="remarks" id="remarks"  placeholder="Customer Special Request / comments"   onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
				<div class="form-group col-sm-4">
			   <label for="catname">Repair Advice / action Taken</label>
               <textarea class="form-control" name="remarks_1" id="remarks_1"  placeholder="Repair Advice / action Taken"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase"></textarea>
				</div>
					 <div class="form-group col-sm-2">
			   <label for="catname"></label>
             
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" style="background-color:#37B8F8; color:#000000" value="Add Service"  class="form-control" >
            
				  </div>
				</div>
				 <div class="box-body">
				<div class="form-group col-sm-12">
				<div>
					<table border="1" width="100%"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				  <th style="height:40px">S.No</th>
                  <th>Service</th>
				   <th>Service Amount</th>
				  <th>Qty</th>
				   <th>Customer Comments</th>
				   <th>Repair Advice</th>
				  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$i=0;
				 $s="select * from s_job_card_sdetails where job_card_no='".$sdm['id']."' and status='Active'";
				$Es=mysqli_query($conn,$s);
				while($FEs=mysqli_fetch_array($Es))
				{
					$i++;
					
				?>
                <tr>
				  <td style="height:40px"><?php echo $i;  ?></td>
                  <td><?php echo $FEs['service_type'];  ?></td>
				    <td><?php echo $FEs['st_amt'];  ?></td>
					 <td><?php echo $FEs['qty'];  ?></td>
				   <td><?php echo $FEs['remarks'];  ?></td>
				    <td><?php echo $FEs['remarks_1'];  ?></td>
					
				 
				   <td><a href="service_edit_delete.php?id=<?php echo $FEs['id']; ?> && job_card_no=<?php echo $FEs['job_card_no']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                </tr>
				<?php 
				
				}
				 ?>
                  </tbody>
                
              </table>
					</div>
				</div>
					<?php
					
					
				
				$ps="select IFNULL(sum(package_amt),0) as package_amt from s_job_card_pdetails where job_card_no='".$sdm['id']."' and status='Active'";
				$psb=mysqli_query($conn,$ps);
				$pamt=mysqli_fetch_array($psb);
				
				$pw="select IFNULL(sum(st_amt),0) as st_amt from s_job_card_sdetails where job_card_no='".$sdm['id']."' and status='Active'";
				$pse=mysqli_query($conn,$pw);
				$samt=mysqli_fetch_array($pse);
				
				$total=$pamt['package_amt']+$samt['st_amt'];
				 
					?>
					  <div class="form-group col-sm-4">
			   <label for="catname">Total Service Amount</label>
                  <input type="txt" class="form-control" name="total_amt" id="total_amt"  value="<?php echo $total; ?>" readonly onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				</div>	
            </div>
			<br>
			
              	 <div class="form-group">
			   <label for="catname" class="col-sm-3 control-label">FUEL LEVEL</label>
               <div class="col-sm-7">
                
                  <select type="txt" class="form-control" name="fuel" id="fuel"  placeholder="Fuel Level" value="0" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				  <option value="<?php echo $sdm['fuel'] ?>"><?php echo $sdm['fuel'] ?></option>
				  <option>E</option>
				   <option>1/4</option>
				    <option>1/2</option>
					 <option>3/4</option>
					  <option>F</option>
					 
				  </select>
                </div>
				</div>
				<br>
				<br>
				
				  <div class="form-group">
			   <label for="catname" class="col-sm-3 control-label">POST SERVICE FOLLOW - UP</label>
               <div class="col-sm-7">
			    <select type="txt" class="form-control" name="follow" id="follow"  placeholder="POST SERVICE FOLLOW - UP" value="0" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				  <option>YES</option>
				   <option>NO</option>
				  </select>
               </div>
				</div>
				<br>
				<br>
				
				<br>
				<br>
				
				<div class="form-group">
			   <label for="catname" class="col-sm-8 control-label"></label>
               <div class="col-sm-2">
                  <label for="Branch">&nbsp;</label>
                  <button  style="background-color:#C8D8DC;color:#000000" class="form-control" ><a href="s_jobcard_finesh.php?job_card_no=<?php echo $sdm['job_card_no']; ?>">Finesh The JobCard</a></button>
                </div>
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
