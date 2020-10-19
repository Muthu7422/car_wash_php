<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
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
        Process Of Employee Attendance
      </h1>
     </section>


<script>

function tabE(obj,e){ 
   var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
   if(e.keyCode==13){ 
     var ele = document.forms[0].elements; 
     for(var i=0;i<ele.length;i++){ 
       var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
       if(obj==ele[i]){ele[q].focus();break} 
     } 
  return false; 
   } 
  } 
  /***

function get_total($i){ 
    var qty = 0;
    var inputs = document.getElementById('Shift'+$i+'').value;


$.ajax({
      type:'post',
        url:'get_tax.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("Total_Hours"+$i).value=msg;
   
       }
 });

}
****/
function get_total($i){ 
   var input=document.getElementById('Shift'+$i+'').value;
    if(input=='10.30')
	{ 
<?php
$datetime1 = new DateTime('10:30 AM');
$datetime2 = new DateTime('08:00 PM');
$interval = $datetime1->diff($datetime2);
?>
document.getElementById('Total_Hours'+$i+'').value="<?php echo $interval->format('%h').".".$interval->format('%i')." ";?>";

	}
	 if(input=='2.00')
	{

<?php
$datetime11 = new DateTime('2:00 PM');
$datetime21 = new DateTime('10:30 PM');
$interval1 = $datetime11->diff($datetime21);
?>
document.getElementById('Total_Hours'+$i+'').value="<?php echo $interval1->format('%h').".".$interval1->format('%i')." ";?>";

	}
	
}

function getLate_Hours($i)
{
	var input1=parseFloat(document.getElementById('Total_Hours'+$i+'').value);
	var input2=document.getElementById('Late_Hours'+$i+'').value;
	var input3=0;
	var input3=input1-input2;
	document.getElementById('Working_Hours'+$i+'').value=input3.toFixed(2);
}
  
</script> 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
		   <form action="monthly_report_export.php?from=<?php echo $_REQUEST['from']; ?>&to=<?php echo $_REQUEST['to']; ?>"  method="post" name="export_excel">
            <form class="form-horizontal" method="post" action="monthly_report_process.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
         <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
             <h3 class="box-title">Monthly Attendance</h3>
            </div>
			 <div class="box-body">	

			 
             
               		 </div>
            <!-- /.box-header -->
            <!-- form start -->
			
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">            
            <div class="box">
            <div class="box-header">
				<button class="hidden" type="submit" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">EXPORT MONTHLY REPORT</button>
			
            </div>
            <!-- /.box-header -->
			  <?php                 
                 if($_POST['month_name']=='1' OR '2' OR '3' OR '4' OR '5' OR '6' OR '7' OR '8' OR '9' OR '10' OR '11' OR '12')
                 {
				$Mfrom=date('Y')."-".$_POST['month_name']."-01";
		         $Mto=date('Y')."-".$_POST['month_name']."-31";
					  ?>
			
			
            <div class="box-body" style="overflow-x:auto">
             <table id="example1" class="table table-bordered table-striped" style="width:130%">
                <thead>
                <tr>
				<th>S:no</th>			
                <th>Emp Name</th>
				<th>01</th>
				<th>02</th>
				<th>03</th>
				<th>04</th>
				<th>05</th>
				<th>06</th>
				<th>07</th>
				<th>08</th>
				<th>09</th>
				<th>10</th>
				<th>11</th>
				<th>12</th>
				<th>13</th>
				<th>14</th>
				<th>15</th>
				<th>16</th>
				<th>17</th>
				<th>18</th>
				<th>19</th>
				<th>20</th>
				<th>21</th>
				<th>22</th>
				<th>23</th>
				<th>24</th>
				<th>25</th>
				<th>26</th>
				<th>27</th>
				<th>28</th>
				<th>29</th>
				<th>30</th>
				<th>31</th>
				<th>Total Present</th>
			
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from h_employee where status='Active'";
				$Ect=mysqli_query($conn,$ct);
				$tnc=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
					$Wep="select * from h_department where id='".$Fct['edepart']."'";
					$Epm=mysqli_query($conn,$Wep);
					$tpm=mysqli_fetch_array($Epm);
					
					$Wep1="select * from h_employee_attendance_entry where status='Active'";
					$Epm1=mysqli_query($conn,$Wep1);
					$tpm1=mysqli_fetch_array($Epm1);
					$i++;
				?>
				<?php
				//if($dpm<'1')
				//{
				?>
                <tr>
				<td><?php echo $i; ?></td>
                <td><input type="txt" name="<?php echo "employee_name".$i;?>" id="<?php echo "employee_name".$i;?>" value="<?php echo $Fct['ename']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly="true"></td>
	             <?php
				 $y=$_POST['AttendanceDate']."-";
				 $m=$_POST['month_name']."-";
				$tl=0; 
				for($k=1;$k<32;$k++)
				{
					$ad=$y.$m.$k;
				?>
				<td><?php 
				$aq="SELECT Attendance FROM `h_employee_attendance_entry` where EmployeeId='".$Fct['id']."' AND AttendanceDate='$ad' ";
				$Eaq=mysqli_query($conn,$aq);
				$FEaq=mysqli_fetch_array($Eaq);
				if($FEaq['Attendance']=='')
				{
					echo "H";
				}
				if($FEaq['Attendance']=='1')
				{
					echo "P";
				}
				if($FEaq['Attendance']=='0.5')
				{
					echo "HALF";
				}
				if($FEaq['Attendance']=='0')
				{
					echo "AB";
				}
				//echo $FEaq['Attendance'];
				$tl=$tl+$FEaq['Attendance'];
				?></td>
				<?php } ?>

                 <td><?php echo $tl; ?></td>
				</tr>
				<?php
				//}
				}
				?>
 <?php } ?>			 	 
                  </tbody>
           
              </table>
			   
            </div>
		
				
            <!-- /.box-body -->
          </div>
            
         
        </div>
      </div>
  </form>
    </section>
    <!-- /.content -->
	
	
	
	
</div>

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
