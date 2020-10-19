<?php
include("../../dbinfoi.php");
?>
<?php 
					$acc2="select * from account_bank where BankId='".$_POST['inputs']."' order by Id desc";
		             $sccq=mysqli_query($conn,$acc2);
		             $acf=mysqli_fetch_array($sccq);
					
			echo $acf['bank_bal'];
	 ?>
