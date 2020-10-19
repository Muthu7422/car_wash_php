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
        Financial Year
        <small>Master</small>
      </h1>
     </section>
	 <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong> Financial Year Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b> Financial Year Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                  Financial Year  <b>already</b> exiting! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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
    <form role="form" method="post" action="financial_year_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  <?php 
			   $Es="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'"; 
                $Eps=mysqli_query($conn,$Es);
               $duplicate=mysqli_fetch_array($Eps);

			  ?>
                <div class="form-group col-sm-4">
                  <label for="Branch">Financial Name</label>
                  <input type="text" class="form-control" name="financial_year" id="financial_year" placeholder="Financial Year" onKeyPress="return tabE(this,event)" required>
                  </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Start Date</label>
                     <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Financial Year" value=<?php echo date("d-m-Y")?> onKeyPress="return tabE(this,event)" required>
            
                   </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">End Date</label>
                  <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Financial Year" value=<?php echo date("d-m-Y")?> onKeyPress="return tabE(this,event)" required>
                   </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <textarea class="form-control" name="sdescription" id="sdescription" placeholder="description" onKeyPress="return tabE(this,event)"></textarea>
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
            
              <div class="box-body" hidden>
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Financial Name</th>
                  <th>Start Date</th>
                  <th>End Date</th>
				  <th>Description</th>	 
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from f_financial_year where status='Active' order by id";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['financial_year']; ?></td>
				  <td><?php  echo $FEss['start_date']; ?></td>
				  <td><?php  echo $FEss['end_date']; ?></td>
				  <td><?php  echo $FEss['sdescription']; ?></td>
				  
                  <td>
                      <a href="financial_year_edit.php?id=<?php  echo $FEss['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
					 
                  </td>
                </tr>
				<?php } ?>
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
	<section class="content container-fluid">
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
