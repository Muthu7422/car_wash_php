<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);


   $see="select * from m_franchisee where branch_id='".$_SESSION['FranchiseeId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);

 $ss1="select * from cust_outstanding order by id DESC";
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

		
    function ShowHideDiv() {
        var paymentoption = document.getElementById("ttype");
        var bank = document.getElementById("bank_details");
		if(paymentoption.value == "Cheque")
		{
	        bank.style.display = paymentoption.value == "Cheque" ? "block" : "none";
		}
		else if(paymentoption.value == 'Neft')
		{
	         bank.style.display = paymentoption.value == "Neft" ? "block" : "none";
		}
		else if(paymentoption.value == 'RTGS')
		{
	         bank.style.display = paymentoption.value == "RTGS" ? "block" : "none";
		}
		else
		{
			
			 bank.style.display = paymentoption.value == "" ? "block" : "none";
		}
			   // bank.style.display = paymentoption.value == "Neft" ? "block" : "none";
				 // bank.style.display = paymentoption.value == "RTGS" ? "block" : "none";
	 
	 
	 		var paymentoption = document.getElementById("ttype");
        var bank = document.getElementById("cash_details");
		if(paymentoption.value == "Cash")
		{
	        bank.style.display = paymentoption.value == "Cash" ? "block" : "none";
		}
				else if(paymentoption.value == 'Neft')
		{
	         bank.style.display = paymentoption.value == "Neft" ? "block" : "none";
		}
		else if(paymentoption.value == 'RTGS')
		{
	         bank.style.display = paymentoption.value == "RTGS" ? "block" : "none";
		}
		else
		{
			
			 bank.style.display = paymentoption.value == "" ? "block" : "none";
		}
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
                  <input type="hidden" class="form-control" name="franchisee_id"  id="franchisee_id" value="<?php echo $var['id']; ?>" readonly placeholder="Pid" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required> 
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
						
						$dep1="select* from a_customer where FrachiseeId='".$_SESSION['BranchId']."'";
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
                  <label for="party" class="col-sm-3 control-label">Payment Mode</label>
				   <div class="col-sm-3">
				  <select class="form-control" name="ttype" id="ttype" onchange = "ShowHideDiv()" required>
				    <option value="">Select the Option</option>
				  <option value="Cash">Cash</option>
				   <option value="Cheque">Cheque</option>
				   <option value="Neft">Neft</option>
				   <option value="RTGS">RTGS</option>
				  </select>
				   </div>  </div>
				   
				   
				   
				   			<div class="form-group col-sm-8" id="cash_details" style="display:none">

		<?php
				$ss="select * from a_cash_acc where franchisee_id='".$_SESSION['BranchId']."' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$acc="select SUM(Amount) AS Amount from account_cash where TransactionType='Debit' and franchisee_id='".$_SESSION['BranchId']."' ";
					$sccq=mysqli_query($conn,$acc);
					$acf=mysqli_fetch_array($sccq);
					
					$acc1="select SUM(Amount) AS Amount from account_cash where TransactionType='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
					$sccq1=mysqli_query($conn,$acc1);
					$acf1=mysqli_fetch_array($sccq1);
					
					
					$OB=$FEss['cash']+$acf1['Amount'];
					$open=$OB-$acf['Amount'];
					$i++;
				?>
					  	<div class="form-group col-sm-6">
              <label for="Branch">Available Cash Balance</label> 
              <input type="text" name="cash_balance" id="cash_balance" value="<?php echo $open; ?>" class="form-control" readonly></input>
                </div>
				<?php } ?>
				</div>
				   
				   
				 <div class="form-group col-sm-12" id="bank_details" style="display:none">
				
					<div class="form-group">
              <label for="Branch" class="col-sm-3 control-label">Bank Name</label>
			   <div class="col-sm-3">
              <select class="form-control" name="BankName" id="BankName" onChange="get_account(this.value);">
			   <option value="">--Select Bank--</option>
			  <?php
			  $bank="select DISTINCT(BankName) as  BankName from a_bank_acc";
			  $bankq=mysqli_query($conn,$bank);
			  while($bankfetch=mysqli_fetch_array($bankq))
			  {
			  ?>
			 <option value="<?php echo $bankfetch['BankName'];?>"><?php echo $bankfetch['BankName'];?></option>
			  <?php
			  }
			  ?>
			  </select>
                </div> </div>
			  	<div class="form-group" hidden>
              <label for="Branch"  class="col-sm-3 control-label">Account No</label>
			   <div class="col-sm-3">
              <select class="form-control" name="AccountNo" id="AccountNo" class="form-control" onChange="get_bankid();"></select>
                </div></div>
				<div class="form-group">
              <label for="Branch" class="col-sm-3 control-label">Cheque Number</label>
			  <div class="col-sm-3">
              <input type="number" class="form-control" name="ChequeNumber" id="ChequeNumber" class="form-control">
                </div> 
				</div>
				
								
						<?php
				$ss="select * from a_bank_acc where franchisee_id='".$_SESSION['BranchId']."' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$acc="select SUM(Amount) AS Amount from account_bank where TransactionType='Debit' and franchisee_id='".$_SESSION['BranchId']."' ";
					$sccq=mysqli_query($conn,$acc);
					$acf=mysqli_fetch_array($sccq);
					
					$acc1="select SUM(Amount) AS Amount from account_bank where TransactionType='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
					$sccq1=mysqli_query($conn,$acc1);
					$acf1=mysqli_fetch_array($sccq1);
					
					
					$OB=$FEss['Amount']+$acf1['Amount'];
					$open=$OB-$acf['Amount'];
					$i++;
				?>
					  	<div class="form-group col-sm-3">
              <label for="Branch">Available Bank Balance</label> 
              <input type="text" name="bank_balance" id="bank_balance" value="<?php echo $open; ?>" class="form-control" readonly></input>
                </div>
				
								<?php } ?>

				<div class="form-group hidden">
                  <label for="Branch" class="col-sm-3 control-label">Bank Id</label>
				  <div class="col-sm-3">
                  <input type="text" class="form-control" name="BankId" id="BankId" readonly>
                </div>
				
					<div class="form-group hidden">
                  <label for="Branch" class="col-sm-3 control-label">Ledger Id</label>
				  <div class="col-sm-3">
                  <input type="text" class="form-control" name="LedgerId" id="LedgerId" readonly>
                </div> </div>
				</div>	
              </div>
			  </div> 
              <!-- /.box-body -->
			  
              <div class="box-footer">
			 
                <button type="submit" class="btn btn-default " onClick="javascript:history.go(-1);">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" Onclick="return confirm('Are you sure want to proceed?')">Save Changes</button>
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
