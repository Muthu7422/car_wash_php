<?php
session_start();
include("../../includes.php");

if(!empty($_POST["country_id"])) {
	//$_SESSION['item']=$_POST["country_id"];
 $query ="SELECT sid,sbrand FROM m_spare_brand WHERE stype = '" . $_POST["country_id"] . "' and status='Active'";
 $results = mysqli_query($conn,$query);

?>
  <option value="">--Select Brand--</option>
<?php

 while($list=mysqli_fetch_array($results)) {
?>

    <option value="<?php echo $list["sid"]; ?>"><?php echo $list["sbrand"]; ?></option>
<?php
 }
}


?>