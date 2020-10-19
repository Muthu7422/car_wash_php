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
	
     </section>
	 <br>
<div class="col-sm-6">
      <h1>
        Employee List
        <small>HR</small>
		
      </h1>
	  </div>
	  <div class="com-sm-5">
	  <h1>
	  <h4 align="right"><b><a href="../offerletter/o_offerletter.php">Create Offer Letter</a></b></h4>
	  <h1>
	  </div>
	  <div class="box-header with-border">
             <?php if($_REQUEST['m']!="") {?> 
			  <div class="alert alert-success">
                <strong><?php echo $_REQUEST['m']; ?></strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?></div>
            
			  
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
				$em="select * from h_employee where status='Active' and FrachiseeId='".$_SESSION['FranchiseeId']."' order by ename";
				$Eem=mysql_query($em);
				$i=0;
				while($Fem=mysql_fetch_array($Eem))
				{
					$ssc="select * from h_department where status='Active' and id='".$Fem['edepart']."'";
				  $Essc=mysql_query($ssc);
				  $FEssc=mysql_fetch_array($Essc);
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
                      <a href="../relievingletter/r_relievingletter.php?id=<?php  echo $Fem['id']; ?>" title="Edit the Name" onClick="return confirm('Are You Sure?');" class="btn-box-tool"><i class="fa fa-angle-double-right" style="font-size:25px;color:blue"></i></a>
					 
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
