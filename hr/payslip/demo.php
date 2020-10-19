if(document.getElementById('NoOFHourLeft'+$i+'').value=='')
	{
		Total_work_hour_left=0;
	}
	else
	{
		Total_work_hour_left=parseFloat(document.getElementById('NoOFHourLeft'+$i+'').value);
	} 
	
	var PerDaysalary=basicsalary/totaldays;
		document.getElementById('PerDaysalary'+$i+'').value=PerDaysalary.toFixed(2);
		var PerHourSal=0;
		var PerHourSal=PerDaysalary/Total_Hoursperday;
		document.getElementById('PerHoursalary'+$i+'').value=PerHourSal.toFixed(2);
		
	var days=workday+paidleave;
	var total=(PerDaysalary*days)+MonthlyIncentive;
	var paid_hour=Total_work_hour*paidleave;
	var lost_salaray_per_hour=PerHourSal*Total_work_hour_left;
	var GrossSalaray=total - lost_salaray_per_hour;
	var amount=GrossSalaray-deduction;
	document.getElementById('total'+$i+'').value=amount.toFixed(2);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
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
        Process Employee Salary
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
  
function gettotal($i)
{
	if(document.getElementById('totaldays'+$i+'').value=='')
	{
		totaldays=0;
	}
	else
	{
		totaldays=parseInt(document.getElementById('totaldays'+$i+'').value);
	}
	
	if(document.getElementById('salary'+$i+'').value=='')
	{
		basicsalary=0;
	}
	else
	{
		basicsalary=parseInt(document.getElementById('salary'+$i+'').value);
	}
	
	if(document.getElementById('work_day'+$i+'').value=='')
	{
		workday=0;
	}
	else
	{
		workday=parseFloat(document.getElementById('work_day'+$i+'').value);
	}
	
	if(document.getElementById('phd'+$i+'').value=='')
	{
		paidleave=0;
	}
	else
	{
		paidleave=parseInt(document.getElementById('phd'+$i+'').value);
	}
	
	if(document.getElementById('MonthlyIncentive'+$i+'').value=='')
	{
		MonthlyIncentive=0;
	}
	else
	{
		MonthlyIncentive=parseInt(document.getElementById('MonthlyIncentive'+$i+'').value);
	}
	
	if(document.getElementById('deduction'+$i+'').value=='')
	{
		deduction=0;
	}
	else
	{
		deduction=parseInt(document.getElementById('deduction'+$i+'').value);
	} 
	if(document.getElementById('Total_Hours'+$i+'').value=='')
	{
		Total_Hoursperday=0;
	}
	else
	{
		Total_Hoursperday=parseFloat(document.getElementById('Total_Hours'+$i+'').value);
	} 
	if(document.getElementById('work_hour'+$i+'').value=='')
	{
		Total_work_hour=0;
	}
	else
	{
		Total_work_hour=parseFloat(document.getElementById('work_hour'+$i+'').value);
	} 
	
	var PerDaysalary=basicsalary/totaldays;
		document.getElementById('PerDaysalary'+$i+'').value=PerDaysalary.toFixed(2);
		var PerHourSal=0;
		var PerHourSal=PerDaysalary/Total_Hoursperday;
		document.getElementById('PerHoursalary'+$i+'').value=PerHourSal.toFixed(2);
		
	var days=workday+paidleave;
	var total=(PerDaysalary*days)+MonthlyIncentive;
	var paid_hour=Total_work_hour*paidleave;
	var GrossSalaray=(PerHourSal*Total_work_hour)+paid_hour+MonthlyIncentive;
	var amount=GrossSalaray-deduction;
	document.getElementById('total'+$i+'').value=amount.toFixed(2);
	
}

  
</script> 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
	<form name="form1" method="post" action="p_payslip_new_act.php"> 
      <div class="row">
        <!-- left column -->
         <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
             <h3 class="box-title">Process Employee Salary</h3>
            </div>
			 <div class="box-body">	 
               
				  <div class="form-group col-sm-4">
                  <label for="fromdate">Salary Month</label>
                  <input type="text" name="paymonths" class="form-control" id="paymonths" value="<?php echo $_POST['paymonths']; ?>" onKeyPress="return tabE(this,event)" readonly required>
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
            <div class="box-body" style="overflow:auto">
             <table id="example1" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
				<th>S:no</th>
				<th style="display:none">id</th>
				<th>Emp Code</th>
                <th>Emp Name</th>
                <th>Department</th>
				<th>Total Days</th>
				<th>Total Hours / Day</th>
				<th>Basic salary</th>
				<th>Per Day Salary</th>
				<th>Per Hour Salary</th>
				<th>Total Worked Days</th>
				<th>Total Worked Hours</th>
				<th>No Of Days Leave</th>
				<th>No Of Hours Left</th>
				<th>Paid Holidays</th>
				<th>Incentives</th>
				<th>Deduction</th>
				<th>Total</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$i=0;
				$at="select * from h_employee_attendance_entry where Shift='".$_POST['Shift']."'";
				$atq=mysql_query($at);
				while($atf=mysql_fetch_array($atq))
				{
				
				$ct="select * from h_employee where id='".$atf['EmployeeId']."'";
				$Ect=mysql_query($ct);
				$tnc=mysql_num_rows($Ect);
				while($Fct=mysql_fetch_array($Ect))
				{
					$Wep="select * from h_department where id='".$Fct['edepart']."'";
					$Epm=mysql_query($Wep);
					$tpm=mysql_fetch_array($Epm);
					
					
				 	$spm="select * from h_payroll_calculation where e_code ='".$Fct['ecode']."' and month_pay='".$_POST['paymonths']."'"; 
					$dcm=mysql_query($spm);
					$dpm=mysql_num_rows($dcm);
					
					$InputArray=explode("-",$_POST['paymonths']);
					$Month=trim($InputArray[1]);
					
				 	$lin2="select SUM(Attendance) as Attendanceday,Total_Hours,sum(	Working_Hours) as Working_Hours,sum(Late_Hours) as 	Late_Hours from h_employee_attendance_entry where Month(AttendanceDate)='$Month' and EmployeeId='".$Fct['id']."'";
					$linc2=mysql_query($lin2);
					$ans2=mysql_fetch_array($linc2);
					
					$NoOfDaysLeave=$_POST['WorkingDay']-$ans2['Attendanceday'];
					
					
					$i++;
				?>
				<?php
				if($dpm<'1')
				{
				?>
                <tr>
				<td><?php echo $i; ?></td>
				<td style="display:none"><input type="text" class="form-control" name="<?php echo "id".$i;?>" id="<?php echo "id".$i;?>" value="<?php echo $Fct['id']; ?>"  onKeyPress="return tabE(this,event)" readonly="true"></td>
				<td><input type="text" class="form-control" name="<?php echo "ecode".$i;?>" id="<?php echo "ecode".$i;?>" value="<?php echo $Fct['ecode']; ?>" size="5"  onKeyPress="return tabE(this,event)" readonly="true"></td>
                <td><input type="txt" name="<?php echo "employee_name".$i;?>" id="<?php echo "employee_name".$i;?>" value="<?php echo $Fct['ename']; ?>" size="14" onKeyPress="return tabE(this,event)" class="form-control" readonly="true"></td>
				<td><input type="txt" name="<?php echo"dept".$i;?>" id="<?php echo"dept".$i;?>" value="<?php echo $tpm['dname']; ?>"  class="form-control" size="8" onKeyPress="return tabE(this,event)" readonly="true"></td>
                <td><input type="txt" name="<?php echo"totaldays".$i;?>" id="<?php echo"totaldays".$i;?>" value="<?php echo $_POST['WorkingDay']; ?>" size="5" readonly onKeyPress="return tabE(this,event)" onkeyup="gettotal(<?php echo $i;?>)" class="form-control"></td>
				<td><input type="txt" name="<?php echo"Total_Hours".$i;?>" id="<?php echo"Total_Hours".$i;?>" value="<?php echo $ans2['Total_Hours']; ?>" size="5" readonly onKeyPress="return tabE(this,event)" onkeyup="gettotal(<?php echo $i;?>)" class="form-control"></td>
				<td><input type="txt" name="<?php echo"salary".$i;?>" id="<?php echo"salary".$i;?>" value="<?php echo $Fct['salary']; ?>" size="10" readonly onKeyPress="return tabE(this,event)" onkeyup="gettotal(<?php echo $i;?>)" class="form-control"></td>
				<td><input type="txt" name="<?php echo"PerDaysalary".$i;?>" id="<?php echo"PerDaysalary".$i;?>"  size="10" readonly onKeyPress="return tabE(this,event)" onkeyup="gettotal(<?php echo $i;?>)" class="form-control"></td>
				<td><input type="txt" name="<?php echo"PerHoursalary".$i;?>" id="<?php echo"PerHoursalary".$i;?>"  size="10" readonly onKeyPress="return tabE(this,event)" onkeyup="gettotal(<?php echo $i;?>)" class="form-control"></td>
				<td><input type="txt" name="<?php echo"work_day".$i;?>" id="<?php echo"work_day".$i;?>" value="<?php echo $ans2['Attendanceday']; ?>" size="5" readonly onKeyPress="return tabE(this,event)" class="form-control" onkeyup="gettotal(<?php echo $i;?>)"></td>
				<td><input type="txt" name="<?php echo"work_hour".$i;?>" id="<?php echo"work_hour".$i;?>" value="<?php echo $ans2['Working_Hours']; ?>" size="5" readonly onKeyPress="return tabE(this,event)" class="form-control" onkeyup="gettotal(<?php echo $i;?>)"></td>
				<td><input type="txt" name="<?php echo"NoOFDayLeave".$i;?>" id="<?php echo"NoOFDayLeave".$i;?>" value="<?php echo $NoOfDaysLeave; ?>"  size="10" readonly onKeyPress="return tabE(this,event)"  onkeyup="gettotal(<?php echo $i;?>)" class="form-control"></td>
				<td><input type="txt" name="<?php echo"NoOFHourLeft".$i;?>" id="<?php echo"NoOFHourLeft".$i;?>" value="<?php echo $ans2['Late_Hours']; ?>"  size="10" readonly onKeyPress="return tabE(this,event)"  onkeyup="gettotal(<?php echo $i;?>)" class="form-control"></td>
				<td><input type="txt" name="<?php echo"phd".$i;?>" id="<?php echo"phd".$i;?>" onKeyPress="return tabE(this,event)" class="form-control" readonly size="5" onkeyup="gettotal(<?php echo $i;?>)" value="1"></td>
				<td><input type="txt" name="<?php echo"MonthlyIncentive".$i;?>" id="<?php echo"MonthlyIncentive".$i;?>" onKeyPress="return tabE(this,event)" size="5" class="form-control" onkeyup="gettotal(<?php echo $i;?>)"></td>
				<td><input type="txt" name="<?php echo"deduction".$i;?>" id="<?php echo"deduction".$i;?>" onKeyPress="return tabE(this,event)" size="5" onkeyup="gettotal(<?php echo $i;?>)" class="form-control"></td>
				<td><input type="txt" name="<?php echo"total".$i;?>" id="<?php echo"total".$i;?>" onKeyPress="return tabE(this,event)" size="5" onkeyup="gettotal(<?php echo $i;?>)" class="form-control" readonly="true"></td>
				<input type="hidden" name="tnc" id="tnc" value="<?php echo $i; ?>" class="form-control" readonly="true">	 
				</tr>
				<?php
				}
				}
				}
				?>
				
			 
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
