  <?php
  
  //session_start();
include("../../includes.php");
include("../../redirect.php");
   include("../../dbinfoi.php"); 
  
     $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var2=mysqli_fetch_array($absc);  
  ?>
  
  
  <script type="text/javascript">
    function ShowHideDiv() {
        var paymentoption = document.getElementById("payment_mode");
        var bank = document.getElementById("cheque_details");
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
	    
	 
	 
        var paymentoption = document.getElementById("payment_mode");
        var bank = document.getElementById("bank_details");
		if(paymentoption.value == "Bank")
		{
	        bank.style.display = paymentoption.value == "Bank" ? "block" : "none";
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
				 
				 
		var paymentoption = document.getElementById("payment_mode");
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

			   // bank.style.display = paymentoption.value == "Neft" ? "block" : "none";
				 // bank.style.display = paymentoption.value == "RTGS" ? "block" : "none";

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
<?php
if($_POST['paying_advance']=='Yes')
{

?>
              <div class="box-body">
			   <div class="form-group col-sm-4">
			    <label for="catname">Paying Advance</label>
                <input type="txt" class="form-control" name="paying_advance_amount" id="paying_advance_amount"  value="0"  onKeyup="fnBalance();" style="text-transform:uppercase">
				</div>
			    <div class="form-group col-sm-4">
                  <label for="party">Payment Mode</label>
				  <select class="form-control" name="payment_mode" id="payment_mode" onchange = "ShowHideDiv()">
				    <option value="">--- Select Mode Of Payment ---</option>
				 <?php
				 $pm="select * from  m_payment_mode where Status='Active'";
				 $pmq=mysqli_query($conn,$pm);
				 while($pmf=mysqli_fetch_array($pmq))
				 {
					 ?>
					 <option value="<?php echo $pmf['PaymentMode'];?>"><?php echo $pmf['PaymentMode'];?></option>
					 <?php
				 }
				 ?>
				  </select>
				   </div>
				 <div class="form-group col-sm-8" id="bank_details" style="display:none">
				
					<div class="form-group col-sm-6">
              <label for="Branch">Bank Name</label>
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
                </div>
			  	<div class="form-group col-sm-6" hidden>
              <label for="Branch">Account No</label>
              <select class="form-control" name="AccountNo" id="AccountNo" class="form-control" onChange="get_bankid();"></select>
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
					  	<div class="form-group col-sm-6">
              <label for="Branch">Available Bank Balance</label> 
              <input type="text" name="bank_balance" id="bank_balance" value="<?php echo $open; ?>" class="form-control" readonly></input>
                </div>
				<?php } ?>
				
				
				</div>				  

	
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


				 <div class="form-group col-sm-8" id="cheque_details" style="display:none">
				
					<div class="form-group col-sm-6">
              <label for="Branch">Bank Name</label>
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
                </div>
		
				<div class="form-group col-sm-6">
              <label for="Branch">Cheque Number</label>
              <input type="number" class="form-control" name="ChequeNumber" id="ChequeNumber" class="form-control">
                </div>
				<div class="form-group col-sm-6" style="display:none">
                  <label for="Branch">Bank Id</label>
                  <input type="text" class="form-control" name="BankId" id="BankId" readonly>
                </div>
				
					<div class="form-group col-sm-6" style="display:none">
                  <label for="Branch">Ledger Id</label>
                  <input type="text" class="form-control" name="LedgerId" id="LedgerId" readonly>
                </div>
				</div>					
            </div>
			<?php

}

?>		

