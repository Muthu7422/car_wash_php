<?php
include("../../includes.php");
include("../../redirect.php");
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
        Over all Bill Reports
        <small>Master</small>
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
              <h3 class="box-title">Over all bill reports</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="overall_report_process.php" autocomplete="off">
              <div class="box-body">
                  
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date">From</label>
                 <input type="date" name="from" class="form-control pull-right" id="datepicker" onKeyPress="return tabE(this,event)">
                </div>
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="duedate">To</label>
                  <input type="date" name="to" class="form-control pull-right" id="datepicker1" onKeyPress="return tabE(this,event)">
                </div>
				
                          
                  
              </div>
              <!-- /.box-body -->
			 
              <div class="box-footer">
			 
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button  type="submit"class="btn btn-info pull-right" >Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
			
			
		
          </div>
        </div>
      </div>
	  <div>
	   <form action="overall_report_export.php?from=<?php echo $_REQUEST['from']; ?>&to=<?php echo $_REQUEST['to']; ?>"  method="post" name="export_excel">
 
			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">EXPORT OVER ALL BILL REPORT</button>
				</div>
			</div>
		</form>
		</div>
      <div class="row">
        <!-- left column -->
		
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Bill Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div style="overflow:auto">
              <table id="example1" class="table table-bordered table-striped" width="150%">
                <thead>
                <tr>
                  <th width="4px">S.No</th>
                  <th width="40px">Bill No</th>
				  <th width="60px">Date</th>
				  <th width="100px">Customer Name</th>
				  <th width="80px">Vehicle No</th>
				  <th width="170px">Services</th>
				   <th>Package & Include Services</th>
				   <th>Mode of Pay</th>
				   <th>Bill Amount</th>
                </tr>
                </thead>
                <tbody>
				<?php
				if(isset($_REQUEST['from']))
				{
				$i=0;
			     $ct="select * from a_final_bill where bill_date between '".trim($_REQUEST['from'])."' and '".trim($_REQUEST['to'])."' and FrachiseeId='".trim($_SESSION['BranchId'])."'"; 
				$Ect=mysqli_query($conn,$ct);
				while($Fct=mysqli_fetch_array($Ect))
				{
					
				$job="select * from s_job_card where job_card_no='".$Fct['job_card_no']."'"; 
				$jobs=mysqli_query($conn,$job);
				$jobf=mysqli_fetch_array($jobs);
			
				
				
				$na="select * from a_customer where id='".trim($Fct['cname'])."'";
				$naq=mysqli_query($conn,$na);
				$naf=mysqli_fetch_array($naq);				
				
				$service="select GROUP_CONCAT(service_type) as service_type FROM s_job_card_sdetails WHERE job_card_no='".$jobf['id']."'";
				$serviceq=mysqli_query($conn,$service);
				$servicef=mysqli_fetch_array($serviceq);
			   				 
				$ssc="select DISTINCT(PackageName) AS PackageName from s_job_card_package_service_details where job_card_no='".$Fct['job_card_no']."'";
				$Essc=mysqli_query($conn,$ssc);
				$FEssc=mysqli_fetch_array($Essc);				 
					
			    $sn="select GROUP_CONCAT(service) AS Service from s_job_card_package_service_details where job_card_no='".$Fct['job_card_no']."' and PackageName='".$FEssc['PackageName']."'";
				$snq=mysqli_query($conn,$sn);
				$snf=mysqli_fetch_array($snq);
				//if($servicef['service_type']!='' or $FEssc['PackageName']!='')
					if(1==1)
				{
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['inv_no']; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($Fct['bill_date']));  ?></td>
				  <td><?php echo $naf['cust_name'];  ?></td>
				  <td><?php echo $Fct['cvehile'];  ?></td>
				  <td><?php echo $servicef['service_type'];  ?></td>
				   <td><span style="color:red"><b> <?php echo $FEssc['PackageName'];  ?> : </b></span><?php echo $snf['Service'];  ?></td>
				      <td><?php echo $Fct['ptype']; ?></td>
					   <td><?php echo $Fct['Total_bill_Amount']; ?></td>
				  
                </tr>
				<?php
				}
				}
				}
				
				
				?>
                  </tbody>
                
              </table>
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