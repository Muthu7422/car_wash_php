<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

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
        Spare / Item Brand
        <small>Master</small>
      </h1>
     </section>
 <div class="box-header with-border">
             <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                <strong>Spares Brand  Already Exist!</strong> <i class="fa fa-warning" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b> Spare Brand Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-warning">
                 Spare Brand <b>Updated</b> Successfully! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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
    <form role="form" method="post" action="m_spare_brand_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Spare / Item Category</label>
                  <select class="form-control" id="stype" name="stype" onKeyPress="return tabE(this,event)">
				  <option value="">--Select The Category--</option>
				  <?php 
				  $ssc="select * from m_spare_type where status='Active' and franchisee_id='".$_SESSION['BranchId']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Supplier Name</label>
                 <select class="form-control" id="supplier" name="supplier" onKeyPress="return tabE(this,event)">
				  <option value="">--Select The Supplier--</option>
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
                  <label for="Branch">Spare / Item Brand</label>
                  <input type="text" class="form-control" name="sbrand" id="sbrand" placeholder="Spare Brand" onKeyPress="return tabE(this,event)" required>
                </div>
				
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
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
            
              <div class="box-body" hidden>
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Spare / Item Type</th>
				  <th>Supplier Name</th>
				  <th>Spare / Item Brand</th>
			      <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from  m_spare_brand where status='Active' and franchisee_id='".$_SESSION['BranchId']."' order by sid desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  
				  //echo $FEss['stype'];
					$st="select * from m_spare_type where sid='".$FEss['stype']."'";
					$Est=mysqli_query($conn,$st);
					$FEst=mysqli_fetch_array($Est);
                    
					echo $FEst['stype'];



				  ?></td>
				  <td><?php  
				  //echo $FEss['stype'];
					$st1="select * from m_supplier where sid='".$FEss['supplier']."'";
					$Est1=mysqli_query($conn,$st1);
					$FEst1=mysqli_fetch_array($Est1);
                    
					echo $FEst1['sname'];



				  ?></td>
				  <td><?php  echo $FEss['sbrand']; ?></td>
				 <td><?php  echo $FEss['status']; ?></td>
				  
                  <td>
                      <a href="m_spare_brand_edit.php?id=<?php  echo $FEss['sid']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
					
                  </td>
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
