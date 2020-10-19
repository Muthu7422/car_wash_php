<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

$p="select * from transfer_main";
$Ep=mysqli_query($conn,$p);
$Fp=mysqli_fetch_array($Ep);
$n=mysqli_num_rows($Ep);
$n1=$n+1;
$pn=$n1;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
 <script>
 function get_mrp(){ 
    var qty = 0;
    var inputs = document.getElementById('TransferItem').value;


$.ajax({
      type:'post',
        url:'get_mrp_from_db.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("mrp").value=msg;
   
       }
 });

}


function get_unit(){ 
    var qty = 0;
    var inputs = document.getElementById('TransferItem').value;


$.ajax({
      type:'post',
        url:'get_unit_from_db.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("unit").value=msg;
   
       }
 });

}




function get_qty(){ 
    var qty = 0;
    var inputs = document.getElementById('TransferItem').value;
	var inputs2= document.getElementById('from_franchisee').value;
$.ajax({
      type:'post',
        url:'get_qty_from_db.php',// put your real file name //data: {inputs: inputs,pno: pno,pdate:pdate},
        data: {inputs: inputs,inputs2: inputs2},
		//data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("total_qty").value=msg;
   
       }
 });

}

  </script>
  
  <script>
function get_discounted_rate()
{
	trate=0;
	discounted_rate=0;
	transfer_rates=0;
	
var gqty=document.getElementById('transf_qty').value;
var gmrp=document.getElementById('mrp').value;
var disc_percentage=document.getElementById('disc_perc').value;

var trate=gmrp*gqty;
var discounted_rate=trate*disc_percentage/100;

var transfer_rates=gmrp-discounted_rate;
document.getElementById('disc_rate').value=discounted_rate;

document.getElementById('trans_rate').value=transfer_rates;



	
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
      <h1>Stock Transfer</h1>
     </section>

  
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="stock_transfer_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
			  <?php
			  
			  $s="select * from trans_temp where TransferId='".$_REQUEST['TransferId']."'";
			  $ss=mysqli_query($conn,$s);
			  $sss=mysqli_fetch_array($ss); 
			  
			  ?>
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Transfer No</label>
				  <input type="text" class="form-control" name="TransferId" id="TransferId" value="<?php echo $pn; $sss['TransferId'];?>"  placeholder="Transfer No" required readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Transfer Date</label>
                  <input type="date" class="form-control" name="TransferDate" id="TransferDate" value="<?php echo $sss['TransferDate'];?>" placeholder="Date" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">From</label>
                  <select class="form-control" id="from_franchisee" name="from_franchisee" onChange="outstanding(this.value);" required>
				 <?php 
				  $frnc="select * from m_franchisee where id='".$sss['from_franchisee']."'";
				  $fs=mysqli_query($conn,$frnc);
				  while($frs=mysqli_fetch_array($fs))
				  {
				  
				  ?>
				  <option value="<?php echo $frs['id'];?>"><?php echo $frs['franchisee_name'];?></option>
				  <?php
				  }
				  ?>
				  <option value="">--Select Name--</option>
				  <?php 
				  $ssc="select * from m_franchisee where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['franchisee_name']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">To Service Unit</label>
                  <select class="form-control" id="FranchiseeId" name="FranchiseeId" onChange="outstanding(this.value);" required>
				
				 <?php 
				  $frnc="select * from m_franchisee where id='".$sss['FranchiseeId']."'";
				  $fs=mysqli_query($conn,$frnc);
				 while($frs=mysqli_fetch_array($fs))
				  {
				  
				  ?>
				  <option value="<?php echo $frs['id'];?>"><?php echo $frs['franchisee_name'];?></option>
				  <?php
				  }
				  ?>
				  <option value="">--Select Name--</option>
				  <?php 
				  $ssc="select * from m_franchisee where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['franchisee_name']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Name</label>
                  <select class="form-control" id="TransferItem" name="TransferItem" onChange="get_mrp();get_qty();get_unit()">
				  <option value="" selected="selected">--Select Spare--</option>
				  <?php 
				  $ssc="select * from m_spare where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['sname']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">MRP</label>
                  <input type="text" class="form-control" name="mrp" id="mrp" placeholder="MRP" readonly="true">
                </div>
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">MRP</label>
                  <input type="text" class="form-control" name="unit" id="unit" placeholder="MRP" readonly="true">
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Total Quantity</label>
                  <input type="text" class="form-control" name="total_qty" id="total_qty" placeholder="Total Quantity" readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Transfer Quantity</label>
                  <input type="text" class="form-control" name="transf_qty" id="transf_qty" placeholder="Transfer Quantity">
                </div>
				
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Discount %</label>
                
				<input type="text" class="form-control" name="disc_perc" id="disc_perc" placeholder="Discount %" onkeyup="get_discounted_rate();">
			  
				 
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Discounted Rate</label>
                  <input type="text" class="form-control" name="disc_rate" id="disc_rate" placeholder="Discounted Rate" readonly="true">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Transfer Rate</label>
                  <input type="text" class="form-control" name="trans_rate" id="trans_rate" placeholder="Transfer Rate" readonly="true">
                </div>
				
				
				
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" name="add" id="add">Add Item for Transfer</button>
                </div>    
         </div>
    
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
                <div class="form-group col-sm-12" style="overflow:auto">
                <table id="example1" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
				  <th>S.No</th>
				  <th>Transfer Id</th>
				    <th>Date</th>
                  <th>Franchisee Name</th>
				 <th>Spare Name</th>
				  <th>MRP</th>
				  <th>Total QTY</th>
				  <th>Transfer QTY</th>
				  <th>Discount %</th>
				   <th>Discounted Rate</th>
				    <th>Transfer Rate</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$ss3="select * from trans_temp order by id desc";
				$Ess3=mysqli_query($conn,$ss3);
				$i=0;
				while($FEss3=mysqli_fetch_array($Ess3))
				{
					
					 $frnc1="select * from m_franchisee where branch_id='".$_SESSION['BranchId']."'";
				  $fs1=mysqli_query($conn,$frnc1);
				 $frs1=mysqli_fetch_array($fs1);
				 
				   $ssc1="select * from m_spare where sid='".$FEss3['TransferItem']."'";
				  $Essc1=mysqli_query($conn,$ssc1);
				 $FEssc1=mysqli_fetch_array($Essc1);
					 
					$i++;
				?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $FEss3['TransferId'];  ?><input type="hidden" name="inv_no" id="inv_no" value="<?php echo $FEss['inv_no']; ?>" ></td>
				  <td><?php  echo $FEss3['TransferDate']; ?></td>
				  <td><?php  echo $frs1['franchisee_name']; ?></td>
				  <td><?php  echo $FEssc1['sname']; ?></td>
				  <td><?php echo $FEss3['mrp']; ?></td>
				   <td><?php echo $FEss3['total_qty']; ?></td>
				    <td><?php echo $FEss3['transf_qty']; ?></td>
					 <td><?php echo $FEss3['disc_perc']; ?></td>
					  <td><?php echo $FEss3['disc_rate']; ?></td>
					  <td><?php echo $FEss3['trans_rate']; ?></td>
				
				  
                  
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
		  <button type="submit" class="btn btn-info pull-right" onClick="return confirm('Are you shure you want to Transfer ? ');" name="final" id="final">Submit</button>
     
	</section>
	
	</form>
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
