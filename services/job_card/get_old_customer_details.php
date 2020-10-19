<?php
error_reporting(0);
session_start();
include("../../includes.php");
include("../../redirect.php");
 

?>
         
            <!-- /.box-header -->
			 <div class="box-body">
			 <div style="overflow:auto">
             <table id="example1" class="table table-bordered table-striped" width="140%">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Service Date</th>
				  <th>Customer Name</th>
				  <th>Customer Mobile</th>
				  <th>Vehicle Number</th>
				   <th>Vehicle Model</th>
				  <th>Service Name</th>
                </tr>
                </thead>
                <tbody>
				<?php
				//$InputArray=explode($_POST['job_card']);
				if($_POST['job_card']!='')
				{
				$MobileNo=$_POST['job_card'];
				$i=0;
				//$ct="select * from customer_old_data where CustomerName!='' AND ServiceDate!='0000-00-00' order by ServiceDate";
				$ct="select * from customer_old_data where CustomerMobile like '%$MobileNo%' OR CustomerName like '%$MobileNo%' OR VehicleNumber like '%$MobileNo%'order by ServiceDate";
				$Ect=mysqli_query($conn,$ct);
				while($Fct=mysqli_fetch_array($Ect))
				{
					
				$cts="select * from a_customer where id='".$Fct['CustomerName']."'";
			    $Ects=mysqli_query($conn,$cts);
				$Fcts=mysqli_fetch_array($Ects);
				
					//date("d-m-Y", strtotime($Fct['ServiceDate']));
				  
				 $i++;
				?>
                <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo date("d-m-Y", strtotime($Fct['ServiceDate'])); ?></td>
				  <td><?php echo $Fcts['cust_name'];  ?></td>
				  <td><?php echo $Fct['CustomerMobile'];  ?></td>
				  <td><?php echo $Fct['VehicleNumber'];  ?></td>				 
				  <td><?php echo $Fct['VehicleModel'];  ?></td>
				  <td><?php echo $Fct['ServiceName'];  ?></td>
                </tr>
				<?php }							
				}
				?>
                  </tbody>
                
              </table>
			  </div>
          	  </div>
            <!-- /.box-body -->
			