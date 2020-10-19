<?php
include("../../includes.php");
include("../../redirect.php");

 if(!empty($_POST["country_id"])) {
	$query ="SELECT * FROM m_service_type WHERE sbrand = '".$_POST["country_id"]."'";
	$results = mysql_query($query);
?>
	<option>--select the one --</option> 
<?php

	while($row=mysql_fetch_array($results))
	 {
	 ?>

  	<option value="<?php echo $row["id"]; ?>"><?php echo $row["stype"]; ?></option>
	
<?php
 }
}
?>