<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
   
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
      Vehicle Service Status
        <small>Report</small>
      </h1>
     </section>
<script>
function Delete_Click() {
    var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        return true;
    }
	else
		return false;
}  
  
  
</script>	
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
</script> 

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Vehicle Service Status Reports</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="vehicle_service_process.php" autocomplete="off">
              <div class="box-body">
                  
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">From</label>
                 <input type="date" name="from" class="form-control pull-right" id="datepicker"  value="<?php echo $_SESSION['from'];?>" onKeyPress="return tabE(this,event)">
                </div>
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="duedate">To</label>
                  <input type="date" name="to" class="form-control pull-right" id="datepicker1"  value="<?php echo $_SESSION['to'];?>" onKeyPress="return tabE(this,event)">
                </div>
                   <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">Job Card Status</label>
                <select name="ServiceStatus" class="form-control pull-right" id="ServiceStatus" onKeyPress="return tabE(this,event)">
				<option value="<?php echo $_SESSION['ServiceStatus'];?>"><?php echo $_SESSION['ServiceStatus'];?></option>
				<option value="Open">Open</option>	
				  <option value="Ready To Delivery">Ready To Delivery</option>
                  <option value="Close">Close</option>		
				</select>
                </div>    

      
              </div>
              <!-- /.box-body -->
			 
              <div class="box-footer">
			 
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button  type="submit" class="btn btn-info pull-right" >Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
			
			 <form action="vehicle_service_export.php?from=<?php echo $_REQUEST['from']; ?>&to=<?php echo $_REQUEST['to']; ?>&ServiceStatus=<?php echo $_REQUEST['ServiceStatus']; ?> "  method="post" name="export_excel">
 
			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">EXPORT SERVICE DETAILS REPORT</button>
				</div>
			</div>
		</form>
		
          </div>
		  
        </div>
      </div>
	   <div class="row">
        <!-- left column -->
		
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div style="overflow:auto">
              <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                   <th>S.No</th>
                  <th>Job Card Number</th>
				  <th>Customer Name</th>
				  <th>Vehicle Number</th>
				   <th>Mobile</th>
				  <th>Amount</th>
				  
                </tr>
                </thead>
                <tbody>
				<?php
				$fdate=$_REQUEST['from'];
				$tdate=$_REQUEST['to'];
				$i=0;
			   
			    $ss="select * from s_job_card where jcard_status='".$_REQUEST["ServiceStatus"]."' and jdate between '$fdate' and '$tdate' and FranchiseeId='".$_SESSION['BranchId']."'  order by id desc";
				
				$Ess=mysqli_query($conn,$ss);
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
              
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $FEss['job_card_no']; ?></td>
				  <td><?php echo $FEss['sname']; ?></td>
				  <td><?php echo $FEss['vehicle_no'];  ?></td>
				  <td><?php echo $FEss['smobile']; ?></td>
				  <td><?php echo $FEss['total_amt']; ?></td>
                </tr>
				<?php				
			      }				
				?>
                  </tbody>
                
              </table>
			  </div>
            </div>
	  <div>
	  
		</div>
		</div>
		</div>
      <div class="row">
        <!-- left column -->
		
   
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
	 
	 
     user experience. -->
	  <?php include("../../footer.php"); ?>
  <!--footer End-->
 <div class="control-sidebar-bg"></div>
 <?php include("../../includes_db_js.php"); ?>
</body>
</html>