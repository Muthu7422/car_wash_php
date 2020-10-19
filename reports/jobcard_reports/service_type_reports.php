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
       Service Type 
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
              <h3 class="box-title">Service Type  Reports</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="service_type_reports.php" autocomplete="off">
              <div class="box-body">                  
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">From</label>
                 <input type="date" name="from" class="form-control pull-right" id="datepicker" value="<?php echo $_SESSION['FROM'];?>"onKeyPress="return tabE(this,event)">
                </div>
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="duedate">To</label>
                  <input type="date" name="to" class="form-control pull-right" id="datepicker1" value="<?php echo $_SESSION['TO'];?>" onKeyPress="return tabE(this,event)">
                </div>
                   <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">Service Type</label>
                <select name="Stype" class="form-control pull-right" id="Stype" onKeyPress="return tabE(this,event)">
				
				<option value="All">All</option>
				<?php 
				  $ssc="select * from m_service_type order by stype";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
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
	   <form action="service_type_reports_export.php?from=<?php echo $_REQUEST['from']; ?>&to=<?php echo $_REQUEST['to']; ?>&Stype=<?php echo $_REQUEST['Stype']; ?> "  method="post" name="export_excel">
 
			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">EXPORT REPORT</button>
				</div>
			</div>
		</form>
		</div>
      <div class="row">
        <!-- left column -->
		
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
			 <?php 
			 if($_POST['Stype']=='All')
			 {
				 $SelectedType=$_POST['Stype'];
			 }
			 else
			 {
				 $sst="select * from m_service_type where id='".$_POST['Stype']."'";
				 $Esst=mysqli_query($conn,$sst);
				 $FEsst=mysqli_fetch_array($Esst);
				 $SelectedType=$FEsst['stype'];
			 }
			 ?>			
              <h3 class="box-title"> Job card For <?php echo $SelectedType; ?> Service</h3>
            </div>
            <!-- /.box-header -->
               <div class="box-body">
                <div class="form-group col-sm-12">
				<div style="overflow:auto">
				
                <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
				  <th>Sl No</th>
				  <th>Job Card No</th>
				  <th>Date</th>
                  <th>Vehicle No</th>
				  <th>Customer Name</th>
				  <th>Mobile</th>
				  <th>Print</th>
				  <th >Bill Rs.</th>
				  <th>Cost Rs.</th>	
				<th>Gross Margin</th>	
                </tr>
                </thead>
                <tbody>
				<?php
				// SELECT t1.*,t2.id as jid ,t2.job_card_no as jjcno,t2.vehicle_no as jvno,t2.smobile,t2.sname FROM s_job_card_sdetails t1 LEFT JOIN s_job_card t2 ON t1.job_card_no=t2.id where t1.ServiceId='0'
				if(isset($_POST['Stype']))
				{
				$i=0;
				if($_POST['Stype']=='All')
				{
				 $ss="SELECT t1.*,t2.id as jid ,t2.job_card_no as jjcno,t2.vehicle_no as jvno,t2.smobile,t2.sname,t2.job_card_no as jjob_card_no FROM s_job_card_sdetails t1 LEFT JOIN s_job_card t2 ON t1.job_card_no=t2.id where t1.jdate between '".$_POST['from']."' AND '".$_POST['to']."'";
				}
				else
				{
				 $ss="SELECT t1.*,t2.id as jid ,t2.job_card_no as jjcno,t2.vehicle_no as jvno,t2.smobile,t2.sname,t2.job_card_no as jjob_card_no FROM s_job_card_sdetails t1 LEFT JOIN s_job_card t2 ON t1.job_card_no=t2.id where t1.ServiceId='".$_POST['Stype']."' AND (t1.jdate between '".$_POST['from']."' AND '".$_POST['to']."')";
				}				
				$Ess=mysql_query($ss);
				$i=0;
				while($FEss=mysql_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $FEss['jjob_card_no'];?></td>
				  <td><?php echo date("d-m-Y",strtotime($FEss['jdate']));?></td>
				  <td><?php echo $FEss['jvno'];?></td>
				  <td><?php echo $FEss['sname'];?></td>
				  <td><?php echo $FEss['smobile'];?></td>
	              <td><a href="s_jobcard_receipt.php?job_card_no=<?php echo $FEss['job_card_no']; ?>"  onclick="return confirm('Are You Sure Want to Print?');" class="btn-box-tool"><i class="fa fa-print" style="font-size:20px;color:Black"></i></a></td>
				  <?php
					$sm="SELECT sum(st_amt) as sa, sum(CostPerServices) as cps FROM s_job_card_sdetails where job_card_no='".$FEss['id']."'";
					$Esm=mysqli_query($conn,$sm);
					$FEsm=mysqli_fetch_array($Esm);
				  ?>
				  <td style="text-align:right"><?php echo $FEsm['sa'];?></td>
				  <td style="text-align:right"><?php echo $FEsm['cps'];?></td>
				  <td style="text-align:right"><?php echo number_format(($FEsm['sa']-$FEsm['cps']),2);?></td>
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