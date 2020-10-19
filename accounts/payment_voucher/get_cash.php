<?php
include("../../dbinfoi.php");
?>
<?php 
if($_POST['ttype']=='Cash'){				
$acc1="select * from sup_outstanding order by id desc";
$sccq1=mysqli_query($conn,$acc1);
$acf1=mysqli_fetch_array($sccq1);			
echo $OB=$acf1['total_outstanding'];
?>
<div class="form-group col-sm-4 ">
 <label for="Branch">Balance Amount</label>
 <input type="text" class="form-control" name="BCash" id="BCash" value="<?php  echo $OB; ?>">
</div> 
<?php }	?>				

      