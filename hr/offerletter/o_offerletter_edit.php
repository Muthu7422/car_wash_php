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
	$ss="select * from h_offer_letter where id='".$_REQUEST['id']."'";
$Ess=mysqli_query($conn,$ss);
$Fss=mysqli_fetch_array($Ess);
	?>
    <section class="content container-fluid">
    <form role="form" method="post" action="o_offerletter_edit_act.php">
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
                  <input type="text" class="form-control" name="ecode" id="ename" value="<?php echo $Fss['ecode']; ?>" onKeyPress="return tabE(this,event)" readonly ="true" >
				   <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $Fss['id']; ?>" onKeyPress="return tabE(this,event)" readonly ="true" >
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Employee Name</label>
                  <input type="text" class="form-control" name="ename" id="ename" value="<?php echo $Fss['ename']; ?>" placeholder="Employee Name" onKeyPress="return tabE(this,event)" >
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Mobile</label>
                  <input type="text" class="form-control" name="emobile" id="emobile" value="<?php echo $Fss['emobile']; ?>" placeholder="Mobile No" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Address</label>
                  <input class="form-control" name="saddress" id="saddress" value="<?php echo $Fss['address']; ?>" placeholder="Supplier Addres" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Email</label>
                  <input type="text" class="form-control" name="eemail" id="eemail" value="<?php echo $Fss['email']; ?>" placeholder="Employee Email" onKeyPress="return tabE(this,event)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee State</label>
                <select class="form-control" id="sstate" name="sstate" onKeyPress="return tabE(this,event)">
				  <option selected="selected"><?php echo $Fss['state']; ?></option>
				    <option>TAMILNADU</option>
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
                 <input type="date" class="form-control" name="jdate" id="jdate" value="<?php echo date('d-m-y', strtotime($Fss['joindate'])); ?>" placeholder="Joining Date" onKeyPress="return tabE(this,event)" >
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Designation</label>
                  <select class="form-control" id="edesign" name="edesign" onKeyPress="return tabE(this,event)">
				  <?php 
				  $ssc="select * from h_designation where status='Active' and id='".$Fss['edesignation']."'";
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
				  $ssc="select * from h_department where status='Active' and id='".$Fss['edepart']."'";
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
                  <label for="Branch">Per Month  Salary</label>
                 <input type="text" class="form-control" name="salary" id="salary" value="<?php echo $Fss['perannulsalary']; ?>" onKeyPress="return tabE(this,event)" placeholder="Salary" required>
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
