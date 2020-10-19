	<?php
error_reporting(0);
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
      <h1>Service Cash Memo</h1>
     </section>

<script>
function Delete_Click() {
    var strconfirm = confirm("Are you sure you want to delete?");
    if (strconfirm == true) {
        return true;
    }
	else
		return false;
}

function amcpoint(){
  var inputs = document.getElementById('customer_name').value;
	$.ajax({
	type:'POST',
	url:'get_amce.php',
	data:{inputs},
	dataType:'json',
	success:function(msg){
	document.getElementById("amcep").value=msg[0];
        }
	  });
	 }


function outstanding(){ 
    var qty = 0;
    var inputs = document.getElementById('customer_name').value;


$.ajax({
        type:'post',
        url:'get_outstanding.php',// put your real file name 
        data:{inputs},
		dataType: 'json',
        success:function(msg){
              // your message will come here. 
        document.getElementById("CLI").value=msg[0];			  
        document.getElementById("out").value=msg[1]; 
       }
 });

}


function getservice($i) {
		var service_type = document.getElementById('service_type'+$i+'').value;
			$.ajax({
	type: "POST",
	url: "get_service.php",
	data:'country_id='+service_type,
	success: function(data){
		$("#service_type"+$i).html(data);
		}
		});
		}
		
function getmrp($i){
	
	
    var qty = 0;
    var inputs = document.getElementById('service_type'+$i+'').value;
$.ajax({
      type:'post',
        url:'get_mrp.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("installation_amt"+$i).value=msg;
        }
 });

}


function gettax($i){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name'+$i+'').value;


$.ajax({
      type:'post',
        url:'get_tax.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("TaxOfMrp"+$i).value=msg;
   
       }
 });

}


function ratec($i)
{
	rate=0;
	

var mrp = parseFloat(document.getElementById('mrp'+$i+'').value);
var taxpercentage = parseFloat(document.getElementById('TaxOfMrp'+$i+'').value);

var input = 100+taxpercentage;
var rate1 = (taxpercentage/input)*mrp;
var rate2 = mrp-rate1;


document.getElementById('BeforeTaxOfMrp'+$i+'').value=rate2.toFixed(2);



}
function getamount($i)
{
	amount=0;
	

var BeforeTaxMrp = document.getElementById('BeforeTaxOfMrp'+$i+'').value;
var qty = document.getElementById('qty'+$i+'').value;

var amount=BeforeTaxMrp*qty;

document.getElementById('amount'+$i+'').value=amount.toFixed(2);
document.getElementById('total_amount'+$i+'').value=amount.toFixed(2);


}

function gettotal($i)
{ 
   var inputs1=0;
   var inputs2=0;
   var Iamount=0;
   
   var total = 0;
   var totalBT = 0;
	
    inputs1 = document.getElementById('installation_amt'+$i+'').value;
	inputs2 = document.getElementById('qty'+$i+'').value;
	
	Iamount=inputs1*inputs2;
	
	document.getElementById('service_amount'+$i+'').value = Iamount.toFixed(2);
	
	
	for ( var index = 1; index <= $i; index++)
	{
				
		//if (parseFloat(inputs1[index].value)){
         totalBT =totalBT + parseFloat(document.getElementById('service_amount'+index+'').value);
		 
	    //alert('hai');
		//}
	}
	
	document.getElementById('bill_amt').value = totalBT.toFixed(2);
	
}

// function sumgst($i)
// {
    // var total= parseFloat(document.getElementById('amount'+$i+'').value);
	// var gst=parseFloat(document.getElementById('gst'+$i+'').value);
	
	 // var gst1=(gst/100)*total;
	
	 // var total_amt=total+gst1;
	  // document.getElementById('tax_amt'+$i+'').value=gst1.toFixed(2);
	  	  // document.getElementById('total_amount'+$i+'').value=total_amt.toFixed(2);
// }

// function getgstsum($i)
// {
	// var cgstt = 0;
	// var sgstt = 0;
	// var igstt = 0;
	// var TTAX = 0;
	
    // inputs1 = document.getElementById('gst'+$i+'').value;
	// for ( var index = 1; index <= $i; index++)
	// {
		//alert('hai');
		
		if (parseFloat(inputs1[index].value)){
      
		 // TTAX=TTAX + parseFloat(document.getElementById('tax_amt'+index+'').value);
	    //alert('hai');
		}
	// }
	
	// document.getElementById('TotalTaxAmount').value = TTAX.toFixed(2);
	
 // }

