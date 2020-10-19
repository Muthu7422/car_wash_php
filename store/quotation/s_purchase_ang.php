<?php
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
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

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
      <h1>Purchase</h1>
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


function spare(){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name').value;


$.ajax({
      type:'post',
        url:'get.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("spart_no").value=msg;
   
       }
 });

}

function spare1(){ 
    var qty = 0;
    var inputs = document.getElementById('spare_name').value;


$.ajax({
      type:'post',
        url:'get1.php',// put your real file name 
        data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("prate").value=msg;
   
       }
 });

}


$(document).ready(function(){
  $('#pdate').mask('00/00/0000');
  
});  



function outstanding(){ 
    var qty = 0;
    var inputs = document.getElementById('suppliername').value;
	
$.ajax({
      type:'post',
        url:'get_outstanding.php',// put your real file name //data: {inputs: inputs,pno: pno,pdate:pdate},
       data:{inputs},
		//data:{inputs},
		dataType    : 'json',
        success:function(msg){
              // your message will come here.  
        document.getElementById("outst").value=msg[0];
       
       }
 });

}


function spare_part_no(){ 
    var qty = 0;
    var inputs = document.getElementById('sparename').value;
	
$.ajax({
      type:'post',
        url:'get_spartno.php',// put your real file name //data: {inputs: inputs,pno: pno,pdate:pdate},
       data:{inputs},
	   dataType: 'json',
		//data:{inputs},
        success:function(msg){
              // your message will come here.  
        document.getElementById("spartno").value=msg[0];
		document.getElementById("prate").value=msg[1];
       }
 });

}



function spare_name(val) {
	$.ajax({
	type: "POST",
	url: "spare_name.php",
	data:'country_id='+val,
	success: function(data){
		$("#sparename").html(data);
		}
		});
		}
		
	

		
