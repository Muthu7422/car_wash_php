<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

$p="select * from s_estimate";
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


function regno(){ 
    var qty = 0;
    var inputs = document.getElementById('evehicle_no').value;


$.ajax({
      type:'post',
        url:'getejcn.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("ejcn").value=msg;
       
       }
 });

}


function mob(){ 
    var qty = 0;
    var inputs = document.getElementById('evehicle_no').value;


$.ajax({
      type:'post',
        url:'getemobile.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("emobile").value=msg;
       
       }
 });

}


function names(){ 
    var qty = 0;
    var inputs = document.getElementById('evehicle_no').value;


$.ajax({
      type:'post',
        url:'getename.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("ename").value=msg;
       
       }
 });

}

function eppns(){ 
    var qty = 0;
    var inputs = document.getElementById('evehicle_no').value;


$.ajax({
      type:'post',
        url:'geteppn.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("eppn").value=msg;
       
       }
 });

}

function esces(){ 
    var qty = 0;
    var inputs = document.getElementById('evehicle_no').value;


$.ajax({
      type:'post',
        url:'getesce.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("esce").value=msg;
       
       }
 });

}


function jobcard(){ 
    var qty = 0;
    var inputs = document.getElementById('evehicle_no').value;


$.ajax({
      type:'post',
        url:'getdetail.php',// put your real file name 
        data:{inputs},
		 dataType: 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("ejcn").value=msg[0];
		document.getElementById("emobile").value=msg[1];
		document.getElementById("ename").value=msg[2];
		document.getElementById("eppn").value=msg[3];
       
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
        Estimate
        <small>Services</small>
      </h1>
     </section>
    <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
              This  <strong>Estimate Details Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			<div class="alert alert-danger">
              <b>This Estimate Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?></div>
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_estimate_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
				<div class="form-group col-sm-4">
                  <label for="Branch">Estimate Number</label>
                  <input type="text" class="form-control" name="eno" id="eno" value="<?PHP echo $pn; ?>" placeholder="Estimate Number" required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="date" class="form-control" name="edate" id="edate" placeholder="DATE" required>
                </div>
					<div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Number</label>
                 <select class="form-control" name="evehicle_no" id="evehicle_no" autofocus="focus"  placeholder="Vehicle Number" onKeyUp="jobcard()" onChange="jobcard()">
				  
				   <option value="">--Vehicle Number--</option>
				  <?php
				  $jn="select * from s_spare_prepick order by id desc";
				  $jno=mysqli_query($conn,$jn);
				  while($jns=mysqli_fetch_array($jno))
				  {
				  ?>
				  <option value="<?php echo $jns['vehicle_no'];?>"><?php echo $jns['vehicle_no'];?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Job Card Number</label>
                  <input type="text" class="form-control" name="ejcn" id="ejcn" placeholder="Job Card Number" readonly="true">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="text" class="form-control" name="emobile" id="emobile" placeholder=" Mobile" readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <input type="text" class="form-control" name="ename" id="ename" placeholder="Customer Name" readonly="true">
                </div>
                <div class="form-group col-sm-4">
                  <label for="Branch">Spre Pick Number</label>
                  <input type="text" class="form-control" name="eppn" id="eppn" placeholder="Pre Pick Number" readonly="true">
                </div>
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Cost Estimation</label>
                  <input type="text" class="form-control" name="esce" id="esce" placeholder="Spare Cost Estimation">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Labour Charge Estimation</label>
                  <input type="text" class="form-control" name="elce" id="elce" placeholder="Labour Charge Estimation" onKeyUp="getce(this.val)" >
                </div>
                <div class="form-group col-sm-4">
                  <label for="Branch">Total Cost Estimation</label>
                  <input type="text" class="form-control" name="tce" id="tce" placeholder="Total Cost Estimation" readonly="true" >
                </div>		
				
				<div class="form-group col-sm-12">
                  <label for="Branch">Remarks</label>
                  <input type="text" class="form-control" name="remarks" id="remarks" placeholder="REMARKS" >
                </div>				
								
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		
		
		<div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>    
         </div>
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
				<div style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
				  <th>Sl No</th>
				   <th>Estimate No</th>
                  <th>Vehicle No</th>
				  <th>Job Card No</th>
				  <th>Mobile</th>
				  <th>Name</th>
				  <th>Pre Pick No</th>
				  <th>Spare Cost Estimation</th>
				  <th>Labour Charge Estimation</th>
				  <th>Total Cost Estimation</th>
				  <th>Print</th>
				  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
					<?php
				$ss="select * from s_estimate order by id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEss['eno'];?></td>
				  <td><?php echo $FEss['evehicle_no'];?></td>
				  <td><?php echo $FEss['ejcn'];?></td>
				  <td><?php echo $FEss['emobile'];?></td>
				  <td><?php echo $FEss['ename'];?></td>
				  <td><?php echo $FEss['eppn'];?></td>
				  <td><?php echo $FEss['esce'];?></td>
				  <td><?php echo $FEss['elce'];?></td>
				  <td><?php echo $FEss['tce'];?></td>					
				  <td><a href="s_estimate_receipt.php?eno=<?php echo $FEss['eno']; ?>"  onclick="return confirm('Are You Sure Want to Print?');" class="btn-box-tool"><i class="fa fa-print" style="font-size:20px;color:Black"></i></a></td>													 <td>
				  <a href="s_estimate_delete.php?id=<?php echo $FEss['id']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
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
	<section class="content container-fluid">
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
