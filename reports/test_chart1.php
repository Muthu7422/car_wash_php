<?php
$conn = mysqli_connect("localhost", "root", "") or die("cannot connect"); 
mysqli_select_db($conn, "pkstvs") or die("cannot select DB");

$sr="SELECT sum(total_amt) as y ,jdate as label FROM s_job_card where jdate between '2019-01-01' AND '2019-04-31' group by jdate";
$Esr=mysqli_query($conn,$sr);

$rows = array();
while($r = mysqli_fetch_assoc($Esr)) {
  $rows[] = $r;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() { 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "Sales Graph"
	},
	axisY: {
		title: "Sales(In INR)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## INR",
		dataPoints: <?php echo json_encode($rows, JSON_NUMERIC_CHECK); ?>
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