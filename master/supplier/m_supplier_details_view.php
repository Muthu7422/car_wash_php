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
        Supplier
        <small>Master</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_supplier_view.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
				<?php
				$ss="select * from m_supplier where sid='".$_REQUEST['id']."'";
				$Ess=mysqli_query($conn,$ss);
				$FEss=mysqli_fetch_array($Ess);
				?>
			  
			  								<h4 class="box-title">Billing Details |</h4> 

			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Supplier Name</label>
                  <input type="text" class="form-control" name="sname" id="sname" placeholder="Supplier Name" value="<?php echo $FEss['sname']; ?>" required readonly>
				  <input type="hidden" class="form-control" name="sid" id="sid" value="<?php echo $FEss['sid']; ?>">
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Supplier Mobile</label>
                  <input type="text" class="form-control" name="smobile1" id="smobile1" placeholder="Supplier Mobile" value="<?php echo $FEss['smobile1']; ?>" readonly >
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Secondary Mobile</label>
                  <input type="text" class="form-control" name="smobile2" id="smobile2" value="<?php echo $FEss['smobile2']; ?>" placeholder="Secondary Mobile" readonly>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Address</label>
                  <textarea class="form-control" name="saddress" id="saddress" placeholder="Supplier Addres" readonly><?php echo $FEss['saddress'];  ?></textarea>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier City</label>
                  <input type="text" class="form-control" name="scity" id="scity" placeholder="Supplier City" value="<?php echo $FEss['scity']; ?>" readonly>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier State</label>
                <select class="form-control" id="sstate" name="sstate" readonly>
				   <option selected="selected"><?php echo $FEss['sstate']; ?></option>
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
                 <input type="email" class="form-control" name="semail" id="semail" placeholder="Email ID" value="<?php echo $FEss['semail']; ?>" readonly>
                </div>
				
				
				<div class="form-group col-sm-4" hidden>
                  <label for="Branch">Supplying Brand</label>
                  <select class="form-control" id="sbrand" name="sbrand" readonly>
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
				
			
				<?php
				$sto="select ad_amount from sup_outstanding where cust_name='".strtoupper($FEss['sname'])."' order by id desc";
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
                 <input type="text" class="form-control" name="opening_balance" id="opening_balance" placeholder="Opening Balance" value="<?php echo $ttlos; ?>"onKeyPress="return tabE(this,event)" readonly>
                </div>
				
		
				
            </div>
			
			
			
				<h4 class="box-title">Shipping Details |</h4> 
				
				
              <div class="box-body">
			  
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Supplier Name</label>
                  <input type="text" class="form-control" name="shipping_name" id="shipping_name" placeholder="Supplier Name" value="<?php echo $FEss['shipping_name']; ?>" onfocus="CopyBilling();" onKeyPress="return tabE(this,event)" readonly required>
                  <input type="hidden" class="form-control" name="franchisee_id"  id="franchisee_id" value="<?php echo $var['id']; ?>" readonly placeholder="Pid" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly required> 
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Supplier Mobile</label>
                  <input type="text" class="form-control" name="shipping_mobile1" id="shipping_mobile1" value="<?php echo $FEss['shipping_mobile1']; ?>" placeholder="Supplier Mobile" onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Secondary Mobile</label>
                  <input type="text" class="form-control" name="shipping_mobile2" id="shipping_mobile2" value="<?php echo $FEss['shipping_mobile2']; ?>" placeholder="Secondary Mobile" onKeyPress="return tabE(this,event)" readonly>
                </div>
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Address</label>
                  <textarea class="form-control" name="shipping_address" id="shipping_address"  placeholder="Supplier Addres" onKeyPress="return tabE(this,event)" readonly><?php echo $FEss['shipping_address']; ?></textarea>
                </div>
				
					<div class="form-group col-sm-4">
                  <label for="Branch">Supplier City</label>
                  <input type="text" class="form-control" name="shipping_city" id="shipping_city" value="<?php echo $FEss['shipping_city']; ?>" placeholder="Supplier City" onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier State</label>
                <select class="form-control" id="shipping_state" name="shipping_state" onKeyPress="return tabE(this,event)"readonly>
				   <option selected="selected"><?php echo $FEss['shipping_state']; ?></option>
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
                 <input type="email" class="form-control" name="shipping_email" id="shipping_email" value="<?php echo $FEss['shipping_email']; ?>" placeholder="Email ID" onKeyPress="return tabE(this,event)" readonly>
                </div>

</div>


              <div class="box-body">
			  
			  		<div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
				  <select class="form-control" name="ledger_group" id="ledger_group" onKeyPress="return tabE(this,event)" readonly>
				  <?php
				  $lg="select * from m_ledger_group where id='21'";
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
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier GST No</label>
                  <input type="text" class="form-control" name="GstNo" id="GstNo" value="<?php echo $FEss['GstNo']; ?>" onKeyPress="return tabE(this,event)" readonly>
                </div>
				
					<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <textarea class="form-control" name="sdescription" id="sdescription" placeholder="Description" readonly ><?php echo $FEss['sdescription']; ?></textarea>
                </div>
				
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Supplier Ledger Id</label>
                 <input type="text" class="form-control" name="LedgerId" id="LedgerId" placeholder="Supplier Ledger Id" value="<?php echo $FEss['LedgerId']; ?>" onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Status</label>
                  <select class="form-control " id="status" name="status" readonly>
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
                <button type="submit" class="btn btn-info pull-right">Back</button>
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
