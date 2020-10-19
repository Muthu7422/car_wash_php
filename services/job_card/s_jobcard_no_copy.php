<?php
error_reporting(0);
session_start();
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
 
 
 $abc1="select * from a_customer_vehicle_details";
$abcd1=mysqli_query($conn,$abc1);
$customer="[";
while($ac1=mysqli_fetch_array($abcd1))
{
	$customer.="'".$ac1['cust_name']."',";
}
 $customer.="'']";

 
 
 
// $od="select * from a_customer ";
// $Eod=mysqli_query($conn,$od);
// $OldCustomer="[";
// while($FEod=mysqli_fetch_array($Eod))
// {
	
	// $OldCustomer.="'".$FEod['mobile2']."',";
// }
 // $OldCustomer.="'']";
 
 
 
 

?>

<!DOCTYPE html>
<html>


<head>
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<link rel="stylesheet" type="text/css" href="http://localhost/popup/popup-window.css" />
<script type="text/javascript" src="http://localhost/popup/jquery/jquery.js"></script>
<script type="text/javascript" src="http://localhost/popup/popup-window.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php  include("../../includes_db_css.php"); ?>
 
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
function getOldCustomerDetails(val) {
	var job_card = document.getElementById('OldCustomer').value;
	
	
	$.ajax({
	type: "POST",
	url: "get_old_customer_details.php",
	data: {job_card: job_card},
	success: function(data){
		$("#cdetails").html(data);
		}
		});
		}	  

</script>
<script type="text/javascript">
    function ShowHideDiv() {
        var jobtype = document.getElementById("jobtype");
		var create = document.getElementById("create");
        var mobile = document.getElementById("smobile");
        var mobile2 = document.getElementById("mobile2");
		var vehicle = document.getElementById("vehicle");
		var customer = document.getElementById("customer");
		create.style.display = jobtype.value == "create" ? "block" : "none";
        mobile.style.display = jobtype.value == "mobile" ? "block" : "none";
        mobile2.style.display = jobtype.value == "mobile2" ? "block" : "none";
		 vehicle.style.display = jobtype.value == "vehicle" ? "block" : "none";
		  customer.style.display = jobtype.value == "customer" ? "block" : "none";
    }

</script>
<style type="text/css">
	
	* 
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: White;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: White;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #DD4B39;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #DD4B39; 
}

.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #6680b2; 
  color:white;
}

