<?php
include("../../includes.php");
include("../../redirect.php");

  $ss1="select * from sup_outstanding order by id DESC";
$Ess1=mysql_query($ss1);
$Fss1=mysql_fetch_array($Ess1);

 $nid=mysql_num_rows($Ess1);
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
 <script>

function outst(){ 
    var qty = 0;
    var inputs = document.getElementById('cust_name').value;


$.ajax({
      type:'post',
        url:'sup_out.php',// put your real file name 
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
        url:'sup_out_ad.php',// put your real file name 
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
	url: "get_invoice_supchk.php",
	data:'country_id='+val,
	success: function(data){
		$("#iname").html(data);
		}
		});
		}


</script> 

<script type="text/javascript">
    function ShowHideDiv() {
        var ttype = document.getElementById("ttype");
        var bank = document.getElementById("bank_details");
		if(ttype.value == "Cheque")
		{
	        bank.style.display = ttype.value == "Cheque" ? "block" : "none";
		}
		else if(ttype.value == 'Neft')
		{
	         bank.style.display = ttype.value == "Neft" ? "block" : "none";
		}
		else if(ttype.value == 'RTGS')
		{
	         bank.style.display = ttype.value == "RTGS" ? "block" : "none";
		}
		else
		{
			
			 bank.style.display = ttype.value == "" ? "block" : "none";
		}
			   // bank.style.display = paymentoption.value == "Neft" ? "block" : "none";
				 // bank.style.display = paymentoption.value == "RTGS" ? "block" : "none";
	 }
	 </script>
	 <script>
	 
		function get_bankid(){ 
    var qty = 0;
    var inputs = document.getElementById('AccountNo').value;

   $.ajax({
      type:'post',
        url:'get_bankdetails.php',// put your real file name //data: {inputs: inputs,pno: pno,pdate:pdate},
       data:{inputs},
		//data:{inputs},
		dataType    : 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("BankId").value=msg[0];
		document.getElementById("LedgerId").value=msg[1];
       
       }
 });

}

	function get_account(val) {
	$.ajax({
	type: "POST",
	url: "acc_details.php",
	data:'country_id='+val,
	success: function(data){
		$("#AccountNo").html(data);
		}
		});
		}
</script>
   
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
					  <option>Select The Supplier Name</option>
							<?php
						$dep1="select distinct(supplier_name) from s_purchase order by supplier_name";
						$dep=mysql_query($dep1);
						while($result=mysql_fetch_array($dep))
						{
							$dcm="select * from m_supplier where sid='".$result['supplier_name']."'";
							$dpm=mysql_query($dcm);
							$pcm=mysql_fetch_array($dpm);
						?>
						<option value="<?php echo $result['supplier_name'];?>"><?php echo $pcm['sname'];?></option>
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
                      <div class="col-sm-3">
						<select name="ttype" id="ttype" class="form-control" onchange = "ShowHideDiv()">
						<option value="">Select the Option</option>
				  <option value="Cash">Cash</option>
				   
				   <option value="Cheque">Cheque</option>
				   <option value="Neft">Neft</option>
				   <option value="RTGS">RTGS</option>
						</select>
                      </div>
                    </div> 
					
					<div class="form-group col-sm-12" id="bank_details" style="display:none">
				
					<div class="form-group col-sm-4">
              <label for="Branch">Bank Name</label>
              <select class="form-control" name="BankName" id="BankName" onChange="get_account(this.value);">
			   <option value="">--Select Bank--</option>
			  <?php
			  $bank="select DISTINCT(BankName) as  BankName from a_bank_acc";
			  $bankq=mysql_query($bank);
			  while($bankfetch=mysql_fetch_array($bankq))
			  {
			  ?>
			 <option value="<?php echo $bankfetch['BankName'];?>"><?php echo $bankfetch['BankName'];?></option>
			  <?php
			  }
			  ?>
			  </select>
                </div>
			  	<div class="form-group col-sm-4">
              <label for="Branch">Account No</label>
              <select class="form-control" name="AccountNo" id="AccountNo" class="form-control" onChange="get_bankid();"></select>
                </div>
				
					<div class="form-group col-sm-4">
              <label for="Branch">Cheque Number</label>
              <input type="number" class="form-control" name="ChequeNumber" id="ChequeNumber" class="form-control">
                </div>
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Bank Id</label>
                  <input type="text" class="form-control" name="BankId" id="BankId" readonly>
                </div>
				
					<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Ledger Id</label>
                  <input type="text" class="form-control" name="LedgerId" id="LedgerId" readonly>
                </div>
				</div>
              </div>
			  </div> 
              <!-- /.box-body -->
			  
              <div class="box-footer">
			 
                <button type="submit" class="btn btn-default " onClick="javascript:history.go(-1);">Cancel</button>
                <button type="submit" class="btn btn-info pull-right"  onClick="return confirm('Are You Sure Want to Proceed?');">Save Changes</button>
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
