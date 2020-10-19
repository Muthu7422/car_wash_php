<?php
error_reporting(0);
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
        Employee
        <small>Master</small>
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
    <form role="form" method="post" action="h_employee_edit_act.php" enctype="multipart/form-data">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
         
             <!-- /.box-header -->
            <!-- form start -->
            <div class="box box-primary">
            
			
			    <?php
   $em="select * from h_employee where id='".$_REQUEST['id']."'";
   $Eem=mysqli_query($conn,$em);
   $Fem=mysqli_fetch_array($Eem);
   
 
   
			  $ss="select *from m_franchisee where id='".$Fem['FrachiseeId']."'";
			  $Ems=mysqli_query($conn,$ss);
			  $Fsc=mysqli_fetch_array($Ems);
			  ?>
			     <div class="box-body">
			  
			    <div class="form-group col-sm-4">
                  <label for="Branch">Branch  Name</label>
                  <select type="text" class="form-control" name="fran_name" id="fran_name" readonly onKeyPress="return tabE(this,event)" required>
				  <?php
				   $ssc="select * from m_franchisee where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id'] ?>"><?php echo $FEssc['franchisee_name'] ?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Employee Code</label>
                  <input type="text" class="form-control" name="ecode" id="ecode" value="<?php echo $Fem['ecode']; ?>" readonly  onKeyPress="return tabE(this,event)" required>
                </div>
				
				  <div class="form-group col-sm-4 hidden">
                  <label for="Branch">Employee Id</label>
                  <input type="text" class="form-control" name="emp_id" id="emp_id" value="<?php echo $Fem['id']; ?>" readonly  onKeyPress="return tabE(this,event)">
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Employee Name</label>
                  <input type="text" class="form-control" name="ename" id="ename" value="<?php echo $Fem['ename']; ?>" onKeyPress="return tabE(this,event)" required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Employee Mobile</label>
                  <input type="text" class="form-control" name="emobile" id="emobile" value="<?php echo $Fem['emobile']; ?>" onKeyPress="return tabE(this,event)" required>
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Secondary Mobile</label>
                  <input type="text" class="form-control" name="smobile" value="<?php echo $Fem['smobile']; ?>" id="smobile" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Address</label>
                  <textarea class="form-control" name="saddress" id="saddress" onKeyPress="return tabE(this,event)"><?php echo $Fem['eaddr']; ?></textarea>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee City</label>
                  <input type="text" class="form-control" name="scity" value="<?php echo $Fem['ecity']; ?>" id="scity" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee State</label>
                <select class="form-control" id="sstate" name="sstate" onKeyPress="return tabE(this,event)">
				 <option selected="selected"><?php echo $Fem['estate']; ?></option>
				  <option>TAMILNADU</option>
                  <option>KERKA</option>
				  <option>PONDICHERRY</option>
				  <option>ANDHRA</option>
				  <option>CHENNAI</option>
				  <option>KARNATAKA</option>
				</select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Joining Date</label>
                  <input type="date" class="form-control" name="date" id="date" value="<?php echo $Fem['joindate']; ?>"  onKeyPress="return tabE(this,event)">
                </div>
				<div class="col-md-12"></div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Email ID</label>
                 <input type="email" class="form-control" name="semail" value="<?php echo $Fem['email']; ?>" id="semail" onKeyPress="return tabE(this,event)" >
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Designation</label>
                  <select class="form-control" id="edesign" name="edesign" onKeyPress="return tabE(this,event)">
				  <?php 
				  $ssc="select * from h_designation where status='Active' and id='".$Fem['edesign']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['dname']; ?></option>
				  <?php } ?>
				   <?php 
				  $ssc="select * from h_designation where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['dname']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Departmemnt</label>
                  <select class="form-control" id="edept" name="edept" onKeyPress="return tabE(this,event)">
				  <?php 
				  $ssc="select * from h_department where status='Active' and id='".$Fem['edepart']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['dname']; ?></option>
				  <?php } ?>
				  
				   <?php 
				  $ssc="select * from h_department where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['dname']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Blood Group</label>
                  <input class="form-control" name="blood_group" id="blood_group" value="<?php echo $Fem['blood_group']; ?>" onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Per Month  Salary</label>
                 <input type="text" class="form-control" name="salary" id="salary" value="<?php echo $Fem['salary']; ?>" onKeyPress="return tabE(this,event)" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Remarks</label>
                  <textarea class="form-control" name="remarks" id="remarks" onKeyPress="return tabE(this,event)"><?php echo $Fem['remarks']; ?></textarea>
                </div>
				
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		<div class="col-sm-12">
				 
            <div class="box-header with-border">
              <h3 class="box-title" style="color:red"><b>Employee Proof Details</b></h3>
			</div>
			 <div class="col-sm-5">
			 
			 <br>
			 <div class="form-group">
                      <label for="careof" class="col-sm-6 control-label">Employee Photo</label>
                      <div class="col-sm-6">
                        <input type="file"  name="EmployeePhoto" id="EmployeePhoto" autocomplete="off"  placeholder="Customer Photo">
                      </div>
                    </div> 
					</div>
						
				
			 <div class="col-sm-5">
			 <br>
					<div class="form-group">
                      <label for="careof" class="col-sm-6 control-label">Aadhaar Card</label>
                      <div class="col-sm-6">
                         <input type="file"  name="AatherCard" id="AatherCard" autocomplete="off"  placeholder="Aather Card">
                      </div>
                    </div>
					</div>
			 <div class="col-sm-5">
			 <br>
					<div class="form-group">
                      <label for="careof" class="col-sm-6 control-label">Pancard</label>
                      <div class="col-sm-6">
                        <input type="file"  name="Pancard" id="Pancard" autocomplete="off"  placeholder="Pancard">
                      </div>
                    </div>
					</div>
			 <div class="col-sm-5">
			 <br>
					 <div class="form-group">
                      <label for="careof" class="col-sm-6 control-label">Driving Lincence</label>
                      <div class="col-sm-6">
                         <input type="file"  name="DrivingLicence" id="DrivingLicence" autocomplete="off"  placeholder="Driving Linence">
                      </div>
                    </div>
						</div>
			 <div class="col-sm-5">	
<br>			 
					 <div class="form-group">
                      <label for="careof" class="col-sm-6 control-label">Voter Id</label>
                      <div class="col-sm-6">
                        <input type="file"  name="VoterId" id="VoterId" autocomplete="off"  placeholder="Voter Id">
                      </div>
                    </div>
					</div>
			 <div class="col-sm-5">
			 <br>
					   <div class="form-group">
                      <label for="careof" class="col-sm-6 control-label">Other Documents</label>
                      <div class="col-sm-6">
                         <input type="file"  name="OtherDocuments" id="OtherDocuments" autocomplete="off"  placeholder="Other Documents">
                      </div>
                    </div>			
					
					</div>
					
			</div>
	<div class="box-footer">
		
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>    
         </div>
    </form>
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
