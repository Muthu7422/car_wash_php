<?php
$conn = mysqli_connect("localhost", "root", "") or die("cannot connect"); 
mysqli_select_db($conn, "asmotors19062019") or die("cannot select DB");
//SELECT sum(total_amt) as amt ,jdate FROM `s_job_card` group by jdate

$sr="SELECT sum(total_amt) as amt ,jdate FROM s_job_card group by jdate";
$Esr=mysqli_query($conn,$sr);
$FEsr=mysqli_fetch_assoc($Esr);
/*$SaleData=array(
while($FEsr=mysqli_fetch_assoc($Esr))
{
	//array("y"." => ".echo $FEsr['amt'].","."label"." =>".echo $FEsr['jdate'] ).",";
	//echo $FEsr['jdate']." | ".$FEsr['amt'];
	//echo "</br>";
	array("y" => 3373.64, "label" => "Germany" ).",";
	                $jsonArrayObject = (array('lat' => $row["lat"], 'lon' => $row["lon"], 'addr' => $row["address"]));

}
);*/;

$SaleData='';
while($FEsr=mysqli_fetch_assoc($Esr))
{
	$temp='array('.'"y"'." => ".$FEsr['amt'].",".'"label"'." =>".'"'.$FEsr['jdate'].'"'.')'.",";
	$SaleData.=$temp;
	$jsonArrayObject = (array('y' => $row["lat"], 'label' => $row["lon"]));
}
echo $SaleData;
echo "</br>";
echo "making array";
echo "</br>";
echo $saled1=array(($SaleData));
echo "</br>";
$saled=array(array("y" => 100.00,"label" =>"2019-06-06"),array("y" => 1470.00,"label" =>"2019-06-07"),array("y" => 2363.00,"label" =>"2019-06-08"),array("y" => 2425.00,"label" =>"2019-06-10"),array("y" => 1180.00,"label" =>"2019-06-11"),array("y" => 200.00,"label" =>"2019-06-13"),array("y" => 590.00,"label" =>"2019-06-14"),array("y" => 490.00,"label" =>"2019-06-15"),array("y" => 320.00,"label" =>"2019-06-17"),array("y" => 468.00,"label" =>"2019-06-18"),array("y" => 8330.00,"label" =>"2019-06-19"),);


echo "</br>";
echo "Original array";
echo "</br>";
//array("y" => 100.00,"label" =>"2019-06-06"),array("y" => 1470.00,"label" =>"2019-06-07"),array("y" => 2363.00,"label" =>"2019-06-08"),array("y" => 2425.00,"label" =>"2019-06-10"),array("y" => 1180.00,"label" =>"2019-06-11"),array("y" => 200.00,"label" =>"2019-06-13"),array("y" => 590.00,"label" =>"2019-06-14"),array("y" => 490.00,"label" =>"2019-06-15"),array("y" => 320.00,"label" =>"2019-06-17"),array("y" => 468.00,"label" =>"2019-06-18"),array("y" => 8330.00,"label" =>"2019-06-19"),
$dataPoints = array( 
	array("y" => 3373.64, "label" => "Germany" ),
	array("y" => 2435.94, "label" => "France" ),
	array("y" => 1842.55, "label" => "China" ),
	array("y" => 1828.55, "label" => "Russia" ),
	array("y" => 1039.99, "label" => "Switzerland" ),
	array("y" => 765.215, "label" => "Japan" ),
	array("y" => 612.453, "label" => "Netherlands" )
);
 echo json_encode($saled1);
 echo "</br>";
 echo json_encode($dataPoints);
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Sales Graph"
	},
	axisY: {
		title: "Sales(In INR)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## INR",
		dataPoints: <?php echo json_encode($saled, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                  