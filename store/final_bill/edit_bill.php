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
    <form role="form" method="post" action="edit_bill_act.php?id=<?php echo $_REQUEST['id']; ?>">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
			$b="select * from a_bill where id='".$_REQUEST['id']."'";
			$Eb=mysqli_query($conn,$b);
			$Fb=mysqli_fetch_array($Eb);
			?>
              <div class="box-body">
			  
				<div class="form-group col-sm-4">
                  <label for="Branch">Bill Date</label>
                  <input type="date" class="form-control" name="bdate" id="bdate" value="<?php echo $Fb['bill_date']; ?>" required>
				  <input type="hidden" class="form-control" name="tno" id="tno" value="<?php echo rand(); ?>">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Invoice No</label>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $Fb['inv_no']; ?>" placeholder="Invoice No" readonly="">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Vehicle No</label>
                  <input type="text" class="form-control" name="vno" id="vno" value="<?php echo $Fb['vehicle_no']; ?>" placeholder="Vehicle Number" onKeyUp="names();mob();addr();">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <input type="text" class="form-control" name="cname" id="cname" autofocus="focus"value="<?php echo $Fb['cust_name']; ?>" placeholder="Customer Name" required>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $Fb['cust_mobile']; ?>" placeholder=" Mobile">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Address</label>
                  <input type="text" class="form-control" name="address" id="address" value="<?php echo $Fb['cust_addr']; ?>" placeholder="Customer Address">
                </div>
                
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Payment Mode </label>
                  <select class="form-control" id="pmode" name="pmode">
				  <?php
				  if($Fb['pay_mode']!="")
				  {
				  ?>
				  <option selected="selected"><?php echo $Fb['pay_mode']; ?></option>
				  <?php
				  }
				  else
				  {
				  ?>
				  <option>Cash</option>
				  <option>Card</option>
				  <option>Cheque</option>
				  <?php
				  }
				  ?>
				   </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Remarks</label>
                  <input type="text" class="form-control" name="remark" id="remark" value="<?php echo $Fb['remarks']; ?>" placeholder="remark">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Spares Pre Pick</label>
                  <select class="form-control" id="pre_pick" name="pre_pick" >
				  <option value="">---Select Spare Name---</option>
                 <?php
				$snb="select * from s_spare_prepick";
				$snbr=mysqli_query($conn,$snb);
				while($snresult=mysqli_fetch_array($snbr))
				{
				
				?> <option value="<?php echo $snresult['pre_pick_no'];?>"><?php echo $snresult['pre_pick_no'];?></option>
				
				<?php
				}
				?> </select>
                </div>				
								
            </div>
			
			
			<button type="submit" class="btn btn-info pull-right">Submit</button>
              <!-- /.box-body -->
          </div>
		  
		  <div class="box box-primary">
		  <div class="box-body">
			  
				
				
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
