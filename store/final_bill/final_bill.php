<?php
include("../../includes.php");
include("../../redirect.php");

$p="select * from s_estimate";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);
$n=mysqli_num_rows($Ep);
$n1=$n+1;
$pn="EN".$n1;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
 
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
 
 <script>


function regno(){ 
    var qty = 0;
    var inputs = document.getElementById('vno').value;


$.ajax({
      type:'post',
        url:'getejcn.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("ejcn").value=msg;
       
       }
 });

}


function mob(){ 
    var qty = 0;
    var inputs = document.getElementById('vno').value;


$.ajax({
      type:'post',
        url:'getcmobile.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("mobile").value=msg;
       
       }
 });

}


function names(){ 
    var qty = 0;
    var inputs = document.getElementById('vno').value;


$.ajax({
      type:'post',
        url:'getcname.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("cname").value=msg;
       
       }
 });

}

function addr(){ 
    var qty = 0;
    var inputs = document.getElementById('vno').value;


$.ajax({
      type:'post',
        url:'get3.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("address").value=msg;
       
       }
 });

}





</script> 

<script>
	 function getce(val) {
	var mrp = parseInt(document.getElementById("esce").value);
		var quantity =  parseInt(document.getElementById("elce").value);
	 var hra = parseInt( mrp + quantity );
	 document.getElementById("tce").value = hra; 
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
        Final Bill
        <small>Store </small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="f_bill.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
			$b="select * from a_bill_temp";
			$Eb=mysqli_query($conn,$b);
			$Fb=mysqli_fetch_array($Eb);
			?>
              <div class="box-body">
			  
				
								
            </div>
			
			
			<button type="submit" class="btn btn-info pull-right">New</button>
              <!-- /.box-body -->
          </div>
		  
		  <div class="box box-primary">
		  <div class="box-body">
			  
				
				<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
				  <th>Invoice No</th>
				  <th>Date</th>
				  <th>Cust Name</th>
				  <th>Cust Mobile</th>
                  <th>Payment Mode</th>
				  <th>Remarks</th>
				  <th>Spares PrePick</th>
				  <th>Action</th>
				  
                </tr>
                </thead>
				
                <tbody>
				
				
				<?php
				
				 $ss="select * from  a_bill where status='Active'";
				 $Ess=mysqli_query($conn,$ss);
				 $i=0;
				 while($FEss=mysqli_fetch_array($Ess))
				 
				 
				 {
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $FEss['inv_no'];  ?></td>
				  <td><?php  echo $FEss['bill_date']; ?></td>
				  <td><?php  echo $FEss['cust_name']; ?></td>
				  <td><?php  echo $FEss['cust_mobile']; ?></td>
				  <td><?php echo $FEss['pay_mode']; ?></td>
				  <td><?php echo $FEss['remarks']; ?></td>
				  <td><?php echo $FEss['spares_prepick']; ?></td>
				  <td><a href="edit_bill.php?id=<?php  echo $FEss['id']; ?>" class="btn-box-tool"><i class="fa fa-edit custom-icon1"></i></a>
                      <a href="delete_bill.php?id=<?php echo $FEss['id']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
				  
				  
                </tr>
				<?php
				 } 
				 			   
				
				?>
				
				
				  
				
                </tbody>
				
				
				   
              </table>	
            </div>
		  </div>
		  
          <!-- /.box -->
        </div>
		
		
		<div class="box-footer">
		
                
                </div>    
         </div>
    </form>
	</section>
    <!-- /.content -->
		
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
