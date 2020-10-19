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
        Painter
        <small>Master</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_painter_editQ.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
				<?php
				$ss="select * from m_painters_master where Id='".$_REQUEST['Id']."'";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
				?>
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Painter Name</label>
                  <input type="text" class="form-control" name="PainterName" id="PainterName" value="<?php echo $FEss['PainterName']; ?>" required>
				  <input type="hidden" class="form-control" name="Id" id="Id" value="<?php echo $FEss['Id']; ?>">
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Painter Mobile</label>
                  <input type="text" class="form-control" name="PainterMobile" id="PainterMobile"  value="<?php echo $FEss['PainterMobile']; ?>" >
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Painter Secondary Mobile</label>
                  <input type="text" class="form-control" name="PainterSecondaryMobile" id="PainterSecondaryMobile" value="<?php echo $FEss['PainterSecondaryMobile']; ?>" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Painter GST No</label>
                  <input type="text" class="form-control" name="GstNo" id="GstNo" value="<?php echo $FEss['GstNo']; ?>" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Painter Address</label>
                  <textarea class="form-control" name="PainterAddress" id="PainterAddress"  ><?php echo $FEss['PainterAddress']; ?></textarea>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Painter City</label>
                  <input type="text" class="form-control" name="PainterCity" id="PainterCity"  value="<?php echo $FEss['PainterCity']; ?>" >
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Painter State</label>
                <select class="form-control" id="Painterstate" name="Painterstate">
				   <option value="<?php echo $FEss['Painterstate']; ?>"><?php echo $FEss['Painterstate']; ?></option>
				  <option >TAMILNADU</option>
                  <option>KERALA</option>
				  <option>ANDHRA PRADESH</option>
				  <option>KARNATAKA</option>
				  <option>MAHARASHTRA</option>
				  <option>MADHYA PRADESH</option>
				  <option>UTTAR PRADESH</option>
				  <option>RAJASTHAN</option>
				  <option>BIHAR</option>
				  <option>ODISSA</option>
				  <option>JAMMU & KASHMIR</option>
				  <option>ASSAM</option>
				  <option>HARYANA</option>
				  <option>ARUNACHAL PRADESH</option>
				  <option>GUJARAT</option>
				  <option>CHHATTISGARH</option>
				  <option>GOA</option>
				  <option>HIMACHAL PRADESH</option>
				  <option>JHARKHAND</option>
				  <option>MANIPUR</option>
				  <option>MEGHALAYA</option>
				  <option>MIZORAM</option>
				  <option>NAGALAND</option>
				  <option>PUNJAB</option>
				  <option>SIKKIM</option>
				  <option>TELANGANA</option>
				  <option>TRIPURA</option>
				  <option>UTTARAKHAND</option>
				  <option>WEST BENGAL</option>
				</select>
                </div>
				<div class="col-md-12"></div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Email ID</label>
                 <input type="email" class="form-control" name="PainterEmail" id="PainterEmail"  value="<?php echo $FEss['PainterEmail']; ?>" >
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplying Brand</label>
                  <select class="form-control" id="sbrand" name="sbrand">
				  <?php 
				  $ssc="select * from m_spare_brand where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['sbrand']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <textarea class="form-control" name="sdescription" id="sdescription"  ><?php echo $FEss['sdescription']; ?></textarea>
                </div>
				<?php
				$sto="select ad_amount from sup_outstanding where cust_name='".strtoupper($FEss['PainterName'])."' order by id desc";
				$Esto=mysqli_query($conn,$sto);
				$nr=mysqli_num_rows($Esto);
				if($nr>'0')
				{
					$FEsto=mysqli_fetch_array($Esto);
					$ttlos=$FEsto['ad_amount'];
				}
				else
				{
					$ttlos=0;
				}

				?>
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Opening Balance</label>
                 <input type="text" class="form-control" name="opening_balance" id="opening_balance"  value="<?php echo $ttlos; ?>"onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
				  <select class="form-control" name="ledger_group" id="ledger_group" onKeyPress="return tabE(this,event)">
				  <?php
				  $lg="select * from m_ledger_group where id='23'";
				  $lgr=mysqli_query($conn,$lg);
				  while($lgroup=mysqli_fetch_array($lgr))
				  {
				  ?>
				 
				  <option value="<?php echo $lgroup['id'];?>"><?php echo $lgroup['ledger_group'];?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Painter Ledger Id</label>
                 <input type="text" class="form-control" name="LedgerId" id="LedgerId"  value="<?php echo $FEss['LedgerId']; ?>" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Status</label>
                  <select class="form-control " id="status" name="status">
				   <option value="<?php echo $FEss['status']; ?>" select><?php echo $FEss['status']; ?></option>
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
                <button type="submit" class="btn btn-info pull-right">Submit</button>
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
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
