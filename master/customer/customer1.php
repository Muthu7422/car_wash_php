<?php
session_start();
include("../../dbinfo.php");

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
  
  <?php
include("../../dbinfo.php");


?>
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
  
  
function ShowHideDiv() {
        var ddlPassport = document.getElementById("ddlPassport");
        
        dvPassport.style.display = ddlPassport.value == "add" ? "block" : "none";
		alert();
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
        Spare Types
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
              <h3 class="box-title">Customer Entry</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
            <form class="form-horizontal" method="post" action="customer_update_act.php?id=<?php echo $_REQUEST['id']; ?>">
              <div class="box-body">
                  
                <div class="form-group">
                  <label for="catcode" class="col-sm-3 control-label">Customer Id</label>
                  <div class="col-sm-8">
                     <?php 
					  $ct="select * from a_customer where id='".$_REQUEST['id']."'"; 
					 $Ect=mysqli_query($conn,$ct);
					 $Fct=mysqli_fetch_array($Ect);
					 $n=mysqli_num_rows($Ect);
					 $n1=$n+1;
					 echo "C".$n1;
					  ?>
                  </div>
                </div>
				<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Customer Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="customer_name" autofocus="autofocus" id="customer_name" value="<?php echo $Fct['cust_name']; ?>" placeholder="Customer Name" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div>
                <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="address" autofocus="autofocus" id="address" value="<?php echo $Fct['addr']; ?>" placeholder="Address" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Mobile No1</label>
                      <div class="col-sm-8">
					  
                        <input type="text" class="form-control" name="mobile1" autofocus="autofocus" id="mobile1" value="<?php echo $Fct['mobile1']; ?>" placeholder="Mobile No1" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Mobile No2</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="mobile2" autofocus="autofocus" id="mobile2" value="<?php echo $Fct['mobile2']; ?>" placeholder="Mobile No2" onKeyPress="return tabE(this,event)" style="text-transform:uppercase">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Email Id</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" autofocus="autofocus" id="email" value="<?php echo $Fct['email']; ?>" placeholder="Email Id" onKeyPress="return tabE(this,event)" >
                      </div>
                    </div>                   
            <div class="box-header with-border">
              <h3 class="box-title">Vehicle Entry</h3>
            </div>
			        <div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Vehicle No</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="vehicle_no2" autofocus="autofocus" id="vehicle_no2" value="<?php  ?>" placeholder="Vehicle No2" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Vehicle Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="vehicle_name2" autofocus="autofocus" id="vehicle_name2" value="<?php  ?>" placeholder="Vehicle Name2" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="catname" class="col-sm-3 control-label">Vehicle Make</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="vehicle_make2" autofocus="autofocus" id="vehicle_make2" value="<?php  ?>" placeholder="Vehicle Make2" onKeyPress="return tabE(this,event)" style="text-transform:uppercase" required>
                      </div>
                    </div>

					
                    
					
					
					
              </div>
              <!-- /.box-body -->
			 
              <div class="box-footer">
			 
                <button type="submit" class="btn btn-default ">Cancel</button>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="add" class="btn btn-info" value="Add Vehicle" />

                <button  type="submit" class="btn btn-info pull-right">Save Changes</button>
              </div>
              <!-- /.box-footer -->
            </form>
			
			
          </div>
        </div>
      </div>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Available Customers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Cust Id</th>
                  <th>Cust Name</th>
				  <th>Mobile No1</th>
				  <th>Mobile No2</th>
				  <th>Email Id</th>
				  <th>V.No1</th>
				  <th>V.Name1</th>
				  <th>V.Make1</th>
				  <th width="15%">Edit / Delete</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ct="select * from a_customer where status=1";
				$Ect=mysqli_query($conn,$ct);
				while($Fct=mysqli_fetch_array($Ect))
				{
				?>
                <tr>
                  <td><?php echo $Fct['id'];  ?></td>
                  <td><?php echo $Fct['cust_name'];  ?></td>
				  <td><?php echo $Fct['mobile1']; ?></td>
				  <td><?php echo $Fct['mobile2'];  ?></td>
				  <td><?php echo $Fct['email'];  ?></td>
				  <td><?php echo $Fct['v_no1'];  ?></td>
				  <td><?php echo $Fct['v_name1'];  ?></td>
				  <td><?php echo $Fct['v_make1'];  ?></td>
				 
				  <td>
                      <a href="customer_edit.php?id=<?php echo $Fct['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a> |
                      <a href="#.php?id=<?php echo $Fct['id']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a>
                  </td>
                </tr>
				<?php
				}
				?>
                  </tbody>
                <tfoot>
                <tr>
                  <th>Cust Id</th>
                  <th>Cust Name</th>
				  <th>Mobile No1</th>
				  <th>Mobile No2</th>
				  <th>Email Id</th>
				  <th>V.No1</th>
				  <th>V.Name1</th>
				  <th>V.Make1</th>
				  <th width="15%">Edit / Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            
          
        </div>
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
</div>

	  <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
</body>
</html>