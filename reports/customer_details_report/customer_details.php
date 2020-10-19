<?php
include("../../includes.php");
include("../../redirect.php");

$abc1="select * from a_customer";
$abcd1=mysqli_query($conn,$abc1);
$mobile="[";
while($ac1=mysqli_fetch_array($abcd1))
{
	$st=$ac1['mobile1'];
	$mobile.="'$st',";
}
 $mobile.="]";
 
 
 $abc1="select * from a_customer_vehicle_details";
$abcd1=mysqli_query($conn,$abc1);
$vehicle="[";
while($ac1=mysqli_fetch_array($abcd1))
{
	$st=$ac1['vehicle_no'];
	$vehicle.="'$st',";
}
 $vehicle.="]";


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
      <h1>Customer Report </h1>
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
  
  
</script>	
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
  
</script> 

 <script>
 function getmobile()
 {
	 var mobile = document.getElementById("CustomerMobileNo").value;

document.getElementById("CustomerMobileNoex").value=mobile;
 }
  function getvehicle()
 {
	 var vehicle = document.getElementById("CustomerVehicleNo").value;

document.getElementById("CustomerVehicleNoex").value=vehicle;
 }						
</script>



    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Customer Report</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		
            <form class="form-horizontal" method="post" action="customer_details_report.php" autocomplete="off">
              <div class="box-body">
 
               <div class="form-group col-sm-4" style="padding-left:60px">
                  <label for="date"> Customer Mobile No</label>
                 <input type="text" name="CustomerMobileNo" class="form-control pull-right" id="CustomerMobileNo" onmouseenter="getmobile()" Onkeyup="getmobile()" Onkeydown="getmobile()"onmouseover="getmobile()"  onKeyPress="return tabE(this,event);getmobile()">
               </div>
				
				<div class="form-group col-sm-2" style="padding-left:60px">
                  <label for="date"><font size="5px">(OR)</font></label>
                </div>
				
				 <div class="form-group col-sm-4" style="padding-left:20px">
                  <label for="date"> Customer Vehicle No</label>
                 <input type="text" name="CustomerVehicleNo" class="form-control pull-right" id="CustomerVehicleNo" onmouseenter="getmobile()" Onkeyup="getvehicle()" Onkeydown="getvehicle()"onmouseover="getvehicle()" onKeyPress="return tabE(this,event);getmobile()">
                </div>

              </div>
              <!-- /.box-body -->
			 
                <div class="box-footer">
			 
                <button  type="submit" class="btn btn-info pull-right" formtarget="_blank">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
			
			 <div>
			   <div class="box-footer">
	   <form action="customer_details_report_export.php"  method="post" name="export_excel">
 
			<div class="control-group">
			<input type="text" name="CustomerMobileNoex" id="CustomerMobileNoex" class="form-controll hidden">
			<input type="text" name="CustomerVehicleNoex" id="CustomerVehicleNoex" class="form-controll hidden">
			
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-info pull-right">EXPORT CUSTOMER DETAILS REPORT</button>
				</div>
				</div>
			</div>
		</form>
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



customers = <?php echo $mobile; ?>;

Vehicle = <?php echo $vehicle; ?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
//autocomplete(document.getElementById("vehicle"), countries);

autocomplete(document.getElementById("CustomerMobileNo"), customers);

autocomplete(document.getElementById("CustomerVehicleNo"), Vehicle);



</script>
 
 
 
 
</body>
</html>