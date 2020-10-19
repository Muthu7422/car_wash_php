<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

$pagename="a_expense_entry_view.php";
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
    Expense Entry
        <small>History</small>
      </h1>
	   
    </section>
  
             
			  
    <!-- Main content -->
    <section class="content container-fluid">
      <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
       <h4><div align="right"><a href="a_expense_entry.php"><b> CREATE NEW EXPENSE ENTRY</b></a></div></h4>  
					  <?php } ?>
	    <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
					 
    
	  	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
			 
            <div class="box-header">
              <h3 class="box-title">Available Expenses</h3>
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
				  <th>Expense Date</th>
                  <th>Ledger Group</th>
				   <th>Expense Type</th>
				   <th>Account No</th>
				  <th>Amount</th>
				  <th>Expense Description</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$ss="select * from expense_details where Status='Active' and franchisee_id='".$_SESSION['BranchId']."' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$set5="select * from m_ledger_group where id='".$FEss['LedgerGroup']."'";
				$Eset5=mysqli_query($conn,$set5);
				$FEset5=mysqli_fetch_array($Eset5); 
				 
				$set6="select * from expense_master where Id='".$FEss['ExpenseType']."'";
				$Eset6=mysqli_query($conn,$set6);
				$FEset6=mysqli_fetch_array($Eset6); 
				
				 $set1="select * from a_bank_acc where Id='".$FEss['AccountNo']."'";
				$Eset2=mysqli_query($conn,$set1);
				$FEset3=mysqli_fetch_array($Eset2); 
					
					$i++;
				?>
                <tr>
	           <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['ExpenseDate']; ?></td>
				  <td><?php  echo $FEset5['ledger_group']; ?></td>
				  <td><?php  echo $FEset6['ExpenseType']; ?></td>
				  <td><?php  echo $FEset3['AccountNumber']; ?></td>
				  <td><?php  echo $FEss['ExpenseAmount']; ?></td>
				   <td><?php  echo $FEss['ExpenseDescription']; ?></td>
				    <td><?php  echo $FEss['Status']; ?></td>
                  <td>
				  		<?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
                    <a href="a_expense_entry_editQ.php?Id=<?php  echo $FEss['Id']; ?>" class="btn-box-tool" onClick="return confirm('Are You Sure Want To Delete?');"><i class="fa fa-trash custom-icon1"></i></a>
					  <?php }	 ?>

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