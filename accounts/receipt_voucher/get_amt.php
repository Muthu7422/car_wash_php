<?php
include("../../dbinfoi.php");
include("../../includes.php");
?>
<?php 
					$acc2="select * from account_bank where BankId='".$_POST['inputs']."' and franchisee_id='".$_SESSION['BranchId']."' order by Id desc";
		             $sccq=mysqli_query($conn,$acc2);
		             $acf=mysqli_fetch_array($sccq);
					
			echo $acf['Amount'];
	 ?>