</script>	 


   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="service_cash_memo_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Service Cash Memo No</label>
				  <?php
				  $in1="select * from service_cash_memo";
				  $Ein1=mysql_query($in1);
				  $n=mysql_num_rows($Ein1);
				  $Fin=mysql_fetch_array($Ein1);
				  $ns1=$n+0001;
				  
				    $month = date('m');
					$day = date('d');
					$year = date('Y');

					$today = $year . '-' . $month . '-' . $day;
				  
				  ?>
                  <input type="text" class="form-control" name="service_cash_memo_no" id="service_cash_memo_no" value="<?php echo 
				  CMA000.$ns1 ?>" placeholder="service_cash_memo_no" readonly required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
				  
                  <input type="date" class="form-control" name="date" id="date"  value="<?php echo date('Y-m-d'); ?>" placeholder="Date" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Branch Name</label>
				  <?php
				  $rpm1="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";
				  $rps1=mysql_query($rpm1);
				  $spu1=mysql_fetch_array($rps1);
				  
				  ?>
                  <select type="text" class="form-control" name="branch_name" id="branch_name" value="" readonly>
				  <option value="<?php echo $spu1['id'] ?>"><?php echo $spu1['franchisee_name'] ?></option>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <select class="form-control" id="customer_name" name="customer_name" onChange="amcpoint(this.value);" required>
				  <option value="">Select</option>
				  <?php 
				  $ssc="select * from a_customer where status='Active'";
				  $Essc=mysql_query($ssc);
				  while($FEssc=mysql_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['cust_name']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
				 <div class="form-group col-sm-4">  
				   <label for="Branch">AQURAMILES Point</label>
			       <input type="text" class="form-control" name="amcep" id="amcep" readonly  placeholder="AQURAMILES Point">
				 </div>			
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
                  <input class="form-control" name="description" id="description" placeholder="Description" >
                </div></div>
				
        <!-- left column -->
		<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Service Details</h3>
            </div>
                  <div class="box-body no-padding" style="overflow:auto">
                 <table class="table-bordered padding-4 disp" style="width:75%;height:10px">
                <thead>
                <tr>
				  <th style="width: 35px">S.No</th>
				  <th style="width:  150px">Service Type</th>
				  <th style="width:  100px">Service Amount</th>
				 <th style="width:  60px">Qty</th>

			     <th style="width:  150px">Total Amount</th>
                </tr>
                </thead>
                <tbody>
				<?php
				for($i=1;$i<10;$i++)
				{
				?>
               <tr>
                  <td><?php echo $i; ?> </td>
                 <td style="width:  150px"> 
				  <select class="form-control" id="<?php echo "service_type".$i; ?>" name="<?php echo "service_type".$i; ?>" onChange="getmrp(<?php echo $i; ?>);" >
				  <option value="">Select the Type</option>

				  <?php 
				  $ssc1="select * from m_service_type where status='Active'";
				  $Essc1=mysql_query($ssc1);
				  while($FEssc=mysql_fetch_array($Essc1))
				  {											
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
				 
				 
				
                <td style="width:  100px">
			    <input type="text" name="<?php echo "installation_amt".$i; ?>" id="<?php echo "installation_amt".$i;?>" onKeyUp="getamount (<?php echo $i;?>);ratec(<?php echo $i;?>);" placeholder="Service Amount" onKeyPress="return tabE(this,event)" class="form-control" readonly> 
		
				
				</td>
				
				<td>
				<input type="text" name="<?php echo "qty".$i; ?>" id="<?php echo "qty".$i;?>" onKeyUp="gettotal(<?php echo $i;?>);"  class="form-control">
				</td>
                  <td>
				  <input type="text" name="<?php echo "service_amount".$i;  ?>" id="<?php echo "service_amount".$i; ?>" onKeyUp="gettotal(<?php echo $i;?>);"  onKeyPress="" class="form-control" >
				  </td>
                </tr>
				<?php } ?>
				
                </tbody>
              </table>
               
           
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		 <div class="box-body">
             
				  <div class="form-group col-sm-3">
              <label for="Branch">Bill Amount </label>
              <input type="text" class="form-control" name="bill_amt" id="bill_amt"  placeholder="Bill Amount" readonly>
                </div>
				</div>
	    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" Onclick="return confirm('Are you sure want to proceed?')">Submit the Service Cash Memo</button>
                </div>    
         </div>
    
	</section>
    <!-- /.content -->

	
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
