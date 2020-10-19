<?php
include("../../includes.php");
include("../../redirect.php");

if(isset($_GET['getCountriesByLetters']) && isset($_GET['letters'])){
	$letters = $_GET['letters'];
	$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
	//echo $res = mysqli_query("select mobile1,id from a_customer where mobile1 like '%".$letters."%'") or die(mysql_error());
	 $res="SELECT t1.* FROM s_purchase_order t1 LEFT JOIN s_purchase_order_details t2 ON t1.id=t2.inv_no WHERE t2.purchase_status='Pending' AND t1.status='Active'";
	 
	$Eres=mysqli_query($conn,$res);
	
	
	//echo "1###select ID,countryName from ajax_countries where countryName like '".$letters."%'|";
	while($inf = mysqli_fetch_array($Eres)){
		echo strtoupper($inf["id"])."###".strtoupper($inf["inv_no"])."|";
	}	
}
?>
