<?php
include("../../includes.php");
include("../../redirect.php");

if(!empty($_POST["country_id"])) {
	$query ="SELECT * FROM master_district WHERE StateId = '".$_POST["country_id"]."'";
	$results = mysqli_query($conn,$query);
?>
	<option>--select the one --</option> 
<?php

	while($row=mysqli_fetch_array($results))
	 {
	 ?>

  	<option value="<?php echo $row["Id"]; ?>"><?php echo $row["DistrictName"]; ?></option>
	
<?php
}
}
?>