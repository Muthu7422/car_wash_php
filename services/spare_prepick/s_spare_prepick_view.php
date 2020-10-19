<?php
error_reporting(0);
ob_start();
include("../../includes.php");
include("../../redirect.php");


$p="select * from s_spare_prepick";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);
$n=mysqli_num_rows($Ep);
$n1=$n+1;
$pn="SP".$n1;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
        Spares Prepick
        <small>Services</small>
      </h1>
     </section>
  
    <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
              This  <strong>Spares Prepick Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			<div class="alert alert-danger">
              <b>Spares Prepick Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?></div>
				
   
    <!-- Main content -->
  
    <!-- /.content -->
	
	  <section class="content container-fluid">
       
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <div class="box-header">
              <h3 class="box-title">Service Details</h3>
            </div>
              <div class="box-body">
                <div class="form-group col-sm-12">
				<div style="overflow:auto">
				<table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Job Card Number</th>
				  <th>date</th>
				 <th>Vehicle Number</th>
				  <th>mobile</th>
				 <th>name</th>
				 <th>View/Edit</th>
				<th>Delete</th>
						    
                </tr>
                </thead>
                <tbody>
				
                
               	<?php
				$ct="select * from s_spare_prepick where status='Active'";
				$Ect=mysqli_query($conn,$ct);
				 $n=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
				  
					$Red="select * from s_job_card where FranchiseeId='".$Fct['FranchiseeId']."' and id='".$Fct['JobcardId']."'";
					$wsa=mysqli_query($conn,$Red);
					$Ews=mysqli_fetch_array($wsa);
					
				$i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['s_job_card_no'];  ?></td>
				  <td><?php echo $Fct['sdate']; ?></td>
				  <td><?php echo $Fct['vehicle_no']; ?></td>
				  <td><?php echo $Fct['mobile']; ?></td>
				  <td><?php echo $Fct['sname']; ?></td>
				  <?php
				  if($Ews['jcard_status']!='Close')
				  {
				  ?>
				  <td><a href="s_spare_prepick_edit.php?job_card_no=<?php echo $Fct['s_job_card_no']; ?>&&JobcardId=<?php echo $Fct['JobcardId']; ?>" onClick="return confirm('Are You Sure Want to Edit?');" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a></td>
				  <td><a href="s_spare_prepick_delete.php?job_card_no=<?php echo $Fct['s_job_card_no']; ?>&&JobcardId=<?php echo $Fct['JobcardId']; ?>" onClick="return confirm('Are You Sure Want to Delete?');" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
				  <?php
				  }
				  else
				  {
				  ?>
				  <td><a href="s_spare_prepick_edit.php?s_pick_no=<?php echo $Fct['s_pick_no']; ?>" onClick="return confirm('Are You Sure Want to Edit?');" class="btn-box-tool"><a></td>
				  <td><a href="s_spare_prepick_delete.php?s_pick_no=<?php echo $Fct['s_pick_no']; ?>" onClick="return confirm('Are You Sure Want to Delete?');" class="btn-box-tool"></a></td>
				 <?php
				  }
				 ?>
				 </tr>
				<?php
				}
				
				?>
                  
                
				
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