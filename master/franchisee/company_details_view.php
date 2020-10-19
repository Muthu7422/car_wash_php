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
 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/proCustom.css">    
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.css">
  
    <!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|-->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<link rel="stylesheet" type="text/css" href="http://localhost/popup/popup-window.css" />
<script type="text/javascript" src="http://localhost/popup/jquery/jquery.js"></script>
<script type="text/javascript" src="http://localhost/popup/popup-window.js"></script>
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
  
function Delete_Click() {
    var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        return true;
    }
	else
		return false;
}  
  
</script>

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
        Company Details
        <small>Master</small>
      </h1>
     </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Company Entry Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php
			
			
			$ct1="select * from m_vendor where id='".$_REQUEST['id']."'";
				$Ect1=mysqli_query($conn,$ct1);
				$Fct1=mysqli_fetch_array($Ect1);
				$n=mysqli_num_rows($Ect1);
			?>
            <form class="form-horizontal" method="post" action="franchisee_edit_act.php?id=<?php echo $Fct1['id']; ?>"  enctype="multipart/form-data">
       
              <div class="box-body">
                  
                <div class="hidden">
                  <label for="catcode" class="col-sm-3 control-label">Franchisee Id</label>
                  <div class="col-sm-4">
				  <?php
				   $sa="select * from m_company";
				  $Esa=mysqli_query($conn,$sa);
				  $n=mysqli_num_rows($Esa);
				  $ect=$n+1;
					?>
	            <input type="text" class="form-control" name="franchisee_no"  id="franchisee_no" value="<?php echo $Fct1['franchisee_id'];  ?>" placeholder="Franchisee ID" onKeyPress="return tabE(this,event)" readonly style="text-transform:uppercase" required>
                 
                  </div>
                </div>
				
				<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Company Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="franchisee_name" autofocus="autofocus" id="franchisee_name" value="<?php echo $Fct1['franchisee_name']  ?>" placeholder="Franchisee Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly required>
                        <input type="hidden" class="form-control" name="id" autofocus="autofocus" id="id" value="<?php echo $Fct1['id']  ?>" placeholder="Franchisee Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div>
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="address" autofocus="autofocus" id="address" value="<?php echo $Fct1['address']  ?>" placeholder="Address" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
                      </div>
                    </div>
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Mobile No</label>
                      <div class="col-sm-8">
					  
                        <input type="text" class="form-control" name="mobile" autofocus="autofocus" id="mobile" value="<?php echo $Fct1['mobile']  ?>" placeholder="Mobile No" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" readonly>
                      </div>
                    </div>
											<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Email Id</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" autofocus="autofocus" id="email" value="<?php echo $Fct1['email']  ?>" placeholder="Email Id" onKeyPress="return tabE(this,event)" readonly >
                      </div>
                    </div> 
					  <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">WebSite</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="web" autofocus="autofocus" id="web" value="<?php echo $Fct1['website']  ?>" placeholder="WebSite" onKeyPress="return tabE(this,event)" readonly >
                      </div>
                    </div> 	
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Contact Person</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="cen_manager" autofocus="autofocus" id="cen_manager" value="<?php echo $Fct1['cen_manager']  ?>" placeholder="Center Manager" onKeyPress="return tabE(this,event)" readonly >
                      </div>
                    </div> 	
						<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Contact Number</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="con_num" autofocus="autofocus" id="con_num" value="<?php echo $Fct1['con_number']  ?>" placeholder="Contact Number" onKeyPress="return tabE(this,event)" readonly>
                      </div>
                    </div> 	
 <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">GSTIN</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="gstin" autofocus="autofocus" id="gstin" value="<?php echo $Fct1['gst_no']  ?>" placeholder="GSTIN" onKeyPress="return tabE(this,event)"  readonly>
                      </div>
                    </div> 						
   					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Remarks</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="Remarks" autofocus="autofocus" id="Remarks" value="<?php echo $Fct1['Remarks']; ?>" placeholder="Remarks" onKeyPress="return tabE(this,event)" readonly>
                      </div>
                    </div>
							<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Company Logo</label>
					   <div class="col-sm-8">
						<img src="<?php echo $Fct1['img'];  ?>" height="50" width="50">
                         </div> 
                    </div> 		
					 <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-8">
                        <select type="text" class="form-control" name="status" autofocus="autofocus" id="status" placeholder="Status" onKeyPress="return tabE(this,event)" readonly >
						<option>Active</option>    
						<option>Deactive</option>		 
						</select>
					 </div>
                    </div> 	
              </div>
              <!-- /.box-body -->
			 
              <div class="box-footer">
			 
                <a href="franchisee.php"><button type="" name="Back" id="Back" class="btn btn-info" ><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</button></a>
              </div>
              <!-- /.box-footer -->
            </form>
			
			
          </div>
        </div>

    </section>
     <!-- /.content -->
  
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
	  <?php include("../../footer.php"); ?>
  <!--footer End-->
 <div class="control-sidebar-bg"></div>
 <?php include("../../includes_db_js.php"); ?>
</body>
</html>