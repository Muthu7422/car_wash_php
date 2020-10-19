<?php
include("../../includes.php");
include("../../redirect.php");

if(!empty($_POST["country_id"])) {
	$query ="SELECT * FROM a_bank_acc WHERE BankName = '".$_POST["country_id"]."'";
	$results = mysqli_query($conn,$query);
?>
	<option>--Select Account No --</option> 
<?php

	while($row=mysqli_fetch_array($results))
	 {
	 ?>

  	<option value="<?php echo $row["Id"]; ?>"><?php echo $row["AccountNumber"]; ?></option>
	
<?php
}
}
?>