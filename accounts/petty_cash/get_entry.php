<?php
session_start();
include("../../includes.php");

if(!empty($_POST["country_id"])) {
	//$_SESSION['item']=$_POST["country_id"];
 $query ="SELECT * FROM  expense_master WHERE LedgerType = '" . $_POST["country_id"] . "' and Status='Active'"; 
 $results = mysqli_query($conn,$query);
 
   
?>
   <option value="">--Select Expense Type--</option>
<?php

 
 while($list=mysqli_fetch_array($results)) {

	 
?>
 
 
    <option value="<?php echo $list["Id"]; ?>"><?php echo $list["ExpenseType"]; ?></option>
<?php
 }
}


?>