<?php
error_reporting(0);
ob_start();
include("../../includes.php");
include("../../redirect.php");


$p="select * from s_spare_prepick";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);
$n=mysqli_num_rows($Ep);
$n1=$n+1;
$pn="SP".$n1;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
    
  <script>
  
  
  function getMrp(val) {
 var qty = 0;
    var inputs = document.getElementById('sname').value;


$.ajax({
      type:'post',
        url:'getmrp.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("mrp").value=msg;
       
       }
 });

}
	</script>
	<script>
	 function getamt(val) {
	var mrp = document.getElementById("TRate").value;
		var quantity =  document.getElementById("quantity").value;
	 var hra = parseInt((mrp*quantity));
	 document.getElementById("tamount").value = hra; 
	 }
	 
  </script>
 
 <script>


function regno(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card_no').value;


$.ajax({
      type:'post',
        url:'getvno.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("vehicle_no").value=msg;
       
       }
 });

}


function mod(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card_no').value;


$.ajax({
      type:'post',
        url:'getcm.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("mobile").value=msg;
       
       }
 });

}

function mob(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card_no').value;


$.ajax({
      type:'post',
        url:'getcn.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("name").value=msg;
       
       }
 });

}


function service(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card_no').value;


$.ajax({
      type:'post',
        url:'getst.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("service_type").value=msg;
       
       }
 });

}


function getmrp(){ 
    var qty = 0;
    var inputs = document.getElementById('sname').value;


$.ajax({
      type:'post',
        url:'get2.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("mrp").value=msg;
       
       }
 });

}

function getvehicle(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card_no').value;


$.ajax({
      type:'post',
        url:'getvehicleno.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("vehicle_no").value=msg;
       
       }
 });

}

function getmobiles(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card_no').value;


$.ajax({
      type:'post',
        url:'getmobile.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("mobile").value=msg;
       
       }
 });

}


function getnames(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card_no').value;


$.ajax({
      type:'post',
        url:'getname.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("name").value=msg;
       
       }
 });

}


</script>
<script>
function getspare(val) {
	$.ajax({
	type: "POST",
	url: "get_spare.php",
	data:'country_id='+val,
	success: function(data){
		$("#sbrand").html(data);
		}
		});
		}
		
		
function getsparename(val) {
	$.ajax({
	type: "POST",
	url: "get_sparename.php",
	data:'country_id='+val,
	success: function(data){
		$("#sname").html(data);
		}
		});
		}
function gettax(){ 
    var qty = 0;
    var inputs = document.getElementById('sname').value;


$.ajax({
      type:'post',
        url:'get_tax.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("Tax").value=msg;
       
       }
 });

}

