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
        Discount 
        <small>Master</small>
      </h1>
     </section>
	 <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Discount Master Saved Successfully!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['d']!="") {?> 
			  <div class="alert alert-danger">
              <b>Discount Master Deleted Successfully!<i class="fa fa-remove" style="font-size:30px;color:white"></i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                 Discount Master  <b>already</b> exits! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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
    <form role="form" method="post" action="m_discount_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Discount Name</label>
                  <input type="text" class="form-control" name="d_name" id="d_name" placeholder="Discount Name" onKeyPress="return tabE(this,event)" required>
				</div>
				
				  <div class="form-group col-sm-4">
                  <label for="Branch">Discount Percentage%</label>
                  <input type="text" class="form-control" name="d_percentage" id="d_percentage" placeholder="Discount Percentage" onKeyPress="return tabE(this,event)" required>
                </div>
				
				  <div class="form-group col-sm-4">
                  <label for="Branch">Start Time</label>
                  <input type="time" class="form-control" name="s_time" id="s_time" placeholder="Start Time" onKeyPress="return tabE(this,event)" required>
                </div>
				
				  <div class="form-group col-sm-4">
                  <label for="Branch">End Time</label>
                  <input type="time" class="form-control" name="e_time" id="e_time" placeholder="End Time" onKeyPress="return tabE(this,event)" required>
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
            
              <div class="box-body" >
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Discount Name</th>
                  <th>Discount Percentage%</th>
                  <th>Start Time</th>
                  <th>End Time</th>
				  <th>Status</th>
				  <th hidden>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from m_discount where status='Active' order by id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['d_name']; ?></td>
				  <td><?php  echo $FEss['d_percentage']; ?></td>
				  <td><?php  echo $FEss['s_time']; ?></td>
				  <td><?php  echo $FEss['e_time']; ?></td>
				  <td><?php  echo $FEss['status']; ?></td>
                  <td hidden>
                      <a href="m_discount_edit.php?id=<?php  echo $FEss['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
                      <a href="m_discount_delete.php?id=<?php  echo $FEss['id']; ?>" class="btn-box-tool"><i class="fa fa-remove custom-icon1"></i></a>
					 
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
