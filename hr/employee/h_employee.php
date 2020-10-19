<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'"; 
$absc=mysqli_query($conn,$see);
$var=mysqli_fetch_array($absc);
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
    <form role="form" method="post" action="h_employee_act.php" enctype="multipart/form-data">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
			$Rpw="select * from h_employee";
			$Rpm=mysqli_query($conn,$Rpw);
			$Rep=mysqli_num_rows($Rpm);
			$n=$Rep+1;
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
				 <input type="text" class="form-control" name="ecode" id="ecode" value="<?php echo EC.$n; ?>" readonly  onKeyPress="return tabE(this,event)" required>
                <input type="hidden" class="form-control" name="franchisee_id"  id="franchisee_id" value="<?php echo $var['id']; ?>" readonly placeholder="Pid" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
				</div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Employee Name</label>
                  <input type="text" class="form-control" name="ename" id="ename" value="<?php echo $Rep['ename']; ?>" onKeyPress="return tabE(this,event)" required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Employee Mobile</label>
                  <input type="number" class="form-control" name="emobile" id="emobile" value="<?php echo $Rep['emobile']; ?>" onKeyPress="return tabE(this,event)" >
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Secondary Mobile</label>
                  <input type="number" class="form-control" name="smobile" id="smobile" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Address</label>
                  <textarea class="form-control" name="saddress" id="saddress" onKeyPress="return tabE(this,event)"><?php echo $Rep['address']; ?></textarea>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee City</label>
                  <input type="text" class="form-control" name="scity" id="scity" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee State</label>
                <select class="form-control" id="sstate" name="sstate" onKeyPress="return tabE(this,event)">
				 <option selected="selected"><?php echo $Rep['state']; ?></option>
				  <option>TAMILNADU</option>
                  <option>KERALA</option>
				  <option>PONDICHERRY</option>
				  <option>ANDHRA</option>
				  <option>CHENNAI</option>
				  <option>KARNATAKA</option>
				</select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Joining Date</label>
                  <input type="date" class="form-control" name="date" id="date" value="<?php echo $Rep['joindate']; ?>"  onKeyPress="return tabE(this,event)">
                </div>
				<div class="col-md-12"></div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Email ID</label>
                 <input type="email" class="form-control" name="semail" value="<?php echo $Rep['email']; ?>" id="semail" placeholder="Email ID" onKeyPress="return tabE(this,event)" >
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Designation</label>
                  <select class="form-control" id="edesign" name="edesign" onKeyPress="return tabE(this,event)">
				  <?php 
				  $ssc="select * from h_designation where status='Active' and id='".$Rep['edesignation']."'";
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
                  <select class="form-control" id="edept" name="edept" onKeyPress="return tabE(this,event)" required>
				  <?php 
				  $ssc="select * from h_department where status='Active' and id='".$Rep['edepart']."'";
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
                  <input class="form-control" name="blood_group" id="blood_group" onKeyPress="return tabE(this,event)" placeholder="Blood Group" >
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Per Month  Salary</label>
                 <input type="text" class="form-control" name="salary" id="salary" value="<?php echo $Rep['perannulsalary'] ?>" onKeyPress="return tabE(this,event)" placeholder="Salary" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Remarks</label>
                  <textarea class="form-control" name="remarks" id="remarks" placeholder="Remarks" onKeyPress="return tabE(this,event)"></textarea>
                </div>
				
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
			
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
		
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>    
         </div>
    </form>
	</section>
    <!-- /.content -->
	
	  <section class="content container-fluid" hidden>
       
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
                  <th>Employee Name</th>
				  <th>Mobile 1</th>
				  <th>City</th>
				  <th>Department</th>
				  <th>Proof Details</th>
				  <th>Action</th>
				   <th>Relieving The Employee</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$em="select * from h_employee where status='Active' and FrachiseeId='".$_SESSION['BranchId']."' order by ename";
				$Eem=mysqli_query($conn,$em);
				$i=0;
				while($Fem=mysqli_fetch_array($Eem))
				{
					$ssc="select * from h_department where status='Active' and id='".$Fem['edepart']."'";
				  $Essc=mysqli_query($ssc);
				  $FEssc=mysqli_fetch_array($Essc);
				$i++;
				?>
				<tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $Fem['ename']; ?></td>
				  <td><?php  echo $Fem['emobile']; ?></td>
				  <td><?php  echo $Fem['ecity']; ?></td>
				  <td><?php  echo $FEssc['dname']; ?></td>
                  <td>
				  <a href="h_employee_proof_detail.php?id=<?php  echo $Fem['id']; ?>" class="btn-box-tool"><i class="fa fa-eye custom-icon1" style="font-size:23px"></i></a>
                     </td>
					 <td>
					 <a href="h_employee_edit.php?id=<?php  echo $Fem['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1" style="font-size:23px"></i></a>
					  <a href="h_employee_delete.php?id=<?php echo $Fem['id']; ?>" onClick="return Delete_Click();" class="btn-box-tool" style="font-size:23px"><i class="fa fa-close custom-icon1"></i></a>
                  </td>
				   <td align="center">
                      <a href="../relievingletter/r_relievingletter.php?id=<?php  echo $Fem['id']; ?>" title="Edit the Name" onClick="return confirm('Aru You sure Edit?');" class="btn-box-tool"><i class="fa fa-angle-double-right" style="font-size:25px;color:blue"></i></a>
					 
                  </td>
                </tr>
				<?php
				}
				?>
               
                </tbody>
              </table>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
