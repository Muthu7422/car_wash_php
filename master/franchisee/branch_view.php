<?php
error_reporting(0);
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
        Branch View
        <small>Master</small>
      </h1>
     </section>
	  <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Branch Details Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b> Branch Entry Deactive Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                 Branch <b>already</b> exiting! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
              </div> <?php } ?></div>
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
            
            <!-- /.box-header -->
            <!-- form start -->
		
       <div class="col-md-12">
            
            <div class="box">
            <div class="box-header" >
              <h3 class="box-title">Available Branch</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
				  
                  <th>Branch Name</th>
				  <th>Address</th>
				  <th>Contact Person</th>
				   <th>Contact Number</th>
				     <th>Company Logo</th>
				  <th>Status</th>
				  <th>Edit </th>
				  </tr>
                </thead>
                <tbody>
				<?php
				 $ct="select * from m_franchisee where vendor_id='".$_REQUEST['id']."' AND status='Active' order by franchisee_name";
				$Ect=mysqli_query($conn,$ct);
				$n=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
					
					
				$i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['franchisee_name']; ?></td>
				  <td><?php echo $Fct['address'];  ?></td>
				 
				  <td><?php echo $Fct['cen_manager'];  ?></td>
				    <td><?php echo $Fct['con_number'];  ?></td>
				 <td><img src="<?php echo $Fct['img'];  ?>" height="50" width="50"></td>
				  <td><?php echo $Fct['status'];  ?></td>
				  <td>
                      <a href="branch_edit.php?id=<?php echo $Fct['id']; ?>&&vendor_id=<?php echo $Fct['vendor_id']; ?>" onClick="return confirm('Are You Sure Want to edit?');" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> 
                     
                  </td>

                </tr>
				<?php
				}
				?>
                  </tbody>
                
              </table>
            </div>
			 <div class="box-footer">
			  <a href="franchisee.php"><button type="" name="Back" id="Back" class="btn btn-info" ><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</button></a>
     </div>
            <!-- /.box-body -->
          </div>
              
          
        </div>

      </div>
		
          </div>
        </div>
      </div>
      <div class="row">
        <!-- left column -->
		
        

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