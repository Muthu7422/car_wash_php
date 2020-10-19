<?php
include("../../includes.php");

$v_type=$_POST['vehcile_type'];
$stype=$_POST['Servicet'];

?>

 
<div class="box-body">
			
	<div class="form-group col-sm-12">
			<div>
            <h4 class="box-title"><b>  Job Card Details  </b></h4>
            <!-- /.box-header -->
             <table border="1" width="100%" align="center" class="table" >
			  <thead>
                <tr style="align:center">
                <th>Sl No</th>
				<th>Date</th>
				 <th>Job Card No</th>
				 <th>Customer Name</th>
				 <th>Mobile</th>
				   <th>Vehicle Segment</th>
				     <th>Service Type</th>
					  <th>Service Amount</th>
				  
			    </tr>
			
                 </thead>
				   <tbody>
					<?php
					$i=0;
					
					$mvs="select * from master_vehicle_segment where id='".$v_type."'";
				  $mvq=mysqli_query($conn,$mvs);
				  while($mvf=mysqli_fetch_array($mvq))
				  {
					  $cd="select * from a_customer_vehicle_details where VehicleSegment='".$mvf['VehicleSegment']."'"; 
				   $cdq=mysqli_query($conn,$cd);
				 while($cdf=mysqli_fetch_array($cdq))
				 {
				   
				   
				    $ssc="select * from m_service_type where status='Active' and v_type='".trim($mvf['Id'])."' and stype='$stype'";
				  $Essc=mysqli_query($conn,$ssc);
				 $FEssc=mysqli_fetch_array($Essc);
				  
				  
				   $jcd="select * from s_job_card where customer_id='".$cdf['cust_no']."'";
				   $jcdq=mysqli_query($conn,$jcd);
				   $jcdf=mysqli_fetch_array($jcdq);
				   
				    $jcn="select * from s_job_card_sdetails where job_card_no='".$jcdf['id']."' and service_type='".$FEssc['stype']."'";
				   $jcnq=mysqli_query($conn,$jcn);
				  while($jcnf=mysqli_fetch_array($jcnq))
				  {
				  
				   $i++;
				?>
                <tr>
                  <td><?php echo $i;?></td>
				   <td><?php echo date("d-m-Y",strtotime($jcdf['jdate']));?></td>
				  <td><?php echo $jcdf['job_card_no'];?></td>
				  <td><?php echo $jcdf['sname'];?></td>
				   <td><?php echo $jcdf['smobile'];?></td>
                  <td><?php echo $mvf['VehicleSegment'];?></td>
				  <td><?php echo $jcnf['service_type'];?></td>
				    <td><?php echo $jcnf['st_amt'];?></td>
				   
				  
				 

	  <?php
				 }
				 }
				  }
				 
				  ?>
                  
                </tr>
				
                </tbody>
              </table>
          	
            <!-- /.box-body -->
			</div>
      </div>
	    
                </div>   
        