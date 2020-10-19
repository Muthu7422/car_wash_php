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
 
 
  <style>


#myImg , #myImg1 , #myImg2 , #myImg3 , #myImg4 , #myImg5 {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}
.imgg img
{
	height:300px;
	
}

#myImg:hover {opacity: 0.7;}
#myImg1:hover {opacity: 0.7;}
#myImg2:hover {opacity: 0.7;}
#myImg3:hover {opacity: 0.7;}
#myImg4:hover {opacity: 0.7;}
#myImg5:hover {opacity: 0.7;}
#myImg6:hover {opacity: 0.7;}
#myImg7:hover {opacity: 0.7;}
#myImg8:hover {opacity: 0.7;}
#myImg9:hover {opacity: 0.7;}
#myImg10:hover {opacity: 0.7;}
#myImg11:hover {opacity: 0.7;}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: white;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: white;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
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
        Employee Details View
        <small>Master</small>
      </h1>
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
   
   
    <!-- Main content -->
    <section class="content container-fluid">
    <form role="form" method="post" action="#" >
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
            <?php
			 $Rpw="select * from h_employee where id='".$_REQUEST['id']."'";
			$Rpm=mysqli_query($conn,$Rpw);
			$Rep=mysqli_fetch_array($Rpm);
			
			?>
              <div class="box-body">
			  
			    <div class="form-group col-sm-4">
                  <label for="Branch">Branch  Name</label>
                  <select type="text" class="form-control" name="fran_name" id="fran_name" readonly onKeyPress="return tabE(this,event)" >
				  <?php
				   $ssc="select * from m_franchisee where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id'] ?>"><?php echo $FEssc['franchisee_name'] ?></option>
				  <?php
				  }
				  ?>
				  </select>
                </div>
			  
                <div class="form-group col-sm-4">
                  <label for="Branch">Employee Code</label>
                  <input type="text" class="form-control" name="ecode" id="ecode" value="<?php echo $Rep['ecode']; ?>" readonly  onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Employee Name</label>
                  <input type="text" class="form-control" name="ename" id="ename" value="<?php echo $Rep['ename']; ?>" onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				 <div class="form-group col-sm-4">
                  <label for="Branch">Employee Mobile</label>
                  <input type="number" class="form-control" name="emobile" id="emobile" value="<?php echo $Rep['emobile']; ?>" onKeyPress="return tabE(this,event)" readonly >
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Secondary Mobile</label>
                  <input type="number" class="form-control" name="smobile" id="smobile" value="<?php echo $Rep['smobile']; ?>" onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Address</label>
                  <textarea class="form-control" name="saddress" id="saddress" onKeyPress="return tabE(this,event)" readonly><?php echo $Rep['eaddr']; ?></textarea>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee City</label>
                  <input type="text" class="form-control" name="scity" id="scity" value="<?php echo $Rep['ecity']; ?>"  onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee State</label>
                <select class="form-control" id="sstate" name="sstate" onKeyPress="return tabE(this,event)" readonly>
				 <option selected="selected"><?php echo $Rep['estate']; ?></option>
				  <option>TAMILNADU</option>
                  <option>KERKA</option>
				  <option>PONDICHERRY</option>
				  <option>ANDHRA</option>
				  <option>CHENNAI</option>
				  <option>KARNATAKA</option>
				</select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Joining Date</label>
                  <input type="date" class="form-control" name="date" id="date" value="<?php echo $Rep['joindate']; ?>"  onKeyPress="return tabE(this,event)" readonly>
                </div>
				<div class="col-md-12"></div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Email ID</label>
                 <input type="email" class="form-control" name="semail" value="<?php echo $Rep['email']; ?>" id="semail" placeholder="Email ID" onKeyPress="return tabE(this,event)" readonly>
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Designation</label>
                  <select class="form-control" id="edesign" name="edesign" onKeyPress="return tabE(this,event)" readonly>
				
				  <?php 
				  $ssc="select * from h_designation where status='Active' and id='".$Rep['edesign']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['dname']; ?></option>
				  <?php } ?>
				   <?php 
				  $ssc="select * from h_designation where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['dname']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Employee Departmemnt</label>
                  <select class="form-control" id="edept" name="edept" onKeyPress="return tabE(this,event)" readonly>
				  <?php 
				  $ssc="select * from h_department where status='Active' and id='".$Rep['edepart']."'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['dname']; ?></option>
				  <?php } ?>
				  
				   <?php 
				  $ssc="select * from h_department where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['id']; ?>"><?php echo $FEssc['dname']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Blood Group</label>
                  <input class="form-control" name="blood_group" id="blood_group" value="<?php echo $Rep['blood_group'];?>" onKeyPress="return tabE(this,event)" placeholder="Blood Group" readonly >
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Per Month  Salary</label>
                 <input type="text" class="form-control" name="salary" id="salary" value="<?php echo $Rep['salary'] ?>" onKeyPress="return tabE(this,event)" placeholder="Salary" readonly>
                </div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Remarks</label>
                  <textarea class="form-control" name="remarks" id="remarks" placeholder="Remarks" onKeyPress="return tabE(this,event)" readonly><?php echo $Rep['remarks'];?></textarea>
                </div>
				
				
				
            </div>
			
			
			<?php
			
			$emp_proof="select * from h_employee_proof where emp_id='".$_REQUEST['id']."'";
			$empq=mysqli_query($conn,$emp_proof);
			$empf=mysqli_fetch_array($empq);
			
			
			?>
			
			
			<div class="col-sm-12">
				 
            <div class="box-header with-border">
              <h3 class="box-title" style="color:red"><b>Employee Proof Details</b></h3>
			</div>
			 <div class="col-sm-6">
			 
			 <br>
			 <div class="form-group">
                      <label for="careof" class="col-sm-6 control-label">Employee Photo : </label>
                      <div class="col-sm-6">
                        <img src="<?php echo $empf['EmployeePhoto'];?>" WIDTH="100%" HEIGHT="AUTO" id="myImg">
                      </div>
                    </div> 
					</div>
						
				
			 <div class="col-sm-6">
			 <br>
					<div class="form-group">
                      <label for="careof" class="col-sm-6 control-label">Aadhaar Card : </label>
                      <div class="col-sm-6">
                         <img src="<?php echo $empf['AatherCard'];?>" WIDTH="100%" HEIGHT="AUTO" id="myImg1">
                      </div>
                    </div>
					</div>
			 <div class="col-sm-6">
			 <br>
					<div class="form-group">
                      <label for="careof" class="col-sm-6 control-label">Pancard : </label>
                      <div class="col-sm-6">
                        <img src="<?php echo $empf['Pancard'];?>" WIDTH="100%" HEIGHT="AUTO" id="myImg2">
                      </div>
                    </div>
					</div>
			 <div class="col-sm-6">
			 <br>
					 <div class="form-group">
                      <label for="careof" class="col-sm-6 control-label">Driving Lincence : </label>
                      <div class="col-sm-6">
                        <img src="<?php echo $empf['DrivingLicence'];?>" WIDTH="100%" HEIGHT="AUTO" id="myImg3">
                      </div>
                    </div>
						</div>
			 <div class="col-sm-6">	
<br>			 
					 <div class="form-group">
                      <label for="careof" class="col-sm-6 control-label">Voter Id : </label>
                      <div class="col-sm-6">
                       <img src="<?php echo $empf['VoterId'];?>" WIDTH="100%" HEIGHT="AUTO" id="myImg4">
                      </div>
                    </div>
					</div>
			 <div class="col-sm-6">
			 <br>
					   <div class="form-group">
                      <label for="careof" class="col-sm-6 control-label">Other Documents : </label>
                      <div class="col-sm-6">
                        <img src="<?php echo $empf['OtherDocuments'];?>" WIDTH="100%" HEIGHT="AUTO" id="myImg5">
                      </div>
                    </div>			
					
					</div>
					
			</div>
			
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	    
         </div>
    </form>
	</section>
    <!-- /.content -->
	
	 
       <!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

    

	
	
	
</div>

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>
</div>
 <?php include("../../includes_db_js.php"); ?>
 <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

var img1 = document.getElementById('myImg1');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img1.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

var img2 = document.getElementById('myImg2');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img2.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

var img3 = document.getElementById('myImg3');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img3.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

var img4 = document.getElementById('myImg4');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img4.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

var img5 = document.getElementById('myImg5');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img5.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

 
</body>
</html>
