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
        Overall Cash Book Summary
        <small>Accounts</small>
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
              <h3 class="box-title"> Overall Cash Book Summary</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="a_cash_report_print.php" autocomplete="off" target="_blank">
              <div class="box-body">                  
               <div class="form-group col-sm-4" style="padding-left:60px">
                 <label for="date">From</label>
                 <input type="date" name="from" class="form-control pull-right" id="from" onKeyPress="return tabE(this,event)">
               </div>
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="duedate">To</label>
                  <input type="date" name="to" class="form-control pull-right" id="to" onKeyPress="return tabE(this,event)">
               </div>                                            
              </div>
              <!-- /.box-body -->
			 
              <div class="box-footer">			 
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" >Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>				
          </div>
        </div>
      </div>
	   
      <div class="row hidden">
	  
		<form action="report_export.php?from=<?php echo $_REQUEST['from']; ?>&to=<?php echo $_REQUEST['to']; ?>"  method="post" name="export_excel">
 
			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">EXPORT BILL REPORT</button>
				</div>
			</div>
		</form>
	  
        <!-- left column -->
		
        <div class="col-md-12">           
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Customers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Bill No</th>
				  <th>Date</th>
				  <th>Customer Name</th>
				  <th>service</th>
                </tr>
                </thead>
                <tbody>
				<?php
				if(isset($_REQUEST['from']))
				{
				$i=0;
				$ct="select * from a_final_bill where bill_date between '".$_REQUEST['from']."' and '".$_REQUEST['to']."'";
				$Ect=mysqli_query($conn,$ct);
				while($Fct=mysqli_fetch_array($Ect))
				{
				  $ct1="select * from a_final_bill_details where inv_no='".$Fct['inv_no']."'";
				 $Ect1=mysqli_query($conn,$ct1);
				 while($Fct1=mysqli_fetch_array($Ect1))
				 {
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['inv_no']; ?></td>
				  <td><?php echo $Fct['bill_date'];  ?></td>
				  <td><?php echo $Fct['cname'];  ?></td>
				  <td><?php echo $Fct1['service'];  ?></td>
                </tr>
				<?php
				  }
				 }
				}
				?>
                  </tbody>
                
              </table>
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