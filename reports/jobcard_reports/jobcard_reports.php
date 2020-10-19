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
       Job Card Report
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
              <h3 class="box-title">Job Card Reports</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="jobcard_reports_process.php" autocomplete="off">
              <div class="box-body">
                  
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">From</label>
                 <input type="date" name="from" class="form-control pull-right" id="datepicker" value="<?php echo $_SESSION['From'];?>"onKeyPress="return tabE(this,event)">
                </div>
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="duedate">To</label>
                  <input type="date" name="to" class="form-control pull-right" id="datepicker1" value="<?php echo $_SESSION['TO'];?>" onKeyPress="return tabE(this,event)">
                </div>
                   <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">Job Card Status</label>
                <select name="Status" class="form-control pull-right" id="Status" onKeyPress="return tabE(this,event)">
				<option value="<?php echo $_SESSION['Status'];?>"><?php echo $_SESSION['Status'];?></option>
				<option value="All">All</option>
				<option value="Open">Open</option>
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
			
			
		
          </div>
        </div>
      </div>
	  <div>
	   <form action="jobcard_reports_export.php?from=<?php echo $_REQUEST['from']; ?>&to=<?php echo $_REQUEST['to']; ?>&Status=<?php echo $_REQUEST['Status']; ?> "  method="post" name="export_excel">
 
			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">EXPORT JOB CARD REPORT</button>
				</div>
			</div>
		</form>
		</div>
      <div class="row">
        <!-- left column -->
		
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Job card</h3>
            </div>
            <!-- /.box-header -->
               <div class="box-body">
                <div class="form-group col-sm-12">
				<div style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped" width="150%">
                <thead>
                <tr>
				  <th>Sl No</th>
				   <th>JC No</th>
				    <th>Date</th>
                  <th>Vehicle No</th>
				  <th>Customer Name</th>
				  <th>Mobile</th>
				  <th>No Of Visits</th>
				 
				  <th>Print</th>
				   <th>Services </th>
				   <th>Package & Include Services</th>
                </tr>
                </thead>
                <tbody>
					<?php
				if(isset($_REQUEST['from']))
				{
				$i=0;
				if($_REQUEST['Status']=='All')
				{
				 $ss="select * from s_job_card where jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and status='Active' and FranchiseeId='".$_SESSION['BranchId']."'";
				}
				if($_REQUEST['Status']=='Close')
				{
					$ss="select * from s_job_card where jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and status='Active' and FranchiseeId='".$_SESSION['BranchId']."' and jcard_status='Close'";
				}
				if($_REQUEST['Status']=='Open')
				{
					$ss="select * from s_job_card where jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and status='Active' and FranchiseeId='".$_SESSION['BranchId']."' and jcard_status='Open'";
				}
				
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					
					 $nv="select * from s_job_card where (jdate between '".$_REQUEST['from']."' and '".$_REQUEST['to']."') and smobile like '%".trim($FEss['smobile'])."%' and jcard_status='".$FEss['jcard_status']."'"; 
					 $tnv=mysqli_query($conn,$nv);
					 $tnvf=mysqli_fetch_array($tnv);
					 $nor=mysqli_num_rows($tnv);
					 
					 
					 
					 
				$service="select GROUP_CONCAT(service_type) as service_type FROM s_job_card_sdetails WHERE job_card_no='".$FEss['id']."'";
				$serviceq=mysqli_query($conn,$service);
				$servicef=mysqli_fetch_array($serviceq);
			   				 
				$ssc="select DISTINCT(PackageName) AS PackageName from s_job_card_package_service_details where job_card_no='".$FEss['job_card_no']."'";
				$Essc=mysqli_query($conn,$ssc);
				$FEssc=mysqli_fetch_array($Essc);				 
					
			    $sn="select GROUP_CONCAT(service) AS Service from s_job_card_package_service_details where job_card_no='".$FEss['job_card_no']."' and PackageName='".$FEssc['PackageName']."'";
				$snq=mysqli_query($conn,$sn);
				$snf=mysqli_fetch_array($snq);
					 
				$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEss['job_card_no'];?></td>
				  <td><?php echo date("d-m-Y",strtotime($FEss['jdate']));?></td>
				  <td><?php echo $FEss['vehicle_no'];?></td>
				  <td><?php echo $FEss['sname'];?></td>
				  <td><?php echo $FEss['smobile'];?></td>
				   <td><?php echo $nor;?></td>
				 

	              <td><a href="s_jobcard_receipt.php?job_card_no=<?php echo $FEss['job_card_no']; ?>"  onclick="return confirm('Are You Sure Want to Print?');" class="btn-box-tool"><i class="fa fa-print" style="font-size:20px;color:Black"></i></a></td>
				  <td><?php echo $servicef['service_type'];  ?></td>
				  <td><span style="color:red"><b> <?php echo $FEssc['PackageName'];  ?> : </b></span><?php echo $snf['Service'];  ?></td>
				  
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
            <!-- /.box-body -->
          </div>
            
          
        </div>
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