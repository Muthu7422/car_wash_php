<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");
$rs="select * from reference_scheme";
$rsq=mysqli_query($conn,$rs);
$rsf=mysqli_fetch_array($rsq);
$n=mysqli_num_rows($rsq);
$ars=$n+1;
$rsn="RS"."-".$ars;
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
        Reference  Scheme 
        <small>Master</small>
      </h1>
     </section>
	 <div class="box-header with-border">
             <?php if($_REQUEST['s']!="") {?> 
			  <div class="alert alert-success">
                <strong>Reference Scheme saved!</strong> <i class="glyphicon glyphicon-ok" style="font-size:30px;color:white"></i>
              </div> <?php } ?>
             <?php if($_REQUEST['u']!="") {?> 
			  <div class="alert alert-success">
              <b> Updated Successfully!</i></b>
              </div> <?php } ?>
			  <?php if($_REQUEST['a']!="") {?> 
			  <div class="alert alert-warning">
                 Reference Scheme  <b>already</b> Exist! <i class="fa fa-warning" style="font-size:30px;color:white"></i>
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
    <form role="form" method="post" action="reference_scheme_addQ.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Reference Id</label>
                  <input type="text" class="form-control" name="ReferenceId" id="ReferenceId" placeholder="Reference Id" value="<?php echo $rsn;?>" onKeyPress="return tabE(this,event)" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Reference Amount</label>
                 <input type="number" class="form-control" name="ReferenceAmount" id="ReferenceAmount" placeholder="Reference Amount" onKeyPress="return tabE(this,event)" required>
                </div>
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		
		
	    <div class="box-footer">
		<?php
		
			$refs="select * from reference_scheme";
			$refsq=mysqli_query($conn,$refs);
			$refsf=mysqli_fetch_array($refsq);
			$refn=mysqli_num_rows($refsq);
			if($refn < '1')
			{
		 ?>  <button type="submit" class="btn btn-info pull-right">Submit</button>
		 <?php
			}
			?>
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
                  <th>Reference Id</th>
				  <th>Reference Amount</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from reference_scheme  order by id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FEss['ReferenceId']; ?></td>
				  <td><?php  echo $FEss['ReferenceAmount']; ?></td>
				  <td><?php  echo $FEss['status']; ?></td>
                  <td>
                      <a href="reference_scheme_edit.php?id=<?php echo $FEss['Id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
					 
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
