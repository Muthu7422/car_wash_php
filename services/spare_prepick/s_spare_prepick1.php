<?php
session_start();
include("../../dbinfoi.php");

?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("includes_db_css.php"); ?>
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
include("dbinfoi.php");


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

<script>
  
  
  function getMrp(val) {
 var qty = 0;
    var inputs = document.getElementById('sname').value;


$.ajax({
      type:'post',
        url:'getmrp.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("mrp").value=msg;
       
       }
 });

}
	</script>
	<script>
	 function getamt(val) {
	var mrp = document.getElementById("mrp").value;
		var quantity =  document.getElementById("quantity").value;
	 var hra = parseInt((mrp*quantity));
	 document.getElementById("tamount").value = hra; 
	 }
	 
  </script>
 



</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!--header Starts-->
  <?php include("header.php"); ?>
  <!--Header End -->
  <!-- Left side column. contains the logo and sidebar -->
   <?php include("leftbar.php"); ?>
 <!-- Side Bar End -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#ECF0F5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Spare Prepick
        <small>Services</small>
      </h1>
     </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Spare Prepick</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			  <?php 
					  $ct="select * from s_spare_prepick where id='".$_REQUEST['id']."'"; 
					 $Ect=mysqli_query($conn,$ct);
					 $Fct=mysqli_fetch_array($Ect);
					 $n=mysqli_num_rows($Ect);
					 $n1=$n+1;
					 
					  ?>
            <form class="form-horizontal" method="post" action="s_spare_prepick_update_act.php?id=<?php echo $_REQUEST['id']; ?>">
              <div class="box-body">
                  
               <div class="form-group col-sm-4">
                  <label for="Branch">Pre Pick Number</label>
                  <input type="text" class="form-control" name="pre_pick_no" id="pre_pick_no" value="<?php echo $Fct['pre_pick_no'];?>" readonly="true" required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date </label>
                  <input type="text" value="<?php echo date("Y-m-d")?>" class="form-control"  value="<?php echo $Fct['date'];?>" name="date" id="date" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Job Card Number</label>
                  <input type="text" class="form-control" name="job_card_no" id="job_card_no" value="<?php echo $Fct['job_card_no'];?>"  placeholder="Job Card No" onKeyUp="regno(); mod(); mob(); service();" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Number</label>
                  <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" value="<?php echo $Fct['vehicle_no'];?>" placeholder="Vehicle Number">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $Fct['mobile'];?>" placeholder="Mobile">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo $Fct['name'];?>" placeholder="Customer Name">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Service Category</label>
					 <input type="text" class="form-control" name="service_type" id="service_type" value="<?php echo $Fct['service_type'];?>" placeholder="Service Type">
                </div>
				
								
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		
		
		<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
			    <div class="col-md-12"> <h3><label for="Branch">Spare Details</label></h3></div>
                <div class="form-group col-sm-4">
                  <label for="Branch">Spare Category</label>
				  
				  
				  <select class="form-control" id="sdetail" name="sdetail">
				    <option>---Select Spare Category---</option>
				  <?php
				  $sc="select stype from m_spare_type";
				  $scr=mysqli_query($conn,$sc);
				  while($result=mysqli_fetch_array($scr))
				  {  
				  ?>
                 <option value="<?php echo $result['stype'];?>"><?php echo $result['stype'];?></option>
				 <?php
				 }
				 ?>
				  </select>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Spare Brand </label>
                  <select class="form-control" id="sbrand" name="sbrand">
				    <option>---Select Spare Brand---</option>
                <?php
				$sb="select sbrand from m_spare_brand";
				$sbr=mysqli_query($conn,$sb);
				while($sresult=mysqli_fetch_array($sbr))
				{
				
				?> <option value="<?php echo $sresult['sbrand'];?>"><?php echo $sresult['sbrand'];?>
				
				<?php
				}
				?> </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Name</label>
                  <select class="form-control" id="sname" name="sname" onChange="getMrp(this.val)">
				  <option>---Select Spare Name---</option>
                 <?php
				$snb="select sname from m_spare";
				$snbr=mysqli_query($conn,$snb);
				while($snresult=mysqli_fetch_array($snbr))
				{
				
				?> <option value="<?php echo $snresult['sname'];?>"><?php echo $snresult['sname'];?>
				
				<?php
				}
				?> </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">MRP</label>
                  <input type="text" class="form-control" name="mrp" id="mrp" placeholder="MRP">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Quantity</label>
                  <input type="text" class="form-control" name="quantity" id="quantity" placeholder=" Quantity" onKeyUp="getamt(this.val)">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Total Amount Rs.</label>
                  <input type="text" class="form-control" name="tamount" id="tamount" placeholder="Total Amount">
                </div>
				
				
				
				
								
            </div>
              <!-- /.box-body -->
      
			 
              <div class="box-footer">
			 
                <button type="submit" class="btn btn-default ">Cancel</button>
          <input type="submit" name="add" class="btn btn-info pull-left" value="Add Spares" />

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
				<div style="overflow:auto">
              <table id="example1" class="table table-bordered table-striped" width="150%">
                <thead>
                <tr>
                 <th>S.No</th>
                  <th>pre_pick_no</th>
				  <th>date</th>
				  <th>job_card_no</th>
				  <th>vehicle_no</th>
				  <th>mobile</th>
				  <th>name</th>
				  <th>service_type</th>
				   <th>sdetail</th>
				    <th>sbrand</th>
					 <th>sname</th>
					  <th>mrp</th>
					    <th>quantity</th>
						  <th>tamount</th>
						   <th>Delete</th>
                </tr>
                </thead>
                <tbody>
					<?php
				$ct="select * from s_spare_prepick";
				$Ect=mysqli_query($conn,$ct);
				$n=mysqli_num_rows($Ect);
				$i=0;
				while($Fct=mysqli_fetch_array($Ect))
				{
				$i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $Fct['pre_pick_no'];  ?></td>
				  <td><?php echo $Fct['date']; ?></td>
				  <td><?php echo $Fct['job_card_no'];  ?></td>
				  <td><?php echo $Fct['vehicle_no'];  ?></td>
				  <td><?php echo $Fct['mobile'];  ?></td>
				  <td><?php echo $Fct['name']; ?></td>
				  <td><?php echo $Fct['service_type'];  ?></td>
				  <td><?php echo $Fct['sdetail'];  ?></td>
				  <td><?php echo $Fct['sbrand'];  ?></td>
				  <td><?php echo $Fct['sname'];  ?></td>
				  <td><?php echo $Fct['mrp'];  ?></td>
				 
				 <td><?php echo $Fct['quantity'];  ?></td>
				 <td><?php echo $Fct['tamount'];  ?></td>
				 <td>
				    <a href="s_spare_prepick_delete.php?id=<?php echo $Fct['id']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                </tr>
				<?php } ?>				
                </tr>
                </tfoot>
              </table>
			  </div>
            </div>
            <!-- /.box-body -->
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

	  <?php include("footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("includes_db_js.php"); ?>
</body>
</html>