<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

$pagename="a_petty_type.php";
  $spno="SELECT * FROM `t_role_pages` where role_id='".$_SESSION['role_name']."' and pageno IN (SELECT id FROM `t_lmenu`where url like '%$pagename') ORDER BY `id` ASC";
$Espno=mysqli_query($conn,$spno);
$FEspno=mysqli_fetch_array($Espno);
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
        Petty Type
        <small>Master</small>
      </h1>
     </section>
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
       <h4><div  align="right"><a href="a_petty_type_fq.php"><b><i class="fa fa-hand-o-right" aria-hidden="true"></i>	CREATE PETTY CASH TYPE</b></a></div></h4>
	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
		
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
                         <?php 
					  if($FEspno['ViewData']>'0')
					  {
					  ?>
              <div class="box-body">
			  <h3>
				Available Petty Type
				</h3>
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
                  <th>S.No</th>
                  <th>Petty Ledger Type</th>
				  <th>Petty Type</th>
				  <th>Status</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from a_petty_type where status='Active' and franchisee_id='".$_SESSION['BranchId']."' order by id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
				 $lm="select * from m_ledger_group where id='".$FEss['LedgerType']."'";
				  $Elm=mysqli_query($conn,$lm);
				  $FElm=mysqli_fetch_array($Elm);
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $FElm['ledger_group']; ?></td>
				  <td><?php  echo $FEss['PettyType']; ?></td>
				  <td><?php  echo $FEss['status']; ?></td>
				  <td>
				     <?php 
					  if($FEspno['CreateData']>'0')
					  {
					  ?>
					  <a href="a_petty_type_fq.php" class="btn-box-tool"><i class="fa fa-plus custom-icon1" title="Create"></i></a>
					  <?php } ?>
                      <?php 
					  if($FEspno['EditData']>'0')
					  {
					  ?>
					  <a href="a_petty_type_edit.php?id=<?php  echo $FEss['id']; ?>" class="btn-box-tool" title="Edit"><i class="fa fa-edit custom-icon1"></i></a>
					   <a href="a_petty_type_delete.php?id=<?php echo $FEss['id']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a>
           
					  <?php } ?>
					  
                  </td>
                 
                </tr>
				<?php } ?>
                </tbody>
              </table>
                </div>
            </div>
			<?php } ?>
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
