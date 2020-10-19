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
        Relieving
        <small><b>Letter</b></small>
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
    <form role="form" method="post" action="r_relievingletter_act.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
             <?php
			$Rpw="select * from h_employee where id='".$_REQUEST['id']."'";
			$Rpm=mysqli_query($conn,$Rpw);
			$Rep=mysqli_fetch_array($Rpm);
			?>
              <div class="box-body">
			   <div class="form-group col-sm-4">
                  <label for="Branch">Employee Code</label>
                  <input type="text" class="form-control" name="ecode" id="ecode" value="<?php echo $Rep['ecode']; ?>" readonly onKeyPress="return tabE(this,event)" required>
                </div>
                <div class="form-group col-sm-4">
                  <label for="Branch">Employee Name</label>
                  <input type="text" class="form-control" name="ename" id="ename" value="<?php echo $Rep['ename']; ?>" readonly onKeyPress="return tabE(this,event)" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Designation</label>
                  <select class="form-control" id="edesign" name="edesign" onKeyPress="return tabE(this,event)" readonly>
				  <?php 
				  $ssc="select * from h_designation where status='Active' and id='".$Rep['edesign']."'";
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
                  <select class="form-control" id="edept" name="edept" onKeyPress="return tabE(this,event)"  readonly>
				  <?php 
				  $ssc="select * from h_department where status='Active' and id='".$Rep['edepart']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['dname']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Joining Date</label>
                  <input type="date" class="form-control" name="jdate" id="jdate" value="<?php echo $Rep['joindate']; ?>" readonly onKeyPress="return tabE(this,event)">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Relieving Date</label>
                  <input type="date" class="form-control" name="rdate" id="rdate" onKeyPress="return tabE(this,event)" placeholder="Blood Group" >
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Experiences</label>
                  <input type="text" class="form-control" name="exper" id="exper" placeholder="Experiences" onKeyPress="return tabE(this,event)">
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
                  <th>Employee Code</th>
				  <th>Employee Name</th>
				  <th> Designation</th>
				  <th>Joining Date</th>
				  <th>Relieving Date</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$em="select * from h_relieving where FranchiseeId='".$_SESSION['BranchId']."' order by ename";
				$Eem=mysqli_query($conn,$em);
				$i=0;
				while($Fem=mysqli_fetch_array($Eem))
				{
					$rpm="select * from h_designation where id='".$Fem['designa']."'";
					$rps=mysqli_query($conn,$rpm);
					$tpm=mysqli_fetch_array($rps);
				$i++;
				?>
				<tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $Fem['ecode']; ?></td>
				  <td><?php  echo $Fem['ename']; ?></td>
				  <td><?php  echo $tpm['dname']; ?></td>
				  <td><?php  echo $Fem['joindate']; ?></td>
				    <td><?php  echo $Fem['relive_date']; ?></td>
                  <td>
                      <a href="r_relievingletter_edit.php?id=<?php  echo $Fem['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
					  <a href="r_relievingletter_delete.php?id=<?php echo $Fem['id']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a>
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
