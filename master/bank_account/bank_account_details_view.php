<?php
error_reporting(0);
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
        Bank Account
        <small>Master View</small>
      </h1>
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
    <form role="form" method="post" action="bank_account_view.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php 
			 $Eds="select * from a_bank_acc where Id='".$_REQUEST['Id']."'"; 
			$Ews=mysqli_query($conn,$Eds);
			$Esw=mysqli_fetch_array($Ews);
			?>
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Account Number</label>
                  <input type="text" class="form-control" name="AccountNumber" id="AccountNumber" value="<?php echo $Esw['AccountNumber']; ?>" onKeyPress="return tabE(this,event)" readonly required>
				   <input type="hidden" class="form-control" name="Id" id="Id" value="<?php echo $Esw['Id']; ?>" onKeyPress="return tabE(this,event)" required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Bank Holder Name</label>
                  <input type="text" class="form-control" name="AccountName" id="AccountName" value="<?php echo $Esw['AccountName']; ?>" onKeyPress="return tabE(this,event)" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Bank Name</label>
                  <select type="text" class="form-control" name="BankName" id="BankName" value="" onKeyPress="return tabE(this,event)" readonly>
				  <option value="<?php echo $Esw['BankName']; ?>"><?php echo $Esw['BankName']; ?></option>
				  <?php
				  $Rfd="select * from tblbankname";
				  $Rfw=mysqli_query($conn,$Rfd);
				  while($Cd=mysqli_fetch_array($Rfw))
				  {
				  ?>
				  <option value="<?php echo $Cd['bank_name']; ?>"><?php echo $Cd['bank_name']; ?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				</div>
			<div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">IFSC Code</label>
                  <input type="text" class="form-control" name="IFSCCode" id="IFSCCode" value="<?php echo $Esw['IFSCCode']; ?>" onKeyPress="return tabE(this,event)" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">MICR Code</label>
                 <input type="text" class="form-control" name="MICRCode" id="MICRCode" value="<?php echo $Esw['MICRCode']; ?>" onKeyPress="return tabE(this,event)" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Swift Code </label>
                 <input type="text" class="form-control" name="SwiftCode" id="SwiftCode" value="<?php echo $Esw['SwiftCode']; ?>" onKeyPress="return tabE(this,event)" readonly>
                </div>
				  </div>
				<div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">Branch</label>
                  <input type="text" class="form-control" name="Branch" id="Branch" value="<?php echo $Esw['Branch']; ?>" onKeyPress="return tabE(this,event)" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Amount</label>
                 <input type="text" class="form-control" name="Amount" id="Amount" value="<?php echo $Esw['Amount']; ?>" onKeyPress="return tabE(this,event)" readonly>
                </div>
				 
				<div class="form-group col-sm-4">
                  <label for="Branch">Ledger Group</label>
				  <select class="form-control" name="ledger_group" id="ledger_group" onKeyPress="return tabE(this,event)" readonly>
				  <?php
				  $lg="select * from m_ledger_group where id='1'";
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
                  <label for="Branch">Bank Ledger Id</label>
				  <input type="text" class="form-control" name="LedgerId" id="LedgerId" placeholder="Bank Ledger Id" value="<?php echo $Esw['LedgerId']; ?>" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Status</label>
                 <select type="text" class="form-control" name="Status" id="Status" onKeyPress="return tabE(this,event)" readonly>
				 <option value="Active">Active</option>
				 <option value="Deactive">Deactive</option>
				 </select>
                </div>
				
					<div class="form-group col-sm-4">
                  <label for="Branch">Default account</label>
                 <select type="text" class="form-control" name="default" id="default"  onKeyPress="return tabE(this,event)" readonly>
				 <option value="No">No</option>
				 <option value="Yes">Yes</option>
				 </select>
                </div>
				
				  </div>
				
				
          
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" >Back</button>
                </div>    
         </div>
    </form>
	</section>
    <!-- /.content -->
</div>
<div class="control-sidebar-bg"></div>
  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
