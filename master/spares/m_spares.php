<?php
ob_start();
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);


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
        Spare  / Item
        <small>Master</small>
      </h1>
     </section>
 <div class="box-header with-border">
             <?php if(isset($_REQUEST['s'])!='') {?> 
			  <div class="alert alert-success">
                <strong>Company Entry Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if(isset($_REQUEST['d'])!="") {?> 
			  <div class="alert alert-success">
              <b> Company Entry Update Successfully!<i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if(isset($_REQUEST['a'])!='') {?> 
			  <div class="alert alert-warning">
                 Customer <b>already</b> exiting! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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
function getspare(val) {
	$.ajax({
	type: "POST",
	url: "get_spare.php",
	data:'country_id='+val,
	success: function(data){
		$("#sbrand").html(data);
		}
		});
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
    <form role="form" method="post" action="m_spares_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Spare /Item Type</label>
				  <select class="form-control" id="stype" name="stype" onChange="getspare(this.value)" required >
				  <option value="">--Select Type--</option>
                   <?php 
				  $ssc="select * from m_spare_type where status='Active'and franchisee_id='".$_SESSION['BranchId']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
	
				
				
					<div class="form-group col-sm-4">
                  <label for="Branch">Spare / Item Brand  </label>
                <select class="form-control" id="sbrand" name="sbrand" onKeyPress="return tabE(this,event)" required>
				  <option value="">--Select The Brand--</option>
				   <?php 
				  $ssc="select * from m_spare_brand where status='Active' and franchisee_id='".$_SESSION['BranchId']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['sbrand']; ?></option>
				  <?php } ?>
				</select>
                </div>
				
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare / Item Name</label>
                  <input type="text" class="form-control" name="sname" id="sname" placeholder="Spare Name" onKeyPress="return tabE(this,event)" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Units  </label>
                <select class="form-control" id="units" name="units" onKeyPress="return tabE(this,event)" required>
				  <option value="">--Select Unit--</option>
				   <?php 
				  $ssc="select * from m_unit_master where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['u_name']; ?></option>
				  <?php } ?>
				</select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare / Item Part No</label>
                   <input type="text" class="form-control" name="spartno" id="spartno" placeholder="Spare Part" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">HSN Code</label>
                   <input type="text" class="form-control" name="hsn" id="hsn" placeholder="hsn" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">M.R.P</label>
                  <input type="text" class="form-control" name="smrp" id="smrp" placeholder="Enter MRP" required onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare / Item Supplier </label>
                <select class="form-control" id="ssupplier" name="ssupplier" onKeyPress="return tabE(this,event)">
				<option value="">--Select Supplier--</option>
				   <?php 
				  $ssc="select * from m_supplier where status='Active' and franchisee_id='".$_SESSION['BranchId']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['sname']; ?></option>
				  <?php } ?>
				</select>
                </div>
					<div class="form-group col-sm-4">
                  <label for="Branch">Minimum stock level</label>
                  <input type="text" class="form-control" name="min_stock" id="min_stock" placeholder="Enter Minimum stock level" required onKeyPress="return tabE(this,event)">
                </div>	
					<div class="form-group col-sm-4">
                  <label for="Branch">Spare Tax %</label>
                  <input type="text" class="form-control" name="TaxRate" id="TaxRate" placeholder="Spare Tax %"  onKeyPress="return tabE(this,event)">
                </div>					
				
				
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" onClick="return confirm('Are You Sure Want to Save?');">Submit</button>
                </div>    
         </div>
    </form>
	</section>
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
                  <th>Spare / Item Name</th>
				  <th>MoU</th>
				  <th>Spare / Item Type</th>
				  <th>Brand / Item</th>
				  <th>Part No</th>
				  <th>M.R.P</th>
				  <th>Min.Stock</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				$ss="select * from  m_spare where franchisee_id='".$_SESSION['BranchId']."' order by sid desc";
				$Ess=mysqli_query($conn,$ss);
				
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $FEss['sname'];  ?></td>
				  <td><?php
					$su="select * from m_unit_master where id='".$FEss['units']."'";
					$Esu=mysqli_query($conn,$su);
					$FEsu=mysqli_fetch_array($Esu);

				  echo $FEsu['u_name'];  ?></td>
				  <td>
				  <?php  
				  //echo $FEss['stype'];
					$st="select * from m_spare_type where sid='".$FEss['stype']."'";
					$Est=mysqli_query($conn,$st);
					$FEst=mysqli_fetch_array($Est);
					echo $FEst['stype'];
				  ?>
				  
				  </td>
				  <td><?php 
					$st="select * from m_spare_brand where sid='".$FEss['sbrand']."'";
					$Est=mysqli_query($conn,$st);
					$FEst=mysqli_fetch_array($Est);
                    
					  echo $FEst['sbrand'];

				  ?></td>
				   <td><?php  echo $FEss['spartno']; ?></td>
				    <td><?php  echo $FEss['smrp']; ?></td>
					<td><?php  echo $FEss['min_stock']; ?></td>
					<td><?php  echo $FEss['status']; ?></td>
				  <td><a href="m_spares_edit.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> 
                  
                </tr>
				<?php } ?>
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
