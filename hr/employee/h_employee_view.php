<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

$pagename="h_employee_view.php";
 $spno="SELECT * FROM `t_role_pages` where role_id='".$_SESSION['role_name']."' and pageno IN (SELECT id FROM `t_lmenu`where url like '%$pagename') ORDER BY `id` ASC";
$Espno=mysqli_query($conn,$spno);
$FEspno=mysqli_fetch_array($Espno);

  $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);
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
    Employee
        <small>History</small>
      </h1>
	   
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
      <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div align="right"><a href="h_employee.php"><b> CREATE NEW EMPLOYEE</b></a></div></h4>  
					  <?php } ?>
	    <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
					 
    
	  	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
			 
            <div class="box-header">
              <h3 class="box-title">Available Employees</h3>
            </div>
            <!-- /.box-header -->
		  <?php 
					  if($FEspno['ViewData']>'0')
					  {
					  ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
				  <th>S.No</th>
                  <th>Employee Name</th>
				  <th>Mobile 1</th>
				  <th>City</th>
				  <th>Department</th>
				  <th>Proof Details</th>
				  <th>Action</th>
				   <th>Relieving The Employee</th>
                </tr>
                </thead>
                <tbody>
			<?php
				$em="select * from h_employee where status='Active' and FrachiseeId='".$_SESSION['BranchId']."' order by ename";
				$Eem=mysqli_query($conn,$em);
				$i=0;
				while($Fem=mysqli_fetch_array($Eem))
				{
					$ssc="select * from h_department where status='Active' and id='".$Fem['edepart']."'";
				  $Essc=mysqli_query($ssc);
				  $FEssc=mysqli_fetch_array($Essc);
				$i++;
				?>
                <tr>
	             <td><?php echo $i; ?></td>
				  <td><?php  echo $Fem['ename']; ?></td>
				  <td><?php  echo $Fem['emobile']; ?></td>
				  <td><?php  echo $Fem['ecity']; ?></td>
				  <td><?php  echo $FEssc['dname']; ?></td>
                  <td>
				  <a href="h_employee_proof_detail.php?id=<?php  echo $Fem['id']; ?>" class="btn-box-tool"><i class="fa fa-eye custom-icon1" style="font-size:23px"></i></a>
                     </td>
                  <td>
				  		<?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
					 <a href="h_employee_edit.php?id=<?php  echo $Fem['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1" style="font-size:23px"></i></a>
					  <?php }	 ?>
		  
					    <?php 
					  if($FEspno['DeleteData']>'0')
					  {
					  ?>
					  <a href="h_employee_delete.php?id=<?php echo $Fem['id']; ?>" onClick="return Delete_Click();" class="btn-box-tool" style="font-size:23px"><i class="fa fa-close custom-icon1"></i></a>
					  <?php }	 ?>
                  </td>
				  	   <td align="center">
                      <a href="../relievingletter/r_relievingletter.php?id=<?php  echo $Fem['id']; ?>" title="Edit the Name" onClick="return confirm('Aru You sure Edit?');" class="btn-box-tool"><i class="fa fa-angle-double-right" style="font-size:25px;color:blue"></i></a>
					 
                  </td>
                </tr>
				<?php } ?>
                  </tbody>
                
              </table>
            </div>
				<?php } ?>
            <!-- /.box-body -->
          </div>
            
          
        </div>
      </div>
	        			

     
	  
	
    </section>
    <!-- /.content -->
  
  </div>
 
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
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