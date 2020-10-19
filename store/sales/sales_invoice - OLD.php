<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");


 $abc1="select sname,spartno,smrp,sid from m_spare";
 $abcd1=mysql_query($abc1);
 $auto_sparename="[";
while($ac1=mysql_fetch_array($abcd1))
{   $stemp=$ac1['spartno']." / ".$ac1['sname']." / ".$ac1['smrp']." / ".$ac1['sid'];
	$auto_sparename.="'".$stemp."',";
}
 $auto_sparename.="'']";

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
      <h1>Sales Invoice</h1>
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


function getbrand($i) {
		var spare_brand = document.getElementById('spare_brand'+$i+'').value;
			$.ajax({
	type: "POST",
	url: "get_spare.php",
	data:'country_id='+spare_brand,
	success: function(data){
		$("#spare_name"+$i).html(data);
		}
		});
		}
		
function getmrp($i){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name'+$i+'').value;


$.ajax({
      type:'post',
        url:'get_mrp.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("mrp"+$i).value=msg;
   
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

	var total = 0;
	var totalBT = 0;
	
    inputs1 = document.getElementById('total_amount'+$i+'').value;
	for ( var index = 1; index <= $i; index++)
	{
		//alert('hai');
		
		//if (parseFloat(inputs1[index].value)){
         totalBT =totalBT + parseFloat(document.getElementById('amount'+index+'').value);
		 total =total + parseFloat(document.getElementById('total_amount'+index+'').value);
	    //alert('hai');
		//}
	}
	document.getElementById('bill_amt').value = total.toFixed(2);
	document.getElementById('total').value = totalBT.toFixed(2);
	
}

function sumgst($i)
{
    var total= parseFloat(document.getElementById('amount'+$i+'').value);
	var gst=parseFloat(document.getElementById('gst'+$i+'').value);
	
	 var gst1=(gst/100)*total;
	
	 var total_amt=total+gst1;
	  document.getElementById('tax_amt'+$i+'').value=gst1.toFixed(2);
	  	  document.getElementById('total_amount'+$i+'').value=total_amt.toFixed(2);
}

function getgstsum($i)
{
	

	var cgstt = 0;
	var sgstt = 0;
	var igstt = 0;
	var TTAX = 0;
	
    inputs1 = document.getElementById('gst'+$i+'').value;
	for ( var index = 1; index <= $i; index++)
	{
		//alert('hai');
		
		//if (parseFloat(inputs1[index].value)){
      
		 TTAX=TTAX + parseFloat(document.getElementById('tax_amt'+index+'').value);
	    //alert('hai');
		//}
	}
	
	document.getElementById('TotalTaxAmount').value = TTAX.toFixed(2);
	

}
function GetItemDetails(){ 
    var qty = 0;
    var inputs = document.getElementById('sname').value;
$.ajax({
      type:'post',
        url:'get_spare_details.php',// put your real file name 
        data:{inputs},
		dataType: 'json',
        success:function(msg){
         document.getElementById("sid").value=msg[0];			  
        document.getElementById("mrp").value=msg[6]; 
		
		document.getElementById("TaxRate").value=msg[4];
		document.getElementById("partname").value=msg[1];
		document.getElementById("hsncode").value=msg[3];
		document.getElementById("partno").value=msg[2];
		
		document.getElementById("rate").value=msg[7];
		
    }
 });
}

function GetTotal()
{
	var mrp= parseFloat(document.getElementById('mrp').value);
	var qty=0;
	if((document.getElementById('quantity').value).length>0)
	{
		qty=parseFloat(document.getElementById('quantity').value);
	}
	var totla=mrp*qty;
	document.getElementById("tamount").value=totla;
	
	
}


</script>	 


   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="sales_invoice_act.php" autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Invoice No</label>
				  <?php
				  $in="select * from sales_invoice";
				  $Ein=mysql_query($in);
				  $n=mysql_num_rows($Ein);
				  $Fin=mysql_fetch_array($Ein);
				  $ns1=$n+0001;
				  
				    $month = date('m');
					$day = date('d');
					$year = date('Y');

					$today = $year . '-' . $month . '-' . $day;
				  
				if($_REQUEST['m']==5)
				{
				$customer_name=$_SESSION['customer_name'];
				$date=$_SESSION['date'];
				$description=$_SESSION['description'];
				}
				else
				{
				$description="";	
				}
				

                $ssi="select salesin from job_card_no where id='1'";	
				$Essi=mysqli_query($conn,$ssi);
				$FEssi=mysqli_fetch_array($Essi);
				$sin="SA".$FEssi['salesin'];				
				  
				  ?>
                  <input type="text" class="form-control" name="inv_no" id="inv_no" value="<?php echo $sin; ?>" placeholder="Invoice No" readonly required>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Date</label>
				  
                  <input type="date" class="form-control" name="date" id="date"  value="<?php echo date('Y-m-d'); ?>" placeholder="Date" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Branch Name</label>
				  <?php
				  $rpm="select * from m_franchisee where id='".$_SESSION['FranchiseeId']."'";
				  $rps=mysql_query($rpm);
				  $spu=mysql_fetch_array($rps);
				  
				  ?>
                  <select type="text" class="form-control" name="branch_name" id="branch_name" value="" readonly>
				  <option value="<?php echo $spu['id'] ?>"><?php echo $spu['franchisee_name'] ?></option>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Customer Name</label>
                  <select class="form-control" id="customer_name" name="customer_name" onChange="outstanding(this.value);" required>
				  <?php 
				  if($_SESSION['customer_name']!='')
				  {
				  ?>
				  <?php 
				  $ssc="select * from a_customer where id='".$_SESSION['customer_name']."'";
				  $Essc=mysql_query($ssc);
				  while($FEssc=mysql_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['cust_name']; ?></option>
				  <?php } ?>
				  <?php 
				  }
				  else
				  {
				  ?>
				  
				  <option value="">Select</option>
				  <?php 
				  $ssc="select * from a_customer where status='Active'";
				  $Essc=mysql_query($ssc);
				  while($FEssc=mysql_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['cust_name']; ?></option>
				  <?php } ?>
				  
				  <?php } ?>
				  </select>
                </div>
									
				<div class="form-group col-sm-4">
                  <label for="Branch">Description</label>
				   <input type="hidden" class="form-control" name="CLI" id="CLI" readonly  placeholder="Customer Ledger Id" >
				   <input type="hidden" class="form-control" name="out" id="out" readonly  placeholder="Outstanding" >
				   <input  type="hidden" class="form-control" name="gstin" id="gstin"   placeholder="GSTIN" readonly >
				   
                  <input class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>">
                </div></div>
				
        <!-- left column -->
		<div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Item Sales Details</h3> 
			  
			  <?php 
			  if(isset($_REQUEST['msg']))
			  {
			  ?>
			  <div class="alert alert-warning">
				<strong>Warning!</strong> <?php echo $_REQUEST['msg']; ?>
				</div>
			  <?php } ?>
            </div>
              <div class="box-body">
					<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Spare Category</label>
				  <select class="form-control" id="sdetail" name="sdetail" onChange="getspare(this.value)">
				   <option value="">--Select Spare Type--</option>
                   <?php 
				  $ssc="select * from m_spare_type where status='Active'";
				  $Essc=mysql_query($ssc);
				  while($FEssc=mysql_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['stype']; ?></option>
				  <?php } ?>
				  </select>
                </div>					
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Spare Brand </label>
                  <select class="form-control" id="sbrand" name="sbrand" onChange="getsparename(this.value)">
				   </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Name(Partno/Partname/MRP/(ID-for Ref))</label>
                  <input type="txt" class="form-control" id="sname" name="sname" onKeyDown="" onKeyUp=""  >
				  </div>				  
                <div class="form-group col-sm-4">
                  <label for="Branch">Part No</label>
                  <input type="text" class="form-control" name="partno" id="partno" onFocus="GetItemDetails();" onKeyPress="return tabE(this,event)" readonly placeholder="Part No">
                </div>				
				<div class="form-group col-sm-4">
                  <label for="Branch">HSN Code</label>
                  <input type="text" class="form-control" name="hsncode" id="hsncode"  readonly placeholder="HSN Code">
                </div>				
				<div class="form-group col-sm-4">
                  <label for="Branch">Part Name</label>
                  <input type="text" class="form-control" name="partname" id="partname"  readonly placeholder="HSN Code">
                </div>				
				<div class="form-group col-sm-4">
                  <label for="Branch">Tax </label>
                  <input type="text" class="form-control" name="TaxRate" id="TaxRate" readonly placeholder="Tax ">
                </div>				
				<div class="form-group col-sm-4">
                  <label for="Branch">Tax Amount Rs.</label>
                  <input type="text" class="form-control" name="rate" id="rate" onKeyPress="return tabE(this,event)" readonly placeholder="Tax Amount Rs.">
                </div>				
				<div class="form-group col-sm-4">
                  <label for="Branch">MRP</label>
                  <input type="text" class="form-control" name="mrp" id="mrp" onKeyPress="return tabE(this,event)"  placeholder="MRP">
                </div>				
				<div class="form-group col-sm-4">
                  <label for="Branch">Quantity</label>
                  <input type="number" class="form-control" name="quantity" id="quantity" placeholder=" Quantity" onKeyPress="return tabE(this,event)" onKeyUp="GetTotal();">
                </div>				
				<div class="form-group col-sm-4">
                  <label for="Branch">Total Amount Rs.</label>
                  <input type="text" class="form-control" name="tamount" id="tamount" placeholder="Total Amount" readonly="true">
                </div>
				<div class="form-group col-sm-4 hidden">
                  <label for="Branch">Id</label>
                  <input type="text" class="form-control" name="sid" id="sid" readonly placeholder="">
                </div>
				<div class="form-group col-sm-8"></div>
				<div class="form-group col-sm-4">
				<button id="submit" type="submit" value="items" class="btn btn-info pull-right" >Submit</button>
				</div>
				</div>    
              
			  
			  
			  
          </div>
		  
		  <div class="box-body">
				<div class="form-group col-sm-12">
				<div>
					<table border="1" width="95%"  style="background-color:#F0F8FF" >
                <thead>
                <tr>
				  <th >S.No</th>
				  <th >Part.No</th>
				  <th >HSN Code</th>
                  <th >Spare Name</th>
				   <th >Mrp</th>
				   <th >Qty</th>
				   <th >Total</th>				  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$i=0;
			 	$s="select * from sales_invoice_details_temp where session_id='".session_id()."'";
				$Es=mysqli_query($conn,$s);
				while($FEs=mysqli_fetch_array($Es))
				{
				$i++;					
				 $ssc="select * from m_spare where sid='".$FEs['item_id']."'";  
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {					
				?>
                <tr>
				<td><?php echo $i;  ?></td>
				<td><?php echo $FEssc['spartno'];  ?></td>
				<td><?php echo $FEssc['hsn'];  ?></td>
                <td><?php echo $FEssc['sname'];  ?></td>
				<td style="text-align: right;padding-right:3px"><?php echo number_format($FEs['mrp'],2);  ?></td>
				<td style="text-align: right;padding-right:3px"><?php echo $FEs['qty'];  ?></td>
				<td style="text-align: right;padding-right:3px"><?php echo number_format(($FEs['mrp']*$FEs['qty']),2);  ?></td>
				<td><a href="sales_delete_temp.php?id=<?php echo $FEs['id']; ?>" onClick="return Delete_Click();" class="btn-box-tool"><i class="fa fa-close custom-icon1"></i></a></td>
                </tr>
				<?php 
				$ttl=$ttl+($FEs['mrp']*$FEs['qty']);
				
				}
				}
				?>
                </tbody>                
              </table>
				</div>
				</div>						
            </div>
		  
		  
          <!-- /.box -->
        </div>
		 <div class="box-body">
             <div class="form-group col-sm-4 hidden" style="hidden">
              <label for="Branch">Total Taxable Amount</label>
              <input type="text" class="form-control" name="total" id="total"  placeholder="Total Amount" readonly>
                </div>
			
			    <div class="form-group col-sm-3 hidden" style="">
                  <label for="party">Total Tax Amount</label>
				  <input type="text" class="form-control" name="TotalTaxAmount" id="TotalTaxAmount" onKeyPress="return tabE(this,event)" readonly='ture'>
               </div>
				  <div class="form-group col-sm-3 pull-right">
              <label for="Branch">Bill Amount </label>
              <input type="number" class="form-control" name="bill_amt" id="bill_amt"  placeholder="Bill AMount" value="<?php echo $ttl; ?>" >
                </div>
				</div>
	    <div class="box-footer">
		        <a href="sales_invoice_act1.php?m=complete" class="btn btn-info pull-right" Onclick="return confirm('Are you sure want to proceed?')">Complete </a>
               
                </div>    
         </div>
    
	</section>
    <!-- /.content -->

	
	</form>
</div>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/


countries = <?php echo $auto_sparename; ?>;
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("sname"), countries);
//autocomplete(document.getElementById("OldCustomer"), OldCustomers);

</script>
  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 

 
</body>
</html>
