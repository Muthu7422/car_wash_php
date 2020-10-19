<?php
include("../../dbinfoi.php");
include("../../includes.php");
include("../../redirect.php");
?>
<?php 

if($_POST['PaymentMode']=='Cash')
{
				
					$ss="select * from a_cash_acc where franchisee_id='".$_SESSION['BranchId']."' order by Id desc";
				$Ess=mysqli_query($conn,$ss);
			
				$FEss=mysqli_fetch_array($Ess);
				
					$acc="select SUM(Amount) AS Amount from account_cash where TransactionType='Debit' and franchisee_id='".$_SESSION['BranchId']."' ";
					$sccq=mysqli_query($conn,$acc);
					$acf=mysqli_fetch_array($sccq);
					
					$acc1="select SUM(Amount) AS Amount from account_cash where TransactionType='Credit' and franchisee_id='".$_SESSION['BranchId']."'";
					$sccq1=mysqli_query($conn,$acc1);
					$acf1=mysqli_fetch_array($sccq1);
					
					
					$OB=$FEss['cash']+$acf1['Amount'];
					$open=$OB-$acf['Amount'];
				
					
?>
 	
			 <div class="form-group col-sm-4 ">
                  <label for="Branch">Balance Amount</label>
                  <input type="text" class="form-control" name="BCash" id="BCash" value="<?php  echo $OB; ?>">
                 
				  </div> 
               

                 
	<?php
}
?>	
        