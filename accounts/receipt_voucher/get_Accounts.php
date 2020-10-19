<?php
include("../../dbinfoi.php");
include("../../includes.php");

?>
<?php 
if($_POST['jstatus']=='Bank')
{
 ?>

		<div class="form-group col-sm-4">
                  <label for="Branch">Bank Name</label>
				  <select type="text" class="form-control" name="BankNameT" id="BankNameT" onchange="getamount();">
				  <option value="">--Select Bank--</option>
				  <?php 
				  $set="select * from a_bank_acc where status='Active' order by Id";
				  $Eset=mysqli_query($conn,$set);
				  while($FEset=mysqli_fetch_array($Eset))
				  {
				  ?>
				  <option value="<?php echo $FEset['Id']; ?>"><?php echo $FEset['BankName']; ?></option>
				  <?php
				  } ?>
				  </select>
     	  </div>	

			 <div class="form-group col-sm-4 ">
                  <label for="Branch">Balance Amount</label>
                  <input type="text" class="form-control" name="BCash" id="BCash" >
				  </div> 
				  
				  <div class="form-group" hidden>
              <label for="Branch" class="col-sm-3 control-label">Cheque Number</label>
			  <div class="col-sm-3">
              <input type="number" class="form-control" name="ChequeNumber" id="ChequeNumber" class="form-control">
                </div> 
				</div>
   	<?php 
	}
	?>
		            

			
                 
	