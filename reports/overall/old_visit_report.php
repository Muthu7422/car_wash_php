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
       Customers Visit 2018
        
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
              <h3 class="box-title">Customers Visit 2018</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="old_report_export.php" autocomplete="off">
              <div class="box-body hidden">
                  
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
			 
                <button type="submit" class="btn btn-default hidden">Cancel</button>
                <button  type="submit" class="btn btn-info pull-right" >EXPORT Customers Visit 2018 to EXCEL</button>
              </div>
              <!-- /.box-footer -->
            </form>
	
            
            <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div style="overflow:auto">
              <table id="example1" class="table table-bordered table-striped" width="140%">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Service Date</th>
				  <th>Customer Name</th>
				  <th>Customer Mobile</th>
				  <th>Vehicle Number</th>
				   <th>Vehicle Model</th>
				  <th>Service Name</th>
                </tr>
                </thead>
                <tbody>
				<?php
				
				$i=0;
				$ct="select * from customer_old_data where CustomerName!='' AND ServiceDate!='0000-00-00' order by ServiceDate";
				$Ect=mysql_query($ct);
				while($Fct=mysql_fetch_array($Ect))
				{
					//date("d-m-Y", strtotime($Fct['ServiceDate']));
				  
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo date("d-m-Y", strtotime($Fct['ServiceDate'])); ?></td>
				  <td><?php echo $Fct['CustomerName'];  ?></td>
				  <td><?php echo $Fct['CustomerMobile'];  ?></td>
				  <td><?php echo $Fct['VehicleNumber'];  ?></td>				 
				  <td><?php echo $Fct['VehicleModel'];  ?></td>
				  <td><?php echo $Fct['ServiceName'];  ?></td>
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