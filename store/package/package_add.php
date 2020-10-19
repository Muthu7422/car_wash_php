<?php
error_reporting(0);
include("../../includes.php");
include("../../redirect.php");

$abc="select * from a_customer_vehicle_details";
$abcd=mysqli_query($conn,$abc);
$vehicle="[";
while($ac=mysqli_fetch_array($abcd))
{
	$vehicle.="'".$ac['vehicle_no']."',";
}
 $vehicle.="'']";


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
      <h1>Add Offer Package To Customer</h1>
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
        success:function(msg){
              // your message will come here.  
        document.getElementById("out").value=msg;
       
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

function getamount($i)
{
	amount=0;
	

var mrp = document.getElementById('mrp'+$i+'').value;
var qty = document.getElementById('qty'+$i+'').value;

var amount=mrp*qty;

document.getElementById('amount'+$i+'').value=amount;

}

function gettotal($i)
{ 

	var total = 0;
	
    inputs1 = document.getElementById('amount'+$i+'').value;
	for ( var index = 1; index <= $i; index++)
	{
		//alert('hai');
		
		//if (parseFloat(inputs1[index].value)){
        total =total + parseFloat(document.getElementById('amount'+index+'').value);
	    //alert('hai');
		//}
	}
	document.getElementById('total').value = total;
}

function sumgst()
{
    var total= parseFloat(document.getElementById("total").value);
    var dicount=parseFloat(document.getElementById("discount_per").value);
	var sgst=parseFloat(document.getElementById("sgst").value);
	var cgst=parseFloat(document.getElementById("cgst").value);
	var igst=parseFloat(document.getElementById("igst").value);
	var recable_amount=parseFloat(document.getElementById("recable_amount").value);

	
	
	var discount_amount=(dicount/100)*total;
	 document.getElementById("dicount_amt").value=discount_amount.toFixed(2);
	 
	 var amount=parseFloat(document.getElementById("total").value)-discount_amount;
	 document.getElementById("total_amt").value=amount.toFixed(2);
	 
	 var gst1=(sgst/100)*amount;
	 var gst2=(cgst/100)*amount;
	 var gst3=(igst/100)*amount;
	 
	 var gst=gst1+gst2+gst3;
	  document.getElementById("gst_amt").value=gst.toFixed(2);
	  
	  var billamount=amount+gst;
	   document.getElementById("bill_amt").value=billamount.toFixed(2);
	   
	   var bal_amt=billamount-recable_amount;
	    document.getElementById("balance_amount").value=bal_amt.toFixed(2);
}



</script>	 
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="package_act.php" autocomplete="off" onsubmit="return confirm('Are You sure want To Save?');">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
			  
			    <div class="row">
                <div class="form-group col-sm-4">
                  <label for="Branch">Package Name</label>
				  <select class="form-control" id="PackageId" name="PackageId" onChange="outstanding(this.value);" required>
				  <option value="">Select Package</option>
				  <?php 
				  $ssc="select * from m_package where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['package_name']." - Rs.".$FEssc['amount']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
				
							
				<div class="form-group col-sm-4">
                  <label for="Branch">Start Date</label>
                  <input type="date" class="form-control" name="StartDate" id="StartDate"  value="" placeholder="Date" required>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">End Date</label>
                  <input type="date" class="form-control" name="EndDate" id="EndDate"  value="" placeholder="Date" required>
                </div>
				</div>
				
				<div class="row">
				<div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Number</label>
                  <input type="text" class="form-control" name="vehicle"  id="vehicle"  autocomplete="off" style="text-transform:uppercase" onKeyPress="return tabE(this,event)"  placeholder="Customer Vehicle No" required>
                </div>
				
				<div class="form-group col-sm-8">
				<br>
				<button type="submit"  class="btn btn-info pull-right">Add Package</button>
				</div>
				
				</div>
				</div>
				
        <!-- left column -->
		
	       
         </div>
		 <div class="col-md-12">
          <div class="box box-primary" style="aling:center">
            <div class="box-header">
              <h3 class="box-title">Package Entry</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
			  <thead>
                <tr>
                  <th>S:No</th>
                  <th>Vehicle No</th>
                  <th>Package Name</th>
                  <th>Start Date </th>
				  <th>End Date</th>
				  <th>Balance Amount</th>
				  <th>Status</th>
				  <th>Cancel</th>
                </tr>
				</thead>
				<?php
			 	$sv="select s_add_package.*,m_package.package_name from s_add_package LEFT JOIN m_package ON s_add_package.PackageId=m_package.id order by s_add_package.Id desc";
				$Esv=mysqli_query($conn,$sv);
				$nr=mysqli_num_rows($Esv);
				$j=0;
				while($FEsv=mysqli_fetch_array($Esv))
				{
					$j++;
					?>
			    <tr>
                <td><?php echo $j; ?></td>
				<td><?php echo $FEsv['VehicleId']; ?></td>
                <td><?php echo $FEsv['package_name']; ?></td>
				<td><?php echo $FEsv['StartDate']; ?></td>
				<td><?php echo $FEsv['EndDate']; ?></td>
				<td><?php echo $FEsv['AvailableAmount']; ?></td>
				<td><?php echo $FEsv['Status']; ?></td>
				<?php 
				if($FEsv['Status']=='Active')
				{
				?>
				<td><a href="package_delete.php?Id=<?php echo $FEsv['Id']; ?>" class="btn-box-tool" title="Delete Package" onclick="return confirm('Are You Sure Want To Delete?');"><i class="fa fa-trash custom-icon1"></i></a> </td>
				<?php }
				else{
					?>
<td></td>
					<?php }?>
				</tr>
			    <?php 
				}
				
				?>
	            
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
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


countries = <?php echo $vehicle; ?>;


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("vehicle"), countries);
</script>
 
</body>
</html>