function GetWithoutTax()
{
	var mrp1=parseFloat(document.getElementById("mrp").value);
	var tax=parseInt(document.getElementById("Tax").value);
	//alert('hai'+document.getElementById("mrp").value);
	var tpc=(tax/(100+tax))*(mrp1);
	var wtr= mrp1-tpc;
	document.getElementById("TRate").value=wtr.toFixed(2);
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
        Spares Prepick
        <small>Services</small>
      </h1>
     </section>
  
    <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
              This  <strong>Spares Prepick Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			<div class="alert alert-danger">
              <b>Spares Prepick Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?></div>
				
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_spare_prepick_edit_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
			
		 	$nm="select * from s_spare_prepick where s_job_card_no='".$_REQUEST['job_card_no']."' and JobcardId='".$_REQUEST['JobcardId']."'"; 
			$abc=mysqli_query($conn,$nm);
			$main=mysqli_fetch_array($abc);
			?>
              <div class="box-body">
			  <div class="hidden">
                <div class="form-group col-sm-4">
                  <label for="Branch">Pre Pick Number</label>
                  <input type="text" class="form-control" name="pre_pick_no" id="pre_pick_no" value="<?php echo $main['s_pick_no'];?>" readonly="true" required>
                </div>
				 </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date </label>
                  <input type="text" value="<?php echo $main['sdate'];?>" class="form-control" name="date" id="date" readonly required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Job Card Number</label>
                 <input  class="form-control" name="job_card_no" id="job_card_no" value="<?php echo $main['s_job_card_no'];?>"   readonly onChange="getvehicle();getmobiles();getnames()">
				  <input type="hidden" value="<?php echo $main['JobcardId'];?>" class="form-control" name="JobcardId" id="JobcardId" readonly required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Number</label>
                  <input type="text" class="form-control" name="vehicle_no" value="<?php echo $main['vehicle_no'] ?>" id="vehicle_no" placeholder="Vehicle Number" readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $main['mobile'] ?>" placeholder="Mobile" readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo $main['sname'] ?>" placeholder="Customer Name" readonly="true">
                </div>   
				
				</div>
				  <div class="box-body">
					<div class="form-group col-sm-4">
                  <label for="Branch">Spare Category</label>
				  <select class="form-control" id="sdetail" name="sdetail" autofocus="focus" onChange="getspare(this.value)">
				   <option value="">--Select Spare Type--</option>
                   <?php 
				  $ssc="select * from m_spare_type where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
                </div>	
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Brand </label>
                  <select class="form-control" id="sbrand" name="sbrand" onChange="getsparename(this.value)">
				   </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Name</label>
                  <select class="form-control" id="sname" name="sname" onChange="getmrp();gettax();">
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">MRP</label>
                  <input type="text" class="form-control" name="mrp" id="mrp" readonly placeholder="MRP">
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Tax %</label>
                  <input type="text" class="form-control" name="Tax" id="Tax"  placeholder="Tax %" onKeyDown="GetWithoutTax();">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Actual Rate</label>
                  <input type="text" class="form-control" name="TRate" id="TRate" readonly placeholder="Rate">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Quantity</label>
                  <input type="text" class="form-control" name="quantity" id="quantity" placeholder=" Quantity" onKeyUp="getamt(this.val);">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Total Amount Rs.</label>
                  <input type="text" class="form-control" name="tamount" id="tamount" placeholder="Total Amount" readonly="true">
                </div>
				 </div>
                  <button  type="submit" class="btn btn-info pull-right" name="add" id="add">Add</button>
			
               
           
			  </br>
			   </br>
				 <div class="box-body">
				<div class="form-group col-sm-12">
				<div>
					<table border="1" width="75%"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				  <th style="height:40px;width:90px">S.No</th>
                  <th style="width:400px">Spare Name</th>
				   <th style="width:100px">Mrp</th>
				   <th style="width:100px">Qty</th>
				   <th style="width:100px">Total</th>
				  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$i=0;
				 $s="select * from s_spare_prepick_details where s_pick_no='".$main['id']."'";
				$Es=mysqli_query($conn,$s);
				while($FEs=mysqli_fetch_array($Es))
				{
				$i++;	
					
					
				  $ssc="select * from m_spare where sid='".$FEs['spare_name']."'";  
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
					
				?>
                <tr>
				 <td style="height:40px"><?php echo $i;  ?></td>
                <td><?php echo $FEssc['sname'];  ?></td>
				<td><?php echo number_format($FEs['mrp'],2);  ?></td>
				<td><?php echo $FEs['qty'];  ?></td>
				<td><?php echo number_format($FEs['total'],2);  ?></td>
				<td><a href="s_spare_prepick_edit_delete.php?id=<?php echo $FEs['id']; ?> && job_card_no=<?php echo $main['s_job_card_no']; ?>&&JobcardId=<?php echo $main['JobcardId']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                </tr>
				<?php 
				 }
				}
				 ?>
                  </tbody>
                
              </table>
					</div>
				</div>
						
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

	    <div class="box-footer">
               
                <button  type="submit" class="btn btn-info pull-right" name="final" id="final">Submit Spares</button>
                </div>    
         </div>
   
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