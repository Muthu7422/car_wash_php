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
  <?php include("../../includes_db_css.php"); ?>
   
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
       Edit Petty Types
        <small>Master</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="a_petty_type_editQ.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
				$ss="select * from a_petty_type where id='".$_REQUEST['id']."'";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
			?>
               <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Petty Ledger Type</label>
                  <select type="text" class="form-control" name="LedgerType" id="LedgerType" placeholder="Vehicle Type" value="" onKeyPress="return tabE(this,event)" required>
				  
				  <?php 
				  $lm="select * from m_ledger_group order by ledger_group";
				  $Elm=mysqli_query($conn,$lm);
				  while($FElm=mysqli_fetch_array($Elm))
				  {
					  if($FElm['id']==$FEss['LedgerType'])
					  {
						  ?>
						 <option value="<?php echo $FElm['id']; ?>" selected><?php echo $FElm['ledger_group']; ?></option> 
					  <?php }
					  else
					  {
				  ?>				  
				  <option value="<?php echo $FElm['id']; ?>"><?php echo $FElm['ledger_group']; ?></option>
					  <?php } } ?>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Petty Type</label>
                  <input class="form-control" name="PettyType" id="PettyType" placeholder="Petty Type " value="<?php echo  $FEss['PettyType']; ?>" onKeyPress="return tabE(this,event)">
				   <input type="hidden" class="form-control" name="id" id="id" placeholder="Expenses Type" value="<?php echo  $FEss['id']; ?>" onKeyPress="return tabE(this,event)">
				        </div>
				 <div class="form-group col-sm-4 ">
                  <label for="Branch">Status</label>
                  <select type="text" class="form-control" name="status" id="status" placeholder="Vehicle Type" onKeyPress="return tabE(this,event)" required>
				  <option value="Active">Active</option>
				  <option value="Deactive">Deactive</option>
				  </select>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" >Submit</button>
                </div>    
         </div>
    </form>
	</section>
    <!-- /.content -->
	
	
	
</div>

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
</div>
 <?php include("../../includes_db_js.php"); ?>
 
</body>
</html>
