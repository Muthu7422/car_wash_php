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
      Stock Transfer History Details
      </h1>
	   <h4><div align="right"><a href="stock_transfer_history.php"><b> History</b></a></div></h4>  
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
				  <th>Transfer Item</th>
				  <th>Transfer Quantity</th>
                  <th>MRP</th>
				  <th>Discount Amount</th>
				   <th>Total Amount</th>
				  </tr>
                </thead>
				
                <tbody>
				<?php
					$i=0;		
				$ss="select *  from transfer_sub where TransferId='".$_REQUEST['id']."'";
				$Ess=mysqli_query($conn,$ss);
				while($FEss=mysqli_fetch_array($Ess))
				{
				
				
				$ss22="select * from  m_spare where sid='".$FEss['ItemId']."'";
				$Ess22=mysqli_query($conn,$ss22);
				$FEss22=mysqli_fetch_array($Ess22);
				
			
					
				$i++;	
								
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss22['sname']; ?></td>
				   <td><?php  echo $FEss['TransferQuantity']; ?></td>
				  <td><?php  echo $FEss['ItemMRP']; ?></td>
				  <td><?php  echo $FEss['Discount']; ?></td>
				  <td><?php  echo $FEss['TotalAmount']; ?></td>
						  
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
