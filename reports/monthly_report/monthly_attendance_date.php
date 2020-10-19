<?php
include("../../includes.php");
include("../../redirect.php");
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
       Employee Attendance
      </h1>
     </section>

<script>
function Delete_Click() {
    var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        return true;
    }
	else
		return false;
}  
  
  
</script>	 
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
</script> 
   
   
    <!-- Main content -->
     <section class="content container-fluid">
	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
	<form name="form1" method="post" action="monthly_attendance_report.php"> 
	<form class="form-horizontal" method="post" action="monthly_report_export.php" autocomplete="off">

	 
	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box-header with-border">
             
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
           
              <div class="box-body">	

                  <div class="form-group col-sm-4">
                  <label for="Branch">Year</label>
                  <select  type="date" class="form-control" name="AttendanceDate" id="AttendanceDate"  >
				  <option>--Select The Year--</option>
				  <option>2019</option>
				  <option>2020</option>
				  <option>2021</option>
				  <option>2022</option>
				  <option>2023</option>
				  <option>2024</option>
				  <option>2025</option>			
				  </select>
                </div>			  
               
				  <div class="form-group col-sm-4">
                  <label for="Branch">Attendance Month</label>
                  <select  type="date" class="form-control" name="month_name" id="month_name"  >
				  <option>--Select The Month--</option>
				  <option value="01">Janauary</option>
				  <option value="02">Febreuary</option>
				  <option value="03">March</option>
				  <option value="04">April</option>
				  <option value="05">May</option>
				  <option value="06">June</option>
				  <option value="07">July</option>
				  <option value="08">August</option>
				  <option value="09">September</option>
				  <option value="10">October</option>
				  <option value="11">November</option>
				  <option value="12">December</option>
				  </select>
                </div>
				
				
 <?php 
				if(isset($_REQUEST['msg']))
					{
						?>
				<div class="row">		
				<div class="col-md-8" role="alert" style="color:red">
        			<?php 
						echo $_REQUEST['msg'];
					?>
				</div>
				</div>
				<?php } ?>			
			
               		 </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
          </div>
      
  </div>
    <!-- /.box-body -->
            
<div class="box-footer">
                <button class="hidden" type="submit" class="btn btn-default ">Cancel</button>
                <button type="submit"  class="btn btn-info pull-right" onClick="return confirm('Are You Sure Want to Proceed?');" >Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
			  <div>
			   <div class="box-footer">
	   <form action="monthly_report_export.php"  method="post" name="export_excel">
 
			<div class="control-group">
			<input type="text" name="AttendanceDate" id="AttendanceDate" class="form-controll hidden">
			<input type="text" name="month_name" id="month_name" class="form-controll hidden">
			
				<div class="controls">
					<button  class="hidden"type="submit" id="export" name="export" class="btn btn-info pull-right">EXPORT MONTHLY REPORT</button>
				</div>
				</div>
			</div>
		</form>
		</div>
      </div>
        </div>
      
 

    </section>
    <!-- /.content -->
	<section class="content container-fluid">
	 <div class="row">
        <!-- left column -->
		<div class="col-md-2"></div >
        <div class="col-md-9">            
            <div class="box"hidden>
            <div class="box-header">
				<h4>List of Attendance Days</h4>			
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
			<table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
				<th>S:no</th>				
				<th>Attendance Date</th>
				<th>Attendance View Or View</th>				
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select DISTINCT(AttendanceDate) as AD FROM h_employee_attendance_entry order by AD desc";
				$Ect=mysqli_query($conn,$ct);
				$tnc=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{					
					$i++;
				?>
				<?php
				//if($dpm<'1')
				//{
				?>
                <tr>
				<td><?php echo $i; ?></td>
				<td><?php echo date("d-m-Y", strtotime($Fct['AD'])); ?></td>
				<td><a href="employee_attendance_edit.php?AttendanceDate=<?php echo $Fct['AD']; ?>">View</td>
				</tr>
				<?php
				//}
				}
				?>			  
                </tbody>           
              </table>
			</div>
			</div>
			</div>
	</div>	
	</section>
	
	
	
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
