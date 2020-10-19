<?php
include("../../includes.php");
include("../../redirect.php");

if(isset($_GET['getCountriesByLetters']) && isset($_GET['letters'])){
	$letters = $_GET['letters'];
	$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
	//echo $res = mysqli_query("select mobile1,id from a_customer where mobile1 like '%".$letters."%'") or die(mysql_error());
	// $res="select mobile1,id from a_customer where mobile1 like '%".$letters."%' and FrachiseeId='".$_SESSION['BranchId']."'";
	 $res="select FrachiseeId as id,mobile1 as Mobile from a_customer where mobile1 like '%9%' and FrachiseeId='9' UNION SELECT FrachiseeId as id,mobile2 as Mobile FROM a_customer where mobile2 like '%9%' and FrachiseeId='9'";
	//$res="select '1' as id,Mobile as mobile1 from (SELECT mobile1 as Mobile FROM `a_customer` where FrachiseeId='".$_SESSION['BranchId']."' union SELECT mobile2 as Mobile FROM `a_customer` where FrachiseeId='".$_SESSION['BranchId']."') as tbl1 where Mobile like '%".$letters1."%'";
	
	$Eres=mysqli_query($conn,$res);
	
	
	//echo "1###select ID,countryName from ajax_countries where countryName like '".$letters."%'|";
	while($inf = mysqli_fetch_array($Eres)){
		echo strtoupper($inf["id"])."###".strtoupper($inf["mobile1"])."|";
	}	



}

// if(isset($_GET['getCountriesByLetters2']) && isset($_GET['letters'])){
	// $letters1 = $_GET['letters'];
	// $letters1 = preg_replace("/[^a-z0-9 ]/si","",$letters1);
	//echo $res = mysqli_query("select mobile1,id from a_customer where mobile1 like '%".$letters."%'") or die(mysql_error());



	 // $res1="select id,mobile2 from a_customer where mobile2 like '%".$letters1."%'  and FrachiseeId='".$_SESSION['BranchId']."'";
	// $Eres1=mysqli_query($conn,$res1);

	//echo "1###select ID,countryName from ajax_countries where countryName like '".$letters."%'|";
	// while($inf1= mysqli_fetch_array($Eres1)){
		// echo strtoupper($inf1["id"])."###".strtoupper($inf1["mobile2"])."|";
	// }	

// }
?>
