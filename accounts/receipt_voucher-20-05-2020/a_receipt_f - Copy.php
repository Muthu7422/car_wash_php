<?php
include("../../includes.php");
include("../../redirect.php");

 $ss1="select * from a_rec_voucher order by id DESC";
$Ess1=mysqli_query($conn,$ss1);
$Fss1=mysqli_fetch_array($Ess1);

 $nid=mysqli_num_rows($Ess1);
 $vno=$nid+1;
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
        Receipt Voucher
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






<script>

function outst(){ 
    var qty = 0;
    var inputs = document.getElementById('cust_name').value;


$.ajax({
      type:'post',
        url:'cust_out.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("out_amt").value=msg;
   
       }
 });

}

function outst_ad(){ 
    var qty = 0;
    var inputs = document.getElementById('cust_name').value;


$.ajax({
      type:'post',
        url:'cust_out_ad.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("out_amt_ad").value=msg;
   
       }
 });

}


function getinvoice(val) {
			$.ajax({
	type: "POST",
	url: "get_invoice_custchk.php",
	data:'country_id='+val,
	success: function(data){
		$("#iname").html(data);
		}
		});
		}


</script> 
  
   <section class="content container-fluid">
	<form class="form-horizontal" method="post" action="a_voucher_out_act.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create Voucher</h3>
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
                      <label for="catname" class="col-sm-3 control-label">Customer Name</label>
                      <div class="col-sm-3">
                      
                      <select name="cust_name" id="cust_name" class="form-control" onChange="outst();getinvoice(this.value);outst_ad();">
					  <option>Select The Customer Name</option>
							<?php
						
						$dep1="select* from a_customer";
						$dep=mysqli_query($conn,$dep1);
						while($result=mysqli_fetch_array($dep))
						{
						?>
						<option value="<?php echo $result['id'];?>"><?php echo $result['cust_name'];?></option>
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
