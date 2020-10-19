<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

$pagename="m_ledger_group.php";
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
    <section class="content container-fluid">
    <form role="form" method="post" action="a_petty_type_addQ.php" autocomplete="off">
	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Petty Ledger Type</label>
                  <select type="text" class="form-control" name="LedgerType" id="LedgerType" placeholder="Vehicle Type" onKeyPress="return tabE(this,event)" required>
				  <option>--Select The Value--</option>
				  <?php 
				  $lm="select * from m_ledger_group order by ledger_group";
				  $Elm=mysqli_query($conn,$lm);
				  while($FElm=mysqli_fetch_array($Elm))
				  {
				  ?>				  
				  <option value="<?php echo $FElm['id']; ?>"><?php echo $FElm['ledger_group']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Petty Type</label>
                  <input class="form-control" name="PettyType" id="PettyType" placeholder="Petty Type" onKeyPress="return tabE(this,event)">
                </div>
            </div>
			  <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" >Submit</button>
                </div>   
								    				<div class="box-footer">	
     <a href="a_petty_type.php"><button type="submit" class="btn btn-info pull-left" ><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</button></a>
   </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
