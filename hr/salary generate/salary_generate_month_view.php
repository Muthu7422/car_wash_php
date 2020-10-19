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
        Employee Salary Details
        <small>Master</small>
      </h1>
     </section>

	 
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
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Employee Code</th>
				  <th>Employee Name</th>
				  <th>Department</th>
				  <th>Print </th>
                </tr>
                </thead>
                <tbody>
				<?php
				 $em="select * from h_payroll_calculation where month_pay='".$_POST['paymonths']."' and franchisee_id='".$_SESSION['FranchiseeId']."'"; 
				$Eem=mysqli_query($conn,$em);
				$i=0;
				while($Fem=mysqli_fetch_array($Eem))
				{
				$i++;
				?>
				<tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $Fem['e_code']; ?></td>
				  <td><?php  echo $Fem['e_name']; ?></td>
				  <td><?php  echo $Fem['dep']; ?></td>
                  <td>
                      <a href="salary_generate_receipt.php?e_code=<?php  echo $Fem['e_code']; ?> && id=<?php echo  $Fem['id']?>" class="btn-box-tool" target="_blank"><i class="fa fa-print" style="font-size:28px;color:bule"></i></a>
                  </td>
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
