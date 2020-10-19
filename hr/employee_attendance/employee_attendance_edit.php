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
        Process Employee Salary
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
  

  
</script> 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
	<form name="form1" method="post" action="employee_attendance_entry_edit_act.php"> 
      <div class="row">
        <!-- left column -->
         <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
             <h3 class="box-title">Employee Attendance</h3>
            </div>
			 <div class="box-body">	 
               
				  <div class="form-group col-sm-4">
                  <label for="fromdate">Attendance Date</label>
                  <input type="date" name="AttendanceDate" class="form-control" id="AttendanceDate" value="<?php echo $_REQUEST['AttendanceDate']; ?>" onKeyPress="return tabE(this,event)" readonly="true">
                </div>
               		 </div>
            <!-- /.box-header -->
            <!-- form start -->
			
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">            
            <div class="box">
            <div class="box-header">             
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto">
             <table id="example1" class="table table-bordered table-striped" style="width:130%">
                <thead>
                <tr>
				<th>S:no</th>
				<th style="display:none">id</th>
				<th>Emp Code</th>
                <th>Emp Name</th>
                <th>Dept</th>
				<th>Attendance</th>
				<th>Remarks</th>
                </tr>
                </thead>
                <tbody>
				<?php
				//echo $ct="select h_employee_attendance_entry.*,h_employee.ename,h_employee.ecode from h_employee_attendance_entry left join h_employee on h_employee_attendance_entry.EmployeeId=h_employee.Id AND  AttendanceDate='".$_REQUEST['AttendanceDate']."'";
			 	$ct="select h_employee_attendance_entry.*,h_employee.ename,h_employee.ecode,h_employee.id,h_employee.edepart,h_department.dname from h_employee_attendance_entry INNER JOIN h_employee ON h_employee_attendance_entry.AttendanceDate='".$_REQUEST['AttendanceDate']."' AND h_employee_attendance_entry.EmployeeId=h_employee.Id INNER JOIN h_department ON h_employee.edepart=h_department.Id";
				$Ect=mysqli_query($conn,$ct);
				$tnc=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{		
						$des="select * from h_employee_attendance_entry where AttendanceDate='".$_REQUEST['AttendanceDate']."'";
						$cdx=mysqli_query($conn,$des);
						$cx=mysqli_fetch_array($cdx);
				
					$i++;
				?>
				<?php
				//if($dpm<'1')
				//{
				?>
                <tr>
				<td><?php echo $i; ?></td>
				<td style="display:none"><input type="text" class="form-control" name="<?php echo "AttendanceId".$i;?>" id="<?php echo "AttendanceId".$i;?>" value="<?php echo $Fct['Id']; ?>"  onKeyPress="return tabE(this,event)" readonly="true"></td>
				<td style="display:none"><input type="text" class="form-control" name="<?php echo "EmployeeId".$i;?>" id="<?php echo "EmployeeId".$i;?>" value="<?php echo $Fct['id']; ?>"  onKeyPress="return tabE(this,event)" readonly="true"></td>
				<td ><input type="text" class="form-control" style="width:65px;" name="<?php echo "ecode".$i;?>" id="<?php echo "ecode".$i;?>" value="<?php echo $Fct['ecode']; ?>"  onKeyPress="return tabE(this,event)" readonly="true"></td>
                <td><input type="txt" name="<?php echo "employee_name".$i;?>" id="<?php echo "employee_name".$i;?>" value="<?php echo $Fct['ename']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly="true"></td>
				<td><input type="txt" name="<?php echo"dept".$i;?>" id="<?php echo"dept".$i;?>" value="<?php echo $Fct['dname']; ?>"  class="form-control" onKeyPress="return tabE(this,event)" readonly="true"></td>
				
				<td>
				<?php
				if($Fct['Attendance']=='1')
					{
				?>
						<input type="radio" name="<?php echo "Attendance".$i;  ?>" id="<?php echo "Attendance".$i;  ?>" value="1" checked /> : Present
						<input type="radio" name="<?php echo "Attendance".$i;  ?>" id="<?php echo "Attendance".$i;  ?>" value="0.5" /> : Half 
						<input type="radio" name="<?php echo "Attendance".$i;  ?>" id="<?php echo "Attendance".$i;  ?>" value="0"  /> : Absent  
					<?php }
				else if($Fct['Attendance']=='0.5')
					{	?>
				        <input type="radio" name="<?php echo "Attendance".$i;  ?>" id="<?php echo "Attendance".$i;  ?>" value="1"  /> : Present
						<input type="radio" name="<?php echo "Attendance".$i;  ?>" id="<?php echo "Attendance".$i;  ?>" value="0.5" checked /> : Half 
						<input type="radio" name="<?php echo "Attendance".$i;  ?>" id="<?php echo "Attendance".$i;  ?>" value="0"  /> : Absent  
					<?php }
				else if($Fct['Attendance']=='0')
					{
					?>
					 <input type="radio" name="<?php echo "Attendance".$i;  ?>" id="<?php echo "Attendance".$i;  ?>" value="1"  /> : Present
						<input type="radio" name="<?php echo "Attendance".$i;  ?>" id="<?php echo "Attendance".$i;  ?>" value="0.5"  /> : Half 
						<input type="radio" name="<?php echo "Attendance".$i;  ?>" id="<?php echo "Attendance".$i;  ?>" value="0" checked /> : Absent  
			<?php } ?>
				</td>
				<td><input type="txt" name="<?php echo "Remarks".$i;?>" id="<?php echo"Remarks".$i;?>" value="<?php echo $Fct['Remarks']; ?>" onKeyPress="return tabE(this,event)"  class="form-control"></td>
				</tr>
				<?php
				//}
				}
				?>
				
			 <input type="hidden" name="tnc" id="tnc" value="<?php echo $tnc+1; ?>" class="form-control" readonly="true">	 
                  </tbody>
           
              </table>
			   
            </div>
			<div class="box-footer">
                <button type="submit" class="btn btn-default ">Cancel</button>
                <button type="submit" onClick="return confirm('Aru You Sure Complete?')" class="btn btn-info pull-right">Submit</button>
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
