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
				  <th>Employee name</th>
				  <th>Department</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$em="select * from h_relieving where status='Active' and FranchiseeId='".$_SESSION['BranchId']."' order by ename";
				$Eem=mysqli_query($conn,$em);
				$i=0;
				while($Fem=mysqli_fetch_array($Eem))
				{
					$ssc="select * from h_department where status='Active' and id='".$Fem['depart']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  $FEssc=mysqli_fetch_array($Essc);
				$i++;
				?>
				<tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $Fem['ecode']; ?></td>
				  <td><?php  echo $Fem['ename']; ?></td>
				  <td><?php  echo $FEssc['dname']; ?></td>
                  <td>
                      <a href="r_relievingletter_receipt.php?ecode=<?php  echo $Fem['ecode']; ?>" title="Print the Name" onClick="return confirm('Aru You sure Print?');" class="btn-box-tool"><i class="fa fa-print"></i></a> /
					  <a href="r_relievingletter_delete.php?id=<?php echo $Fem['id']; ?>" onClick="return Delete_Click();" title="Delete the Name" class="btn-box-tool"><i class="fa fa-trash custom-icon1"></i></a>
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
