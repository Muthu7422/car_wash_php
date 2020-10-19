<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");


$p="select * from s_job_card";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);
$n=mysqli_num_rows($Ep);
$n1=$n+1;
$pn="JCN".$n1;
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
             <?php if($_REQUEST['u']!="") {?> 
			  <div class="alert alert-warning">
               This  Service Type <b>Updated</b> Successfully!  <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?></div>
			 
  
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_job_card_addQ.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
          
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Job Card Number</label>
                  <input type="text" class="form-control" name="job_card_no" id="job_card_no" value="<?php echo $ps; ?>" required>
                </div>
				
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date </label>
                  <input type="date" class="form-control" name="jdate" id="jdate" onKeyPress="return tabE(this,event)" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Number</label>
                 <select class="form-control js-example-basic-single" name="vehicle_no" autofocus="autofocus" id="vno"  onKeyUp="regno(); mod(); mob();" onChange="regno(); mod(); mob();" onKeyPress="return tabE(this,event)">
				 <option value="">--Select Vehicle No--</option>
				  <?php
				  $vn="select * from a_customer_vehicle_details order by id desc";
				  $vno=mysqli_query($conn,$vn);
				  while($vns=mysqli_fetch_array($vno))
				  {
				  ?>
				  <option value="<?php echo $vns['vehicle_no'];?>"><?php echo $vns['vehicle_no'];?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="text" class="form-control" name="smobile" id="smobile" onKeyPress="return tabE(this,event)"  placeholder=" Mobile No" readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
				       <input type="text" class="form-control" name="sname" autofocus="autofocus" id="sname"  placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Address</label>
                  <input type="txt" class="form-control" name="saddress" id="saddress"  placeholder="Address" onKeyPress="return tabE(this,event)" style="text-transform:uppercase"  readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">KMS Driven</label>
                  <input type="txt" class="form-control" name="kms" id="kms"  placeholder="KMS Driven" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                </div>
				
				<div class="form-group col-sm-8">
                  <label for="Branch">Service Type</label>
                <select class="form-control" id="stype" name="stype" onKeyPress="return tabE(this,event)">
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
                  <label for="Branch">Qty</label>
                  <input type="txt" class="form-control" name="qty" id="qty"  placeholder="Qty" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                </div>
				<div class="form-group col-sm-8">
                  <label for="Branch">Customer Special Request / comments</label>
                  <input type="txt" class="form-control" name="remarks" id="remarks"  placeholder="Customer Special Request / comments"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                </div>
				<div class="form-group col-sm-8">
                  <label for="Branch">Repair Advice / action Taken</label>
                  <input type="txt" class="form-control" name="remarks_1" id="remarks_1"  placeholder="Repair Advice / action Taken"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                </div>
				<div class="form-group col-sm-2">
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" style="background-color:#37B8F8" value="Add"  class="form-control" >
                </div>
				
				<br/>
				<br/>
				 <div class="box-body">
				<div class="form-group col-sm-12">
				<div style="padding-right:250px" >
					<table border="1" width="950" align="center" >
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Service</th>
				   <th>Customer Comments</th>
				   <th>Repair Advice</th>
				  <th>Qty</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				 $s="select * from s_job_card_details_temp";
				$Es=mysqli_query($conn,$s);
				$i=0;
				while($FEs=mysqli_fetch_array($Es))
				{
					$i++;
				?>
                <tr>
				  <td>&nbsp;<?php echo $i;  ?></td>
                  <td>&nbsp;<?php echo $FEs['service_type'];  ?></td>
				   <td>&nbsp;<?php echo $FEs['remarks'];  ?></td>
				    <td>&nbsp;<?php echo $FEs['remarks_1'];  ?></td>
				  <td>&nbsp;<?php echo $FEs['qty'];  ?></td>
				  <td><a href="service_delete.php?id=<?php echo $FEs['id']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                </tr>
				<?php } ?>
                  </tbody>
                
              </table>
					</div>
				</div>
						
            </div>
			
                <div class="form-group col-sm-4">
                  <label for="Branch">FUEL LEVEL</label>
                  <select type="txt" class="form-control" name="fuel" id="fuel"  placeholder="Fuel Level" value="0" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				  <option value="">--Select Fuel Level--</option>
				  <option>E</option>
				   <option>1/4</option>
				    <option>1/2</option>
					 <option>3/4</option>
					  <option>F</option>
					 
				  </select>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">POST SERVICE FOLLOW - UP</label>
                  <select type="txt" class="form-control" name="follow" id="follow"  placeholder="POST SERVICE FOLLOW - UP" value="0" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
				  <option>YES</option>
				   <option>NO</option>
				  </select>
                </div>
				<?php
				$invoice=$pn;
				 $ta=0;
				 	$sa="select * from a_sales_service where job_card_no='$invoice'"; 
				    $Esa=mysqli_query($conn,$sa);
				    while($FEsa=mysqli_fetch_array($Esa))
				    {
				   $a="select * from m_service_type where stype='".$FEsa['service_type']."'"; 
					$Ea=mysqli_query($conn,$a);
					$Fa=mysqli_fetch_array($Ea);
					$tc=$Fa['samount']*$FEsa['qty'];
					$ta=$ta+$tc;
					}
			
					?>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Service Amount</label>
                  <input type="txt" class="form-control" name="service_amt" id="service_amt"  value="<?php echo $ta; ?>"  onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                </div>
			</div>
			
          <!-- /.box -->
       
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>    
         </div> </div>
    </form>
	</section>
    <!-- /.content -->
	
	  <section class="content container-fluid">
       
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
                <div class="box-body">
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Job Card No</th>
				  <th>Date</th>
				  <th>Vehicle No</th>
				  <th>Mobile No</th>
				  <th>Name</th>
				  <th>Address</th>
				    <th>Type</th>
					<th>Status</th>
					 <th>Action</th>
					
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from  s_job_card order by id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $FEss['job_card_no'];  ?></td>
				  <td> <?php echo $FEss['date'];?></td>
				  <td><?php echo $FEss['vehicle_no']; ?></td>
				   <td><?php  echo $FEss['smobile']; ?></td>
				    <td><?php  echo $FEss['sname']; ?></td>
					   <td><?php  echo $FEss['saddress']; ?></td>
					      <td><?php  echo $FEss['stype']; ?></td>
						    <td><?php  echo $FEss['status']; ?></td>

				  <td><a href="s_jobcard_edit.php?id=<?php echo $FEss['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> 
				     
                  
                </tr>
				<?php
				}
				?>
                </tbody>
              </table>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	      
         </div>

	</section>
	
	
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
