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
        Payment Voucher 
        <small>Accounts</small>
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
  
  
</script>	 
  
   
    <!-- Main content -->
	<form role="form" method="post" action="a_voucherQ.php">
    <section class="content container-fluid">
    
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Date </label>
                  <input type="date" class="form-control" name="vdate" id="vdate" value="<?php echo $_POST['vdate']; ?>" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Name</label>
                   <input type="text" class="form-control" name="sname" id="sname" value="<?php echo $_POST['supplier_name']; ?>" required>
				</div>
		
				<div class="form-group col-sm-4">
                  <label for="Branch">Amount</label>
                  <input type="text" class="form-control" name="amount" id="amount" value="<?php echo $_POST['amount']; ?>" required>
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
    
	</section>
    <!-- /.content -->
	
	  <section class="content container-fluid">
	<form class="form-horizontal" method="post" action="a_paymentvoucher_out_act.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create Payment Voucher</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			    <div class="box-body">
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Voucher Id</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="v_id" id="v_id" value="<?php echo $vno; ?>"  readonly="true">
                  </div>
                </div>
				
				 <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Voucher Date</label>
                      <div class="col-sm-3">
                       <div class="input-group date">
                  <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="v_date" class="form-control pull-right" id="v_date" value="<?php echo date("Y-m-d") ?>" onKeyPress="return tabE1(this,event)" autofocus>
                </div>
                </div>
                </div>
                             
					
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Supplier Name</label>
                      <div class="col-sm-3">
                      
                      <select name="cust_name" id="cust_name" class="form-control" onChange="outst();getinvoice(this.value);outst_ad();">
							<?php
						$dep1="select * from m_supplier_master where status='Active' order by supplier_name";
						$dep=mysqli_query($conn,$dep1);
						while($result=mysqli_fetch_array($dep))
						{
						?>
						<option value="<?php echo $result['supplier_name'];?>"><?php echo $result['supplier_name'];?></option>
						<?php
						}
						?>
						</select>
					  
					  </div>
                    </div>  
				  <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Outstanding Amount</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="out_amt" id="out_amt"   placeholder="Outstanding" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required readonly="true">
                      </div>
                    </div> 	 
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Outstanding Invoice</label>
                      <div class="col-sm-3">
						<div name="iname" id="iname">
						</div>
                      </div>
                    </div> 

				
				  <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Advance Amount</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="out_amt_ad" id="out_amt_ad"   placeholder="Advance" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required readonly="true">
                      </div>
                    </div>					
                  <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Receipt Amount</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="amount" id="amount"   placeholder="Amount" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div> 
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Transaction Type</label>
                      <div class="col-sm-8">
						<select name="ttype" id="ttype">
							<option>Cash</option>
							<option>Cheque</option>
							<option>NEFT</option>
						</select>
                      </div>
                    </div> 
              </div>
			  </div> 
              <!-- /.box-body -->
			  
              <div class="box-footer">
			 
                <button type="submit" class="btn btn-default " onClick="javascript:history.go(-1);">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Save Changes</button>
              </div>
              <!-- /.box-footer -->
            
			
          </div>
        </div>
      </div>
      
	</form>
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
