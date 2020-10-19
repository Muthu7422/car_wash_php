<?php
include("../../includes.php");
include("../../redirect.php");


if($_REQUEST['m']=='d')
{
	$di="delete from a_bill_temp where id='".$_REQUEST['id']."'";
	$Edi=mysqli_query($conn,$di);
}

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
    <form role="form" method="post" action="f_bill1.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
				<div class="form-group col-sm-4">
                  <label for="Branch">Bill Date</label>
                  <input type="date" class="form-control" name="bdate" id="bdate" value="<?php echo $_REQUEST['bdate']; ?>" required>
				  <input type="hidden" class="form-control" name="tno" id="tno" value="<?php echo $_REQUEST['tno']; ?>">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Vehicle No</label>
                  <input type="text" class="form-control" name="vno" id="vno" placeholder="Vehicle Number" value="<?php echo $_REQUEST['vno']; ?>">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <input type="text" class="form-control" name="cname" id="cname" autofocus="focus" value="<?php echo $_REQUEST['cname']; ?>">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile" placeholder=" Mobile" value="<?php echo $_REQUEST['mobile']; ?>">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Address</label>
                  <input type="text" class="form-control" name="address" id="address" placeholder="Customer Address" value="<?php echo $_REQUEST['address']; ?>">
                </div>
                
			
				<div class="form-group col-sm-4">
                  <label for="Branch">Payment Mode </label>
                  <select class="form-control" id="pmode" name="pmode">
				  <option><?php echo $_REQUEST['pmode']; ?></option>
				  <option>Cash</option>
				  <option>Card</option>
				  <option>Cheque</option>
				   </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Remarks</label>
                  <input type="text" class="form-control" name="remark" id="remark" placeholder="remark" value="<?php echo $_REQUEST['remark']; ?>">
                </div>
								
								
            </div>
			
			
			
              <!-- /.box-body -->
          </div>
		  
		  <div class="box box-primary">
		  <div class="box-body">
			  
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Name</label>
                  <select class="form-control" id="sname" name="sname" onChange="getMrp(this.val);">
				  <option>---Select Spare Name---</option>
                 <?php
				$snb="select sname from m_spare";
				$snbr=mysqli_query($conn,$snb);
				while($snresult=mysqli_fetch_array($snbr))
				{
				
				?> <option value="<?php echo $snresult['sname'];?>"><?php echo $snresult['sname'];?></option>
				
				<?php
				}
				?> </select>
                </div>
				<div class="form-group col-sm-3">
                  <label for="Branch">MRP</label>
                  <input type="text" class="form-control" name="mrp" id="mrp" placeholder="MRP">
                </div>
				
				<div class="form-group col-sm-2">
                  <label for="Branch">Quantity</label>
                  <input type="text" class="form-control" name="quantity" id="quantity" placeholder=" Quantity" onKeyUp="getamt(this.val);">
                </div>
				
				<div class="form-group col-sm-3">
                  <label for="Branch">Total Amount Rs.</label>
                  <input type="text" class="form-control" name="tamount" id="tamount" placeholder="Total Amount">
                </div>
								
            </div>
		  </div>
		  
          <!-- /.box -->
        </div>
		
		
		<div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">ADD</button>
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
                  <th>Particular</th>
				  <th>Quatity</th>
				  <th>Rate</th>
				  <th>Total</th>
				  <th>Delete</th>
				</tr>
                </thead>
                <tbody>
				<?php
				$ss="select * from  a_bill_temp where rno='".$_REQUEST['tno']."' order by id desc";
				$Ess=mysqli_query($conn,$ss);
				$i=0;
				while($FEss=mysqli_fetch_array($Ess))
				{
					$i++;
				?>
                <tr>
                <td><?php echo $i; ?></td>
				<td><?php echo $FEss['particular'];  ?></td>
				<td> <?php echo $FEss['quantity'];?></td>
				<td><?php echo $FEss['rate']; ?></td>
				<td><?php  echo $FEss['total']; ?></td>
				<td>
				    <a href="f_bill1.php?m=d&id=<?php echo $FEss['id']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a>
				</td>
                  
                </tr>
				<?php
				}
				?>
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