</script>	 
 
 
   
    <!-- Main content -->
	<div ng-app="myApp" ng-controller="cntrl">
    <section class="content container-fluid">
    <form role="form" method="post" action="s_purchase_temp_act.php">
	
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
             <!-- /.box-header -->
            <!-- form start -->
              
              <div class="box-body">
			  
			    <div class="row">
				<h3>{{msg}}</h3>
				</div>
				
                <div class="form-group col-sm-2">
                  <label for="Branch">Invoice No</label>
				  <?php
				  $in="select distinct(inv_no) as inv from s_purchase_temp";
				  $Ein=mysqli_query($conn,$in);
				  $Fin=mysqli_fetch_array($Ein);
				  ?>
                  <input type="text" class="form-control" ng-model="invno" name="invno" id="invno" value="<?php echo $Fin['inv']; ?>" >
                </div>
				
				 <div class="form-group col-sm-3">
                  <label for="Branch">Date</label>
				  <input type="date" ng-model="pdate" name="pdate" id="pdate" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                  			  
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Supplier Name</label>
                  <select class="form-control" ng-model="suppliername" id="suppliername" name="suppliername" onChange="outstanding(this.value);" >
				  <option value="" selected="selected">Select</option>
				  <?php 
				  $ssc="select * from m_supplier where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sname']; ?>"><?php echo $FEssc['sname']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
				<div class="form-group col-sm-3">
                  <label for="Branch">Outstanding</label>
                  <input class="form-control" ng-model="outst" id="outst"  name="outst" readonly="true" >
                </div>
											
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Brand</label>
                  <select class="form-control" ng-model="sbrand" id="sbrand" name="sbrand" onChange="spare_name(this.value);" ng-disabled="obj.sbrandDisabled"  >
				  <option value="" selected="selected">Select</option>
				  <?php 
				  $ssc="select * from m_spare_brand where status='Active'";
				  $Essc=mysqli_query($conn,$ssc);
				  while($FEssc=mysqli_fetch_array($Essc))
				  {
				  ?>
				  <option value="<?php echo $FEssc['sid']; ?>"><?php echo $FEssc['sbrand']; ?></option>
				  <?php } ?>
				  </select>
                </div>
				
				<div class="form-group col-sm-4">
					<label for="Branch">Spare Name</label>
					<select class="form-control" ng-model="sparename" id="sparename" name="sparename" onChange="spare_part_no(this.value);">
					</select>
                </div>
				
				<div class="col-md-12"></div>
				<div class="form-group col-sm-4">
                  <label for="Branch">Spare Part No</label>
                 <input type="text" class="form-control" ng-model="spartno" name="spartno" id="spartno" placeholder="Spare Part No">
                </div>
				
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Purchase Rate</label>
                  <input type="text" class="form-control" ng-model="prate"  name="prate" id="prate" placeholder="Purchase Rate">
                </div>
				
				<div class="form-group col-sm-4">
                  <label for="Branch">Quantity</label>
                  <input type="text" class="form-control" ng-model="qty" name="qty" id="qty" placeholder="Quantity">
                 <input type="hidden" class="form-control" ng-model="pid" name="pid" id="pid" >

                </div>
				<button type="reset" ng-click="reset()" class="btn btn-info pull-left">Reset</button>
				<input type="button" value="{{btnName}}" ng-click="insertData()" class="btn btn-info pull-right" />
				
				
         
			
			
			
			
			</div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
                <div class="form-group col-sm-12">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>S.No</th>
				  <th>Inv No.</th>
				  <th>Date </th>
                  <th>Spare Brand</th>
				  <th>Spare Name</th>
				   <th>Part Name</th>
				  <th>Rate</th>
				  <th>Qty</th>
				  <th>Total</th>
				  <th>Action</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<tr ng-repeat="student in Students">
				    <td>{{$index + 1}}</td>
					<td>{{student.inv_no}}</td>
                    <td>{{student.pdate}}</td>
					<td>{{student.sbrand}}</td>
					<td>{{student.sname}}</td>
					<td>{{student.spart_no}}</td>
                    <td>{{student.prate}}</td>
					<td>{{student.qty}}</td>
                    <td>{{student.total}}</td>
				    <td><input type="button" ng-click="deleteStudent(student.id)" value="Delete" class="btn btn-info"></td>
                    <td><input type="button" ng-click="editStudent(student.pdate,student.id,student.outstand,student.spart_no,student.sbrand,student.sname,student.prate,student.qty,student.inv_no,student.supplier_name)" value="Edit" class="btn btn-info"></td>
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
		 
		 <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" onClick="return confirm('Are You Sure Want to Submit?');" >Save Changes</button>
         </div> 
	</section>
	
	</form>
	
	<script>

        var app = angular.module('myApp', []);
        app.controller('cntrl', function ($scope, $http) {
			
			// Declarations  sbrandDisabled
        	$scope.obj = { 'sbrandDisabled': false };
        	$scope.btnName = 'Add Spare';

			// Insert data into DB function       
        	$scope.insertData = function () {
        		$http.post("s_purchase_temp_act_ang.php", {'pid':$scope.pid,'invno':$scope.invno,'pdate':$scope.pdate,'suppliername':$scope.suppliername,'outst':$scope.outst,'sbrand': $scope.sbrand, 'sparename': $scope.sparename, 'spartno':$scope.spartno,'prate':$scope.prate,'qty':$scope.qty, 'btnName':$scope.btnName })
				.then(function () {					
					$scope.msg = "Data inserted";
					$scope.displayStudent();
				});
        	}

			// Display DB rows function
        	$scope.displayStudent = function () {
        		$http.get('s_purchase_select.php')
				.then(function (response) {
					$scope.Students = response.data;
					console.log($scope.Students);
				});
        	}
			// Delete DB row item function
        	$scope.deleteStudent = function (id) {
        		$http.post('s_purchase_delete.php', {'id': id })
				.then(function () {
					$scope.msg = "Selected data has been deleted.";
					$scope.displayStudent();
				});
        	}
			// s_purchase_temp_update.php
        	// Edit DB row item function  student.supplier_name,student.sbrand,student.sname,student.prate,student.qty
			
			// student.id,student.outstand,student.spart_no,student.sbrand,student.sname,student.prate,student.qty,student.inv_no,student.supplier_name
        	$scope.editStudent = function (pdate,id,outstand,spart_no,sbrand,sname,prate,qty,invno,supplier_name) {

        	
				$scope.sbrand = sbrand;
				$scope.sparename = sname;
        		$scope.spartno = spart_no;
				
				$scope.prate = prate;
				$scope.qty = qty;
				$scope.invno = invno;
				$scope.suppliername = supplier_name;
				$scope.pid = id;
				$scope.out = outstand;
				$scope.pdate=pdate;
				
        		$scope.btnName = 'Update';
        		$scope.obj = { 'studentIdDisabled': true };
        		$scope.displayStudent();
				
        	}
			
			var original = angular.copy($scope.user);
			$scope.reset = function() {
			$scope.user = angular.copy(original);
			$scope.btnName = 'Add Spare';
			$scope.msg = " ";
			
			$scope.displayStudent();
			};
			
        });
		
		

		
		
        </script>
	
</div>	
</div>

  <!-- /.content-wrapper -->
 <!--footer start-->
 <?php include("../../footer.php"); ?>
  <!--footer End-->
    <div class="control-sidebar-bg"></div>

 <?php include("../../includes_db_js.php"); ?>
 
</div>
 
</body>
</html>
