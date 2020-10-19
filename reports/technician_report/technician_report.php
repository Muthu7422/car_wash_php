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
     Technician or advisor
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
              <h3 class="box-title">Technician or advisor Report</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="technician_report_print.php" autocomplete="off" target="_blank">
              <div class="box-body">
                  
               <div class="form-group col-sm-3" style="padding-left:60px">
                  <label for="date">From Date</label>
                 <input type="date" name="from" class="form-control pull-right" id="from" onKeyPress="return tabE(this,event)" required>
                </div>
               <div class="form-group col-sm-3" style="padding-left:60px">
                  <label for="date">To Date</label>
                 <input type="date" name="to" class="form-control pull-right" id="to" onKeyPress="return tabE(this,event)" required>
                </div>
				 <div class="form-group  col-sm-3" style="padding-left:60px">
			    <label for="catname">Employee Type</label>
			    <select type="txt" class="form-control" name="ChooseTheOption" id="ChooseTheOption">
				  <option value="">--Select Employee Type--</option>	
				  <option value="Technician">Technician</option>	
				  <option value="Advisor">Advisor</option>	 
				</select>
                </div> 
				<div class="form-group  col-sm-3" style="padding-left:60px">
			    <label for="catname">Choose The Name</label>
			    <select type="txt" class="form-control" name="Name" id="Name">
				  <option value="">--Select Name--</option>
				  <?php 
				  $ssc="select * from h_employee where status='Active' and FrachiseeId='".$_SESSION['BranchId']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['ename']; ?></option>
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