.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
	
	/* Big box with list of options */
	#ajax_listOfOptions{
		position:absolute;	/* Never change this one */
		width:307px;	/* Width of box */
		height:250px;	/* Height of box */
		overflow:auto;	/* Scrolling features */
		border:1px solid #DD4B39;	/* Dark green border */
		background-color:#FFF;	/* White background color */
		text-align:left;
		font-size:0.9em;
		z-index:100;
	}
	#ajax_listOfOptions div{	/* General rule for both .optionDiv and .optionDivSelected */
		margin:1px;		
		padding:1px;
		cursor:pointer;
		font-size:1.5em;
	}
	#ajax_listOfOptions .optionDiv{	/* Div for each item in list */
		
	}
	#ajax_listOfOptions .optionDivSelected{ /* Selected item in the list */
		background-color:#DD4B39;
		color:#FFF;
	}
	#ajax_listOfOptions_iframe{
		background-color:#F00;
		position:absolute;
		z-index:5;
	}
	
	form{
		display:inline;
	}
	
	</style>
	<script type="text/javascript" src="ajax.js"></script>
	<script type="text/javascript" src="ajax-dynamic-list.js">
	
	/************************************************************************************************************
	(C) www.dhtmlgoodies.com, April 2006
	
	This is a script from www.dhtmlgoodies.com. You will find this and a lot of other scripts at our website.	
	
	Terms of use:
	You are free to use this script as long as the copyright message is kept intact. However, you may not
	redistribute, sell or repost it without our permission.
	
	Thank you!
	
	www.dhtmlgoodies.com
	Alf Magne Kalleland
	
	************************************************************************************************************/	
	</script>
	
	<script type="text/javascript" src="ajax-dynamic-list1.js">	
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
        Job Card 
        <small>Services</small>
      </h1>
     </section>
    
			 
 
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="s_jobcard.php?temp=del"  autocomplete="off">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
		<br>
             <div class="box-body">
			
			   <br>
				
				<?php
				if($_REQUEST['ex']!='')
				{
					?>
					<div class="alert alert-warning" role="alert">
                  <h3>This Job Card No Already Exist.Please Create Another</h3>
                    </div>
					<?php
				}
				?>
				 <div class="form-group col-sm-4">
			   <label for="catname">Select your Search Option</label>
                 <select class="form-control js-example-basic-single" name="jobtype"  id="jobtype"  onchange = "ShowHideDiv();" required>
				 <option value="">--Select Type--</option>
				 <option value="mobile"> Mobile No </option>
				 <option value="mobile2"> Secondary No </option>
				 <option value="vehicle"> Vehicle No </option>
				  <option value="customer"> Customer Name </option>
				  <option value="create"> Create New Customer </option>
				  </select>
                </div>
			
				
				 <div class="form-group col-sm-5" id="mobile">
			    <label for="Branch">&nbsp;</label>
			 <input type="text" class="form-control" style="display: none" name="smobile"  id="smobile" onKeyUp="ajax_showOptions(this,'getCountriesByLetters',event);"  autocomplete="off" style="text-transform:uppercase" onKeyPress="return tabE(this,event)"  placeholder="Customer Mobile No">
		    
			<label for="Branch">&nbsp;</label>
			 <input type="text" class="form-control" style="display: none" name="mobile2"  id="mobile2" onKeyUp="ajax_showOptions(this,'getCountriesByLetters2',event);"  autocomplete="off" style="text-transform:uppercase" onKeyPress="return tabE(this,event)"  placeholder="Customer Secondary No">

			    <label for="Branch">&nbsp;</label>
			    <input type="text" class="form-control" style="display: none" name="vehicle"  id="vehicle"  autocomplete="off" style="text-transform:uppercase" onKeyPress="return tabE(this,event)"  placeholder="Customer Vehicle No" >
				
				 <label for="Branch">&nbsp;</label>
			    <input type="text" class="form-control" style="display: none" name="customer"  id="customer"  autocomplete="off" style="text-transform:uppercase" onKeyPress="return tabE(this,event)"  placeholder="Customer Name" >
              
			   <div id="create">
                 
                  <a href="../../master/customer/customer.php" class="btn btn-info pull-right">Add New Customer</a>
                </div>
				 
				
				</div>
				 
				</div>
				 <div class="box-body">
				 <div class="col-sm-12">
				 
                  <label for="Branch">&nbsp;</label>
                  <input type="Submit" placeholder="Add" style="background-color:#37B8F8;color:#000000" value="Submit" class="btn btn-info pull-right" >
                </div>
				
				
				
				</div>

			</div>
			
          <!-- /.box -->
       
	    </div>
		</div>
				
    </form>
	</section>
	<div style="background-color:#FFFFFF" hidden>
	<section class="content-header">
      <h1>
        Customer Previous Visit - 2018 
        <small>Search</small>
      </h1>
     </section>
	 <section class="content container-fluid">
	 
	 
	  <div class="box box-primary">
	  <div class="row">
	 <div class="col-sm-4">&nbsp</div>
	 </div>
		<div class="row">
		<div class="col-sm-12">
		
		 
		        <div class="col-sm-8">
			    
                </div>
		        <div class="col-sm-4">
			   
			     <label for="Branch">Enter Mobile No. / Name / Vehicle No. </label><input type="text" class="form-control"  name="OldCustomer"  id="OldCustomer"  style="text-transform:uppercase" onKeyPress="return tabE(this,event);" onKeyUp="getOldCustomerDetails(this.value);"  placeholder="Enter Mobile No. / Name / Vehicle No." >
                </div>
				
				<div class="col-sm-12" id="cdetails" name="cdetails" >
				</div>
		 </div>
		</div>
		</div>
	 </section>
	 
	 
	</div>
	
    <!-- /.content -->
	
	
	
	
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


countries = <?php echo $vehicle; ?>;
customers = <?php echo $customer; ?>;
OldCustomers = <?php echo $OldCustomer; ?>;
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("vehicle"), countries);

autocomplete(document.getElementById("customer"), customers);

// autocomplete(document.getElementById("OldCustomer"), OldCustomers);

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
