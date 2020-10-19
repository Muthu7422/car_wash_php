<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

$pagename="a_cash_acc_view.php";
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
    Cash Account
        <small>History</small>
      </h1>
	   
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
      <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div align="right"><a href="a_cash_acc.php"><b> CREATE NEW CASH A/C</b></a></div></h4>  
					  <?php } ?>
	    <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
					 
    
	  	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
			 
            <div class="box-header">
              <h3 class="box-title">Available Cash Accounts</h3>
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
                  <th>Date</th>
				  <th>Cash A/C</th>
				  <th>Status</th>
                </tr>
                </thead>
                <tbody>
		<?php
				$ss="select * from a_cash_acc where franchisee_id='".$_SESSION['BranchId']."' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$acc="select SUM(Amount) AS Amount from account_cash where TransactionType='Debit' and franchisee_id='".$_SESSION['BranchId']."' ";
					$sccq=mysqli_query($conn,$acc);
					$acf=mysqli_fetch_array($sccq);
					
					$acc1="select SUM(Amount) AS Amount from account_cash where TransactionType='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
					$sccq1=mysqli_query($conn,$acc1);
					$acf1=mysqli_fetch_array($sccq1);
					
					
					$OB=$FEss['cash']+$acf1['Amount'];
					$open=$OB-$acf['Amount'];
					$i++;
				?>
                <tr>
	              <td><?php echo $i; ?></td>
				  <td><?php  echo date("d-m-Y",strtotime($FEss['cdate'])); ?></td>
				  <td><?php  echo $open; ?></td>
				  <td><?php  echo $FEss['Status']; ?></td>
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