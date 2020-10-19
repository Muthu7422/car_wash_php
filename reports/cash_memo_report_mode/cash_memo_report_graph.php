<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");
if(isset($_POST['from']))
{
$sr="SELECT sum(bill_amount) as y ,date as label FROM cash_memo where date between '".$_POST['from']."' AND '".$_POST['to']."' group by date";
$Esr=mysqli_query($conn,$sr);

$rows = array();
while($r = mysqli_fetch_assoc($Esr)) {
  $rows[] = $r;
}
}
?>
<!DOCTYPE html>
<html>
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
<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!--header Starts-->
  <?php include("../../header.php"); ?>
  <!--Header End -->
  <!-- Left side column. contains the logo and sidebar -->
   <?php include("../../leftbar.php"); ?>
 <!-- Side Bar End -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#ECF0F5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>
      Cash Memo Sales Graph
        <small>Report</small>
      </h1>      
	   
    </section>
 <form role="form" method="post" action="cash_memo_report_graph.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
             
              <div class="box-body" style="background-color:#F0F8FF">
			  
			  
                <div class="box-body">
			
			    <div class="form-group col-sm-4">
			   <label for="catname">From</label>
				 <input type="date" class="form-control" name="from" id="from" required>
              
				</div>
				
				<div class="form-group col-sm-4">
			   <label for="catname">To</label>
				 <input type="date" class="form-control" name="to" id="to" required >
              
				</div>
				
				</div>
				<br/>
				<button type="submit" class="btn btn-info pull-right">View Details</button>
		 </div>	  
      
	  <br/>  <br/>  <br/>
	   <?php 
	    if(isset($_POST['from']))
{
	   ?>
	    <div class="box-body">
          <div id="chartContainer" style="height: 370px; width: 80%;"></div>
          <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>    
        </div>
<?php } ?>
          <!-- /.box -->
      
    <!-- /.content -->
	

	
	</form>
      
			  
    <!-- Main content -->
    
    
        <!-- left column -->
        
           
			
            <!-- /.box-header -->
            <!-- form start -->
					
			<br>
</div></div></div></div>
    
	  
    
 
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
 <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
	  <?php include("../../footer.php"); ?>
  <!--footer End-->
 <div class="control-sidebar-bg"></div>
 <?php include("../../includes_db_js.php"); ?>
</body>
</html>