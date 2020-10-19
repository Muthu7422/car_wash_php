<?php
include("../../includes.php");
include("../../redirect.php");
error_reporting(0);


$abc1="select * from m_vehicle_brand";
$abcd1=mysqli_query($conn,$abc1);
$Brand="[";
while($ac1=mysqli_fetch_array($abcd1))
{
	$st=$ac1['VehicleBrand']." - ".$ac1['Id'];
	$Brand.="'$st',";
}
 $Brand.="]";

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['title']; ?></title>
  <?php include("../../includes_db_css.php"); ?>
   
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
       Edit Vehicle Master
        <small>Master</small>
      </h1>
     </section>
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="m_vehicle_master_editQ.php">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
             <?php
			 $edy="select * from master_vehicle where Id='".$_REQUEST['Id']."'";
			  $dyg=mysqli_query($conn,$edy);
				$fcf=mysqli_fetch_array($dyg);
			  
					$edcr="select * from m_vehicle_type where Id='".$fcf['VehicleType']."'";
					$edar=mysqli_query($conn,$edcr);
					$wsxr=mysqli_fetch_array($edar); 
					
					$ses="select * from master_vehicle_segment where Id='".$fcf['VehicleSegment']."'";
					$Eses=mysqli_query($conn,$ses);
					$FEses=mysqli_fetch_array($Eses);
					
					$scp="select * from m_vehicle_brand where Id='".$fcf['VehicleBrand']."'";
					$Escp=mysqli_query($conn,$scp);
					$FEcp=mysqli_fetch_array($Escp);
			
			  ?>
             <div class="box-body">
                <div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Type</label>
                  <select type="text" class="form-control" name="VehicleType" id="VehicleType" onKeyPress="return tabE(this,event)" required>
				  <option value="<?php echo $fcf['VehicleType'] ?>"><?php echo $wsxr['VehicleType'] ?></option>
				  <?php 
				  $cx="select * from m_vehicle_type where Status='Active'";
				  $dx=mysqli_query($conn,$cx);
				  while($xd=mysqli_fetch_array($dx))
				  {
				  ?>
				  <option value="<?php echo $xd['Id']; ?>"><?php echo $xd['VehicleType']; ?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Segment</label>
                  <select type="text" class="form-control" name="VehicleSegment" id="VehicleSegment" value="<?php echo $FEses['VehicleSegment'] ?>" onKeyPress="return tabE(this,event)" required>
				  <option value="<?php echo $fcf['VehicleSegment'] ?>"><?php echo $FEses['VehicleSegment'] ?></option>
				  <?php 
				  $cx="select * from master_vehicle_segment where Status='Active'";
				  $dx=mysqli_query($conn,$cx);
				  while($xd=mysqli_fetch_array($dx))
				  {
				  ?>
				  <option value="<?php echo $xd['Id']; ?>"><?php echo $xd['VehicleSegment']; ?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
				 <div class="form-group autocomplete col-sm-4">
                  <label for="Branch">Vehicle Brand</label>
                  <input type="text" class="form-control" name="VehicleBrand" id="VehicleBrand" value="<?php echo $FEcp['VehicleBrand'] ?>"  onKeyPress="return tabE(this,event)" required>
                </div>
				 <div class="form-group col-sm-4">
                  <label for="Branch">Vehicle Model</label>
                 <input type="text" class="form-control" name="VehicleModel" id="VehicleModel" value="<?php echo $fcf['VehicleModel'] ?>" onKeyPress="return tabE(this,event)" required>
				  <input type="hidden" class="form-control" name="Id" id="Id" value="<?php echo $fcf['Id'] ?>" onKeyPress="return tabE(this,event)" required>
                </div>
            </div>
			 <div class="box-body">
			  <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
				
                </div>  </div> 
            </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </form>
	</section>
    <!-- /.content -->
	
	  <section class="content container-fluid" hidden>
       
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
				  <th>Vehicle Type</th>
				  <th>Vehicle Segment</th>
                  <th>Vehicle Brand</th>
				  <th>Vehicle Model</th>
				  
                </tr>
                </thead>
                <tbody>
				<tr>
                  <td><?php echo $i; ?></td>
				  <td><?php  echo $wsxr['VehicleType']; ?></td>
				  <td><?php  echo $FEses['VehicleSegment']; ?></td>
				  <td><?php  echo $FEcp['VehicleBrand']; ?></td>
				  <td><?php  echo $fcf['VehicleModel']; ?></td>
				</tr>
			  
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



customers = <?php echo $Brand; ?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
//autocomplete(document.getElementById("vehicle"), countries);

autocomplete(document.getElementById("VehicleBrand"), customers);

</script>
</body>
</html>
