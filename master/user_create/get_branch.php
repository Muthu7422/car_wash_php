<?php
include("../../includes.php");
include("../../redirect.php");

if(($_POST["inputs"])) {
	
?>	
          



	                 <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Branch  Name</label>
                      <div class="col-sm-4">
				  <select type="text" class="form-control" name="branch_name" id="branch_name" required >
	                   <option value="">---Select The Branch---</option>
                        <?php 
				  $set="select * from m_franchisee where vendor_id='".$_POST['inputs']."'";
				  $Eset=mysqli_query($conn,$set);
				  while($FEset=mysqli_fetch_array($Eset))
				  {
				  ?>
				  <option value="<?php echo $FEset['branch_id']; ?>"><?php echo $FEset['franchisee_name']; ?></option>
				  <?php
				  } 
				  ?>
						</select>
                      </div>
                    </div>
		
   	<?php 
	}
	?>
