<?php
include("../../dbinfoi.php");

if(!empty($_POST["country_id"])) {
   $query ="SELECT distinct(invoice) as invoice FROM cust_outstanding WHERE cust_name = '" . $_POST["country_id"] . "'"; 
 $results = mysqli_query($conn,$query);
?>
 
<?php
 $cname=$_POST["country_id"];
 while($CL_list=mysqli_fetch_array($results)) {
	
	 $sb="select balance_amt,total_outstanding from cust_outstanding where invoice = '".$CL_list["invoice"]."' order by id desc"; 
	$Esb=mysqli_query($conn,$sb);
	$FEsb=mysqli_fetch_array($Esb);
	if($FEsb['balance_amt']>'0')
	{
		
?>
 
<input type="checkbox" name="check_list[]" value="<?php echo $CL_list["invoice"]; ?>"><?php echo "  ".$CL_list["invoice"]." Outstanding Rs ".$FEsb["balance_amt"]; ?><br/>

<?php
	}
 }
}


?>