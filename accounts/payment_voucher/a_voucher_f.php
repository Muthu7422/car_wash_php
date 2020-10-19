<?php
include("../../includes.php");
include("../../redirect.php");

  $ss1="select * from payment_voucher ";
  $Ess1=mysqli_query($conn,$ss1); 
  $nid=mysqli_num_rows($Ess1);
  $Fss1=mysqli_fetch_array($Ess1);
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
        Payment Voucher<small>Accounts</small>
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
		var Cash = document.getElementById("Cash_details");
		var Cheque = document.getElementById("Cheque_details");
		if(ttype.value == "bank")
		{
	        bank.style.display = ttype.value == "bank" ? "block" : "none";
		    Cash.style.display = ttype.value == "" ? "block" : "none";
		    Cheque.style.display = ttype.value == "" ? "block" : "none";
		}
		else if(ttype.value == "Cash")
		{
	         Cash.style.display = ttype.value == "Cash" ? "block" : "none";
		     bank.style.display = ttype.value == "" ? "block" : "none";			 
		     Cheque.style.display = ttype.value == "" ? "block" : "none";
		}
		else if(ttype.value == "Cheque")
		{
	         Cheque.style.display = ttype.value == "Cheque" ? "block" : "none";
		     Cash.style.display = ttype.value == "" ? "block" : "none";
			 bank.style.display = ttype.value == "" ? "block" : "none";	
		}
		/* else
		{
			 Cash.style.display = ttype.value == "" ? "block" : "none";
			 bank.style.display = ttype.value == "" ? "block" : "none";			 
		     Cheque.style.display = ttype.value == "" ? "block" : "none";
		} */
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
	 
function getCash(val) {
	var ttype = document.getElementById('ttype').value;
	var cust_name = document.getElementById('cust_name').value;
	
	$.ajax({
	type: "POST",
	url: "get_cash.php",
	data: {ttype: ttype},
	success: function(data){
		$("#cdetails").html(data);
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
                      <label for="catname" class="col-sm-3 control-label">Ledger Name</label>
                      <div class="col-sm-3">
                      
                      <select name="cust_name" id="cust_name" class="form-control" onChange="outst();getinvoice(this.value);outst_ad();">
					  <option>Select The ledger Name</option>
							<?php
						$dep1="select * from m_ledger order by id";
						$dep=mysqli_query($conn,$dep1);
						while($result=mysqli_fetch_array($dep))
						{
							?>
						<option value="<?php echo $result['Id'];?>"><?php echo $result['LedgerName'];?></option>
						<?php
						}
						?>
						</select>
					  
					  </div>
                    </div>  
				    <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Closing Balance</label>
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

				
				     <div class="form-group hidden">
                      <label for="catname" class="col-sm-3 control-label">Advance Amount</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="out_amt_ad" id="out_amt_ad"   placeholder="Advance" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required readonly="true">
                      </div>
                     </div>	
					
                     <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Paid Amount</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="amount" id="amount"   placeholder="Amount" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                     </div> 
					
					 <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Transaction Type</label>
                      <div class="col-sm-3">
						<select name="ttype" id="ttype" class="form-control" onchange="ShowHideDiv();getCash(this.value);">
						<option value="Select the Option">Select the Type</option>
				        <option value="Cash">Cash</option>				   
				        <option value="bank">Bank</option>
				        <option value="Cheque">Cheque</option>
						</select>
                      </div>
                    </div>
                 				
			    <div class="form-group col-sm-12" id="Cash_details" style="display:none">			 				 
				 <div class="form-group col-sm-4" >
                  <label for="Branch">Balance Amount</label>
                  <input type="text" class="form-control" name="cdetails" id="cdetails" class="form-control" readonly>
                 </div>	

                 <div class="form-group col-sm-4">
                  <label for="Branch">Amount</label>
                  <input type="number" class="form-control" name="Cashamt" id="Cashamt" class="form-control">
                 </div>
                 
                 <div class="form-group col-sm-4">
                  <label for="Branch">Cash Amount</label>
                  <input type="number" class="form-control" name="Totamt" id="Totamt" class="form-control">
                 </div>				 
			  </div>					 
			
			<div class="form-group col-sm-12" id="bank_details" style="display:none">				
			 <div class="form-group col-sm-4 hidden">
              <label for="Branch">Bank Name</label>
              <select class="form-control" name="BankName" id="BankName" onChange="get_account(this.value);">
			   <option value="">--Select Bank--</option>
			  <?php
			  $bank="select DISTINCT(BankName) as  BankName from a_bank_acc";
			  $bankq=mysqli_query($conn,$bank);
			  while($bankfetch=mysqli_fetch_array($bankq)) {			  
			  ?>
			 <option value="<?php echo $bankfetch['BankName'];?>"><?php echo $bankfetch['BankName'];?></option>
			  <?php } ?>			 
			  </select>
             </div>
				
			  	 <div class="form-group col-sm-4">
                  <label for="Branch">Account No</label>
                  <select class="form-control" name="AccountNo" id="AccountNo" class="form-control" onChange="get_bankid();"></select>
                 </div>
				
				 <div class="form-group col-sm-4 hidden">
                  <label for="Branch">Cheque Number</label>
                  <input type="number" class="form-control" name="ChequeNumber" id="ChequeNumber" class="form-control">
                 </div>
				 
				 <div class="form-group col-sm-4">
                 <label for="Branch">E Transfer</label>
                 <input type="number" class="form-control" name="ETransfer" id="ETransfer" class="form-control">
                 </div>
				 
				 <div class="form-group col-sm-4">
                  <label for="Branch">Cash Deposit</label>
                  <input type="number" class="form-control" name="ChequeDeposit" id="ChequeDeposit" class="form-control">
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
			   
			   <div class="form-group col-sm-12" id="Cheque_details" style="display:none">			 				 
				 <div class="form-group col-sm-4">
                  <label for="Branch">E Transfer</label>
                  <input type="number" class="form-control" name="ETransfer" id="ETransfer" class="form-control">
                 </div>

                 <div class="form-group col-sm-4">
                  <label for="Branch">Cash Deposit</label>
                  <input type="number" class="form-control" name="ChequeDeposit" id="ChequeDeposit" class="form-control">
                 </div>				 
			   </div>
				  <!-- /.box-body -->
              </div>			  
			     <div class="box-footer">			 
                  <button type="button" a href="payment_voucher_view.php" class="btn btn-default " onClick="javascript:history.go(-1);">Cancel</button>
                  <button type="submit" class="btn btn-info pull-right"  onClick="return confirm('Are You Sure Want to Proceed?');">Save Changes</button>
                 </div>
			  </div> 
              <!-- /.box-body -->
			  
              
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
