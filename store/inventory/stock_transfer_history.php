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
      Stock Transfer History
      </h1>
	   <h4><div align="right"><a href="stock_transfer.php"><b> New Transfer</b></a></div></h4>  
     </section>
   
   
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
            
              <div class="box-body">
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
				  <th>Date</th>
				   <th>From Unit</th>
				  <th>To Unit</th>
				  <th>Transfer Amount</th>
				   <th>View</th>
				  </tr>
                </thead>
				
                <tbody>
				<?php
					$i=0;		
				$ss="select *  from transfer_main";
				$Ess=mysqli_query($conn,$ss);
				while($FEss=mysqli_fetch_array($Ess))
				{
				$ss1="select * from  m_franchisee where id='".$FEss['ToFranchiseeId']."'";
				$Ess1=mysqli_query($conn,$ss1);
				$FEss1=mysqli_fetch_array($Ess1);
				
				$ss22="select * from  m_franchisee where id='".$FEss['FromFranchiseeId']."'";
				$Ess22=mysqli_query($conn,$ss22);
				$FEss22=mysqli_fetch_array($Ess22);
				
			
					
				$i++;	
								
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['TransferDate']; ?></td>
				   <td><?php  echo $FEss22['franchisee_name']; ?></td>
				  <td><?php  echo $FEss1['franchisee_name']; ?></td>
				  <td><?php  echo $FEss['TransferValue']; ?></td>
				<td><a href="view_trans_hist_details.php?id=<?php echo $FEss['Id']; ?>"><b><i class="fa fa-eye" aria-hidden="true" style="font-size:23px"></i></b></a></td>
							  
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
	
	</form>
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
