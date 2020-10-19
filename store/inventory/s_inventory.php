<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);

$pagename="s_inventory.php";
 $spno="SELECT * FROM `t_role_pages` where role_id='".$_SESSION['role_name']."' and pageno IN (SELECT id FROM `t_lmenu`where url like '%$pagename') ORDER BY `id` ASC";
$Espno=mysqli_query($conn,$spno);
$FEspno=mysqli_fetch_array($Espno);
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
       Inventory
      </h1>
	  <?php 
	  if($_SESSION['UserRole']=='admin')
	  {
	  ?> 
	        <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
	   <h4><div align="right"><a href="stock_transfer_history.php"><b> STOCK TRANSFER</b></a></div></h4>  
	  <?php } ?>
	  <?php } ?>
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


function spare(){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name').value;


$.ajax({
      type:'post',
        url:'get.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("spart_no").value=msg;
   
       }
 });

}

function spare1(){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name').value;


$.ajax({
      type:'post',
        url:'get1.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("prate").value=msg;
   
       }
 });

}

function supplier(){ 
    var qty = 0;
    var inputs = document.getElementById('supplier_name').value;


$.ajax({
      type:'post',
        url:'get2.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("out").value=msg;
   
       }
 });

}
  
  
</script>	 
   
   
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
            	  <?php 
					  if($FEspno['ViewData']>'0')
					  {
					  ?>
              <div class="box-body">
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
				    <th>Category</th>
					  <th>Brand</th>
				  <th>Spare Name</th>
				  <th>HSN Code</th>
				   <th>Uom</th>
                  <th>Quantity</th>
				  <th>Minimum Stock</th>
				 
				</tr>
                </thead>
				
                <tbody>
				<?php
							
				$ss="select * from item_stock where FranchiseeId='".$_SESSION['BranchId']."'";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
				
				
				$ss2="select m_spare.*,m_unit_master.u_name from  m_spare JOIN m_unit_master ON m_spare.units=m_unit_master.id AND m_spare.sid='".$FEss['ItemId']."'";
				$Ess2=mysqli_query($conn,$ss2);
				$FEss2=mysqli_fetch_array($Ess2);
				
			 	$ss3="select * from  m_spare_brand where sid='".$FEss2['sbrand']."'"; 
				$Ess3=mysqli_query($conn,$ss3);
				$FEss3=mysqli_fetch_array($Ess3);
				
				$ss4="select * from  m_spare_type where sid='".$FEss2['stype']."'";
				$Ess4=mysqli_query($conn,$ss4);
				$FEss4=mysqli_fetch_array($Ess4);
					
				$i++;	
								
				?>
                <tr>
				<?php
				if($FEss['StockQuantity']>$FEss2['min_stock'])
				{
				?>
					<td><?php  echo $i; ?></td>
					 <td><?php  echo $FEss4['stype']; ?></td>
					 <td><?php  echo $FEss3['sbrand']; ?></td>
					<td><?php  echo $FEss2['sname']; ?></td>
					<td><?php  echo $FEss2['hsn_code']; ?></td>
					<td><?php  echo $FEss2['u_name']; ?></td>
					<td><?php  echo $FEss['StockQuantity']; ?></td>
					<td><?php  echo $FEss2['min_stock']; ?></td>
			<?php
				}
			else
			{
				?>
					<td style="background-color:#F0BFB8"><?php  echo $i; ?></td>
					 <td style="background-color:#F0BFB8"><?php  echo $FEss4['stype']; ?></td>
					 <td style="background-color:#F0BFB8"><?php  echo $FEss3['sbrand']; ?></td>
					<td style="background-color:#F0BFB8"><?php  echo $FEss2['sname']; ?></td>
					<td style="background-color:#F0BFB8"><?php  echo $FEss2['hsn_code']; ?></td>
					<td style="background-color:#F0BFB8"><?php  echo $FEss2['u_name']; ?></td>
					<td style="background-color:#F0BFB8"><?php  echo $FEss['StockQuantity']; ?></td>
					<td style="background-color:#F0BFB8"><?php  echo $FEss2['min_stock']; ?></td>	
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
				<?php
				
				}
				?>
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
