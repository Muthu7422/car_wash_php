<?php
include("../../includes.php");
include("../../redirect.php");

   $see="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'"; 
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
        Employee OfferLetter
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
	<?php 
	$ss="select * from h_offer_letter";
$Ess=mysqli_query($conn,$ss);
$Fss=mysqli_fetch_array($Ess);
$ns=mysqli_num_rows($Ess);
$ns1=$ns+0001;
$dc="AD".$ns1;
	
	?>
    <section class="content container-fluid">
    <form role="form" method="post" action="o_offerletter_act.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Employee code</label>
                  <input type="text" class="form-control" name="ecode" id="ename" value="<?php echo $dc; ?>" onKeyPress="return tabE(this,event)" readonly ="true" >
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Employee Name</label>
                  <input type="text" class="form-control" name="ename" id="ename" placeholder="Employee Name" onKeyPress="return tabE(this,event)" >
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Mobile</label>
                  <input type="text" class="form-control" name="emobile" id="emobile" placeholder="Mobile No" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Address</label>
                  <textarea class="form-control" name="saddress" id="saddress" placeholder="Supplier Addres" onKeyPress="return tabE(this,event)"></textarea>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Email</label>
                  <input type="text" class="form-control" name="eemail" id="eemail" placeholder="Employee Email" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee State</label>
                <select class="form-control" id="sstate" name="sstate" onKeyPress="return tabE(this,event)">
				  <option selected="selected">TAMILNADU</option>
                  <option>KERALA</option>
				  <option>PONDICHERRY</option>
				  <option>ANDHRA</option>
				  <option>CHENNAI</option>
				  <option>KARNATAKA</option>
				</select>
                </div>
				<div class="col-md-12"></div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Joining Date</label>
                 <input type="date" class="form-control" name="jdate" id="jdate" placeholder="Joining Date" onKeyPress="return tabE(this,event)" >
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Designation</label>
                  <select class="form-control" id="edesign" name="edesign" onKeyPress="return tabE(this,event)">
				    <option value="">---Select the Designation--</option>
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
				  <option value="">---Select the Departmemnt--</option>
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
                  <label for="Branch">Per Month  Salary</label>
                 <input type="text" class="form-control" name="salary" id="salary" onKeyPress="return tabE(this,event)" placeholder="Salary" required>
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
	
	  <section class="content container-fluid">
       
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
				  <th>Mobile</th>
				  <th>Address</th>
				  <th>Departmemnt</th>
				  <th>Action</th>
				    <th>Print</th>
				   <th>Add the Employee</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$em="select * from h_offer_letter where status='Active' and FranchiseeId='".$_SESSION['FranchiseeId']."' order by ename";
				$Eem=mysqli_query($conn,$em);
				$i=0;
				while($Fem=mysqli_fetch_array($Eem))
				{
					$epw="select * from h_department where id='".$Fem['edepart']."'";
					$Rpm=mysqli_query($conn,$epw);
					$pse=mysqli_fetch_array($Rpm);
					
				$i++;
				?>
				<tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $Fem['ename']; ?></td>
				  <td><?php  echo $Fem['emobile']; ?></td>
				  <td><?php  echo $Fem['address']; ?></td>
				  <td><?php  echo $pse['dname']; ?></td>
                  <td>
                      <a href="o_offerletter_edit.php?id=<?php  echo $Fem['id']; ?>" title="Edit the Name" onClick="return confirm('Aru You sure Edit?');" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
					  <a href="o_offerletter_delete.php?id=<?php echo $Fem['id']; ?>" title="Delete the Name" onClick="return confirm('Aru You sure Delete?');" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a>
                  </td>
				   <td>
                      <a href="o_offerletter_receipt.php?ecode=<?php  echo $Fem['ecode']; ?>" title="Submit the Ptint" onClick="return confirm('Aru You sure Print?');" class="btn-box-tool"><i class="fa fa-print" style="font-size:28px;color:bule"></i></a>
                  </td>
				  <?php
				  $epm="select * from h_employee where ecode='".$Fem['ecode']."'";
				  $rpm=mysqli_query($conn,$epm);
				  $epm=mysqli_num_rows($rpm);
				  
				  ?>
				<?php
				if($epm<'1')
				{
				?>
				  <td>
                      <a href="../employee/h_employee.php?id=<?php  echo $Fem['id']; ?>" title="Edit the Name" onClick="return confirm('Aru You sure Edit?');" class="btn-box-tool"><i class="fa fa-angle-double-right" style="font-size:25px;color:blue"></i></a>
					 
                  </td>
				  <?php
				}
				else
				{
				  ?>
				   <td>Already Existing</td>
                </tr>
				<?php
				}
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
