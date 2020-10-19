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
	<form name="form1" method="post" action="employee_attendance_entry_act.php"> 
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
                  <input type="date" name="AttendanceDate" class="form-control" id="AttendanceDate" value="<?php echo $_POST['AttendanceDate']; ?>" onKeyPress="return tabE(this,event)" readonly="true">
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
				<th>Shift</th>
				<th> Total Working Hours</th>
				<th>Late Hours</th>
				<th>Total Working Hours</th>
				<th>Remarks</th>
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
					$i++;
				?>
				<?php
				//if($dpm<'1')
				//{
				?>
                <tr>
				<td><?php echo $i; ?></td>
				<td style="display:none"><input type="text" class="form-control" name="<?php echo "EmployeeId".$i;?>" id="<?php echo "EmployeeId".$i;?>" value="<?php echo $Fct['id']; ?>"  onKeyPress="return tabE(this,event)" readonly="true"></td>
				<td ><input type="text" class="form-control" style="width:65px;" name="<?php echo "ecode".$i;?>" id="<?php echo "ecode".$i;?>" value="<?php echo $Fct['ecode']; ?>"  onKeyPress="return tabE(this,event)" readonly="true"></td>
                <td><input type="txt" name="<?php echo "employee_name".$i;?>" id="<?php echo "employee_name".$i;?>" value="<?php echo $Fct['ename']; ?>" onKeyPress="return tabE(this,event)" class="form-control" readonly="true"></td>
				<td><input type="txt" name="<?php echo"dept".$i;?>" id="<?php echo"dept".$i;?>" value="<?php echo $tpm['dname']; ?>"  class="form-control" onKeyPress="return tabE(this,event)" readonly="true"></td>
				<td >
						<input type="radio" name="<?php echo "Attendance".$i;  ?>" id="<?php echo "Attendance".$i;  ?>" value="1" checked /> : Present
						<input type="radio" name="<?php echo "Attendance".$i;  ?>" id="<?php echo "Attendance".$i;  ?>" value="0.5" /> : Half 
						<input type="radio" name="<?php echo "Attendance".$i;  ?>" id="<?php echo "Attendance".$i;  ?>" value="0"  /> : Absent  
				</td>
				<td><select class="form-control" name="<?php echo "Shift".$i;  ?>" id="<?php echo "Shift".$i;  ?>" onKeyPress="return tabE(this,event)" OnChange="get_total(<?php echo $i;?>)">
				<option value="">--Select Shift--</option>
				<option value="10.30">Shift 1 (AM) </option>
				<option value="2.00">Shift 2 (PM) </option>
				</select>
				</td>
				<td><input type="txt" name="<?php echo"Total_Hours".$i;?>" id="<?php echo"Total_Hours".$i;?>"  class="form-control" onKeyPress="return tabE(this,event)" readonly="true"></td>
				<td><input type="txt" name="<?php echo"Late_Hours".$i;?>" id="<?php echo"Late_Hours".$i;?>"  onKeyPress="return tabE(this,event)" OnKeyUp="getLate_Hours(<?php echo $i;?>)"  class="form-control"></td>
				<td><input type="txt" name="<?php echo"Working_Hours".$i;?>" id="<?php echo"Working_Hours".$i;?>"  onKeyPress="return tabE(this,event)"  class="form-control" readonly></td>
				<td><input type="txt" name="<?php echo"Remarks".$i;?>" id="<?php echo"Remarks".$i;?>"  onKeyPress="return tabE(this,event)"  class="form-control"></td>
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
