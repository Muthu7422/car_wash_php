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
        <small>Master</small>
      </h1>
     </section>
<div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Bank Account Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b> Bank Account Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                 Bank Account <b>already</b> exist ! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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
    <form role="form" method="post" action="bank_account_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Account Number *</label>
                  <input type="text" class="form-control" name="AccountNumber" id="AccountNumber" placeholder="Account Number" onKeyPress="return tabE(this,event)" required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Account Name *</label>
                  <input type="text" class="form-control" name="AccountName" id="AccountName" placeholder="Account Name" onKeyPress="return tabE(this,event)" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Bank Name * </label>
                  <select type="text" class="form-control" name="BankName" id="BankName" placeholder="Bank Name" onKeyPress="return tabE(this,event)" required>
				  <option value="">--Select The Bank Name--</option>
				  <?php
				  $Rfd="select * from tblbankname order by bank_name asc";
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
                  <label for="Branch">IFSC Code * </label>
                  <input type="text" class="form-control" name="IFSCCode" id="IFSCCode" placeholder="IFSC Code" onKeyPress="return tabE(this,event)" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">MICR Code</label>
                 <input type="text" class="form-control" name="MICRCode" id="MICRCode" placeholder="MICR Code" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Swift Code </label>
                 <input type="text" class="form-control" name="SwiftCode" id="SwiftCode" placeholder="Swift Code" onKeyPress="return tabE(this,event)">
                </div>
				  </div>
				<div class="box-body">
				<div class="form-group col-sm-4">
                  <label for="Branch">Branch</label>
                  <input type="text" class="form-control" name="Branch" id="Branch" placeholder="Branch" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Opening Balance</label>
                 <input type="text" class="form-control" name="Amount" id="Amount" placeholder="Opening Balance" onKeyPress="return tabE(this,event)">
                </div>
				 
				<div class="form-group col-sm-4">
                <label for="Branch">Ledger Group</label>
				  <select class="form-control" name="ledger_group" id="ledger_group" onKeyPress="return tabE(this,event)">
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
				
				<div class="form-group col-sm-4">
                <label for="Branch">Default Account*</label>				  
				 <select class="form-control" name="default" id="default" onKeyPress="return tabE(this,event)" required>
				  <option value="No">No</option>
				  <option value="Yes">Yes</option>			
				  </select>
                </div>
				
				 
				
				
          
              <!-- /.box-body -->
          </div>
		  <div class="box-body" >
		   <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" onClick="return confirm('Are You Sure Want to Proceed?');">Submit</button>
                </div>    
				 </div>  
              <div class="box-body" hidden>
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				<th>S.No</th>
                <th>Account Number</th>
				<th>Account Name</th>
				<th>Bank Name</th>
				<th>IFSC Code</th>
				<th>MICR Code</th>
				<th>Swift Code</th>
				<th>Branch</th>
				<th>Amount</th>
				<th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from  a_bank_acc where Status='Active' and franchisee_id='".$_SESSION['BranchId']."' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                <td><?php echo $i; ?></td>
				<td><?php echo $FEss['AccountNumber'];  ?></td>
				<td><?php  echo $FEss['AccountName']; ?></td>
				<td><?php  echo $FEss['BankName']; ?></td>
				<td><?php  echo $FEss['IFSCCode']; ?></td>
				<td><?php  echo $FEss['MICRCode']; ?></td>
				<td><?php  echo $FEss['SwiftCode']; ?></td>
				<td><?php  echo $FEss['Branch']; ?></td>
				<td><?php  echo $FEss['Amount']; ?></td>
				<td>
				<a href="bank_account_edit.php?Id=<?php  echo $FEss['Id']; ?>" class="btn-box-tool" Onclick="return confirm('Are You Sure Want to Proceed?')"><i class="fa fa-edit custom-icon1"></i></a> 
				<a href="bank_account_delete.php?id=<?php  echo $FEss['Id']; ?>" class="btn-box-tool" Onclick="return confirm('Are You Sure Want to Delete?')"><i class="fa fa-close custom-icon1"></i></a> 
				</td>
                  
                </tr>
				<?php } ?>
                </tbody>
              </table>
                </div>
            </div>				 
          <!-- /.box -->
        </div>
	   
         </div>
    </form>
       

	</section>
	
	
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
