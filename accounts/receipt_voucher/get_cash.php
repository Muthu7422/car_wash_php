<?php
include("../../dbinfoi.php");
include("../../includes.php");

?>
<?php 

if($_POST['jstatus']=='Cash')
{
				
					$acc1="select sum(Amount) as Amount from account_cash where franchisee_id='".$_SESSION['BranchId']."'order by id desc";
					$sccq1=mysqli_query($conn,$acc1);
					$acf1=mysqli_fetch_array($sccq1);
					
					$OB=$acf1['Amount'];
					
?>
 	<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Balance Amount</label>
					  <div class="col-sm-3">
                  <input type="text" class="form-control" name="BCash" id="BCash" value="<?php  echo $OB; ?>">
                 
				  </div> 
               

                 
	<?php
}
?>	
        