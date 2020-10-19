<?php
include("../../dbinfoi.php");
?>
<?php 
					$acc2="select * from account_bank where BankId='".$_POST['inputs']."' order by Id desc";
		             $sccq=mysqli_query($conn,$acc2);
		             $acf=mysqli_fetch_array($sccq);
					
			echo $acf['bank_bal'];
	 ?>


			 <div class="form-group col-sm-4 ">
                  <label for="Branch">Balance Amount</label>
                  <input type="text" class="form-control" name="BCash" id="BCash" value="<?php  echo $acf['bank_bal']; ?>">
                 
				  </div> 
               

 
        