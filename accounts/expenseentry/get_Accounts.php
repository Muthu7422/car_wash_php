<?php
include("../../dbinfoi.php");    

?>
<?php 

if($_POST['PaymentMode']=='Bank')
{

?>
 

		<div class="form-group col-sm-4">
                  <label for="Branch">Account No</label>
				  <select type="text" class="form-control" name="AccountNo" id="AccountNo">
				  <option value="">--Select Acc No--</option>
				  <?php 
				  $set="select * from a_bank_acc where status='Active' order by Id";
				  $Eset=mysqli_query($conn,$set);
				  while($FEset=mysqli_fetch_array($Eset))
				  {
				  
				  ?>
				  <option value="<?php echo $FEset['Id']; ?>"><?php echo $FEset['AccountNumber']; ?></option>
				  <?php } ?>
				  </select>
                </div>	

                 
	<?php
}
?>	
        