<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");


$p="select * from pending_service";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);
$n=mysqli_num_rows($Ep);
$n1=$n+1;
$dc="PS".$n1;


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
 
 <script>
 
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

function getdate(){ 
    var qty = 0;
    var inputs = document.getElementById('job_card_no').value;



	
       $.ajax({
      type:'post',
        url:'getdates.php',// put your real file name 
        data:{inputs},
		 dataType: 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("pending_days").value=msg[1];
		document.getElementById("date_since").value=msg[0];
	
       
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
        Pending
        <small>Services</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_pending_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
             <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Service Pending Details Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['m']!="") {?> 
			  <div class="alert alert-danger">
              <b> Job Card already in Pending!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  
              <div class="box-body">
			  
				<div class="form-group col-sm-4">
                  <label for="Branch">Peding Service Number</label>
                  <input type="text" class="form-control" name="pending_no" id="pending_no" value="<?php echo $dc ;?>" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
                  <input type="txt" class="form-control" name="pending_date" id="pending_date" value="<?php echo date("Y-m-d")?>" required readonly="true">
                </div>
			<div class="form-group col-sm-4">
                  <label for="Branch">Job Card Number</label>
                 <select class="form-control" name="job_card_no" id="job_card_no" autofocus="focus"  placeholder="Job Card No" onChange="getvehicle();getmobiles();getnames();getdate()">
				  
				   <option value="">--Select Job Card No--</option>
				   <?php
				$snb1="select * from s_job_card";
				$snbr1=mysqli_query($conn,$snb1);
				while($snresult1=mysqli_fetch_array($snbr1))
				{
					$ssdc="select * from a_final_bill_details where job_card_no='".$snresult1['job_card_no']."'";	
					$Essdc=mysqli_query($conn,$ssdc);
					$nrc=mysqli_num_rows($Essdc);

					$ssds="select * from s_job_card_details where job_card_no='".$snresult1['job_card_no']."'";	
					$Essds=mysqli_query($conn,$ssds);
					$nrs=mysqli_num_rows($Essds);
				if($nrc<$nrs)
				{	
					
				
				?> <option value="<?php echo $snresult1['job_card_no'];?>"><?php echo $snresult1['job_card_no'];?></option>
				
				<?php
				}
				
				}
				
				?>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Number</label>
                  <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" placeholder="Vehicle Number" readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Customer Name" readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Pending Since</label>
                  <input type="text" class="form-control" name="date_since" id="date_since"  readonly="true"> 
                </div>
				

				<div class="form-group col-sm-4">
                  <label for="Branch">Pending Days</label>
                  <input type="text" class="form-control" name="pending_days"  id="pending_days" readonly="true" >
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Pending Reason</label>
                  <select class="form-control" name="reason" id="reason"  onchange="if (this.value=='other'){this.form['other'].style.visibility='visible'}else {this.form['other'].style.visibility='hidden'};" required>
				  <option value="">--Select Peding Reason--</option>
				  
				   <option>Spare Not Available</option>
				   <option>Customer Not Available</option>
				   <option>Enginner Not Available</option>
				  <option>Holiday</option>
				  <option value="other">Other Reason</option>
				  </select>
                </div>
			
				<div class="form-group col-sm-12">
                  <label for="Branch"></label>
                  <input type="text" class="form-control" name="other" style="visibility:hidden;"> 
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
